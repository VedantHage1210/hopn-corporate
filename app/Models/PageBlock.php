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
    /**
     * Content for one language. Every field that is empty in the requested language falls back to the
     * English value (field by field), so a block that was only filled in English still shows on the
     * German and Arabic pages instead of disappearing.
     */
    public function contentFor(string $lang): array
    {
        $content = $this->content ?? [];
        $en = is_array($content['en'] ?? null) ? $content['en'] : [];
        if ($lang === 'en') {
            return $en;
        }

        $own = is_array($content[$lang] ?? null) ? $content[$lang] : [];
        $merged = $en;
        foreach ($own as $key => $value) {
            if (is_array($value)) {
                // list of items (cards): usable when at least one item has a title
                $filled = collect($value)->contains(fn ($item) => is_array($item) && trim((string) ($item['title'] ?? '')) !== '');
            } else {
                $filled = trim((string) $value) !== '';
            }
            if ($filled) {
                $merged[$key] = $value;
            }
        }

        return $merged;
    }

    public function titleFor(string $lang): ?string
    {
        if ($lang === 'de' && $this->title_de) return $this->title_de;
        if ($lang === 'ar' && $this->title_ar) return $this->title_ar;
        return $this->title;
    }

    /**
     * Heading shown to visitors. The label of a new block ("New Text block") is only an admin label,
     * so it is never shown on the public page.
     */
    public function publicTitleFor(string $lang): ?string
    {
        $title = trim((string) $this->titleFor($lang));
        if ($title === '' || preg_match('/^New .+ block$/i', $title)) {
            return null;
        }
        return $title;
    }
}
