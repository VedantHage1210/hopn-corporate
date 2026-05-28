<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('testimonials', function (Blueprint $table) {
            if (!Schema::hasColumn('testimonials', 'quote_ar')) {
                $table->text('quote_ar')->nullable()->after('quote_de');
            }
        });
    }
    public function down(): void {
        Schema::table('testimonials', function (Blueprint $table) {
            $table->dropColumn('quote_ar');
        });
    }
};
