<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\View\View;

class HomeController extends FrontendController
{
    public function index(): View
    {
        // Get hero section content (from a page with specific slug or settings)
        $heroContent = $this->getHeroContent();
        
        // Get featured projects (latest 6 projects)
        $featuredProjects = Post::type('project')
            ->published()
            ->with(['terms'])
            ->latest('published_at')
            ->limit(6)
            ->get();

        // Get latest education entries
        $education = Post::type('education')
            ->published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        // Get latest work experience
        $experience = Post::type('experience')
            ->published()
            ->latest('published_at')
            ->limit(3)
            ->get();

        return $this->renderView('frontend.pages.home', compact(
            'heroContent',
            'featuredProjects',
            'education',
            'experience'
        ));
    }

    /**
     * Get hero section content
     */
    private function getHeroContent(): array
    {
        // Check if there's a page with slug 'hero' or use default content
        $heroPage = Post::type('page')
            ->where('slug', 'hero')
            ->published()
            ->first();

        if ($heroPage) {
            return [
                'title' => $heroPage->title,
                'subtitle' => $heroPage->excerpt,
                'content' => $heroPage->content,
                'featured_image' => $heroPage->getFeaturedImageUrl('large'),
            ];
        }

        // Default hero content
        return [
            'title' => config('settings.hero_title', 'Professional Civil Engineer'),
            'subtitle' => config('settings.hero_subtitle', 'Designing and building the infrastructure of tomorrow'),
            'content' => config('settings.hero_content', 'Welcome to my portfolio showcasing innovative civil engineering projects, sustainable solutions, and professional expertise in construction and infrastructure development.'),
            'featured_image' => config('settings.hero_image'),
        ];
    }
}
