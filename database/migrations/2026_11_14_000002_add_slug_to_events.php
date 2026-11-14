<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasColumn('events', 'slug')) {
            Schema::table('events', function (Blueprint $table) {
                $table->string('slug', 191)->nullable()->after('title');
            });
        }

        // Give every existing event a unique, readable slug (kept stable afterwards).
        $used = DB::table('events')->whereNotNull('slug')->pluck('slug')->all();
        foreach (DB::table('events')->whereNull('slug')->orderBy('id')->get(['id', 'title']) as $event) {
            $base = Str::slug((string) $event->title) ?: 'event';
            $slug = $base;
            $i = 2;
            while (in_array($slug, $used, true)) {
                $slug = $base . '-' . $i++;
            }
            $used[] = $slug;
            DB::table('events')->where('id', $event->id)->update(['slug' => $slug]);
        }

        try {
            Schema::table('events', function (Blueprint $table) {
                $table->unique('slug');
            });
        } catch (\Throwable $e) {
            // index already exists (migration re-run) - nothing to do
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('events', 'slug')) {
            Schema::table('events', function (Blueprint $table) {
                try { $table->dropUnique(['slug']); } catch (\Throwable $e) {}
            });
            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('slug');
            });
        }
    }
};
