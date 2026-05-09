<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Investor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'region',
        'focus',
        'website',
        'email',
        'description',
    ];
}
