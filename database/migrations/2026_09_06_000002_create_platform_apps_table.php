<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('platform_apps', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_de')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('slug')->unique();
            $table->string('tagline_en')->nullable();
            $table->string('tagline_de')->nullable();
            $table->string('tagline_ar')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_de')->nullable();
            $table->text('description_ar')->nullable();
            $table->string('logo_url')->nullable();
            $table->string('external_url')->nullable();
            $table->string('cta_label_en')->nullable();
            $table->boolean('is_visible')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('platform_apps');
    }
};
