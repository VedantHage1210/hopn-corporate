<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            foreach ([
                'seo_default_title', 'seo_default_title_de', 'seo_default_title_ar',
            ] as $col) {
                if (!Schema::hasColumn('site_settings', $col)) {
                    $table->string($col)->nullable();
                }
            }
            foreach ([
                'seo_default_description', 'seo_default_description_de', 'seo_default_description_ar',
            ] as $col) {
                if (!Schema::hasColumn('site_settings', $col)) {
                    $table->string($col, 500)->nullable();
                }
            }
            if (!Schema::hasColumn('site_settings', 'seo_og_image')) {
                $table->string('seo_og_image', 500)->nullable();
            }
            if (!Schema::hasColumn('site_settings', 'robots_txt')) {
                $table->text('robots_txt')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'seo_default_title', 'seo_default_title_de', 'seo_default_title_ar',
                'seo_default_description', 'seo_default_description_de', 'seo_default_description_ar',
                'seo_og_image', 'robots_txt',
            ]);
        });
    }
};
