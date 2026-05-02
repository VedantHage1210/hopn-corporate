# HOPn Corporate Website — Deployment Guide

---

## Option A — VPS Deployment (Ubuntu 22.04 + Nginx + PHP-FPM)

### 1. Server Requirements

```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install PHP 8.2
sudo apt install -y software-properties-common
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update
sudo apt install -y php8.2 php8.2-fpm php8.2-mysql php8.2-mbstring php8.2-xml \
  php8.2-bcmath php8.2-curl php8.2-zip php8.2-gd php8.2-intl php8.2-redis

# Install MySQL 8
sudo apt install -y mysql-server
sudo mysql_secure_installation

# Install Node.js 20 LTS
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Nginx
sudo apt install -y nginx
```

### 2. Create Database

```sql
sudo mysql -u root -p
CREATE DATABASE hopn_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'hopn_user'@'localhost' IDENTIFIED BY 'strong_password_here';
GRANT ALL PRIVILEGES ON hopn_db.* TO 'hopn_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### 3. Deploy Application

```bash
# Create web root
sudo mkdir -p /var/www/hopn
sudo chown $USER:$USER /var/www/hopn

# Clone repo
git clone https://github.com/your-org/hopn-corporate.git /var/www/hopn
cd /var/www/hopn

# Install dependencies
composer install --no-dev --optimize-autoloader
npm install && npm run build

# Configure environment
cp .env.example .env
nano .env   # fill in all values
php artisan key:generate

# Run migrations and seeds
php artisan migrate --force
php artisan db:seed --force

# Set permissions
sudo chown -R www-data:www-data /var/www/hopn/storage /var/www/hopn/bootstrap/cache
sudo chmod -R 775 /var/www/hopn/storage /var/www/hopn/bootstrap/cache

# Storage symlink
php artisan storage:link

# Cache for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

### 4. Nginx Configuration

```nginx
# /etc/nginx/sites-available/hopn
server {
    listen 80;
    server_name www.hopn.eu hopn.eu;
    root /var/www/hopn/public;
    index index.php;

    client_max_body_size 20M;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    # Cache static assets
    location ~* \.(css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

```bash
# Enable site
sudo ln -s /etc/nginx/sites-available/hopn /etc/nginx/sites-enabled/
sudo nginx -t && sudo systemctl reload nginx
```

### 5. SSL with Certbot

```bash
sudo apt install -y certbot python3-certbot-nginx
sudo certbot --nginx -d hopn.eu -d www.hopn.eu
# Certbot auto-configures HTTPS and sets up renewal
```

### 6. Queue Worker with Supervisor

```bash
sudo apt install -y supervisor

# Create config
sudo nano /etc/supervisor/conf.d/hopn-worker.conf
```

```ini
[program:hopn-worker]
process_name=%(program_name)s_%(process_num)02d
command=php /var/www/hopn/artisan queue:work --sleep=3 --tries=3 --backoff=60 --max-time=3600
autostart=true
autorestart=true
stopasgroup=true
killasgroup=true
user=www-data
numprocs=2
redirect_stderr=true
stdout_logfile=/var/www/hopn/storage/logs/worker.log
stopwaitsecs=3600
```

```bash
sudo supervisorctl reread
sudo supervisorctl update
sudo supervisorctl start hopn-worker:*
```

### 7. Scheduled Tasks (Cron)

```bash
sudo crontab -e -u www-data
# Add:
* * * * * cd /var/www/hopn && php artisan schedule:run >> /dev/null 2>&1
```

---

## Option B — Shared Hosting (cPanel)

### Requirements
- PHP 8.2+ (set in cPanel → PHP Version Manager)
- MySQL 8.0+ database
- SSH access (recommended)

### Steps

1. **Upload files** via cPanel File Manager or SFTP to `public_html/hopn` (NOT inside public_html root directly).

2. **Symlink or move public folder:** In cPanel, change document root to `/home/user/hopn/public`, or create a symlink:
   ```bash
   ln -s /home/user/hopn/public /home/user/public_html
   ```

3. **Create MySQL database** in cPanel → MySQL Databases.

4. **SSH into server:**
   ```bash
   cd ~/hopn
   composer install --no-dev --optimize-autoloader
   cp .env.example .env
   # Edit .env with your values
   php artisan key:generate
   php artisan migrate --force
   php artisan db:seed --force
   php artisan storage:link
   php artisan optimize
   ```

5. **Build assets** (if Node.js available on host):
   ```bash
   npm install && npm run build
   ```
   Otherwise build locally and upload the `public/build/` directory.

6. **Queue worker via cron** (cPanel → Cron Jobs):
   ```
   * * * * * cd /home/user/hopn && php artisan schedule:run >> /dev/null 2>&1
   */5 * * * * cd /home/user/hopn && php artisan queue:work --stop-when-empty --tries=3 >> /dev/null 2>&1
   ```

---

## Zero-Downtime Deployments (Git Pull Strategy)

```bash
#!/bin/bash
# deploy.sh — run on server
set -e

cd /var/www/hopn

echo "Pulling latest code..."
git pull origin main

echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader

echo "Building assets..."
npm ci && npm run build

echo "Running migrations..."
php artisan migrate --force

echo "Clearing caches..."
php artisan optimize:clear
php artisan optimize

echo "Restarting queue workers..."
php artisan queue:restart

echo "Reloading PHP-FPM..."
sudo systemctl reload php8.2-fpm

echo "Deployment complete."
```

```bash
chmod +x deploy.sh
sudo visudo  # add: www-data ALL=(ALL) NOPASSWD: /bin/systemctl reload php8.2-fpm
```
