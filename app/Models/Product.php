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
        'title_en',
        'title_de',
        'slug',
        'summary_en',
        'summary_de',
        'problem_en',
        'problem_de',
        'solution_en',
        'solution_de',
        'features',
        'pricing_tiers',
        'screenshots',
        'cta_type',
        'cta_url',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'features' => 'array',
        'pricing_tiers' => 'array',
        'screenshots' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
