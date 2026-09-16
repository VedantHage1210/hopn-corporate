<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabStep extends Model
{
    protected $fillable = [
        'step_number', 'title_en', 'title_de', 'title_ar',
        'description_en', 'description_de', 'description_ar',
        'sort_order', 'is_visible',
    ];

    protected $casts = ['is_visible' => 'boolean'];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
