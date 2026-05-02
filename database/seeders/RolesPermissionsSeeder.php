<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $modules = [
            'pages',
            'services',
            'blog',
            'jobs',
            'leads',
            'media',
            'redirects',
            'settings',
            'languages',
            'users',
        ];

        $actions = ['view', 'create', 'update', 'delete', 'publish'];

        $permissions = [];

        foreach ($modules as $module) {
            foreach ($actions as $action) {
                $permissions[] = Permission::firstOrCreate([
                    'name' => "{$action} {$module}",
                    'guard_name' => 'web',
                ]);
            }
        }

        $superAdmin = Role::firstOrCreate([
            'name' => 'superadmin',
            'guard_name' => 'web',
        ]);

        $admin = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => 'web',
        ]);

        $editor = Role::firstOrCreate([
            'name' => 'editor',
            'guard_name' => 'web',
        ]);

        $publisher = Role::firstOrCreate([
            'name' => 'publisher',
            'guard_name' => 'web',
        ]);

        $translator = Role::firstOrCreate([
            'name' => 'translator',
            'guard_name' => 'web',
        ]);

        $superAdmin->syncPermissions($permissions);
        $admin->syncPermissions($permissions);
        $editor->syncPermissions(Permission::whereIn('name', [
            'view pages',
            'create pages',
            'update pages',
            'publish pages',
            'view services',
            'create services',
            'update services',
            'publish services',
            'view blog',
            'create blog',
            'update blog',
            'publish blog',
            'view jobs',
            'create jobs',
            'update jobs',
            'publish jobs',
            'view media',
            'create media',
            'update media',
            'delete media',
        ])->get());
        $publisher->syncPermissions(Permission::where('name', 'like', '% publish%')->orWhere('name', 'like', 'view %')->get());
        $translator->syncPermissions(Permission::whereIn('name', [
            'view pages',
            'update pages',
            'view services',
            'update services',
            'view blog',
            'update blog',
            'view jobs',
            'update jobs',
        ])->get());
    }
}
