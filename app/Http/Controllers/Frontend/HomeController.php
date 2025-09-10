<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\AboutSectionRepository;
use App\Repositories\ExperienceRepository;
use App\Repositories\HeroSectionRepository;
use App\Repositories\PortfolioRepository;
use App\Services\PostService;

class HomeController extends Controller
{
    public function __construct(
        protected HeroSectionRepository $heroRepository,
        protected AboutSectionRepository $aboutRepository,
        protected PortfolioRepository $portfolioRepository,
        protected ExperienceRepository $experienceRepository,
        protected PostService $postService
    ) {}

    public function index()
    {
        $data = [
            'hero' => $this->heroRepository->getFirst(),
            'about' => $this->aboutRepository->getFirst(),
            'featured_projects' => $this->portfolioRepository->getFeatured(6),
            'recent_experiences' => $this->experienceRepository->getActive()->take(3),
            'blog_posts' => $this->postService->getPosts([
                'post_type' => 'post',
                'status' => 'published'
            ])->take(3),
        ];

        return view('frontend.pages.home', $data);
    }
}
