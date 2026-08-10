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
            ['key_name' => 'company_email', 'value' => 'info@ipsoftwaretechnologies.com', 'group_name' => 'general'],
            ['key_name' => 'company_phone', 'value' => '+92 300 123 4567', 'group_name' => 'general'],
            ['key_name' => 'company_address', 'value' => 'Office No. 123, Tech Hub, Lahore, Pakistan', 'group_name' => 'general'],
            ['key_name' => 'working_hours', 'value' => 'Mon - Fri: 9:00 AM - 6:00 PM', 'group_name' => 'general'],
            ['key_name' => 'whatsapp_number', 'value' => '+923001234567', 'group_name' => 'general'],
        ];

        foreach ($settings as $setting) {
            WebsiteSetting::create($setting);
        }
    }
}
