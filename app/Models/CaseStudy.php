<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Industry;
use App\Models\Service;

class CaseStudy extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'title_en', 'title_de', 'title_ar',
        'client_name_en', 'client_name_de', 'client_name_ar',
        'slug', 'industry',
        'challenge_en', 'challenge_de', 'challenge_ar',
        'solution_en', 'solution_de', 'solution_ar',
        'outcomes_en', 'outcomes_de', 'outcomes_ar',
        'tech_stack',
        'image_url',
        'pdf_url',
        'is_published',
        'published_at',
        'industry_ids',
        'service_ids',
    ];

    protected $casts = [
        'tech_stack'   => 'array',
        'industry_ids' => 'array',
        'service_ids'  => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    /**
     * Dynamic Industries Attribute
     * Access using $caseStudy->industries
     */
    public function getIndustriesAttribute()
    {
        return Industry::whereIn('id', $this->industry_ids ?? [])->get();
    }

    /**
     * Dynamic Services Attribute
     * Access using $caseStudy->services
     */
    public function getServicesAttribute()
    {
        return Service::whereIn('id', $this->service_ids ?? [])->get();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
