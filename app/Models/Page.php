<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use HasFactory, SoftDeletes;

    const STATUS_DRAFT     = 'draft';
    const STATUS_PUBLISHED = 'published';
    const STATUS_SCHEDULED = 'scheduled';

    protected $fillable = [
        'slug',
        'title', 'title_de', 'title_ar',
        'excerpt', 'excerpt_de', 'excerpt_ar',
        'content_en', 'content_de', 'content_ar',
        'featured_image',
        'seo_meta',
        'is_visible',
        'is_landing_page',
        'is_published',
        'status',
        'scheduled_at',
        'published_at',
    ];

    protected $casts = [
        'seo_meta'        => 'array',
        'is_visible'      => 'boolean',
        'is_landing_page' => 'boolean',
        'is_published'    => 'boolean',
        'scheduled_at'    => 'datetime',
        'published_at'    => 'datetime',
    ];

    public function blocks()
    {
        return $this->hasMany(PageBlock::class)->orderBy('sort_order');
    }

    public function versions()
    {
        return $this->morphMany(ContentVersion::class, 'versionable')->latest();
    }

    /**
     * Snapshot the current state (page fields + all blocks) into
     * content_versions. Called from the admin controller before every
     * update, and once on create, so there's always a restore point.
     */
    public function saveVersion(?string $editorName = null, ?string $note = null): ContentVersion
    {
        return $this->versions()->create([
            'editor_name' => $editorName,
            'note'        => $note,
            'data'        => [
                'page'   => $this->only([
                    'title', 'title_de', 'title_ar',
                    'excerpt', 'excerpt_de', 'excerpt_ar',
                    'content_en', 'content_de', 'content_ar',
                    'featured_image', 'seo_meta', 'is_visible',
                    'is_landing_page', 'status', 'scheduled_at',
                ]),
                'blocks' => $this->blocks()->get()->map->only([
                    'block_type', 'title', 'title_de', 'title_ar', 'content', 'sort_order', 'is_visible',
                ])->all(),
            ],
        ]);
    }

    /**
     * Restore the page (and replace its blocks) from a stored version.
     * Does NOT delete the version itself — restoring creates a fresh
     * "current state" that the next save will snapshot too, so history
     * is never lost.
     */
    public function restoreVersion(ContentVersion $version): void
    {
        $data = $version->data;

        $this->fill($data['page'] ?? []);
        $this->save();

        $this->blocks()->delete();
        foreach ($data['blocks'] ?? [] as $blockData) {
            $this->blocks()->create($blockData);
        }
    }

    public function scopePublished($query)
    {
        return $query->where(function ($q) {
            $q->where('status', self::STATUS_PUBLISHED)
              ->orWhere(function ($q2) {
                  $q2->where('status', self::STATUS_SCHEDULED)
                     ->whereNotNull('scheduled_at')
                     ->where('scheduled_at', '<=', now());
              })
              // Backward compatibility: rows saved by older code that only
              // ever set is_published=true and never touched `status`.
              ->orWhere(function ($q3) {
                  $q3->where('is_published', true)->where('status', self::STATUS_DRAFT);
              });
        });
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true);
    }

    public function scopeLandingPages($query)
    {
        return $query->where('is_landing_page', true);
    }

    public function isCurrentlyPublished(): bool
    {
        if ($this->status === self::STATUS_PUBLISHED) return true;
        if ($this->status === self::STATUS_SCHEDULED && $this->scheduled_at && $this->scheduled_at->isPast()) return true;
        if ($this->status === self::STATUS_DRAFT && $this->is_published) return true; // legacy rows
        return false;
    }
}
