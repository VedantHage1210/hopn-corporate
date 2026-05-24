<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('programs', function (Blueprint $table) {
            if (!Schema::hasColumn('programs', 'title_ar')) $table->string('title_ar')->nullable()->after('title_de');
            if (!Schema::hasColumn('programs', 'summary_de')) $table->text('summary_de')->nullable()->after('summary_en');
            if (!Schema::hasColumn('programs', 'summary_ar')) $table->text('summary_ar')->nullable()->after('summary_de');
            if (!Schema::hasColumn('programs', 'audience_de')) $table->text('audience_de')->nullable()->after('audience_en');
            if (!Schema::hasColumn('programs', 'audience_ar')) $table->text('audience_ar')->nullable()->after('audience_de');
            if (!Schema::hasColumn('programs', 'duration')) $table->string('duration')->nullable()->after('audience_ar');
            if (!Schema::hasColumn('programs', 'image_url')) $table->string('image_url')->nullable()->after('duration');
        });
    }
    public function down(): void {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn(['title_ar', 'summary_de', 'summary_ar', 'audience_de', 'audience_ar', 'duration', 'image_url']);
        });
    }
};
