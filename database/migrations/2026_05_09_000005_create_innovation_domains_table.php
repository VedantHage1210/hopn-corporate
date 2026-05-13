<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('innovation_domains', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_de')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('slug')->unique();
            $table->string('icon')->nullable();
            $table->text('description')->nullable();
            $table->text('description_de')->nullable();
            $table->text('description_ar')->nullable();
            $table->text('use_cases')->nullable();
            $table->text('use_cases_de')->nullable();
            $table->text('use_cases_ar')->nullable();
            $table->text('related_services')->nullable();
            $table->boolean('is_published')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('innovation_domains');
    }
};
