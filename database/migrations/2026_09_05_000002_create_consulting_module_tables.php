<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('consulting_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_de')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('slug')->unique();
            $table->string('description_en')->nullable();
            $table->string('icon')->nullable();
            $table->string('accent_color')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_visible')->default(true);
            $table->timestamps();
        });

        Schema::table('experts', function (Blueprint $table) {
            $table->foreignId('consulting_category_id')->nullable()
                ->after('id')->constrained('consulting_categories')->nullOnDelete();
        });

        Schema::create('consulting_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consulting_category_id')->nullable()->constrained('consulting_categories')->nullOnDelete();
            $table->string('name_en');
            $table->string('name_de')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('slug')->unique();
            $table->text('description_en')->nullable();
            $table->unsignedInteger('duration_minutes')->default(60);
            $table->decimal('price', 10, 2)->nullable();
            $table->string('currency', 3)->default('EUR');
            $table->boolean('price_on_request')->default(false);
            $table->json('inclusions_en')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_visible')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('expert_availabilities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expert_id')->constrained('experts')->cascadeOnDelete();
            $table->unsignedTinyInteger('weekday'); // 0=Sunday .. 6=Saturday
            $table->time('start_time');
            $table->time('end_time');
            $table->string('timezone')->default('Europe/Berlin');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('consulting_bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expert_id')->nullable()->constrained('experts')->nullOnDelete();
            $table->foreignId('consulting_package_id')->nullable()->constrained('consulting_packages')->nullOnDelete();

            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company')->nullable();
            $table->date('preferred_date')->nullable();
            $table->string('preferred_time_slot')->nullable();
            $table->text('message')->nullable();

            // new | contacted | confirmed | completed | cancelled
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
        Schema::dropIfExists('consulting_bookings');
        Schema::dropIfExists('expert_availabilities');
        Schema::dropIfExists('consulting_packages');
        Schema::table('experts', function (Blueprint $table) {
            $table->dropConstrainedForeignId('consulting_category_id');
        });
        Schema::dropIfExists('consulting_categories');
    }
};
