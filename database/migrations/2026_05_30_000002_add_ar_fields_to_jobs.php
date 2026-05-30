<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs', 'description_ar')) {
                $table->text('description_ar')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'requirements_ar')) {
                $table->text('requirements_ar')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'benefits_ar')) {
                $table->text('benefits_ar')->nullable();
            }
        });
    }
    public function down(): void {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn(['description_ar', 'requirements_ar', 'benefits_ar']);
        });
    }
};
