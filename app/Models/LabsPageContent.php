<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LabsPageContent extends Model
{
    protected $fillable = [
        'hero_eyebrow_en', 'hero_eyebrow_de', 'hero_eyebrow_ar',
        'hero_title_en', 'hero_title_de', 'hero_title_ar',
        'hero_subtitle_en', 'hero_subtitle_de', 'hero_subtitle_ar',
        'hero_tags_en', 'hero_tags_de', 'hero_tags_ar',
    ];

    protected $casts = [
        'hero_tags_en' => 'array',
        'hero_tags_de' => 'array',
        'hero_tags_ar' => 'array',
    ];

    public static function singleton(): self
    {
        return static::firstOrCreate(['id' => 1], [
            'hero_eyebrow_en' => 'HOPn Labs',
            'hero_title_en'   => 'Support for Emerging Projects',
            'hero_subtitle_en'=> 'Resources, mentorship, and a collaborative ecosystem to accelerate partner projects and internal initiatives.',
            'hero_tags_en'    => ['Mentorship', 'Partnerships', 'Acceleration'],
        ]);
    }
}
