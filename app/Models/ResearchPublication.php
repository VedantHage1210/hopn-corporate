<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResearchPublication extends Model
{
    protected $fillable = [
        'title_en', 'title_de', 'title_ar',
        'project',
        'authors',
        'image_url',
        'summary_en', 'summary_de', 'summary_ar',
        'published_on',
        'pdf_url',
        'external_url',
        'sort_order',
        'is_visible',
    ];

    protected $casts = [
        'is_visible'   => 'boolean',
        'published_on' => 'date',
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
