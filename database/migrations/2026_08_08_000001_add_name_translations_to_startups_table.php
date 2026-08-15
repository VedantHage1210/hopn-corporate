<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('startups', function (Blueprint $table) {
            if (!Schema::hasColumn('startups', 'name_de')) {
                $table->string('name_de')->nullable()->after('name');
            }
            if (!Schema::hasColumn('startups', 'name_ar')) {
                $table->string('name_ar')->nullable()->after('name_de');
            }
        });
    }

    public function down(): void
    {
        Schema::table('startups', function (Blueprint $table) {
            $table->dropColumn(['name_de', 'name_ar']);
        });
    }
};