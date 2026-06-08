<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('investors', function (Blueprint $table) {
            if (!Schema::hasColumn('investors', 'logo')) {
                $table->string('logo')->nullable();
            }
            if (!Schema::hasColumn('investors', 'focus_de')) {
                $table->string('focus_de')->nullable();
            }
            if (!Schema::hasColumn('investors', 'focus_ar')) {
                $table->string('focus_ar')->nullable();
            }
            if (!Schema::hasColumn('investors', 'description_de')) {
                $table->text('description_de')->nullable();
            }
            if (!Schema::hasColumn('investors', 'description_ar')) {
                $table->text('description_ar')->nullable();
            }
            if (!Schema::hasColumn('investors', 'is_visible')) {
                $table->boolean('is_visible')->default(true);
            }
            if (!Schema::hasColumn('investors', 'sort_order')) {
                $table->unsignedInteger('sort_order')->default(0);
            }
        });
    }

    public function down(): void
    {
        Schema::table('investors', function (Blueprint $table) {
            $table->dropColumn(['logo','focus_de','focus_ar','description_de','description_ar','is_visible','sort_order']);
        });
    }
};
