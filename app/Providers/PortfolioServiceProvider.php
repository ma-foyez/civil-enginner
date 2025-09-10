<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\Content\ContentService;
use Illuminate\Support\ServiceProvider;

class PortfolioServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $this->registerPortfolioPostTypes();
        $this->registerPortfolioTaxonomies();
    }

    protected function registerPortfolioPostTypes(): void
    {
        $contentService = app(ContentService::class);

        // Register portfolio projects post type
        $contentService->registerPostType([
            'name' => 'project',
            'label' => 'Projects',
            'label_singular' => 'Project',
            'description' => 'Portfolio projects showcase',
            'public' => true,
            'has_archive' => true,
            'hierarchical' => false,
            'show_in_menu' => true,
            'supports_title' => true,
            'supports_editor' => true,
            'supports_thumbnail' => true,
            'supports_excerpt' => true,
            'supports_custom_fields' => true,
            'supports_taxonomies' => true,
            'taxonomies' => ['project_category', 'project_tag'],
        ]);

        // Register education post type
        $contentService->registerPostType([
            'name' => 'education',
            'label' => 'Education',
            'label_singular' => 'Education',
            'description' => 'Educational qualifications and achievements',
            'public' => true,
            'has_archive' => false,
            'hierarchical' => false,
            'show_in_menu' => true,
            'supports_title' => true,
            'supports_editor' => true,
            'supports_thumbnail' => false,
            'supports_excerpt' => true,
            'supports_custom_fields' => true,
            'supports_taxonomies' => false,
            'taxonomies' => [],
        ]);

        // Register work experience post type
        $contentService->registerPostType([
            'name' => 'experience',
            'label' => 'Work Experience',
            'label_singular' => 'Experience',
            'description' => 'Professional work experience and employment history',
            'public' => true,
            'has_archive' => false,
            'hierarchical' => false,
            'show_in_menu' => true,
            'supports_title' => true,
            'supports_editor' => true,
            'supports_thumbnail' => false,
            'supports_excerpt' => true,
            'supports_custom_fields' => true,
            'supports_taxonomies' => false,
            'taxonomies' => [],
        ]);
    }

    protected function registerPortfolioTaxonomies(): void
    {
        $contentService = app(ContentService::class);

        // Register project category taxonomy
        $contentService->registerTaxonomy([
            'name' => 'project_category',
            'label' => 'Project Categories',
            'label_singular' => 'Project Category',
            'description' => 'Categories for portfolio projects',
            'hierarchical' => true,
            'show_featured_image' => true,
        ], 'project');

        // Register project tag taxonomy
        $contentService->registerTaxonomy([
            'name' => 'project_tag',
            'label' => 'Project Tags',
            'label_singular' => 'Project Tag',
            'description' => 'Tags for portfolio projects',
            'hierarchical' => false,
            'show_featured_image' => false,
        ], 'project');
    }
}
