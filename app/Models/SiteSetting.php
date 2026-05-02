<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_name_de',
        'site_tagline',
        'site_tagline_de',
        'default_locale',
        'timezone',
        'contact_email',
        'contact_phone',
        'office_address',
        'office_address_de',
        'social_links',
        'seo_defaults',
        'maintenance_mode',
    ];

    protected $casts = [
        'social_links' => 'array',
        'seo_defaults' => 'array',
        'maintenance_mode' => 'boolean',
    ];
}
