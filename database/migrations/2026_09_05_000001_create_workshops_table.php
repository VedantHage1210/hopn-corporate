<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('workshops', function (Blueprint $table) {
            $table->id();

            $table->string('title_en');
            $table->string('title_de')->nullable();
            $table->string('title_ar')->nullable();

            $table->string('slug')->unique();

            $table->string('tagline_en')->nullable();
            $table->string('tagline_de')->nullable();
            $table->string('tagline_ar')->nullable();

            $table->text('summary_en')->nullable();
            $table->text('summary_de')->nullable();
            $table->text('summary_ar')->nullable();

            $table->longText('description_en')->nullable();
            $table->longText('description_de')->nullable();
            $table->longText('description_ar')->nullable();

            // "on_site" | "remote" | "hybrid" | "bootcamp" | "executive" (matches requirements section 2.9 formats)
            $table->string('format')->default('on_site');

            // e.g. "AI Training", "Data Analytics", "Digital Transformation", "Digital Twin" — matches section 2.9 categories
            $table->string('category')->nullable();

            $table->unsignedInteger('duration_hours')->nullable();
            $table->string('duration_label_en')->nullable(); // e.g. "2 days", "Half-day"

            $table->decimal('price', 10, 2)->nullable();
            $table->string('currency', 3)->default('EUR');
            $table->boolean('price_on_request')->default(false);

            $table->json('learning_outcomes')->nullable(); // array of strings, per-locale handled in outcomes_en/de/ar below
            $table->json('outcomes_en')->nullable();
            $table->json('outcomes_de')->nullable();
            $table->json('outcomes_ar')->nullable();

            $table->json('agenda')->nullable(); // array of {title, description}
            $table->json('industry_ids')->nullable();
            $table->json('service_ids')->nullable();

            $table->string('hero_image_url')->nullable();
            $table->string('instructor_name')->nullable();
            $table->string('instructor_bio')->nullable();

            $table->string('cta_label_en')->nullable();
            $table->string('cta_label_de')->nullable();
            $table->string('cta_label_ar')->nullable();

            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('workshop_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('workshop_id')->constrained('workshops')->cascadeOnDelete();

            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->unsignedInteger('participants')->default(1);
            $table->string('preferred_format')->nullable(); // on_site | remote | hybrid, in case workshop offers multiple
            $table->date('preferred_date')->nullable();
            $table->text('message')->nullable();

            // new | contacted | confirmed | completed | cancelled — mirrors leads status pattern
            $table->string('status')->default('new');

            $table->string('source_url')->nullable();
            $table->string('utm_source')->nullable();
            $table->string('utm_medium')->nullable();
            $table->string('utm_campaign')->nullable();

            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('workshop_bookings');
        Schema::dropIfExists('workshops');
    }
};
