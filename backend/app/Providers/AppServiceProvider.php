<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Models\SeoSetting;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('frontend.layouts.app', function ($view) {
            if ($view->offsetExists('seo_title')) {
                return;
            }

            $page = Route::currentRouteName();

            $seo = SeoSetting::where('page', $page)->where('is_active', true)->first();

            $defaults = [
                'home' => [
                    'title' => 'IP Software Technologies | Premium Software Development Company',
                    'description' => 'IP Software Technologies - Premium Software Development Company. We build world-class web applications, mobile apps, ERP systems, and custom software solutions.',
                    'keywords' => 'software house, web development, laravel, php, flutter, ERP, CRM, mobile app development',
                ],
                'about' => [
                    'title' => 'About IP Software Technologies',
                    'description' => 'About IP Software Technologies - Learn about our mission, vision, values, and the passionate team behind world-class software solutions.',
                    'keywords' => 'about IP Software Technologies, software company, our story, mission, vision, team',
                ],
                'services' => [
                    'title' => 'Our Services - IP Software Technologies',
                    'description' => 'IP Software Technologies - Our Services. Custom web development, Laravel, PHP, Flutter apps, ERP, CRM, e-commerce, API development, UI/UX design, and more.',
                    'keywords' => 'web development services, laravel development, php development, flutter app, ERP solutions, CRM development, e-commerce, API development, UI/UX design',
                ],
                'projects' => [
                    'title' => 'Our Projects - IP Software Technologies',
                    'description' => 'IP Software Technologies - Explore our portfolio of successful projects including web applications, mobile apps, ERP systems, and e-commerce platforms.',
                    'keywords' => 'projects, portfolio, web development, mobile apps, ERP, e-commerce, Laravel, Flutter',
                ],
                'technologies' => [
                    'title' => 'Our Technologies - IP Software Technologies',
                    'description' => 'IP Software Technologies - Our Technology Stack. Explore the modern technologies we use: Laravel, PHP, Flutter, React, Node.js, MySQL, and more.',
                    'keywords' => 'technologies, laravel, php, flutter, react, node.js, mysql, javascript, html5, css3, bootstrap, git, github, aws',
                ],
                'team' => [
                    'title' => 'Our Team - IP Software Technologies',
                    'description' => 'Meet the talented team behind IP Software Technologies - Expert developers, designers, and tech leaders building world-class digital solutions.',
                    'keywords' => 'IP Software Technologies team, software developers, tech team, Laravel developers, Flutter developers',
                ],
                'testimonials' => [
                    'title' => 'Client Testimonials - IP Software Technologies',
                    'description' => 'Read what our clients say about IP Software Technologies. Real testimonials from businesses we have helped with web development, mobile apps, ERP systems, and custom software solutions.',
                    'keywords' => 'client testimonials, software company reviews, IP Software Technologies feedback, client success stories',
                ],
                'careers' => [
                    'title' => 'Careers - IP Software Technologies',
                    'description' => 'Join IP Software Technologies - Explore exciting career opportunities in web development, mobile apps, UI/UX design, and more.',
                    'keywords' => 'careers, jobs, software developer, laravel developer, flutter developer, UI/UX designer, PHP developer',
                ],
                'contact' => [
                    'title' => 'Contact Us - IP Software Technologies',
                    'description' => 'Contact IP Software Technologies - Get in touch for custom software development, web applications, mobile apps, ERP solutions, and more.',
                    'keywords' => 'contact, software development, web development, laravel, php, flutter, ERP, CRM, mobile app development',
                ],
            ];

            $default = $defaults[$page] ?? $defaults['home'];

            $seoData = [
                'seo_title' => $seo->title ?? $default['title'],
                'seo_description' => $seo->description ?? $default['description'],
                'seo_keywords' => $seo->keywords ?? $default['keywords'],
                'seo_og_image' => $seo->og_image ?? null,
                'seo_canonical' => $seo->canonical_url ?? null,
            ];

            $view->with($seoData);
        });
    }
}
