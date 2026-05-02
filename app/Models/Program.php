<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory, SoftDeletes, LogsActivity;

    protected $fillable = [
        'title_en',
        'title_de',
        'slug',
        'summary_en',
        'summary_de',
        'audience_en',
        'audience_de',
        'duration_weeks',
        'outcomes',
        'pricing_tiers',
        'cta_label_en',
        'cta_label_de',
        'cta_url',
        'is_published',
        'published_at',
    ];

    protected $casts = [
        'outcomes' => 'array',
        'pricing_tiers' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function modules()
    {
        return $this->hasMany(ProgramModule::class)->orderBy('sort_order');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
