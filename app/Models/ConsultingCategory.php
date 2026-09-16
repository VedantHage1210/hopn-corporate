<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultingCategory extends Model
{
    protected $fillable = [
        'name_en', 'name_de', 'name_ar', 'slug', 'description_en', 'description_de', 'description_ar',
        'icon', 'accent_color', 'sort_order', 'is_visible',
    ];

    protected $casts = ['is_visible' => 'boolean'];

    public function experts()
    {
        return $this->hasMany(Expert::class);
    }

    public function packages()
    {
        return $this->hasMany(ConsultingPackage::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }
}
