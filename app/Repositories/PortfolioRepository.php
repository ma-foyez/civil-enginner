<?php

namespace App\Repositories;

use App\Models\PortfolioProject;
use Illuminate\Database\Eloquent\Collection;

class PortfolioRepository
{
    public function __construct(
        protected PortfolioProject $model
    ) {}

    public function getActive(): Collection
    {
        return $this->model
            ->active()
            ->ordered()
            ->with(['category'])
            ->get();
    }

    public function findBySlug(string $slug): ?PortfolioProject
    {
        return $this->model
            ->where('slug', $slug)
            ->active()
            ->with(['category'])
            ->first();
    }

    public function getByCategory(int $categoryId): Collection
    {
        return $this->model
            ->where('category_id', $categoryId)
            ->active()
            ->ordered()
            ->with(['category'])
            ->get();
    }

    public function getFeatured(): Collection
    {
        // Check if we have featured projects
        $featuredProjects = $this->model
            ->active()
            ->featured()
            ->ordered()
            ->with(['category'])
            ->limit(3)
            ->get();

        // If no featured projects, fall back to getting the most recent projects
        if ($featuredProjects->isEmpty()) {
            return $this->model
                ->active()
                ->ordered()
                ->with(['category'])
                ->limit(3)
                ->get();
        }

        return $featuredProjects;
    }

    public function create(array $data): PortfolioProject
    {
        return $this->model->create($data);
    }

    public function update(PortfolioProject $project, array $data): bool
    {
        return $project->update($data);
    }

    public function delete(PortfolioProject $project): bool
    {
        return $project->delete();
    }
}
