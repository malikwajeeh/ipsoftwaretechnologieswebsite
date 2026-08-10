<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'What services does IP Software Technologies offer?',
                'answer' => 'We offer a comprehensive range of software development services including custom web development, Laravel development, Flutter app development, ERP solutions, CRM development, e-commerce solutions, UI/UX design, and more.',
                'order_number' => 1,
            ],
            [
                'question' => 'How do you determine project pricing?',
                'answer' => 'Our pricing is based on project complexity, required features, development timeline, and resources needed. We provide detailed quotes after understanding your specific requirements during the discovery phase.',
                'order_number' => 2,
            ],
            [
                'question' => 'Do you provide post-launch support and maintenance?',
                'answer' => 'Yes, we offer comprehensive post-launch support and maintenance packages. This includes bug fixes, performance optimization, security updates, and feature enhancements to ensure your application runs smoothly.',
                'order_number' => 3,
            ],
            [
                'question' => 'What is your development process?',
                'answer' => 'We follow an agile development process with four main phases: Discovery (requirement analysis), Design (wireframing and prototyping), Development (iterative coding with sprint demos), and Deployment (launch and ongoing support).',
                'order_number' => 4,
            ],
            [
                'question' => 'How long does it take to develop a typical project?',
                'answer' => 'Project timelines vary based on complexity. A simple website may take 4-6 weeks, while a complex ERP system could take 3-6 months. We provide detailed timelines during the discovery phase.',
                'order_number' => 5,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}