<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('team_members', function (Blueprint $table) {
            if (!Schema::hasColumn('team_members', 'role_ar')) {
                $table->string('role_ar')->nullable()->after('role_de');
            }
            if (!Schema::hasColumn('team_members', 'bio_ar')) {
                $table->text('bio_ar')->nullable()->after('bio_de');
            }
            if (Schema::hasColumn('team_members', 'bio') && !Schema::hasColumn('team_members', 'bio_en')) {
                $table->renameColumn('bio', 'bio_en');
            }
        });
    }
    public function down(): void {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn(['role_ar', 'bio_ar']);
        });
    }
};
