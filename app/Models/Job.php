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
        'title_ar',
        'slug',
        'department',
        'location',
        'employment_type',
        'type',
        'seniority',
        'summary',
        'summary_de',
        'summary_ar',
        'description',
        'description_de',
        'description_ar',
        'requirements',
        'requirements_de',
        'requirements_ar',
        'benefits',
        'benefits_de',
        'benefits_ar',
        'is_published',
        'is_active',
        'application_deadline',
        'published_at',
        'close_date',
    ];

    protected $casts = [
        'is_published'         => 'boolean',
        'is_active'            => 'boolean',
        'application_deadline' => 'date',
        'published_at'         => 'datetime',
        'close_date'           => 'date',
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
