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
    'title', 'title_de', 'title_ar',
    'excerpt', 'excerpt_de', 'excerpt_ar',
    'content_en', 'content_de', 'content_ar',
    'featured_image',
    'seo_meta',
    'is_visible',
    'is_landing_page',
    'is_published',
    'published_at',
];
    protected $casts = [
        'seo_meta'     => 'array',
        'is_visible'   => 'boolean',
        'is_landing_page' => 'boolean',
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

    public function scopeLandingPages($query)
    {
        return $query->where('is_landing_page', true);
    }
}
