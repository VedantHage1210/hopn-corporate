<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'author_id',
        'blog_category_id',
        'title',
        'title_de',
        'title_ar',
        'slug',
        'excerpt',
        'excerpt_de',
        'excerpt_ar',
        'content',
        'content_de',
        'content_ar',
        'featured_image_path',
        'meta_title',
        'meta_title_de',
        'meta_title_ar',
        'meta_description',
        'meta_description_de',
        'meta_description_ar',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function category()
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id');
    }

    public function tags()
    {
        return $this->belongsToMany(BlogTag::class, 'blog_post_tag');
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
