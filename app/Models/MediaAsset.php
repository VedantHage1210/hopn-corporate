<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MediaAsset extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'disk',
        'path',
        'file_name',
        'mime_type',
        'size',
        'alt_text',
        'alt_text_de',
        'title',
        'title_de',
        'meta',
        'attachable_type',
        'attachable_id',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function attachable()
    {
        return $this->morphTo();
    }
}
