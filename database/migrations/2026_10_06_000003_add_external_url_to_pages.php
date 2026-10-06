<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasColumn('pages', 'external_url')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->string('external_url')->nullable()->after('featured_image');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('pages', 'external_url')) {
            Schema::table('pages', function (Blueprint $table) {
                $table->dropColumn('external_url');
            });
        }
    }
};