<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('consulting_categories', function (Blueprint $table) {
            $table->string('description_de')->nullable()->after('description_en');
            $table->string('description_ar')->nullable()->after('description_de');
        });

        Schema::table('consulting_packages', function (Blueprint $table) {
            $table->text('description_de')->nullable()->after('description_en');
            $table->text('description_ar')->nullable()->after('description_de');
            $table->json('inclusions_de')->nullable()->after('inclusions_en');
            $table->json('inclusions_ar')->nullable()->after('inclusions_de');
        });
    }

    public function down(): void
    {
        Schema::table('consulting_categories', function (Blueprint $table) {
            $table->dropColumn(['description_de', 'description_ar']);
        });

        Schema::table('consulting_packages', function (Blueprint $table) {
            $table->dropColumn(['description_de', 'description_ar', 'inclusions_de', 'inclusions_ar']);
        });
    }
};
