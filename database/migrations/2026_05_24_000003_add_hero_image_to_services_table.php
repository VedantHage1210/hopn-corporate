<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('services', function (Blueprint $table) {
            if (!Schema::hasColumn('services', 'hero_image')) {
                $table->string('hero_image')->nullable()->after('body_ar');
            }
        });
    }
    public function down(): void {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn('hero_image');
        });
    }
};
