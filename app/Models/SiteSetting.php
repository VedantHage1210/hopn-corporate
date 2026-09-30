<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

 protected $fillable = [
    'site_name', 'site_name_de', 'site_name_ar',
    'site_tagline', 'site_tagline_de', 'site_tagline_ar',
    'default_locale', 'timezone',
    'contact_email', 'contact_phone',
    'office_address', 'office_address_de', 'office_address_ar',
    'social_links', 'seo_defaults',
    'seo_default_title', 'seo_default_title_de', 'seo_default_title_ar',
    'seo_default_description', 'seo_default_description_de', 'seo_default_description_ar',
    'seo_og_image', 'robots_txt',
    'maintenance_mode',
    'stats_hero_visible',
    'stats_home_top_visible',
    'stats_home_bottom_visible',
    'stats_about_visible',
    'stats_startups_visible',
    'stats_case_studies_visible',
];

    protected $casts = [
        'social_links' => 'array',
        'seo_defaults' => 'array',
        'maintenance_mode' => 'boolean',
        'stats_hero_visible' => 'boolean',
        'stats_home_top_visible' => 'boolean',
        'stats_home_bottom_visible' => 'boolean',
        'stats_about_visible' => 'boolean',
        'stats_startups_visible' => 'boolean',
        'stats_case_studies_visible' => 'boolean',
    ];
}