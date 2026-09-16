<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertAvailability extends Model
{
    protected $fillable = ['expert_id', 'weekday', 'start_time', 'end_time', 'timezone', 'is_active'];

    protected $casts = ['is_active' => 'boolean'];

    const WEEKDAYS = [0 => 'Sunday', 1 => 'Monday', 2 => 'Tuesday', 3 => 'Wednesday', 4 => 'Thursday', 5 => 'Friday', 6 => 'Saturday'];

    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }
}
