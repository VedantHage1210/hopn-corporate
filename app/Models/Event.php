<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'title_de', 'title_ar',
        'type', 'date', 'location',
        'registration_url', 'max_attendees',
        'description', 'description_de', 'description_ar',
        'speaker_names', 'sponsor_names',
        'image_url', 'is_published',
        'registration_open', 'sort_order',
    ];

    protected $casts = [
        'date' => 'date',
        'is_published' => 'boolean',
        'registration_open' => 'boolean',
    ];
}
