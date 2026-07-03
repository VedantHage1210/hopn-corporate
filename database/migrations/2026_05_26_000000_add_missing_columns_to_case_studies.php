<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            if (!Schema::hasColumn('case_studies', 'title_ar')) {
                $table->string('title_ar')->nullable()->after('title_de');
            }
            if (!Schema::hasColumn('case_studies', 'client_name_en')) {
                $table->string('client_name_en')->nullable();
            }
            if (!Schema::hasColumn('case_studies', 'client_name_de')) {
                $table->string('client_name_de')->nullable();
            }
            if (!Schema::hasColumn('case_studies', 'client_name_ar')) {
                $table->string('client_name_ar')->nullable();
            }
            if (!Schema::hasColumn('case_studies', 'challenge_ar')) {
                $table->longText('challenge_ar')->nullable();
            }
            if (!Schema::hasColumn('case_studies', 'solution_ar')) {
                $table->longText('solution_ar')->nullable();
            }
            if (!Schema::hasColumn('case_studies', 'outcomes_ar')) {
                $table->longText('outcomes_ar')->nullable();
            }
            if (!Schema::hasColumn('case_studies', 'image_url')) {
                $table->string('image_url')->nullable();
            }
            if (!Schema::hasColumn('case_studies', 'pdf_url')) {
                $table->string('pdf_url')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->dropColumn(array_filter([
                Schema::hasColumn('case_studies', 'title_ar')       ? 'title_ar'       : null,
                Schema::hasColumn('case_studies', 'client_name_en') ? 'client_name_en' : null,
                Schema::hasColumn('case_studies', 'client_name_de') ? 'client_name_de' : null,
                Schema::hasColumn('case_studies', 'client_name_ar') ? 'client_name_ar' : null,
                Schema::hasColumn('case_studies', 'challenge_ar')   ? 'challenge_ar'   : null,
                Schema::hasColumn('case_studies', 'solution_ar')    ? 'solution_ar'    : null,
                Schema::hasColumn('case_studies', 'outcomes_ar')    ? 'outcomes_ar'    : null,
                Schema::hasColumn('case_studies', 'image_url')      ? 'image_url'      : null,
                Schema::hasColumn('case_studies', 'pdf_url')        ? 'pdf_url'        : null,
            ]));
        });
    }
};
