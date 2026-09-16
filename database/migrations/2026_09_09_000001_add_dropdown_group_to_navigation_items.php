<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('navigation_items', function (Blueprint $table) {
            // Only meaningful when menu_location = 'header': which header
            // dropdown (Solutions / Products / Apps / Company) this item
            // should appear under, in addition to that dropdown's built-in
            // items. Null = not shown in any header dropdown.
            $table->string('dropdown_group')->nullable()->after('menu_location');
        });
    }

    public function down(): void
    {
        Schema::table('navigation_items', function (Blueprint $table) {
            $table->dropColumn('dropdown_group');
        });
    }
};
