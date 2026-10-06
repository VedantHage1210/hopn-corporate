<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasColumn('site_settings', 'scheduling_url')) {
            Schema::table('site_settings', function (Blueprint $table) {
                $table->string('scheduling_url')->nullable()->after('contact_phone');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('site_settings', 'scheduling_url')) {
            Schema::table('site_settings', function (Blueprint $table) {
                $table->dropColumn('scheduling_url');
            });
        }
    }
};