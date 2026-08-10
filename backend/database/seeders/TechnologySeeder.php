<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Seeder;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = [
            [
                'name' => 'Laravel',
                'slug' => 'laravel',
                'icon' => 'fab fa-laravel',
                'color' => '#FF2D20',
                'category' => 'Backend',
                'proficiency' => 95,
            ],
            [
                'name' => 'PHP',
                'slug' => 'php',
                'icon' => 'fab fa-php',
                'color' => '#777BB4',
                'category' => 'Backend',
                'proficiency' => 95,
            ],
            [
                'name' => 'Flutter',
                'slug' => 'flutter',
                'icon' => 'fas fa-mobile-alt',
                'color' => '#02569B',
                'category' => 'Mobile',
                'proficiency' => 90,
            ],
            [
                'name' => 'MySQL',
                'slug' => 'mysql',
                'icon' => 'fas fa-database',
                'color' => '#4479A1',
                'category' => 'Database',
                'proficiency' => 92,
            ],
            [
                'name' => 'HTML5',
                'slug' => 'html5',
                'icon' => 'fab fa-html5',
                'color' => '#E34F26',
                'category' => 'Frontend',
                'proficiency' => 98,
            ],
            [
                'name' => 'CSS3',
                'slug' => 'css3',
                'icon' => 'fab fa-css3-alt',
                'color' => '#1572B6',
                'category' => 'Frontend',
                'proficiency' => 95,
            ],
            [
                'name' => 'JavaScript',
                'slug' => 'javascript',
                'icon' => 'fab fa-js',
                'color' => '#F7DF1E',
                'category' => 'Frontend',
                'proficiency' => 90,
            ],
            [
                'name' => 'Bootstrap',
                'slug' => 'bootstrap',
                'icon' => 'fab fa-bootstrap',
                'color' => '#7952B3',
                'category' => 'Frontend',
                'proficiency' => 92,
            ],
            [
                'name' => 'Git',
                'slug' => 'git',
                'icon' => 'fab fa-git-alt',
                'color' => '#F05032',
                'category' => 'DevOps',
                'proficiency' => 88,
            ],
            [
                'name' => 'GitHub',
                'slug' => 'github',
                'icon' => 'fab fa-github',
                'color' => '#181717',
                'category' => 'DevOps',
                'proficiency' => 90,
            ],
            [
                'name' => 'Node.js',
                'slug' => 'nodejs',
                'icon' => 'fab fa-node-js',
                'color' => '#339933',
                'category' => 'Backend',
                'proficiency' => 82,
            ],
            [
                'name' => 'React',
                'slug' => 'react',
                'icon' => 'fab fa-react',
                'color' => '#61DAFB',
                'category' => 'Frontend',
                'proficiency' => 80,
            ],
        ];

        foreach ($technologies as $technology) {
            Technology::create($technology);
        }
    }
}