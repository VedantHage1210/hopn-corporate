<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Founder's brief, item 19: "Add a 'Status' badge system for ventures
     * (Concept, Pilot, Live) so the site never overclaims." Defaults to
     * 'concept' — the most conservative state — so an existing product never
     * silently reads as "Live" just because this column didn't exist before.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->string('status', 20)->default('concept')->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};