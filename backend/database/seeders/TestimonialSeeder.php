<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Ahmed Khan',
                'client_role' => 'CEO',
                'client_company' => 'TechVentures Pakistan',
                'rating' => 5,
                'testimonial' => 'IP Software Technologies delivered an exceptional ERP system that transformed our operations. Their team was professional, responsive, and truly understood our business needs.',
            ],
            [
                'client_name' => 'Sarah Malik',
                'client_role' => 'Founder',
                'client_company' => 'EduLearn Solutions',
                'rating' => 5,
                'testimonial' => 'The e-learning platform they built exceeded our expectations. The UI/UX is intuitive, and the performance is outstanding. Highly recommend their services!',
            ],
            [
                'client_name' => 'Usman Ali',
                'client_role' => 'CTO',
                'client_company' => 'RetailPro International',
                'rating' => 5,
                'testimonial' => 'Working with IP Software Technologies was a game-changer for our e-commerce platform. They delivered on time, within budget, and with exceptional quality.',
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}