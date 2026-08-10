<?php

namespace Database\Seeders;

use App\Models\Process;
use Illuminate\Database\Seeder;

class ProcessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $steps = [
            [
                'title' => 'Discovery',
                'step_number' => 1,
                'description' => 'We analyze your requirements, understand your business goals, and create a detailed project roadmap.',
                'icon' => 'fas fa-search',
            ],
            [
                'title' => 'Design',
                'step_number' => 2,
                'description' => 'Our design team creates intuitive wireframes and visually stunning prototypes for your approval.',
                'icon' => 'fas fa-pencil-ruler',
            ],
            [
                'title' => 'Development',
                'step_number' => 3,
                'description' => 'Our developers build your solution using agile methodology with regular sprint demos.',
                'icon' => 'fas fa-laptop-code',
            ],
            [
                'title' => 'Deployment',
                'step_number' => 4,
                'description' => 'We deploy your application to production and provide ongoing support and maintenance.',
                'icon' => 'fas fa-rocket',
            ],
        ];

        foreach ($steps as $step) {
            Process::create($step);
        }
    }
}