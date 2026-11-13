<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Separate flag for co-founders so admins pick "Founder" or "Co-founder" explicitly
     * (is_founder = Founder, is_cofounder = Co-founder). Both show as large leader cards.
     */
    public function up(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->boolean('is_cofounder')->default(false)->after('is_founder');
        });

        // Existing members already marked as founder whose role says "co-founder" become co-founders.
        DB::table('team_members')
            ->where('is_founder', true)
            ->where(function ($q) {
                $q->whereRaw("LOWER(COALESCE(role_en, '')) LIKE ?", ['%co founder%'])
                  ->orWhereRaw("LOWER(COALESCE(role_en, '')) LIKE ?", ['%co-founder%'])
                  ->orWhereRaw("LOWER(COALESCE(role_en, '')) LIKE ?", ['%cofounder%']);
            })
            ->update(['is_cofounder' => true, 'is_founder' => false]);
    }

    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn('is_cofounder');
        });
    }
};
