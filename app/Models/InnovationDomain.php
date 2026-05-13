<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InnovationDomain extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'name_de', 'name_ar',
        'slug', 'icon',
        'description', 'description_de', 'description_ar',
        'use_cases', 'use_cases_de', 'use_cases_ar',
        'related_services',
        'is_published', 'sort_order',
    ];
}
