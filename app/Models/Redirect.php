<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Redirect extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_url',
        'to_url',
        'status_code',  // alias; migration has http_status
        'http_status',
        'is_active',
        'hits',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Accessor so SeoController can use ->status_code
    public function getStatusCodeAttribute(): int
    {
        return (int) ($this->attributes['http_status'] ?? 301);
    }

    public function setStatusCodeAttribute(int $value): void
    {
        $this->attributes['http_status'] = $value;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
