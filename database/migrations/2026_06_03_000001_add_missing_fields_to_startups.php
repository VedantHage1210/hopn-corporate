<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('startups', function (Blueprint $table) {
            if (!Schema::hasColumn('startups', 'logo')) {
                $table->string('logo')->nullable();
            }
            if (!Schema::hasColumn('startups', 'industry_de')) {
                $table->string('industry_de')->nullable();
            }
            if (!Schema::hasColumn('startups', 'industry_ar')) {
                $table->string('industry_ar')->nullable();
            }
            if (!Schema::hasColumn('startups', 'description_de')) {
                $table->text('description_de')->nullable();
            }
            if (!Schema::hasColumn('startups', 'description_ar')) {
                $table->text('description_ar')->nullable();
            }
            if (!Schema::hasColumn('startups', 'is_visible')) {
                $table->boolean('is_visible')->default(true);
            }
        });
    }

    public function down(): void
    {
        Schema::table('startups', function (Blueprint $table) {
            $table->dropColumn(['logo','industry_de','industry_ar','description_de','description_ar','is_visible']);
        });
    }
};
