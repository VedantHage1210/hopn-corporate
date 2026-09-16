<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultingBooking extends Model
{
    protected $fillable = [
        'expert_id', 'consulting_package_id', 'name', 'email', 'phone', 'company',
        'preferred_date', 'preferred_time_slot', 'message', 'status',
        'source_url', 'utm_source', 'utm_medium', 'utm_campaign', 'notes',
    ];

    protected $casts = ['preferred_date' => 'date'];

    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }

    public function package()
    {
        return $this->belongsTo(ConsultingPackage::class, 'consulting_package_id');
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }
}
