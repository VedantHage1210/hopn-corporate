<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'service_category_id',
        'name',
        'name_de',
        'name_ar',
        'slug',
        'summary',
        'summary_de',
        'summary_ar',
        'body',
        'body_de',
        'body_ar',
        'highlights',
        'hero_image',
        'meta_title',
'meta_title_de',
'meta_title_ar',
'meta_description',
'meta_description_de',
'meta_description_ar',
        'is_active',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'highlights'   => 'array',
        'is_active'    => 'boolean',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
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
