<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolutionBlock extends Model
{
    const TYPES = ['capability', 'usecase', 'industry', 'deliverable'];

    protected $fillable = [
        'solution_page_id', 'block_type', 'number',
        'title_en', 'title_de', 'title_ar',
        'description_en', 'description_de', 'description_ar',
        'bullets_en', 'bullets_de', 'bullets_ar',
        'sort_order', 'is_visible',
    ];

    protected $casts = [
        'bullets_en' => 'array',
        'bullets_de' => 'array',
        'bullets_ar' => 'array',
        'is_visible' => 'boolean',
    ];

    public function page()
    {
        return $this->belongsTo(SolutionPage::class, 'solution_page_id');
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function titleFor(string $lang): ?string
    {
        return ($this->{"title_{$lang}"} ?? null) ?: $this->title_en;
    }

    public function descriptionFor(string $lang): ?string
    {
        return ($this->{"description_{$lang}"} ?? null) ?: $this->description_en;
    }

    public function bulletsFor(string $lang): array
    {
        $bullets = $this->{"bullets_{$lang}"} ?? null;
        return $bullets ?: ($this->bullets_en ?? []);
    }
}
