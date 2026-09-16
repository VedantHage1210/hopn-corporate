<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultingPackage extends Model
{
    protected $fillable = [
        'consulting_category_id', 'name_en', 'name_de', 'name_ar', 'slug',
        'description_en', 'description_de', 'description_ar',
        'duration_minutes', 'price', 'currency',
        'price_on_request', 'inclusions_en', 'inclusions_de', 'inclusions_ar',
        'is_featured', 'is_visible', 'sort_order',
    ];

    protected $casts = [
        'inclusions_en'    => 'array',
        'inclusions_de'    => 'array',
        'inclusions_ar'    => 'array',
        'price_on_request' => 'boolean',
        'is_featured'      => 'boolean',
        'is_visible'       => 'boolean',
        'price'            => 'decimal:2',
    ];

    public function category()
    {
        return $this->belongsTo(ConsultingCategory::class, 'consulting_category_id');
    }

    public function bookings()
    {
        return $this->hasMany(ConsultingBooking::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
