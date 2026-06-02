<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE `partners` MODIFY `type` ENUM('customer', 'tech_partner', 'academic', 'delivery', 'research', 'investor', 'startup', 'partner') DEFAULT 'customer'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE `partners` MODIFY `type` ENUM('customer', 'tech_partner', 'academic', 'delivery') DEFAULT 'customer'");
    }
};
