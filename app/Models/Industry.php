<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Industry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'name_de', 'name_ar',
        'slug', 'icon',
        'description', 'description_de', 'description_ar',
        'challenges', 'challenges_de', 'challenges_ar',
        'solutions', 'solutions_de', 'solutions_ar',
        'use_cases', 'use_cases_de', 'use_cases_ar',
        'is_published', 'sort_order',
    ];
}
