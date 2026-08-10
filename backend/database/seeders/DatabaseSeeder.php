<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            HeroSectionSeeder::class,
            AboutSectionSeeder::class,
            ServiceSeeder::class,
            TechnologySeeder::class,
            ProjectCategorySeeder::class,
            IndustrySeeder::class,
            WhyChooseUsSeeder::class,
            ProcessSeeder::class,
            TestimonialSeeder::class,
            FaqSeeder::class,
            TeamMemberSeeder::class,
            JobOpeningSeeder::class,
            WebsiteSettingSeeder::class,
        ]);
    }
}