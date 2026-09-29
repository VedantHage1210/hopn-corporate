<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Retired.
 *
 * This seeder used to assign a granular set of permission names
 * (e.g. "view pages", "create services", "publish blog") to the
 * Editor/Publisher/Translator roles. Nothing in the app ever checked
 * those permission names — every route and @can() check in the app
 * uses a different, simpler set: content.edit / content.delete /
 * system.manage (see database/seeders/AdminUserSeeder.php).
 *
 * Running this seeder on its own (e.g. `php artisan db:seed
 * --class=RolesPermissionsSeeder`) would overwrite the real
 * permissions those roles depend on and lock those users out of the
 * admin panel with 403 errors. AdminUserSeeder is now the single
 * source of truth for roles and permissions, so this class is kept
 * only so old references to it don't break, and does nothing.
 */
class RolesPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Intentionally a no-op. See class docblock above.
    }
}