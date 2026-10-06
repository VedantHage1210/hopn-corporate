<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        if (!Schema::hasColumn('research_publications', 'image_url')) {
            Schema::table('research_publications', function (Blueprint $table) {
                $table->string('image_url')->nullable()->after('authors');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('research_publications', 'image_url')) {
            Schema::table('research_publications', function (Blueprint $table) {
                $table->dropColumn('image_url');
            });
        }
    }
};