<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'HOPn Corporate',
                'site_name_de' => 'HOPn Unternehmen',
                'site_tagline' => 'Turning data into business momentum',
                'site_tagline_de' => 'Daten in Geschaeftsdynamik verwandeln',
                'default_locale' => 'en',
                'timezone' => 'Europe/Berlin',
                'contact_email' => 'hello@hopn.eu',
                // Left blank on purpose: unverified placeholder numbers/address
                // were live on the site. Fill these in via Admin > Settings
                // once the founder confirms the real phone and office address.
                'contact_phone' => null,
                'office_address' => null,
                'office_address_de' => null,
                'social_links' => [
                    'linkedin' => 'https://www.linkedin.com/company/hopn',
                    'x' => 'https://x.com/hopn_eu',
                ],
                'seo_defaults' => [
                    'title' => 'HOPn Corporate',
                    'description' => 'AI-native growth partner for modern enterprises.',
                ],
                'maintenance_mode' => false,
            ]
        );
    }
}