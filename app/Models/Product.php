<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'title_en', 'title_de', 'title_ar',
        'tagline_en', 'tagline_de', 'tagline_ar',
        'slug',
        'summary_en', 'summary_de', 'summary_ar',
        'problem_en', 'problem_de', 'problem_ar',
        'solution_en', 'solution_de', 'solution_ar',
        'features_en', 'features_de', 'features_ar',
        'use_cases_en', 'use_cases_de', 'use_cases_ar',
        'cta_label_en', 'cta_label_de', 'cta_label_ar',
        'cta_url',
        'hero_image_url',
        'target_audience',
        'industry_ids',
        'service_ids',
        'features',
        'pricing_tiers',
        'screenshots',
        'cta_type',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'features'      => 'array',
        'pricing_tiers' => 'array',
        'screenshots'   => 'array',
        'industry_ids'  => 'array',
        'service_ids'   => 'array',
        'is_published'  => 'boolean',
        'published_at'  => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
