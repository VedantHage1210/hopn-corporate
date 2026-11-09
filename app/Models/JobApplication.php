<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_id',
        'full_name',
        'email',
        'phone',
        'linkedin_url',
        'portfolio_url',
        'cover_letter',
        'cv_path',
        'status',
        'notes',
        'reviewed_at',
        'tracking_token',
        'is_general',
        'experience',
        'interest',
        'locale',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
        'is_general'  => 'boolean',
    ];

    /**
     * Downloadable CV link: Cloudinary URL as-is, or local public-disk file.
     */
    public function getCvUrlAttribute(): ?string
    {
        $path = $this->cv_path;
        if (!$path) {
            return null;
        }
        if (str_starts_with($path, 'http')) {
            return $path;
        }
        return route('admin.files.cv', ['path' => ltrim($path, '/')]);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
