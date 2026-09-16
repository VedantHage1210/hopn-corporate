<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabItem extends Model
{
    protected $fillable = [
        'type', 'title_en', 'title_de', 'title_ar',
        'description_en', 'description_de', 'description_ar',
        'tags_en', 'tags_de', 'tags_ar',
        'cta_label_en', 'cta_label_de', 'cta_label_ar', 'cta_url',
        'accent_color', 'sort_order', 'is_visible',
    ];

    protected $casts = [
        'tags_en'    => 'array',
        'tags_de'    => 'array',
        'tags_ar'    => 'array',
        'is_visible' => 'boolean',
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function scopeType($query, string $type)
    {
        return $query->where('type', $type);
    }
}
