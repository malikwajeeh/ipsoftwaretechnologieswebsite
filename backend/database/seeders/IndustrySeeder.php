<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $industries = [
            [
                'name' => 'Healthcare',
                'slug' => 'healthcare',
                'icon' => 'fas fa-heartbeat',
                'description' => 'Digital solutions for healthcare providers, clinics, and medical institutions.',
            ],
            [
                'name' => 'Education',
                'slug' => 'education',
                'icon' => 'fas fa-graduation-cap',
                'description' => 'E-learning platforms and educational technology solutions.',
            ],
            [
                'name' => 'Retail',
                'slug' => 'retail',
                'icon' => 'fas fa-store',
                'description' => 'E-commerce and retail management systems.',
            ],
            [
                'name' => 'Finance',
                'slug' => 'finance',
                'icon' => 'fas fa-wallet',
                'description' => 'Financial software and banking solutions.',
            ],
            [
                'name' => 'Logistics',
                'slug' => 'logistics',
                'icon' => 'fas fa-truck',
                'description' => 'Supply chain and logistics management systems.',
            ],
            [
                'name' => 'Real Estate',
                'slug' => 'real-estate',
                'icon' => 'fas fa-home',
                'description' => 'Property management and real estate platforms.',
            ],
            [
                'name' => 'Food & Beverage',
                'slug' => 'food-beverage',
                'icon' => 'fas fa-utensils',
                'description' => 'Restaurant management and food delivery solutions.',
            ],
            [
                'name' => 'Travel',
                'slug' => 'travel',
                'icon' => 'fas fa-plane',
                'description' => 'Travel booking and tourism management systems.',
            ],
        ];

        foreach ($industries as $industry) {
            Industry::create($industry);
        }
    }
}