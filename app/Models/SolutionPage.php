<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolutionPage extends Model
{
    protected $guarded = ['id'];

    protected $casts = ['is_published' => 'boolean'];

    public function blocks()
    {
        return $this->hasMany(SolutionBlock::class)->orderBy('sort_order');
    }

    public function capabilities()
    {
        return $this->blocks()->where('block_type', 'capability');
    }

    public function useCases()
    {
        return $this->blocks()->where('block_type', 'usecase');
    }

    public function industries()
    {
        return $this->blocks()->where('block_type', 'industry');
    }

    public function deliverables()
    {
        return $this->blocks()->where('block_type', 'deliverable');
    }

    public function scopeVisible($query)
    {
        return $query->where('is_published', true);
    }

    public function t(string $field, string $lang): ?string
    {
        $value = $this->{"{$field}_{$lang}"} ?? null;
        return $value ?: $this->{"{$field}_en"};
    }
}
