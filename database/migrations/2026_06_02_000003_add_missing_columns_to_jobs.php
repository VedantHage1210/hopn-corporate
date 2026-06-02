<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs', 'type')) {
                $table->string('type')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'seniority')) {
                $table->string('seniority')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'requirements')) {
                $table->text('requirements')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'requirements_de')) {
                $table->text('requirements_de')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'requirements_ar')) {
                $table->text('requirements_ar')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'benefits')) {
                $table->text('benefits')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'benefits_de')) {
                $table->text('benefits_de')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'benefits_ar')) {
                $table->text('benefits_ar')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'description_ar')) {
                $table->text('description_ar')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'close_date')) {
                $table->date('close_date')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'is_active')) {
                $table->boolean('is_active')->default(true);
            }
            if (!Schema::hasColumn('jobs', 'is_published')) {
                $table->boolean('is_published')->default(false);
            }
        });
    }

    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn([
                'type', 'seniority',
                'requirements', 'requirements_de', 'requirements_ar',
                'benefits', 'benefits_de', 'benefits_ar',
                'description_ar', 'close_date',
                'is_active', 'is_published'
            ]);
        });
    }
};
