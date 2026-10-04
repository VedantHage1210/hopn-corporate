<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademicPartner extends Model
{
    protected $fillable = [
        'name', 'logo_url', 'website_url', 'sort_order', 'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
