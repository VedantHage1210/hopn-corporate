# HOPn Admin Panel — User Guide

**For non-technical staff. No coding required.**

---

## Logging In

1. Go to `https://www.hopn.eu/admin`
2. Enter your email and password
3. Click **Sign In**

> If you forget your password, contact your system administrator.

---

## Dashboard

The dashboard shows you at a glance:
- **New Leads Today** — form submissions received today
- **Draft Posts** — blog posts not yet published
- **Active Jobs** — open job listings
- **Quick Links** — shortcuts to the most-used modules

---

## Managing Services

**Path:** Admin → Services

Services are the core offerings shown on the `/services` page.

**To create a service:**
1. Click **Create**
2. Fill in: Name (EN), Name (DE), Slug (auto-generated), Summary, Body content
3. Toggle **Published** to make it live
4. Click **Save**

**To edit:** Click **Edit** next to any service in the list.
**To delete:** Click **Delete** — this is permanent.

---

## Managing Blog Posts (Insights)

**Path:** Admin → Blog → Posts

**To write a new post:**
1. Click **Create**
2. Fill in: Title (EN + DE), Slug, Excerpt, Body (rich text editor)
3. Assign an **Author** and **Category**
4. Add **Tags** (comma-separated or multi-select)
5. Upload a **Cover Image**
6. Set **Publish Date** — leave blank to save as draft
7. Fill in SEO fields (Meta Title, Description)
8. Click **Save**

**Scheduling:** Set a future publish date and the post goes live automatically.

**Categories:** Admin → Blog → Categories — create and manage post categories.

**Tags:** Admin → Blog → Tags — create and manage post tags.

**Authors:** Admin → Blog → Authors — manage author profiles (name, bio, photo, social links).

---

## Managing Leads / Inquiries

**Path:** Admin → CRM → Leads

All contact form, proposal, partner, and training submissions land here.

**Columns:** Name, Email, Company, Form Type, Status, Date

**To process a lead:**
1. Click **View** on any lead
2. Read the full message and tracking data (UTM source, URL they came from)
3. Update **Status**: New → Contacted → Qualified → In Progress → Won / Lost
4. **Assign** the lead to a team member
5. Add internal **Notes** (not visible to the contact)
6. Click **Save Changes**

**Export:** Click **↓ Export CSV** to download all leads (with current filters applied) as a spreadsheet.

---

## Managing Job Listings

**Path:** Admin → Careers → Jobs

**To post a new job:**
1. Click **Create**
2. Fill in: Title, Location, Type (Full-Time/Part-Time/Freelance), Department
3. Write Description (EN + DE), Requirements, Benefits
4. Set **Active** toggle to make it visible on the website
5. Optionally set a **Close Date**
6. Click **Save**

---

## Reviewing Job Applications

**Path:** Admin → Careers → Applicants

**To review an application:**
1. Click **Review** on any applicant
2. Read their details and cover letter
3. Click **Download CV** to view their CV file
4. Update **Status**: New → Reviewed → Interview → Offer → Rejected
5. Add internal **Notes** for your team
6. Click **Save Changes**

---

## Managing Partners / Logos

**Path:** Admin → People → Partners

**To add a partner logo:**
1. Click **Create**
2. Enter Partner Name, select **Type** (Customer / Tech Partner / Academic / Delivery)
3. Upload their **Logo** (PNG or SVG recommended)
4. Enter their website URL
5. Toggle **Visible** on/off
6. Set **Sort Order** (lower numbers appear first)
7. Click **Save**

---

## Managing Testimonials

**Path:** Admin → People → Testimonials

Add quotes from clients/partners displayed on the website.

1. Click **Create**
2. Enter Quote (EN + DE), Author Name, Role, Company
3. Upload an **Avatar** photo (optional)
4. Toggle **Visible**
5. Set **Sort Order**
6. Click **Save**

---

## Managing Team Members

**Path:** Admin → People → Team

1. Click **Create**
2. Enter Name, Role (EN + DE), Bio (EN + DE)
3. Upload **Photo**
4. Enter LinkedIn URL (optional)
5. Set **Sort Order** and **Visible** toggle
6. Click **Save**

---

## Site Settings

**Path:** Admin → System → Settings

Manage global site configuration:
- **Company Name / Tagline**
- **Contact Email / Phone**
- **Social Media Links** (LinkedIn, Twitter, etc.)
- **Logo** and **Favicon** upload
- **Default SEO** title and description (used when page-specific SEO is not set)
- **Cookie Banner Text** (EN + DE)

Click **Save** after any changes.

---

## SEO Manager

**Path:** Admin → System → SEO

**Default SEO Settings:**
- Set the fallback meta title and description used on pages without their own SEO settings
- Edit **robots.txt** content to control what search engines can index

**Sitemap:**
- Click **Generate Sitemap Now** to refresh `/sitemap.xml`
- Do this after publishing new content

**Redirects:**
- Add URL redirects (e.g. old URL → new URL)
- Choose 301 (permanent) or 302 (temporary)
- Use this when you rename pages/posts to avoid broken links

---

## Navigation Builder

**Path:** Admin → System → Navigation

Manage the header and footer menus.

1. Click **Create** to add a menu item
2. Enter Label (EN + DE)
3. Choose: link to a URL or to an existing Page
4. Set **Menu Location** (header / footer)
5. Set **Sort Order**
6. Click **Save**

---

## Media Library

**Path:** Admin → System → Media

Upload and manage images, PDFs, and videos.

- **Upload:** drag-and-drop or click to browse
- **Alt Text:** fill in EN + DE alt text for accessibility and SEO
- **Folders:** organise files into folders
- **Replace:** upload a new file to replace an existing one without breaking links

---

## Legal Pages

**Path:** Admin → System → Legal

Edit the Impressum, Privacy Policy, and Cookie Policy pages.

- Each page has EN and DE versions
- Uses the rich text editor — format text using the toolbar
- Click **Save** when done

---

## Languages

**Path:** Admin → System → Languages

- View supported languages (EN, DE)
- Set the default language
- See translation completion status per content type

---

## Audit Logs

**Path:** Admin → System → Audit Logs

A complete history of all changes made in the admin panel:
- **Who** made the change (user name)
- **What** they changed (module + record)
- **When** (date and time)
- **What changed** (old vs new values)

Use this to track edits and roll back if needed (changes must be manually reversed in the relevant module).

---

## Tips & Best Practices

- **Always fill in both EN and DE fields** for content — the site falls back to EN if DE is missing, but bilingual content improves user experience.
- **Use descriptive slugs** — keep them short, lowercase, and hyphenated (e.g. `digital-transformation-consulting`).
- **Optimise images** before uploading — aim for under 500 KB for photos, use WebP where possible.
- **Write unique meta descriptions** for every page — 120–160 characters works best for search engines.
- **Regenerate the sitemap** after publishing new services, blog posts, or pages.
- **Export leads weekly** to keep a backup in your CRM or spreadsheet.
