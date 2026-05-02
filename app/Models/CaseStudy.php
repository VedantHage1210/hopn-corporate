<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaseStudy extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'title_en',
        'title_de',
        'slug',
        'industry',
        'client_name',
        'challenge_en',
        'challenge_de',
        'solution_en',
        'solution_de',
        'outcomes_en',
        'outcomes_de',
        'tech_stack',
        'pdf_path',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'tech_stack' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
