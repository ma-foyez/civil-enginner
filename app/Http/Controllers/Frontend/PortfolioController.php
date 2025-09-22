<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Repositories\PortfolioRepository;
use App\Models\Term;

class PortfolioController extends Controller
{
    public function __construct(
        protected PortfolioRepository $portfolioRepository
    ) {}

    public function index()
    {
        $data = [
            'projects' => $this->portfolioRepository->getActive(),
            'categories' => Term::where('taxonomy', 'portfolio_category')->get(),
        ];

        return view('frontend.pages.portfolio.index', $data);
    }

    public function show(string $slug)
    {
        $project = $this->portfolioRepository->findBySlug($slug);

        if (!$project) {
            abort(404);
        }

        $relatedProjects = $this->portfolioRepository->getByCategory($project->category_id)
            ->where('id', '!=', $project->id)
            ->take(3);

        return view('frontend.pages.portfolio.show', compact('project', 'relatedProjects'));
    }
}
