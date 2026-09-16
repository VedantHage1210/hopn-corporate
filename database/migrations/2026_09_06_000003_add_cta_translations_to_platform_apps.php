<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('platform_apps', function (Blueprint $table) {
            $table->string('cta_label_de')->nullable()->after('cta_label_en');
            $table->string('cta_label_ar')->nullable()->after('cta_label_de');
        });
    }

    public function down(): void
    {
        Schema::table('platform_apps', function (Blueprint $table) {
            $table->dropColumn(['cta_label_de', 'cta_label_ar']);
        });
    }
};
