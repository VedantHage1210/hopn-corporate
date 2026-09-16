<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContentVersion extends Model
{
    protected $fillable = [
        'versionable_type', 'versionable_id', 'data', 'editor_name', 'note',
    ];

    protected $casts = [
        'data' => 'array',
    ];

    public function versionable()
    {
        return $this->morphTo();
    }
}
