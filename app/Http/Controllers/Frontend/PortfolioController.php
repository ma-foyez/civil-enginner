<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Term;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends FrontendController
{
    public function index(Request $request): View
    {
        $query = Post::type('project')
            ->published()
            ->with(['terms', 'user']);

        // Filter by category if provided
        if ($request->filled('category')) {
            $query->whereHas('terms', function ($q) use ($request) {
                $q->where('slug', $request->category)
                  ->where('taxonomy', 'project_category');
            });
        }

        // Filter by tag if provided
        if ($request->filled('tag')) {
            $query->whereHas('terms', function ($q) use ($request) {
                $q->where('slug', $request->tag)
                  ->where('taxonomy', 'project_tag');
            });
        }

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('excerpt', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%");
            });
        }

        $projects = $query->latest('published_at')->paginate(12);

        // Get project categories for filter
        $categories = Term::where('taxonomy', 'project_category')
            ->whereHas('posts', function ($q) {
                $q->where('post_type', 'project')->where('status', 'published');
            })
            ->withCount(['posts' => function ($q) {
                $q->where('post_type', 'project')->where('status', 'published');
            }])
            ->get();

        // Get project tags for filter
        $tags = Term::where('taxonomy', 'project_tag')
            ->whereHas('posts', function ($q) {
                $q->where('post_type', 'project')->where('status', 'published');
            })
            ->withCount(['posts' => function ($q) {
                $q->where('post_type', 'project')->where('status', 'published');
            }])
            ->get();

        return $this->renderView('frontend.pages.portfolio.index', compact(
            'projects',
            'categories',
            'tags'
        ));
    }

    public function show(string $slug): View
    {
        $project = Post::type('project')
            ->where('slug', $slug)
            ->published()
            ->with(['terms', 'user'])
            ->firstOrFail();

        // Get related projects (same categories, exclude current)
        $relatedProjects = Post::type('project')
            ->published()
            ->where('id', '!=', $project->id)
            ->whereHas('terms', function ($q) use ($project) {
                $categoryIds = $project->terms->where('taxonomy', 'project_category')->pluck('id');
                if ($categoryIds->isNotEmpty()) {
                    $q->whereIn('id', $categoryIds);
                }
            })
            ->limit(3)
            ->get();

        // If no related projects by category, get latest projects
        if ($relatedProjects->isEmpty()) {
            $relatedProjects = Post::type('project')
                ->published()
                ->where('id', '!=', $project->id)
                ->latest('published_at')
                ->limit(3)
                ->get();
        }

        return $this->renderView('frontend.pages.portfolio.show', compact(
            'project',
            'relatedProjects'
        ));
    }
}
