# HOPn Database Schema

## Overview

Database: MySQL 8.0+ · Character set: `utf8mb4_unicode_ci`

All content tables support **soft deletes** (`deleted_at`) unless noted. All tables have `created_at` and `updated_at` timestamps. Text fields ending in `_en` / `_de` store English and German translations respectively.

---

## Tables

### `users`
Admin panel users.

| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| name | varchar | |
| email | varchar unique | |
| password | varchar | bcrypt hashed |
| remember_token | varchar | |
| created_at / updated_at | timestamp | |

### `roles` / `permissions`
Managed by `spatie/laravel-permission`.

Roles: `superadmin`, `admin`, `editor`, `publisher`, `translator`

Permissions per module: `view`, `create`, `edit`, `delete`, `publish`

### `site_settings`
Key-value store for global configuration.

| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| key | varchar unique | e.g. `company_name`, `contact_email` |
| value | text | |

### `languages`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| code | varchar | `en`, `de` |
| name | varchar | `English`, `Deutsch` |
| is_default | boolean | |
| is_active | boolean | |

### `pages`
CMS pages with block-based content.

| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| title / title_de | varchar | |
| slug | varchar unique | |
| meta_title / meta_description | varchar | SEO |
| og_title / og_description / og_image | varchar | Open Graph |
| is_published | boolean | |
| deleted_at | timestamp | soft delete |

### `page_blocks`
Content blocks belonging to a page.

| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| page_id | FK → pages | cascade delete |
| block_type | varchar | hero, text, cards, cta, etc. |
| content | JSON | block-specific content EN |
| content_de | JSON | block-specific content DE |
| sort_order | integer | |
| is_visible | boolean | |

### `navigation_items`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| parent_id | FK → self | nullable, 1-level nesting |
| menu_location | varchar | `header`, `footer` |
| sort_order | integer | |
| label_en / label_de | varchar | |
| url | varchar | nullable |
| page_id | FK → pages | nullable |
| is_visible | boolean | |

### `service_categories`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| name / name_de | varchar | |
| slug | varchar unique | |

### `services`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| service_category_id | FK → service_categories | nullable |
| name / name_de | varchar | |
| slug | varchar unique | |
| summary / summary_de | text | |
| body / body_de | longtext | rich HTML |
| hero_image | varchar | storage path |
| meta_title / meta_description | varchar | |
| is_published / is_active | boolean | |
| deleted_at | timestamp | |

### `programs`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| title / title_de | varchar | |
| slug | varchar unique | |
| summary / summary_de | text | |
| audience / audience_de | text | |
| curriculum | JSON | modules array |
| duration | varchar | |
| outcomes / outcomes_de | text | |
| is_published | boolean | |
| deleted_at | timestamp | |

### `products`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| title / title_de | varchar | |
| slug | varchar unique | |
| summary / summary_de | text | |
| features | JSON | feature list |
| pricing_tiers | JSON | tier objects |
| hero_image | varchar | |
| is_published | boolean | |
| deleted_at | timestamp | |

### `case_studies`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| title / title_de | varchar | |
| slug | varchar unique | |
| client / industry | varchar | |
| challenge / challenge_de | text | |
| solution / solution_de | text | |
| outcomes / outcomes_de | text | |
| tech_stack | JSON | |
| cover_image | varchar | |
| is_published | boolean | |
| deleted_at | timestamp | |

### `case_study_media`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| case_study_id | FK → case_studies | cascade delete |
| path | varchar | storage path |
| type | varchar | `image`, `pdf` |
| sort_order | integer | |

### `blog_categories`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| name / name_de | varchar | |
| slug | varchar unique | |
| description / description_de | text | |
| is_active | boolean | |
| deleted_at | timestamp | |

### `blog_tags`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| name / name_de | varchar | |
| slug | varchar unique | |
| is_active | boolean | |

### `authors`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| name | varchar | |
| slug | varchar unique | |
| email | varchar | nullable |
| bio / bio_de | text | |
| avatar_path | varchar | storage path |
| linkedin_url / twitter_url / website_url | varchar | |
| is_active | boolean | |
| deleted_at | timestamp | |

### `blog_posts`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| blog_category_id | FK → blog_categories | |
| author_id | FK → authors | |
| title / title_de | varchar | |
| slug | varchar unique | |
| excerpt / excerpt_de | text | |
| body / body_de | longtext | rich HTML |
| cover_image | varchar | |
| published_at | timestamp | nullable — null = draft |
| meta_title / meta_description | varchar | |
| is_published | boolean | |
| deleted_at | timestamp | |

### `blog_post_tag`
Pivot table linking posts to tags.

| Column | Type |
|---|---|
| blog_post_id | FK → blog_posts |
| blog_tag_id | FK → blog_tags |

### `partners`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| name | varchar | |
| logo | varchar | storage path |
| type | enum | customer, tech_partner, academic, delivery |
| url | varchar | |
| description / description_de | text | |
| sort_order | integer | |
| is_visible | boolean | |
| deleted_at | timestamp | |

### `testimonials`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| quote / quote_de | text | |
| author_name / author_role / company | varchar | |
| avatar | varchar | storage path |
| sort_order | integer | |
| is_visible | boolean | |
| deleted_at | timestamp | |

### `team_members`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| name | varchar | |
| role / role_de | varchar | |
| bio / bio_de | text | |
| photo | varchar | storage path |
| linkedin_url | varchar | |
| sort_order | integer | |
| is_visible | boolean | |
| deleted_at | timestamp | |

### `jobs`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| title | varchar | |
| slug | varchar unique | |
| location | varchar | |
| type | varchar | full-time, part-time, freelance |
| department / seniority | varchar | |
| description / description_de | longtext | |
| requirements / requirements_de | text | |
| benefits / benefits_de | text | |
| published_at / close_date | timestamp | |
| is_active / is_published | boolean | |
| deleted_at | timestamp | |

### `job_applications`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| job_id | FK → jobs | cascade delete |
| full_name / email / phone | varchar | |
| cover_letter | text | |
| cv_path | varchar | storage path |
| status | varchar | new, reviewed, interview, offer, rejected |
| notes | text | internal HR notes |
| reviewed_at | timestamp | |

### `leads`
All public form submissions unified.

| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| type | varchar | contact, proposal, partner-inquiry, training-application |
| name / email / phone / company | varchar | |
| message | text | |
| source_url | varchar | page they submitted from |
| utm_source / utm_medium / utm_campaign | varchar | marketing tracking |
| status | varchar | new, contacted, qualified, in-progress, won, lost, spam |
| assigned_to | FK → users | nullable |
| notes | text | internal notes |
| deleted_at | timestamp | |

### `media_assets`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| disk | varchar | `public`, `s3` |
| path | varchar | |
| original_filename | varchar | |
| alt_en / alt_de | varchar | accessibility |
| mime_type | varchar | |
| size | bigint | bytes |
| folder | varchar | organisation |

### `redirects`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| from_url | varchar unique | |
| to_url | varchar | |
| http_status | smallint | 301 or 302 |
| is_active | boolean | |
| hits | bigint | track usage |

### `audit_logs`
Powered by `spatie/laravel-activitylog`.

| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| log_name | varchar | |
| description | varchar | action performed |
| subject_type / subject_id | morph | the changed record |
| causer_type / causer_id | morph | the user who acted |
| properties | JSON | old_values, new_values |
| created_at | timestamp | |

### `cookie_consents`
| Column | Type | Notes |
|---|---|---|
| id | bigint PK | |
| ip_address | varchar | |
| user_agent | text | |
| consent_given | boolean | |
| created_at | timestamp | |

---

## Key Relationships

```
users ──< leads (assigned_to)
users ──< audit_logs (causer)

service_categories ──< services
services >──< case_studies (pivot)

blog_categories ──< blog_posts
authors ──< blog_posts
blog_posts >──< blog_tags (blog_post_tag)

jobs ──< job_applications

pages ──< page_blocks
navigation_items ──< navigation_items (self parent_id)
```

---

## Indexes

Key indexes created in migrations:
- `services.slug` — unique
- `blog_posts.slug` — unique
- `blog_posts.published_at` — for ordering
- `leads.status` — for filtering
- `leads.type` — for filtering
- `redirects.from_url` — unique
- `audit_logs.subject_type, subject_id` — composite
- `audit_logs.causer_type, causer_id` — composite
