<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('navigation_items', function (Blueprint $table) {
            if (!Schema::hasColumn('navigation_items', 'label_ar')) {
                $table->string('label_ar')->nullable()->after('label_de');
            }
            if (!Schema::hasColumn('navigation_items', 'visible_ar')) {
                $table->boolean('visible_ar')->default(true)->after('visible_de');
            }
        });
    }

    public function down(): void
    {
        Schema::table('navigation_items', function (Blueprint $table) {
            $table->dropColumn(['label_ar', 'visible_ar']);
        });
    }
};
