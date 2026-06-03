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
            if (!Schema::hasColumn('pages', 'featured_image')) {
                $table->string('featured_image')->nullable();
            }
            if (!Schema::hasColumn('pages', 'content_en')) {
                $table->longText('content_en')->nullable();
            }
            if (!Schema::hasColumn('pages', 'content_de')) {
                $table->longText('content_de')->nullable();
            }
            if (!Schema::hasColumn('pages', 'content_ar')) {
                $table->longText('content_ar')->nullable();
            }
        });

        Schema::table('page_blocks', function (Blueprint $table) {
            if (!Schema::hasColumn('page_blocks', 'title_ar')) {
                $table->string('title_ar')->nullable();
            }
            if (!Schema::hasColumn('page_blocks', 'content_de')) {
                $table->json('content_de')->nullable();
            }
            if (!Schema::hasColumn('page_blocks', 'content_ar')) {
                $table->json('content_ar')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->dropColumn(['title_ar', 'excerpt_ar', 'featured_image', 'content_en', 'content_de', 'content_ar']);
        });
        Schema::table('page_blocks', function (Blueprint $table) {
            $table->dropColumn(['title_ar', 'content_de', 'content_ar']);
        });
    }
};
