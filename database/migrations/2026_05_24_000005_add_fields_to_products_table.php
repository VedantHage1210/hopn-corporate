<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('products', function (Blueprint $table) {
            if (!Schema::hasColumn('products', 'title_ar'))      $table->string('title_ar')->nullable()->after('title_de');
            if (!Schema::hasColumn('products', 'tagline_en'))    $table->string('tagline_en')->nullable()->after('title_ar');
            if (!Schema::hasColumn('products', 'tagline_de'))    $table->string('tagline_de')->nullable()->after('tagline_en');
            if (!Schema::hasColumn('products', 'tagline_ar'))    $table->string('tagline_ar')->nullable()->after('tagline_de');
            if (!Schema::hasColumn('products', 'summary_ar'))    $table->text('summary_ar')->nullable()->after('summary_de');
            if (!Schema::hasColumn('products', 'problem_de'))    $table->text('problem_de')->nullable()->after('problem_en');
            if (!Schema::hasColumn('products', 'problem_ar'))    $table->text('problem_ar')->nullable()->after('problem_de');
            if (!Schema::hasColumn('products', 'solution_de'))   $table->text('solution_de')->nullable()->after('solution_en');
            if (!Schema::hasColumn('products', 'solution_ar'))   $table->text('solution_ar')->nullable()->after('solution_de');
            if (!Schema::hasColumn('products', 'features_en'))   $table->text('features_en')->nullable()->after('solution_ar');
            if (!Schema::hasColumn('products', 'features_de'))   $table->text('features_de')->nullable()->after('features_en');
            if (!Schema::hasColumn('products', 'features_ar'))   $table->text('features_ar')->nullable()->after('features_de');
            if (!Schema::hasColumn('products', 'use_cases_en'))  $table->text('use_cases_en')->nullable()->after('features_ar');
            if (!Schema::hasColumn('products', 'use_cases_de'))  $table->text('use_cases_de')->nullable()->after('use_cases_en');
            if (!Schema::hasColumn('products', 'use_cases_ar'))  $table->text('use_cases_ar')->nullable()->after('use_cases_de');
            if (!Schema::hasColumn('products', 'cta_label_en'))  $table->string('cta_label_en')->nullable()->after('use_cases_ar');
            if (!Schema::hasColumn('products', 'hero_image_url'))$table->string('hero_image_url')->nullable()->after('cta_label_en');
            if (!Schema::hasColumn('products', 'target_audience'))$table->string('target_audience')->nullable()->after('hero_image_url');
            if (!Schema::hasColumn('products', 'industry_ids'))  $table->json('industry_ids')->nullable()->after('target_audience');
            if (!Schema::hasColumn('products', 'service_ids'))   $table->json('service_ids')->nullable()->after('industry_ids');
        });
    }
    public function down(): void {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'title_ar','tagline_en','tagline_de','tagline_ar',
                'summary_ar','problem_de','problem_ar','solution_de','solution_ar',
                'features_en','features_de','features_ar',
                'use_cases_en','use_cases_de','use_cases_ar',
                'cta_label_en','hero_image_url','target_audience','industry_ids','service_ids'
            ]);
        });
    }
};
