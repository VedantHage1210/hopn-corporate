# HOPn Corporate Website — Installation Guide

## Prerequisites

| Requirement | Version |
|---|---|
| PHP | 8.2 or higher |
| MySQL | 8.0 or higher |
| Composer | 2.x |
| Node.js | 18 LTS or higher |
| npm | 9+ |

---

## Step 1 — Clone the Repository

```bash
git clone https://github.com/your-org/hopn-corporate.git
cd hopn-corporate
```

---

## Step 2 — Install PHP Dependencies

```bash
composer install --no-interaction --prefer-dist --optimize-autoloader
```

---

## Step 3 — Install Node Dependencies

```bash
npm install
```

---

## Step 4 — Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Open `.env` and fill in:

- `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD` — your MySQL credentials
- `APP_URL` — your full domain (e.g. `https://www.hopn.eu`)
- `MAIL_HOST`, `MAIL_USERNAME`, `MAIL_PASSWORD` — SMTP settings
- `ADMIN_EMAIL` — email address for lead notifications

---

## Step 5 — Create the Database

```sql
CREATE DATABASE hopn_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

---

## Step 6 — Run Migrations

```bash
php artisan migrate --force
```

---

## Step 7 — Seed the Database

```bash
php artisan db:seed
```

This creates:
- Superadmin user: `superadmin@hopn.eu` / `Admin@123`
- All roles and permissions
- Default site settings
- EN and DE languages
- Demo content (services, blog posts, case studies, jobs, etc.)

> **Change the default password immediately after first login.**

---

## Step 8 — Create Storage Symlink

```bash
php artisan storage:link
```

---

## Step 9 — Build Frontend Assets

```bash
# Development
npm run dev

# Production build (minified)
npm run build
```

---

## Step 10 — Start the Queue Worker

```bash
# In a persistent terminal / supervisor
php artisan queue:work --tries=3 --backoff=60 --sleep=3
```

For production use Supervisor (see `DEPLOY.md`).

---

## Step 11 — (Optional) Cache for Production

```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

---

## Step 12 — Verify Installation

Visit your `APP_URL` — you should see the HOPn homepage.

Visit `APP_URL/admin` — log in with `superadmin@hopn.eu` / `Admin@123`.

---

## Useful Artisan Commands

```bash
# Clear all caches
php artisan optimize:clear

# Re-run seeders
php artisan db:seed --class=DemoContentSeeder

# Generate sitemap
php artisan tinker
>>> app(\App\Services\SitemapService::class)->generate()->writeToFile(public_path('sitemap.xml'));

# Run queue in foreground (dev only)
php artisan queue:listen
```
