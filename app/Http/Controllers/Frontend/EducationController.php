<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\View\View;

class EducationController extends FrontendController
{
    public function index(): View
    {
        // Get all education entries, ordered by date (most recent first)
        $education = Post::type('education')
            ->published()
            ->latest('published_at')
            ->get();

        // Get education page content if exists
        $educationPage = Post::type('page')
            ->where('slug', 'education')
            ->published()
            ->first();

        return $this->renderView('frontend.pages.education', compact(
            'education',
            'educationPage'
        ));
    }
}
