<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Draft / Published / Scheduled workflow — additive, keeps the
        // existing `is_published` boolean working exactly as before for
        // any code that still reads it directly.
        // Wrapped in hasColumn checks so this migration is safe to run
        // even if a prior attempt partially applied it.
        if (!Schema::hasColumn('pages', 'status')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->string('status')->default('draft')->after('is_published'); // draft | published | scheduled
            });
        }
        if (!Schema::hasColumn('pages', 'scheduled_at')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->timestamp('scheduled_at')->nullable()->after('status');
            });
        }

        // Backfill: existing published pages become status=published,
        // everything else stays draft. Non-destructive, safe to re-run.
        \DB::table('pages')->where('is_published', true)->where('status', 'draft')->update(['status' => 'published']);

        // Version history — polymorphic so it can be reused for other
        // versionable content later without a new table each time.
        if (!Schema::hasTable('content_versions')) {
            Schema::create('content_versions', function (Blueprint $table) {
                $table->id();
                $table->string('versionable_type');
                $table->unsignedBigInteger('versionable_id');
                $table->json('data');
                $table->string('editor_name')->nullable();
                $table->string('note')->nullable();
                $table->timestamps();
                $table->index(['versionable_type', 'versionable_id']);
            });
        }

        // Page blocks were missing German content fields and any Arabic
        // fields at all — content itself is restructured to hold all three
        // languages as sub-keys (see PageBlock model), so no per-language
        // columns are needed for it, but title needs the missing ar column.
        if (!Schema::hasColumn('page_blocks', 'title_ar')) {
            Schema::table('page_blocks', function (Blueprint $table) {
                $table->string('title_ar')->nullable()->after('title_de');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('page_blocks', 'title_ar')) {
            Schema::table('page_blocks', function (Blueprint $table) {
                $table->dropColumn('title_ar');
            });
        }
        Schema::dropIfExists('content_versions');
        Schema::table('pages', function (Blueprint $table) {
            if (Schema::hasColumn('pages', 'status')) $table->dropColumn('status');
            if (Schema::hasColumn('pages', 'scheduled_at')) $table->dropColumn('scheduled_at');
        });
    }
};
