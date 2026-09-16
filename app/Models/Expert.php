<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'consulting_category_id',
        'name',
        'initials',
        'specialization_en',
        'specialization_de',
        'specialization_ar',
        'hourly_rate',
        'tags',
        'bio_en',
        'bio_de',
        'bio_ar',
        'photo_url',
        'linkedin_url',
        'accent_color',
        'sort_order',
        'is_visible',
    ];

    protected $casts = [
        'tags'       => 'array',
        'is_visible' => 'boolean',
    ];

    public function getInitialsAttribute($value): string
    {
        if ($value) return $value;
        $words = explode(' ', $this->name);
        return strtoupper(substr($words[0], 0, 1) . (isset($words[1]) ? substr($words[1], 0, 1) : ''));
    }

    public function category()
    {
        return $this->belongsTo(ConsultingCategory::class, 'consulting_category_id');
    }

    public function availabilities()
    {
        return $this->hasMany(ExpertAvailability::class);
    }

    public function bookings()
    {
        return $this->hasMany(ConsultingBooking::class);
    }
}
