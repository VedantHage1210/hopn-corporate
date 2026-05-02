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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_de')->nullable();
            $table->string('slug')->unique();
            $table->text('summary_en')->nullable();
            $table->text('summary_de')->nullable();
            $table->text('audience_en')->nullable();
            $table->text('audience_de')->nullable();
            $table->integer('duration_weeks')->nullable();
            $table->json('outcomes')->nullable();
            $table->json('pricing_tiers')->nullable();
            $table->string('cta_label_en')->nullable();
            $table->string('cta_label_de')->nullable();
            $table->string('cta_url')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
