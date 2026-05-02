<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'title_de',
        'slug',
        'department',
        'location',
        'employment_type',
        'summary',
        'summary_de',
        'description',
        'description_de',
        'is_published',
        'is_active',
        'application_deadline',
        'published_at',
        'requirements',
        'requirements_de',
        'benefits',
        'benefits_de',
        'seniority',
        'type',
        'close_date',
    ];

    protected $casts = [
        'is_published' => 'boolean',
        'is_active' => 'boolean',
        'application_deadline' => 'date',
        'published_at' => 'datetime',
    ];

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
