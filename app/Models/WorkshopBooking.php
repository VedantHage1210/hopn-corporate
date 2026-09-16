<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class WorkshopBooking extends Model
{
    use HasFactory, LogsActivity;

    protected $fillable = [
        'workshop_id',
        'name',
        'email',
        'phone',
        'company',
        'participants',
        'preferred_format',
        'preferred_date',
        'message',
        'status',
        'source_url',
        'utm_source',
        'utm_medium',
        'utm_campaign',
        'notes',
    ];

    protected $casts = [
        'preferred_date' => 'date',
    ];

    public function workshop()
    {
        return $this->belongsTo(Workshop::class);
    }

    public function scopeNew($query)
    {
        return $query->where('status', 'new');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logAll();
    }
}
