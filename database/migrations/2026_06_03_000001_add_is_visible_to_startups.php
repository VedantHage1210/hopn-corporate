<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('startups', function (Blueprint $table) {
            if (!Schema::hasColumn('startups', 'is_visible')) {
                $table->boolean('is_visible')->default(true);
            }
            if (!Schema::hasColumn('startups', 'logo')) {
                $table->string('logo')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('startups', function (Blueprint $table) {
            $table->dropColumn(['is_visible', 'logo']);
        });
    }
};
