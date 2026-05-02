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
        Schema::create('navigation_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('navigation_items')->nullOnDelete();
            $table->string('menu_location')->default('header');
            $table->unsignedInteger('sort_order')->default(0);
            $table->string('label_en');
            $table->string('label_de')->nullable();
            $table->string('url')->nullable();
            $table->unsignedBigInteger('page_id')->nullable();
            $table->boolean('visible_en')->default(true);
            $table->boolean('visible_de')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navigation_items');
    }
};
