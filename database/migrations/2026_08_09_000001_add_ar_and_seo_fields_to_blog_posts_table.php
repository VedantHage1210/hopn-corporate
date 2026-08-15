<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_posts', 'title_ar')) {
                $table->string('title_ar')->nullable()->after('title_de');
            }
            if (!Schema::hasColumn('blog_posts', 'excerpt_ar')) {
                $table->text('excerpt_ar')->nullable()->after('excerpt_de');
            }
            if (!Schema::hasColumn('blog_posts', 'content_ar')) {
                $table->longText('content_ar')->nullable()->after('content_de');
            }
            if (!Schema::hasColumn('blog_posts', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'meta_title_de')) {
                $table->string('meta_title_de')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'meta_title_ar')) {
                $table->string('meta_title_ar')->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'meta_description')) {
                $table->string('meta_description', 500)->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'meta_description_de')) {
                $table->string('meta_description_de', 500)->nullable();
            }
            if (!Schema::hasColumn('blog_posts', 'meta_description_ar')) {
                $table->string('meta_description_ar', 500)->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn([
                'title_ar', 'excerpt_ar', 'content_ar',
                'meta_title', 'meta_title_de', 'meta_title_ar',
                'meta_description', 'meta_description_de', 'meta_description_ar',
            ]);
        });
    }
};
