<?php

namespace Database\Seeders;

use App\Models\WebsiteSetting;
use Illuminate\Database\Seeder;

class WebsiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key_name' => 'company_name', 'value' => 'IP Software Technologies', 'group_name' => 'general'],
            ['key_name' => 'company_email', 'value' => 'info@ipsoftwaretech.com', 'group_name' => 'general'],
            ['key_name' => 'company_phone', 'value' => '+92 305 4186602', 'group_name' => 'general'],
            ['key_name' => 'company_phone_2', 'value' => '+92 309 4604768', 'group_name' => 'general'],
            ['key_name' => 'company_address', 'value' => 'Siddique Trade Center, Gulberg, Lahore', 'group_name' => 'general'],
            ['key_name' => 'working_hours', 'value' => 'Mon - Fri: 9:00 AM - 6:00 PM', 'group_name' => 'general'],
            ['key_name' => 'whatsapp_number', 'value' => '+923054186602', 'group_name' => 'general'],
            ['key_name' => 'facebook_link', 'value' => 'https://www.facebook.com/share/18bG87Ek88/', 'group_name' => 'social'],
            ['key_name' => 'instagram_link', 'value' => 'https://www.instagram.com/ipsoftwaretechnologies?igsh=bjF5dXZwNjBpNHp0', 'group_name' => 'social'],
            ['key_name' => 'linkedin_link', 'value' => 'https://www.linkedin.com/company/ip-software-technologies/', 'group_name' => 'social'],
            ['key_name' => 'twitter_link', 'value' => '', 'group_name' => 'social'],
        ];

        foreach ($settings as $setting) {
            WebsiteSetting::create($setting);
        }
    }
}
