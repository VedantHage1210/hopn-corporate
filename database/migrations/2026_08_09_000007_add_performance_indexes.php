<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Adds indexes on columns that are queried on nearly every public-page
     * request (slug lookups for {lang}/{slug} routes, and the is_published /
     * is_active / is_visible flags used to filter every public listing
     * query). None of these existed before, meaning every public page load
     * was doing a full table scan on these tables once real content volume
     * grows. Safe to run on any existing data - purely additive.
     */
    public function up(): void
    {
        $this->addIfMissing('services', ['slug', 'is_published', 'is_active']);
        $this->addIfMissing('service_categories', ['slug', 'is_active']);
        $this->addIfMissing('programs', ['slug', 'is_published']);
        $this->addIfMissing('products', ['slug', 'is_published']);
        $this->addIfMissing('case_studies', ['slug', 'is_published']);
        $this->addIfMissing('blog_posts', ['slug', 'is_published', 'published_at']);
        $this->addIfMissing('blog_categories', ['slug', 'is_active']);
        $this->addIfMissing('blog_tags', ['slug']);
        $this->addIfMissing('jobs', ['slug', 'is_active', 'is_published']);
        $this->addIfMissing('startups', ['is_visible']);
        $this->addIfMissing('investors', ['is_visible']);
        $this->addIfMissing('events', ['slug', 'is_published']);
        $this->addIfMissing('partners', ['visible']);
        $this->addIfMissing('industries', ['slug', 'is_published']);
        $this->addIfMissing('innovation_domains', ['slug', 'is_published']);
        $this->addIfMissing('pages', ['slug', 'is_published', 'is_visible']);
        $this->addIfMissing('team_members', ['visible']);
        $this->addIfMissing('testimonials', ['visible']);
        $this->addIfMissing('leads', ['status', 'type', 'created_at']);
        $this->addIfMissing('redirects', ['is_active']);
    }

    public function down(): void
    {
        // Index removal is intentionally left out of down() - dropping indexes
        // by inferred name is fragile across MySQL versions/naming, and there
        // is no data-loss risk in leaving these indexes in place.
    }

    private function addIfMissing(string $table, array $columns): void
    {
        if (!Schema::hasTable($table)) {
            return;
        }
        foreach ($columns as $column) {
            if (!Schema::hasColumn($table, $column)) {
                continue;
            }
            $indexName = $table . '_' . $column . '_index';
            $exists = collect(DB::select("SHOW INDEX FROM `{$table}` WHERE Key_name = ?", [$indexName]))->isNotEmpty();
            if (!$exists) {
                Schema::table($table, function (Blueprint $t) use ($column) {
                    $t->index($column);
                });
            }
        }
    }
};
