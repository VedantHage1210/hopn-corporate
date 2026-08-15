<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Startup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'name_de',
        'name_ar',
        'logo',
        'industry',
        'industry_de',
        'industry_ar',
        'stage',
        'website',
        'description',
        'description_de',
        'description_ar',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
}
