<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'title',
        'title_de',
        'excerpt',
        'excerpt_de',
        'seo_meta',
        'is_visible',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'seo_meta' => 'array',
        'is_visible' => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function blocks()
    {
        return $this->hasMany(PageBlock::class)->orderBy('sort_order');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
