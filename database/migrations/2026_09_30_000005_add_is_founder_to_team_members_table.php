<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Founder's brief, item 13: "Add a Founder and Team page..." — the
     * founder is shown separately/prominently from the rest of the team.
     * This flag lets the admin mark exactly one (or more) team members as
     * the founder; defaults to false so nobody is wrongly featured by accident.
     */
    public function up(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->boolean('is_founder')->default(false)->after('photo');
        });
    }

    public function down(): void
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn('is_founder');
        });
    }
};
