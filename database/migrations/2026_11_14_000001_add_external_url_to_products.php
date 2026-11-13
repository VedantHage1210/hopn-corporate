<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasColumn('products', 'external_url')) {
            Schema::table('products', function (Blueprint $table) {
                $table->string('external_url', 500)->nullable()->after('hero_image_url');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('products', 'external_url')) {
            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('external_url');
            });
        }
    }
};
