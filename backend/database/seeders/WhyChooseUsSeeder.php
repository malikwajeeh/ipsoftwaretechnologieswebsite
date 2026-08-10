<?php

namespace Database\Seeders;

use App\Models\WhyChooseUs;
use Illuminate\Database\Seeder;

class WhyChooseUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Fast Delivery',
                'icon' => 'fas fa-bolt',
                'description' => 'We ensure timely delivery of projects without compromising quality.',
            ],
            [
                'title' => 'Secure Solutions',
                'icon' => 'fas fa-shield-alt',
                'description' => 'Security is built into every layer of our solutions.',
            ],
            [
                'title' => '24/7 Support',
                'icon' => 'fas fa-headset',
                'description' => 'Round-the-clock technical support for all our clients.',
            ],
            [
                'title' => 'Clean Code',
                'icon' => 'fas fa-code',
                'description' => 'We write maintainable, well-documented code following best practices.',
            ],
            [
                'title' => 'Transparent Process',
                'icon' => 'fas fa-eye',
                'description' => 'Complete visibility into project progress and milestones.',
            ],
            [
                'title' => 'Scalable Architecture',
                'icon' => 'fas fa-expand-arrows-alt',
                'description' => 'Solutions designed to grow with your business needs.',
            ],
        ];

        foreach ($items as $item) {
            WhyChooseUs::create($item);
        }
    }
}