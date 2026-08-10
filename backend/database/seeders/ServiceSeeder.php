<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Custom Web Development',
                'description' => 'We build tailor-made web applications that perfectly align with your business requirements.',
                'short_description' => 'Custom-built web applications tailored to your business needs.',
                'icon' => 'fas fa-code',
                'features' => ['Full-stack development', 'API integration', 'Scalable architecture', 'Performance optimization'],
            ],
            [
                'title' => 'Laravel Development',
                'description' => 'Our Laravel development team creates robust, secure, and maintainable web applications.',
                'short_description' => 'Robust and secure web applications using Laravel framework.',
                'icon' => 'fab fa-laravel',
                'features' => ['Eloquent ORM integration', 'Blade templating', 'RESTful API development', 'Laravel ecosystem tools'],
            ],
            [
                'title' => 'PHP Development',
                'description' => 'We offer comprehensive PHP development services for dynamic web applications.',
                'short_description' => 'Dynamic web applications using PHP and its frameworks.',
                'icon' => 'fab fa-php',
                'features' => ['Custom PHP development', 'Framework expertise', 'Database integration', 'Legacy system modernization'],
            ],
            [
                'title' => 'Flutter App Development',
                'description' => 'We create beautiful cross-platform mobile applications using Flutter.',
                'short_description' => 'Cross-platform mobile apps with beautiful UI and native performance.',
                'icon' => 'fas fa-mobile-alt',
                'features' => ['Single codebase for iOS & Android', 'Native performance', 'Beautiful custom UI', 'Fast development cycle'],
            ],
            [
                'title' => 'ERP Solutions',
                'description' => 'We develop comprehensive ERP systems that integrate all your business processes.',
                'short_description' => 'Integrated enterprise resource planning systems for business efficiency.',
                'icon' => 'fas fa-building',
                'features' => ['Unified business platform', 'Real-time data insights', 'Process automation', 'Custom module development'],
            ],
            [
                'title' => 'CRM Development',
                'description' => 'Our custom CRM development services help you manage customer relationships.',
                'short_description' => 'Customer relationship management systems to boost sales and engagement.',
                'icon' => 'fas fa-users',
                'features' => ['Lead management', 'Sales pipeline tracking', 'Customer interaction history', 'Analytics and reporting'],
            ],
            [
                'title' => 'HR Management Systems',
                'description' => 'We develop HR management systems that automate your human resource processes.',
                'short_description' => 'Automated HR solutions for efficient workforce management.',
                'icon' => 'fas fa-user-tie',
                'features' => ['Employee lifecycle management', 'Payroll automation', 'Attendance tracking', 'Performance management'],
            ],
            [
                'title' => 'E-Commerce Development',
                'description' => 'We build powerful e-commerce platforms that drive online sales.',
                'short_description' => 'Feature-rich e-commerce platforms to grow your online business.',
                'icon' => 'fas fa-shopping-cart',
                'features' => ['Custom shopping cart', 'Payment gateway integration', 'Inventory management', 'SEO optimization'],
            ],
            [
                'title' => 'API Development',
                'description' => 'We design and develop robust RESTful APIs for seamless application integration.',
                'short_description' => 'Secure and scalable RESTful APIs for seamless application integration.',
                'icon' => 'fas fa-plug',
                'features' => ['RESTful API design', 'Authentication & authorization', 'API documentation', 'Rate limiting & security'],
            ],
            [
                'title' => 'UI/UX Design',
                'description' => 'Our design team creates intuitive and user-centered digital experiences.',
                'short_description' => 'User-centered designs that combine aesthetics with functionality.',
                'icon' => 'fas fa-paint-brush',
                'features' => ['User research & personas', 'Wireframing & prototyping', 'Visual design', 'Usability testing'],
            ],
            [
                'title' => 'Software Maintenance',
                'description' => 'We provide comprehensive software maintenance services.',
                'short_description' => 'Ongoing support and maintenance to keep your software running smoothly.',
                'icon' => 'fas fa-tools',
                'features' => ['Bug fixing & debugging', 'Performance optimization', 'Security updates', 'Feature enhancements'],
            ],
            [
                'title' => 'Cloud Deployment',
                'description' => 'We help businesses migrate to and deploy on cloud platforms.',
                'short_description' => 'Cloud migration and deployment for scalability and reliability.',
                'icon' => 'fas fa-cloud',
                'features' => ['Cloud migration strategy', 'AWS/Azure/GCP deployment', 'Infrastructure optimization', 'Monitoring & scaling'],
            ],
        ];

        foreach ($services as $service) {
            $service['slug'] = Str::slug($service['title']);
            Service::create($service);
        }
    }
}
