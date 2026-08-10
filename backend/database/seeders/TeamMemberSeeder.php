<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name' => 'Muhammad Bilal',
                'role' => 'CEO & Founder',
                'email' => 'bilal@ipsoftware.com',
                'bio' => 'Visionary leader with 12+ years of experience in software development and business management.',
                'social_links' => ['linkedin' => '#', 'twitter' => '#', 'github' => '#'],
                'skills' => ['Leadership', 'Strategy', 'Business Development'],
            ],
            [
                'name' => 'Fatima Ahmed',
                'role' => 'CTO',
                'email' => 'fatima@ipsoftware.com',
                'bio' => 'Technical expert with deep expertise in Laravel, cloud architecture, and system design.',
                'social_links' => ['linkedin' => '#', 'twitter' => '#', 'github' => '#'],
                'skills' => ['Laravel', 'Cloud Architecture', 'System Design'],
            ],
            [
                'name' => 'Hassan Raza',
                'role' => 'Lead Developer',
                'email' => 'hassan@ipsoftware.com',
                'bio' => 'Full-stack developer with 8+ years of experience in PHP, Laravel, and Flutter.',
                'social_links' => ['linkedin' => '#', 'twitter' => '#', 'github' => '#'],
                'skills' => ['PHP', 'Laravel', 'Flutter', 'MySQL'],
            ],
            [
                'name' => 'Ayesha Noor',
                'role' => 'UI/UX Designer',
                'email' => 'ayesha@ipsoftware.com',
                'bio' => 'Creative designer with a passion for creating intuitive and beautiful user experiences.',
                'social_links' => ['linkedin' => '#', 'twitter' => '#', 'dribbble' => '#'],
                'skills' => ['Figma', 'Adobe XD', 'UI Design', 'Prototyping'],
            ],
        ];

        foreach ($members as $member) {
            TeamMember::create($member);
        }
    }
}
