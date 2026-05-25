<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->string('title_ar')->nullable()->after('title_de');
            $table->string('client_name_en')->nullable()->after('client_name');
            $table->string('client_name_de')->nullable()->after('client_name_en');
            $table->string('client_name_ar')->nullable()->after('client_name_de');
            $table->longText('challenge_ar')->nullable()->after('challenge_de');
            $table->longText('solution_ar')->nullable()->after('solution_de');
            $table->longText('outcomes_ar')->nullable()->after('outcomes_de');
            $table->string('image_url')->nullable()->after('tech_stack');
            $table->string('pdf_url')->nullable()->after('image_url');
        });
    }

    public function down(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->dropColumn([
                'title_ar', 'client_name_en', 'client_name_de', 'client_name_ar', 
                'challenge_ar', 'solution_ar', 'outcomes_ar', 'image_url', 'pdf_url'
            ]);
        });
    }
};
