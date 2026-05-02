<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::firstOrCreate([
            'name' => 'superadmin',
            'guard_name' => 'web',
        ]);

        $admin = User::updateOrCreate(
            ['email' => 'superadmin@hopn.eu'],
            [
                'name' => 'HOPn Super Admin',
                'password' => Hash::make('Admin@123'),
            ]
        );

        $admin->assignRole($role);
    }
}
