<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlatformApp extends Model
{
    protected $fillable = [
        'name_en', 'name_de', 'name_ar', 'slug',
        'tagline_en', 'tagline_de', 'tagline_ar',
        'description_en', 'description_de', 'description_ar',
        'logo_url', 'external_url', 'cta_label_en', 'cta_label_de', 'cta_label_ar',
        'is_visible', 'sort_order',
    ];

    protected $casts = ['is_visible' => 'boolean'];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
