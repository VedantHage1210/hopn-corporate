<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_categories', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_categories', 'name_ar')) {
                $table->string('name_ar')->nullable()->after('name_de');
            }
            if (!Schema::hasColumn('blog_categories', 'description_ar')) {
                $table->text('description_ar')->nullable()->after('description_de');
            }
        });

        Schema::table('blog_tags', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_tags', 'name_ar')) {
                $table->string('name_ar')->nullable()->after('name_de');
            }
        });
    }

    public function down(): void
    {
        Schema::table('blog_categories', function (Blueprint $table) {
            $table->dropColumn(['name_ar', 'description_ar']);
        });
        Schema::table('blog_tags', function (Blueprint $table) {
            $table->dropColumn(['name_ar']);
        });
    }
};
