<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProjectCategory;
use App\Models\Project;

class DummyProjectSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Web Application', 'slug' => 'web-application', 'is_active' => true, 'order_number' => 1],
            ['name' => 'Mobile App', 'slug' => 'mobile-app', 'is_active' => true, 'order_number' => 2],
            ['name' => 'ERP System', 'slug' => 'erp-system', 'is_active' => true, 'order_number' => 3],
            ['name' => 'E-Commerce', 'slug' => 'e-commerce', 'is_active' => true, 'order_number' => 4],
        ];

        foreach ($categories as $cat) {
            ProjectCategory::updateOrCreate(['slug' => $cat['slug']], $cat);
        }

        $webCat = ProjectCategory::where('slug', 'web-application')->first();
        $mobileCat = ProjectCategory::where('slug', 'mobile-app')->first();
        $erpCat = ProjectCategory::where('slug', 'erp-system')->first();
        $ecomCat = ProjectCategory::where('slug', 'e-commerce')->first();

        $projects = [
            [
                'title' => 'HealthTrack Pro',
                'slug' => 'healthtrack-pro',
                'description' => 'A comprehensive healthcare management platform built for clinics and hospitals. Features include patient records management, appointment scheduling, billing integration, and real-time reporting dashboard.',
                'short_description' => 'Healthcare management platform for clinics with patient records, appointments, and billing.',
                'category_id' => $webCat->id,
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Bootstrap'],
                'client_name' => 'HealthTrack Inc.',
                'project_url' => 'https://healthtrackpro.example.com',
                'is_featured' => true,
                'is_active' => true,
                'order_number' => 1,
            ],
            [
                'title' => 'ShopEase',
                'slug' => 'shopease',
                'description' => 'A full-featured e-commerce platform with multi-vendor support, real-time inventory tracking, payment gateway integration, and an AI-powered product recommendation engine.',
                'short_description' => 'Multi-vendor e-commerce platform with AI recommendations and payment integration.',
                'category_id' => $ecomCat->id,
                'technologies' => ['Laravel', 'React', 'Stripe', 'AWS', 'Tailwind CSS'],
                'client_name' => 'ShopEase LLC',
                'project_url' => 'https://shopease.example.com',
                'is_featured' => true,
                'is_active' => true,
                'order_number' => 2,
            ],
            [
                'title' => 'FleetGuard',
                'slug' => 'fleetguard',
                'description' => 'A real-time fleet management and GPS tracking application for logistics companies. Includes route optimization, driver management, fuel tracking, and automated reporting.',
                'short_description' => 'Fleet management and GPS tracking app with route optimization and fuel tracking.',
                'category_id' => $mobileCat->id,
                'technologies' => ['Flutter', 'Dart', 'Firebase', 'Google Maps API', 'Node.js'],
                'client_name' => 'FleetGuard Logistics',
                'project_url' => null,
                'is_featured' => true,
                'is_active' => true,
                'order_number' => 3,
            ],
            [
                'title' => 'EduVerse LMS',
                'slug' => 'eduverse-lms',
                'description' => 'A modern learning management system with live class integration, assignment tracking, progress analytics, and certificate generation. Used by 50+ educational institutions.',
                'short_description' => 'Modern LMS with live classes, assignments, analytics, and certificates.',
                'category_id' => $webCat->id,
                'technologies' => ['Laravel', 'Livewire', 'MySQL', 'WebRTC', 'Bootstrap'],
                'client_name' => 'EduVerse Academy',
                'project_url' => 'https://eduverse.example.com',
                'is_featured' => false,
                'is_active' => true,
                'order_number' => 4,
            ],
            [
                'title' => 'AgriSmart',
                'slug' => 'agrismart',
                'description' => 'An ERP solution for agricultural businesses managing inventory, supply chain, procurement, and sales. Features real-time crop tracking, vendor management, and financial reporting.',
                'short_description' => 'ERP solution for agriculture with inventory, supply chain, and financial reporting.',
                'category_id' => $erpCat->id,
                'technologies' => ['Laravel', 'Vue.js', 'MySQL', 'Chart.js', 'Bootstrap'],
                'client_name' => 'AgriSmart Farms',
                'project_url' => null,
                'is_featured' => false,
                'is_active' => true,
                'order_number' => 5,
            ],
            [
                'title' => 'FoodieApp',
                'slug' => 'foodieapp',
                'description' => 'A food delivery mobile application with real-time order tracking, restaurant management panel, driver app, and integrated payment system. Supports 200+ restaurants.',
                'short_description' => 'Food delivery app with real-time tracking, restaurant panel, and driver app.',
                'category_id' => $mobileCat->id,
                'technologies' => ['Flutter', 'Firebase', 'Google Maps API', 'Stripe', 'Node.js'],
                'client_name' => 'FoodieApp Inc.',
                'project_url' => null,
                'is_featured' => true,
                'is_active' => true,
                'order_number' => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
