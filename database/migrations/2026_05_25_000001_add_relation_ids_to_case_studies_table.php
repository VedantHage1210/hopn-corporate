<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('case_studies', function (Blueprint $table) {
            if (!Schema::hasColumn('case_studies', 'industry_ids')) {
                $table->json('industry_ids')->nullable()->after('tech_stack');
            }
            if (!Schema::hasColumn('case_studies', 'service_ids')) {
                $table->json('service_ids')->nullable()->after('industry_ids');
            }
        });
    }
    public function down(): void {
        Schema::table('case_studies', function (Blueprint $table) {
            $table->dropColumn(['industry_ids', 'service_ids']);
        });
    }
};
