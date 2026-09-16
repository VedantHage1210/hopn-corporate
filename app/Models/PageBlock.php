<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PageBlock extends Model
{
    use HasFactory, SoftDeletes;

    // Supported block types and the fields each one's `content` JSON holds.
    const TYPES = [
        'text'  => ['body'],
        'hero'  => ['heading', 'subheading'],
        'image' => ['url', 'caption'],
        'cta'   => ['heading', 'button_label', 'button_url'],
        'quote' => ['quote', 'author'],
        'cards' => ['items'], // items: [{title, description}, ...]
    ];

    protected $fillable = [
        'page_id',
        'block_type',
        'title',
        'title_de',
        'title_ar',
        'content',
        'sort_order',
        'is_visible',
    ];

    protected $casts = [
        'content'    => 'array',
        'is_visible' => 'boolean',
    ];

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    /**
     * `content` is stored as { en: {...fields}, de: {...fields}, ar: {...fields} }
     * so every block type is multilingual without needing extra columns.
     * Falls back to English when a translation is missing.
     */
    public function contentFor(string $lang): array
    {
        $content = $this->content ?? [];
        return ($content[$lang] ?? null) ?: ($content['en'] ?? []);
    }

    public function titleFor(string $lang): ?string
    {
        if ($lang === 'de' && $this->title_de) return $this->title_de;
        if ($lang === 'ar' && $this->title_ar) return $this->title_ar;
        return $this->title;
    }
}
