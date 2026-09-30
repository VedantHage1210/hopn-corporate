<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Every "stat strip" on the public site (hero, homepage top/bottom,
     * about, startups, case studies) previously showed hardcoded, unverified
     * numbers (50+ clients, 12+ countries, €500M+ capital, etc.). Per the
     * founder's brief: "nothing that cannot be verified" and stats must be
     * "editable from the admin panel, and default to hidden." This adds one
     * visibility toggle per stat strip, all off by default, so nothing
     * unverified shows until the founder supplies real numbers and turns
     * each one on from Admin > Settings.
     */
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->boolean('stats_hero_visible')->default(false)->after('maintenance_mode');
            $table->boolean('stats_home_top_visible')->default(false)->after('stats_hero_visible');
            $table->boolean('stats_home_bottom_visible')->default(false)->after('stats_home_top_visible');
            $table->boolean('stats_about_visible')->default(false)->after('stats_home_bottom_visible');
            $table->boolean('stats_startups_visible')->default(false)->after('stats_about_visible');
            $table->boolean('stats_case_studies_visible')->default(false)->after('stats_startups_visible');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'stats_hero_visible',
                'stats_home_top_visible',
                'stats_home_bottom_visible',
                'stats_about_visible',
                'stats_startups_visible',
                'stats_case_studies_visible',
            ]);
        });
    }
};