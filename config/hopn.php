<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Display Name
    |--------------------------------------------------------------------------
    */
    'name' => env('APP_NAME', 'HOPn'),

    /*
    |--------------------------------------------------------------------------
    | Admin Email
    |--------------------------------------------------------------------------
    */
    'admin_email' => env('ADMIN_EMAIL', 'admin@hopn.eu'),

    /*
    |--------------------------------------------------------------------------
    | Site Settings Cache Key
    |--------------------------------------------------------------------------
    */
    'settings_cache_key' => 'hopn_site_settings',
    'settings_cache_ttl'  => 3600, // seconds

    /*
    |--------------------------------------------------------------------------
    | Pagination Defaults
    |--------------------------------------------------------------------------
    */
    'pagination' => [
        'default'   => 15,
        'blog'      => 12,
        'leads'     => 20,
        'media'     => 24,
    ],

    /*
    |--------------------------------------------------------------------------
    | File Upload Limits
    |--------------------------------------------------------------------------
    */
    'uploads' => [
        'max_image_size'    => 5120,   // KB
        'max_document_size' => 10240,  // KB
        'max_video_size'    => 51200,  // KB
        'allowed_images'    => ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'],
        'allowed_documents' => ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx'],
        'allowed_cv'        => ['pdf', 'doc', 'docx'],
        'disk'              => env('FILESYSTEM_DISK', 'public'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Supported Locales
    |--------------------------------------------------------------------------
    */
    'locales' => ['en', 'de', 'ar'],
    'default_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Lead Status Options
    |--------------------------------------------------------------------------
    */
    'lead_statuses' => [
        'new'         => 'New',
        'contacted'   => 'Contacted',
        'qualified'   => 'Qualified',
        'in-progress' => 'In Progress',
        'won'         => 'Won',
        'lost'        => 'Lost',
        'spam'        => 'Spam',
    ],

    /*
    |--------------------------------------------------------------------------
    | Partner Types
    |--------------------------------------------------------------------------
    */
    'partner_types' => [
        'customer'    => 'Customer',
        'tech_partner'=> 'Technology Partner',
        'academic'    => 'Academic',
        'delivery'    => 'Delivery Partner',
    ],

    /*
    |--------------------------------------------------------------------------
    | Job Types
    |--------------------------------------------------------------------------
    */
    'job_types' => [
        'full-time'  => 'Full-Time',
        'part-time'  => 'Part-Time',
        'freelance'  => 'Freelance',
        'internship' => 'Internship',
    ],

    /*
    |--------------------------------------------------------------------------
    | Application Status Options
    |--------------------------------------------------------------------------
    */
    'application_statuses' => [
        'new'       => 'New',
        'reviewed'  => 'Reviewed',
        'interview' => 'Interview',
        'offer'     => 'Offer',
        'rejected'  => 'Rejected',
    ],


    /*
    |--------------------------------------------------------------------------
    | Privacy-friendly analytics (Plausible, EU-hosted or self-hosted)
    |--------------------------------------------------------------------------
    | Off until PLAUSIBLE_DOMAIN is set. The script is only loaded after the
    | visitor accepts analytics cookies in the consent banner.
    */
    'analytics' => [
        'plausible_domain' => env('PLAUSIBLE_DOMAIN'),
        'plausible_script' => env('PLAUSIBLE_SCRIPT', 'https://plausible.io/js/script.js'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Cloudflare Turnstile (spam protection for public forms)
    |--------------------------------------------------------------------------
    | Off until both keys are set. The honeypot and rate limits stay active.
    */
    'turnstile' => [
        'site_key'   => env('TURNSTILE_SITE_KEY'),
        'secret_key' => env('TURNSTILE_SECRET_KEY'),
    ],


    /*
    |--------------------------------------------------------------------------
    | Secondary page sections
    |--------------------------------------------------------------------------
    | The homepage and About page follow the founder's brief (homepage: hero, partners, what we build,
    | how we work, case studies, events, team, contact). Older sections that carry claims the founder
    | has not confirmed yet are kept in the templates but hidden. Set HOPN_SECONDARY_SECTIONS=true
    | to show them again.
    */
    'secondary_sections' => (bool) env('HOPN_SECONDARY_SECTIONS', false),

];
