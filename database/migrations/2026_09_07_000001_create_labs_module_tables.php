<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Singleton row (id=1) holding the page-level hero content.
        Schema::create('labs_page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('hero_eyebrow_en')->nullable();
            $table->string('hero_eyebrow_de')->nullable();
            $table->string('hero_eyebrow_ar')->nullable();
            $table->string('hero_title_en')->nullable();
            $table->string('hero_title_de')->nullable();
            $table->string('hero_title_ar')->nullable();
            $table->text('hero_subtitle_en')->nullable();
            $table->text('hero_subtitle_de')->nullable();
            $table->text('hero_subtitle_ar')->nullable();
            $table->json('hero_tags_en')->nullable();
            $table->json('hero_tags_de')->nullable();
            $table->json('hero_tags_ar')->nullable();
            $table->timestamps();
        });

        // Repeatable cards used for both "Key Focus Areas" and
        // "Programs & Initiatives" — same visual shape (title, description,
        // 3 tags, CTA), distinguished by `type`.
        Schema::create('lab_items', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // focus_area | program
            $table->string('title_en');
            $table->string('title_de')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_de')->nullable();
            $table->text('description_ar')->nullable();
            $table->json('tags_en')->nullable();
            $table->json('tags_de')->nullable();
            $table->json('tags_ar')->nullable();
            $table->string('cta_label_en')->nullable();
            $table->string('cta_label_de')->nullable();
            $table->string('cta_label_ar')->nullable();
            $table->string('cta_url')->nullable();
            $table->string('accent_color')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        // "How We Work" numbered process steps.
        Schema::create('lab_steps', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('step_number');
            $table->string('title_en');
            $table->string('title_de')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_de')->nullable();
            $table->text('description_ar')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lab_steps');
        Schema::dropIfExists('lab_items');
        Schema::dropIfExists('labs_page_contents');
    }
};
