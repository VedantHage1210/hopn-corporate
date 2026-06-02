<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            if (!Schema::hasColumn('pages', 'title_ar')) {
                $table->string('title_ar')->nullable();
            }
            if (!Schema::hasColumn('pages', 'excerpt_ar')) {
                $table->text('excerpt_ar')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['title_ar', 'excerpt_ar']);
        });
    }
};
