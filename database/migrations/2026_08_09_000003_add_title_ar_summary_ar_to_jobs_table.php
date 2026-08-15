<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs', 'title_ar')) {
                $table->string('title_ar')->nullable()->after('title_de');
            }
            if (!Schema::hasColumn('jobs', 'summary_ar')) {
                $table->text('summary_ar')->nullable()->after('summary_de');
            }
        });
    }

    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            $table->dropColumn(['title_ar', 'summary_ar']);
        });
    }
};
