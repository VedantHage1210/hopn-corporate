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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_de')->nullable();
            $table->string('slug')->unique();
            $table->text('summary_en')->nullable();
            $table->text('summary_de')->nullable();
            $table->longText('problem_en')->nullable();
            $table->longText('problem_de')->nullable();
            $table->longText('solution_en')->nullable();
            $table->longText('solution_de')->nullable();
            $table->json('features')->nullable();
            $table->json('pricing_tiers')->nullable();
            $table->json('screenshots')->nullable();
            $table->string('cta_type')->nullable();
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
        Schema::dropIfExists('products');
    }
};
