<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('partners', function (Blueprint $table) {
            if (!Schema::hasColumn('partners', 'description_en')) {
                $table->text('description_en')->nullable()->after('logo');
            }
            if (!Schema::hasColumn('partners', 'description_de')) {
                $table->text('description_de')->nullable()->after('description_en');
            }
            if (!Schema::hasColumn('partners', 'description_ar')) {
                $table->text('description_ar')->nullable()->after('description_de');
            }
        });
    }
    public function down(): void {
        Schema::table('partners', function (Blueprint $table) {
            $table->dropColumn(['description_en', 'description_de', 'description_ar']);
        });
    }
};
