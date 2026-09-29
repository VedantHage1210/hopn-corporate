<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // RolesPermissionsSeeder is retired: it assigned an unrelated,
            // unused set of granular permission names (e.g. "view pages")
            // to the Editor/Publisher/Translator roles. Nothing in the app
            // checks those names, but running it on its own would overwrite
            // the real permissions those roles need (content.edit,
            // content.delete, system.manage), locking those users out.
            // AdminUserSeeder below is the single source of truth for roles
            // and permissions now.
            AdminUserSeeder::class,
            LanguageSeeder::class,
            SiteSettingsSeeder::class,
            DemoContentSeeder::class,
        ]);
    }
}