<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'title_de', 'title_ar', 'slug',
        'type', 'date', 'location',
        'registration_url', 'max_attendees',
        'description', 'description_de', 'description_ar',
        'speaker_names', 'sponsor_names',
        'image_url', 'is_published',
        'registration_open', 'sort_order',
    ];

    protected $casts = [
        'date' => 'date',
        'is_published' => 'boolean',
        'registration_open' => 'boolean',
    ];

    protected static ?bool $slugColumn = null;

    /** True once the slug migration has run (keeps admin saves working during deploy). */
    public static function hasSlugColumn(): bool
    {
        return static::$slugColumn ??= Schema::hasColumn('events', 'slug');
    }

    protected static function booted(): void
    {
        static::saving(function (Event $event) {
            if (static::hasSlugColumn() && empty($event->slug)) {
                $event->slug = static::uniqueSlug($event->title, $event->id);
            }
        });
    }

    public static function uniqueSlug(?string $title, $ignoreId = null): string
    {
        $base = Str::slug((string) $title) ?: 'event';
        $slug = $base;
        $i = 2;
        while (static::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }

    /** Value used in public URLs: the slug, or the id until the migration has run. */
    public function getUrlKeyAttribute()
    {
        return (static::hasSlugColumn() && $this->slug) ? $this->slug : $this->id;
    }
}
