<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // --- Permissions -----------------------------------------------
        // content.edit   -> create/view/update content (all admin roles)
        // content.delete -> delete content records      (Publisher, Admin, Super Admin)
        // system.manage  -> Users, Settings, SEO, Leads, etc. (Admin, Super Admin only)
        $permissions = ['content.edit', 'content.delete', 'system.manage'];
        foreach ($permissions as $permName) {
            Permission::firstOrCreate(['name' => $permName, 'guard_name' => 'web']);
        }

        // --- Roles -------------------------------------------------------
        foreach (['superadmin', 'admin', 'editor', 'publisher', 'translator'] as $roleName) {
            Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
        }

        // --- Role -> permission map ---------------------------------------
        Role::findByName('superadmin')->syncPermissions($permissions);
        Role::findByName('admin')->syncPermissions($permissions);
        Role::findByName('editor')->syncPermissions(['content.edit']);
        Role::findByName('publisher')->syncPermissions(['content.edit', 'content.delete']);
        Role::findByName('translator')->syncPermissions(['content.edit']);

        $admin = User::updateOrCreate(
            ['email' => 'superadmin@hopn.eu'],
            [
                'name' => 'HOPn Super Admin',
                'password' => Hash::make('Admin@123'),
            ]
        );

        $admin->assignRole('superadmin');
    }
}
