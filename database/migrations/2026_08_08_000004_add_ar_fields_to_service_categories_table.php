<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_categories', function (Blueprint $table) {
            if (!Schema::hasColumn('service_categories', 'name_ar')) {
                $table->string('name_ar')->nullable()->after('name_de');
            }
            if (!Schema::hasColumn('service_categories', 'description_ar')) {
                $table->text('description_ar')->nullable()->after('description_de');
            }
        });
    }

    public function down(): void
    {
        Schema::table('service_categories', function (Blueprint $table) {
            $table->dropColumn(['name_ar', 'description_ar']);
        });
    }
};
