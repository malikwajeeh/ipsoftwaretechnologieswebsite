<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
        AboutSection::create([
            'title' => 'We Are IP Software Technologies',
            'description' => 'IP Software Technologies is a leading software development company based in Pakistan, specializing in delivering innovative digital solutions to businesses worldwide. With over 8 years of experience, we have successfully completed 200+ projects across various industries.',
            'mission' => 'To empower businesses with innovative software solutions that drive digital transformation and sustainable growth.',
            'vision' => 'To be the most trusted technology partner for businesses seeking to leverage digital innovation for competitive advantage.',
            'values' => ['Innovation', 'Quality', 'Integrity', 'Collaboration', 'Excellence'],
            'features' => ['Agile Development Methodology', 'Dedicated Project Management', 'Quality Assurance & Testing', 'Post-Launch Support & Maintenance'],
            'experience_years' => 8,
        ]);
    }
}
