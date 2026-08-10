<?php

namespace Database\Seeders;

use App\Models\JobOpening;
use Illuminate\Database\Seeder;

class JobOpeningSeeder extends Seeder
{
    public function run(): void
    {
        $jobs = [
            [
                'title' => 'Senior Laravel Developer',
                'slug' => 'senior-laravel-developer',
                'department' => 'Engineering',
                'type' => 'full-time',
                'location' => 'Lahore, Pakistan',
                'description' => 'We are looking for an experienced Laravel developer to join our team.',
                'requirements' => ['5+ years Laravel experience', 'MySQL expertise', 'REST API development', 'Git workflow'],
                'salary_range' => 'PKR 150,000 - 250,000',
            ],
            [
                'title' => 'Flutter Developer',
                'slug' => 'flutter-developer',
                'department' => 'Engineering',
                'type' => 'full-time',
                'location' => 'Lahore, Pakistan',
                'description' => 'Join our mobile team to build cross-platform apps with Flutter.',
                'requirements' => ['2+ years Flutter experience', 'Dart proficiency', 'Firebase integration', 'REST APIs'],
                'salary_range' => 'PKR 100,000 - 180,000',
            ],
            [
                'title' => 'UI/UX Designer',
                'slug' => 'ui-ux-designer',
                'department' => 'Design',
                'type' => 'full-time',
                'location' => 'Lahore, Pakistan',
                'description' => 'Create stunning user interfaces and experiences for our clients.',
                'requirements' => ['3+ years UI/UX experience', 'Figma expertise', 'User research', 'Prototyping'],
                'salary_range' => 'PKR 80,000 - 150,000',
            ],
        ];

        foreach ($jobs as $job) {
            JobOpening::create($job);
        }
    }
}
