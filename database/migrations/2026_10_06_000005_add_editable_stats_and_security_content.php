<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            foreach (['stat_organizations', 'stat_countries', 'stat_universities', 'stat_innovation_capital'] as $column) {
                if (!Schema::hasColumn('site_settings', $column)) {
                    $table->string($column)->nullable();
                }
            }
            if (!Schema::hasColumn('site_settings', 'security_content')) {
                $table->json('security_content')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            foreach (['stat_organizations', 'stat_countries', 'stat_universities', 'stat_innovation_capital', 'security_content'] as $column) {
                if (Schema::hasColumn('site_settings', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};