#!/bin/bash
set -e

cd /var/www/html

mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

# Create .env from the example on first run if it doesn't exist yet
if [ ! -f .env ]; then
    echo "No .env found — creating one from .env.example"
    cp .env.example .env
fi

# Force the DB connection settings to match docker-compose's db service,
# regardless of what's in .env.example (safe to run every boot - it just
# rewrites these specific keys).
sed -i "s/^DB_CONNECTION=.*/DB_CONNECTION=mysql/" .env
sed -i "s/^DB_HOST=.*/DB_HOST=${DB_HOST:-db}/" .env
sed -i "s/^DB_PORT=.*/DB_PORT=${DB_PORT:-3306}/" .env
sed -i "s/^DB_DATABASE=.*/DB_DATABASE=${DB_DATABASE:-hopn_db}/" .env
sed -i "s/^DB_USERNAME=.*/DB_USERNAME=${DB_USERNAME:-hopn_user}/" .env
sed -i "s/^DB_PASSWORD=.*/DB_PASSWORD=${DB_PASSWORD:-hopn_password}/" .env

echo "DB config in use: host=$(grep '^DB_HOST=' .env) port=$(grep '^DB_PORT=' .env) db=$(grep '^DB_DATABASE=' .env)"

# If Railway (or any host) provided APP_KEY as an environment variable,
# write it into .env so Laravel picks it up consistently.
if [ -n "$APP_KEY" ]; then
    if grep -q "^APP_KEY=" .env; then
        sed -i "s|^APP_KEY=.*|APP_KEY=${APP_KEY}|" .env
    else
        echo "APP_KEY=${APP_KEY}" >> .env
    fi
fi

# Generate an app key if one still isn't set
if ! grep -q "^APP_KEY=base64:" .env; then
    echo "Generating APP_KEY..."
    php artisan key:generate --force
fi

# Wait for MySQL to accept TCP connections before running migrations.
echo "Waiting for the database at ${DB_HOST:-db}:${DB_PORT:-3306} to be ready..."
attempt=0
until (exec 3<>"/dev/tcp/${DB_HOST:-db}/${DB_PORT:-3306}") 2>/dev/null; do
    attempt=$((attempt+1))
    if [ "$attempt" -ge 30 ]; then
        echo "Gave up waiting for the database after 60 seconds - continuing anyway."
        echo "If the next step fails, check: docker compose logs db"
        break
    fi
    sleep 2
    echo "Still waiting for the database... (attempt $attempt/30)"
done
echo "Database port is reachable."

# Run migrations (and seed only the very first time, tracked via a marker file)
php artisan migrate --force

if [ ! -f storage/.seeded ]; then
    echo "First run detected — seeding demo data..."
    php artisan db:seed --force
    touch storage/.seeded
fi

php artisan storage:link || true
php artisan config:cache
php artisan route:cache
php artisan view:cache

chown -R www-data:www-data storage bootstrap/cache
find storage bootstrap/cache -type d -exec chmod 775 {} \;
find storage bootstrap/cache -type f -exec chmod 664 {} \;

echo "Ready. Starting Apache..."
exec "$@"