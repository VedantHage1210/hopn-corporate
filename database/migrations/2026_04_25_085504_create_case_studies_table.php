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
        Schema::create('case_studies', function (Blueprint $table) {
            $table->id();
            $table->string('title_en');
            $table->string('title_de')->nullable();
            $table->string('slug')->unique();
            $table->string('industry')->nullable();
            $table->string('client_name')->nullable();
            $table->longText('challenge_en')->nullable();
            $table->longText('challenge_de')->nullable();
            $table->longText('solution_en')->nullable();
            $table->longText('solution_de')->nullable();
            $table->longText('outcomes_en')->nullable();
            $table->longText('outcomes_de')->nullable();
            $table->json('tech_stack')->nullable();
            $table->string('pdf_path')->nullable();
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
        Schema::dropIfExists('case_studies');
    }
};
