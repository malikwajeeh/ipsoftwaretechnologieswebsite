<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HeroSection::create([
            'title' => 'We Build World-Class Digital',
            'subtitle' => 'Products',
            'description' => 'Empowering businesses with cutting-edge software solutions. We transform ideas into powerful digital products that drive growth and innovation.',
            'badge_text' => 'Available for new projects',
            'button_text' => 'Start Your Project',
            'button_link' => '/contact',
            'secondary_button_text' => 'View Our Work',
            'secondary_button_link' => '/projects',
            'is_active' => true,
        ]);
    }
}