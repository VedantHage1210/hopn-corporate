<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NavigationItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'menu_location',
        'dropdown_group',
        'sort_order',
        'label_en', 'label_de', 'label_ar',
        'url',
        'page_id',
        'visible_en', 'visible_de', 'visible_ar',
    ];

    protected $casts = [
        'visible_en' => 'boolean',
        'visible_de' => 'boolean',
        'visible_ar' => 'boolean',
    ];

    public function parent()
    {
        return $this->belongsTo(NavigationItem::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(NavigationItem::class, 'parent_id')->orderBy('sort_order');
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

    /**
     * Locale-correct href for this item — resolves through the linked Page
     * (if any) so the same item works across EN/DE/AR, otherwise falls
     * back to the raw `url` field as before.
     */
    public function hrefFor(string $lang): string
    {
        if ($this->page_id && $this->page) {
            return route('pages.show', ['lang' => $lang, 'slug' => $this->page->slug]);
        }
        return $this->url ?? '#';
    }
}
