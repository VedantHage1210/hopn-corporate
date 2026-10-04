<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('research_publications', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_de')->nullable();
            $table->string('title_ar')->nullable();
            $table->string('project')->nullable(); // e.g. SWARMind, SAFE-CARE, RefereeX AI
            $table->string('authors')->nullable();
            $table->text('summary_en')->nullable();
            $table->text('summary_de')->nullable();
            $table->text('summary_ar')->nullable();
            $table->date('published_on')->nullable();
            $table->string('pdf_url')->nullable();
            $table->string('external_url')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(false);
            $table->timestamps();
        });

        Schema::create('academic_partners', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo_url')->nullable();
            $table->string('website_url')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('research_publications');
        Schema::dropIfExists('academic_partners');
    }
};