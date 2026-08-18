<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('job_applications', function (Blueprint $table) {
            if (!Schema::hasColumn('job_applications', 'tracking_token')) {
                $table->string('tracking_token')->nullable()->unique()->after('status');
            }
        });
    }
    public function down(): void {
        Schema::table('job_applications', function (Blueprint $table) {
            $table->dropColumn('tracking_token');
        });
    }
};
