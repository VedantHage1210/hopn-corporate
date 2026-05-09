<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Startup extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'industry',
        'stage',
        'website',
        'description',
    ];
}
