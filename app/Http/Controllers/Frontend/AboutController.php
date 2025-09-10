<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\View\View;

class AboutController extends FrontendController
{
    public function index(): View
    {
        // Get about page content
        $aboutPage = Post::type('page')
            ->where('slug', 'about')
            ->published()
            ->first();

        // Get skills/competencies (can be stored as custom fields or separate content)
        $skills = $this->getSkills();

        // Get achievements/certifications
        $achievements = $this->getAchievements();

        return $this->renderView('frontend.pages.about', compact(
            'aboutPage',
            'skills',
            'achievements'
        ));
    }

    /**
     * Get skills data
     */
    private function getSkills(): array
    {
        // This could be stored in settings or as a custom post type
        return [
            [
                'name' => 'Structural Design',
                'percentage' => 95,
                'icon' => 'lucide:building',
            ],
            [
                'name' => 'Project Management',
                'percentage' => 90,
                'icon' => 'lucide:users',
            ],
            [
                'name' => 'AutoCAD',
                'percentage' => 88,
                'icon' => 'lucide:drafting-compass',
            ],
            [
                'name' => 'Sustainability Planning',
                'percentage' => 85,
                'icon' => 'lucide:leaf',
            ],
        ];
    }

    /**
     * Get achievements data
     */
    private function getAchievements(): array
    {
        // This could be stored in settings or as a custom post type
        return [
            [
                'title' => 'Licensed Professional Engineer',
                'organization' => 'State Engineering Board',
                'year' => '2018',
                'icon' => 'lucide:award',
            ],
            [
                'title' => 'LEED AP Certification',
                'organization' => 'U.S. Green Building Council',
                'year' => '2019',
                'icon' => 'lucide:shield-check',
            ],
            [
                'title' => 'Project Excellence Award',
                'organization' => 'Engineering Society',
                'year' => '2022',
                'icon' => 'lucide:trophy',
            ],
        ];
    }
}
