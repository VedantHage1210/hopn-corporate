<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('events', function (Blueprint $table) {
            $table->string('title_de')->nullable()->after('title');
            $table->string('title_ar')->nullable()->after('title_de');
            $table->text('description_de')->nullable()->after('description');
            $table->text('description_ar')->nullable()->after('description_de');
            $table->string('speaker_names')->nullable()->after('max_attendees');
            $table->string('sponsor_names')->nullable()->after('speaker_names');
            $table->string('image_url')->nullable()->after('sponsor_names');
            $table->boolean('is_published')->default(true)->after('image_url');
            $table->boolean('registration_open')->default(true)->after('is_published');
            $table->integer('sort_order')->default(0)->after('registration_open');
        });
    }
    public function down(): void {
        Schema::table('events', function (Blueprint $table) {
            $table->dropColumn([
                'title_de', 'title_ar',
                'description_de', 'description_ar',
                'speaker_names', 'sponsor_names',
                'image_url', 'is_published',
                'registration_open', 'sort_order'
            ]);
        });
    }
};
