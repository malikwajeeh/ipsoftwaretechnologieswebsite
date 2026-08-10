<?php

namespace Database\Seeders;

use App\Models\ProjectCategory;
use Illuminate\Database\Seeder;

class ProjectCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Web App',
                'slug' => 'web-app',
                'description' => 'Web applications and platforms built with modern technologies.',
            ],
            [
                'name' => 'Mobile',
                'slug' => 'mobile',
                'description' => 'Cross-platform and native mobile applications.',
            ],
            [
                'name' => 'ERP',
                'slug' => 'erp',
                'description' => 'Enterprise resource planning systems and business solutions.',
            ],
            [
                'name' => 'E-Commerce',
                'slug' => 'e-commerce',
                'description' => 'Online stores and e-commerce platforms.',
            ],
        ];

        foreach ($categories as $category) {
            ProjectCategory::create($category);
        }
    }
}