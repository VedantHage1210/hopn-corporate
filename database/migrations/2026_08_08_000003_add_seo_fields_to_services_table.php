<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }
            if (!Schema::hasColumn('services', 'meta_title_de')) {
                $table->string('meta_title_de')->nullable();
            }
            if (!Schema::hasColumn('services', 'meta_title_ar')) {
                $table->string('meta_title_ar')->nullable();
            }
            if (!Schema::hasColumn('services', 'meta_description')) {
                $table->string('meta_description', 500)->nullable();
            }
            if (!Schema::hasColumn('services', 'meta_description_de')) {
                $table->string('meta_description_de', 500)->nullable();
            }
            if (!Schema::hasColumn('services', 'meta_description_ar')) {
                $table->string('meta_description_ar', 500)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['meta_title', 'meta_title_de', 'meta_title_ar', 'meta_description', 'meta_description_de', 'meta_description_ar']);
        });
    }
};