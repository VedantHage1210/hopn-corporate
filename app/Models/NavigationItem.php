<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NavigationItem extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'parent_id',
        'menu_location',
        'sort_order',
        'label_en',
        'label_de',
        'url',
        'page_id',
        'visible_en',
        'visible_de',
    ];

    protected $casts = [
        'visible_en' => 'boolean',
        'visible_de' => 'boolean',
    ];
}
