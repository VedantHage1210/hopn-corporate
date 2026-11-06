<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            if (!Schema::hasColumn('job_applications', 'is_general')) {
                $table->boolean('is_general')->default(false)->after('job_id');
            }
            if (!Schema::hasColumn('job_applications', 'experience')) {
                $table->string('experience', 120)->nullable()->after('portfolio_url');
            }
            if (!Schema::hasColumn('job_applications', 'interest')) {
                $table->string('interest', 190)->nullable()->after('experience');
            }
            if (!Schema::hasColumn('job_applications', 'locale')) {
                $table->string('locale', 5)->nullable()->after('interest');
            }
        });
    }

    public function down(): void
    {
        Schema::table('job_applications', function (Blueprint $table) {
            foreach (['is_general', 'experience', 'interest', 'locale'] as $col) {
                if (Schema::hasColumn('job_applications', $col)) {
                    $table->dropColumn($col);
                }
            }
        });
    }
};
