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
        'status',
        'summary_en', 'summary_de', 'summary_ar',
        'problem_en', 'problem_de', 'problem_ar',
        'solution_en', 'solution_de', 'solution_ar',
        'features_en', 'features_de', 'features_ar',
        'use_cases_en', 'use_cases_de', 'use_cases_ar',
        'hero_image_url',
        'target_audience',
        'industry_ids',
        'service_ids',
        'features',
        'pricing_tiers',
        'screenshots',
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

    /** Valid status keys, in order from earliest to most mature. */
    public static function statusOptions(): array
    {
        return ['concept', 'pilot', 'live'];
    }

    /** Label for the status badge, in the given language. Falls back to 'concept' for any unrecognised/legacy value. */
    public function statusLabel(string $lang = 'en'): string
    {
        $labels = [
            'concept' => ['en' => 'Concept', 'de' => 'Konzept', 'ar' => 'مفهوم'],
            'pilot'   => ['en' => 'Pilot', 'de' => 'Pilotprojekt', 'ar' => 'تجريبي'],
            'live'    => ['en' => 'Live', 'de' => 'Live', 'ar' => 'مباشر'],
        ];

        $status = in_array($this->status, self::statusOptions(), true) ? $this->status : 'concept';

        return $labels[$status][$lang] ?? $labels[$status]['en'];
    }

    /** Hex color for the status badge — amber (concept) to green (live), never implying more maturity than is set. */
    public function statusColor(): string
    {
        return match ($this->status) {
            'live'  => '#10B981',
            'pilot' => '#F59E0B',
            default => '#64748B', // concept / unknown
        };
    }
}