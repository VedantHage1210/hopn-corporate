<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        DB::table('site_settings')->update([
            'stats_hero_visible' => false,
            'stats_home_top_visible' => false,
            'stats_home_bottom_visible' => false,
            'stats_about_visible' => false,
            'stats_startups_visible' => false,
            'stats_case_studies_visible' => false,
        ]);
    }

    public function down(): void
    {
        // Visibility is intentionally not restored automatically.
    }
};