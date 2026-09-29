<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('authors', function (Blueprint $table) {
            if (! Schema::hasColumn('authors', 'bio_ar')) {
                $table->text('bio_ar')->nullable()->after('bio_de');
            }
        });
    }

    public function down(): void
    {
        Schema::table('authors', function (Blueprint $table) {
            if (Schema::hasColumn('authors', 'bio_ar')) {
                $table->dropColumn('bio_ar');
            }
        });
    }
};