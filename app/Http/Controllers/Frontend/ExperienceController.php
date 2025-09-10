<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\View\View;

class ExperienceController extends FrontendController
{
    public function index(): View
    {
        // Get all work experience entries, ordered by date (most recent first)
        $experience = Post::type('experience')
            ->published()
            ->latest('published_at')
            ->get();

        // Get experience page content if exists
        $experiencePage = Post::type('page')
            ->where('slug', 'experience')
            ->published()
            ->first();

        return $this->renderView('frontend.pages.experience', compact(
            'experience',
            'experiencePage'
        ));
    }
}
