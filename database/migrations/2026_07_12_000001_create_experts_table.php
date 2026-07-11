<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('initials')->nullable();
            $table->string('specialization_en')->nullable();
            $table->string('specialization_de')->nullable();
            $table->string('specialization_ar')->nullable();
            $table->string('hourly_rate')->nullable();
            $table->json('tags')->nullable();
            $table->text('bio_en')->nullable();
            $table->text('bio_de')->nullable();
            $table->text('bio_ar')->nullable();
            $table->string('photo_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('accent_color')->nullable()->default('#4F6EF7');
            $table->integer('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('experts');
    }
};
