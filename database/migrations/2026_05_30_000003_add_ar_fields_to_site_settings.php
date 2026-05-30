<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('site_settings', function (Blueprint $table) {
            if (!Schema::hasColumn('site_settings', 'site_name_ar')) {
                $table->string('site_name_ar')->nullable();
            }
            if (!Schema::hasColumn('site_settings', 'site_tagline_ar')) {
                $table->string('site_tagline_ar')->nullable();
            }
        });
    }
    public function down(): void {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn(['site_name_ar', 'site_tagline_ar']);
        });
    }
};
