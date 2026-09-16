<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Workshop extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'title_en', 'title_de', 'title_ar',
        'slug',
        'tagline_en', 'tagline_de', 'tagline_ar',
        'summary_en', 'summary_de', 'summary_ar',
        'description_en', 'description_de', 'description_ar',
        'format',
        'category',
        'duration_hours',
        'duration_label_en',
        'price',
        'currency',
        'price_on_request',
        'outcomes_en', 'outcomes_de', 'outcomes_ar',
        'agenda',
        'industry_ids',
        'service_ids',
        'hero_image_url',
        'instructor_name',
        'instructor_bio',
        'cta_label_en', 'cta_label_de', 'cta_label_ar',
        'seo_title',
        'seo_description',
        'is_published',
        'published_at',
        'sort_order',
    ];

    protected $casts = [
        'outcomes_en'      => 'array',
        'outcomes_de'      => 'array',
        'outcomes_ar'      => 'array',
        'agenda'           => 'array',
        'industry_ids'     => 'array',
        'service_ids'      => 'array',
        'price'            => 'decimal:2',
        'price_on_request' => 'boolean',
        'is_published'     => 'boolean',
        'published_at'     => 'datetime',
    ];

    public function bookings()
    {
        return $this->hasMany(WorkshopBooking::class);
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
