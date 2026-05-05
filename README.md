# HOPn Corporate Website

A complete, multilingual (EN/DE), CMS-driven corporate website for [HOPn](https://www.hopn.eu) built with Laravel 10+.

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | PHP 8.2+, Laravel 10+ |
| Database | MySQL 8.0+ |
| Frontend | Blade + TailwindCSS (dark enterprise theme) |
| Auth / RBAC | Laravel Breeze + Spatie Permission |
| Localization | Laravel Lang + Spatie Translatable |
| File Uploads | Laravel Storage (local / S3) |
| Email | Laravel Mail + SMTP (queued) |
| Queue | Laravel Jobs (database driver) |
| SEO | artesaos/seotools + Spatie Sitemap |
| Rich Text | TinyMCE (CDN) |
| Slugs | Spatie Sluggable |
| Activity Log | Spatie Activitylog |

---

## Features

### Public Website
- Home page with hero, services, case studies, testimonials, partner logos, CTA
- Services, Programs, Products — full detail pages
- Case Studies with media gallery
- Blog / Insights with categories and tags
- Partners page with type filtering
- Careers with application form (CV upload)
- Contact, Proposal, Partner Inquiry, Training Application forms
- Legal pages (Impressum, Privacy Policy, Cookie Policy)
- Auto-generated sitemap at `/sitemap.xml`
- Cookie consent banner
- EN / DE language switcher with URL prefixes (`/en/`, `/de/`)
- Responsive, dark-first enterprise design (Palantir/Vercel aesthetic)

### Admin Panel (`/admin`)
- **Dashboard** — lead stats, recent activity, quick links
- **Content CRUD** — Services, Programs, Products, Case Studies, Pages (block builder)
- **Blog** — Posts, Categories, Tags, Authors
- **People** — Partners, Testimonials, Team Members
- **Careers** — Jobs, Applicant pipeline (New → Reviewed → Interview → Offer → Rejected)
- **CRM / Leads** — Unified inbox, status pipeline, assign to user, CSV export
- **Media Library** — upload, alt text, folder organisation
- **SEO Manager** — default meta, robots.txt editor, sitemap generator, redirect manager
- **Navigation Builder** — header/footer menus with EN/DE labels
- **Site Settings** — logo, contact info, social links, cookie banner text
- **Languages** — EN/DE management
- **Legal Pages** — rich text editor for legal content
- **Users & Roles** — RBAC with 5 roles and granular permissions
- **Audit Logs** — full change history via Spatie Activitylog

### Forms & Email
- 5 form types with full validation (FormRequest classes)
- Honeypot spam protection + rate limiting
- UTM / source URL tracking on all leads
- Queued email jobs: admin notification + user confirmation
- Branded HTML email templates with plain-text fallbacks

---

## Quick Start

```bash
git clone https://github.com/your-org/hopn-corporate.git && cd hopn-corporate
composer install
npm install && npm run build
cp .env.example .env && php artisan key:generate
# Edit .env with your DB and mail settings
php artisan migrate && php artisan db:seed
php artisan storage:link
php artisan queue:work
```

Admin login: `superadmin@hopn.eu` / `Admin@123`

See [INSTALL.md](INSTALL.md) for full step-by-step instructions.

---

## Documentation

| File | Contents |
|---|---|
| [INSTALL.md](INSTALL.md) | Step-by-step local and server installation |
| [DEPLOY.md](DEPLOY.md) | VPS (Ubuntu/Nginx) and shared hosting (cPanel) deployment |
| [ADMIN-GUIDE.md](ADMIN-GUIDE.md) | Non-technical admin panel user guide |
| [DATABASE.md](DATABASE.md) | Full schema reference with table descriptions and relationships |

---

## Project Structure

```
app/
  Http/Controllers/Admin/   — 26 admin controllers
  Http/Controllers/Public/  — 12 public controllers
  Http/Requests/            — 5 FormRequest validation classes
  Jobs/                     — SendAdminNotificationJob, SendUserConfirmationJob, SendCareerApplicationJob
  Mail/                     — 4 Mailable classes
  Models/                   — 28 Eloquent models
  Services/                 — LeadService, SettingsService, SitemapService
resources/
  views/
    layouts/                — admin.blade.php, public.blade.php
    components/             — nav, footer, hero, cards, forms, etc.
    public/                 — all public page views
    admin/                  — all admin panel views
    emails/                 — branded email templates (HTML + plain text)
  lang/en/ lang/de/         — UI translation strings
database/
  migrations/               — 27 migration files
  seeders/                  — 6 seeders including demo content
routes/
  web.php                   — public routes with EN/DE prefix
  admin.php                 — admin routes
config/
  hopn.php                  — custom configuration
```

---

## Default Roles

| Role | Access |
|---|---|
| Super Admin | Full access to everything |
| Admin | All content + users (no system settings) |
| Editor | Create and edit content, no publish |
| Publisher | Publish/unpublish content |
| Translator | Edit DE translations only |

---

## License

Proprietary — HOPn GmbH. All rights reserved.
" " 
