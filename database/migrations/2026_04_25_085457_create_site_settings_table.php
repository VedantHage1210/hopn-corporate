<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_name_de')->nullable();
            $table->string('site_tagline')->nullable();
            $table->string('site_tagline_de')->nullable();
            $table->string('default_locale', 5)->default('en');
            $table->string('timezone')->default('Europe/Berlin');
            $table->string('contact_email');
            $table->string('contact_phone')->nullable();
            $table->string('office_address')->nullable();
            $table->string('office_address_de')->nullable();
            $table->json('social_links')->nullable();
            $table->json('seo_defaults')->nullable();
            $table->boolean('maintenance_mode')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
