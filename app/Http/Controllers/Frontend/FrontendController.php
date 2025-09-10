<?php

declare(strict_types=1);

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

abstract class FrontendController extends Controller
{
    public function __construct()
    {
        // Share common data with all frontend views
        View::share([
            'siteSettings' => $this->getSiteSettings(),
            'themeColors' => $this->getThemeColors(),
        ]);
    }

    /**
     * Get site settings for frontend
     */
    protected function getSiteSettings(): array
    {
        return [
            'site_name' => config('settings.app_name', 'Civil Engineer Portfolio'),
            'site_description' => config('settings.app_description', 'Professional Civil Engineer Portfolio'),
            'site_logo_lite' => config('settings.site_logo_lite'),
            'site_logo_dark' => config('settings.site_logo_dark'),
            'site_icon' => config('settings.site_icon'),
            'site_favicon' => config('settings.site_favicon'),
        ];
    }

    /**
     * Get theme colors for frontend
     */
    protected function getThemeColors(): array
    {
        return [
            'primary' => config('settings.theme_primary_color', '#635bff'),
            'secondary' => config('settings.theme_secondary_color', '#1f2937'),
        ];
    }

    /**
     * Render view with common layout data
     */
    protected function renderView(string $view, array $data = []): \Illuminate\View\View
    {
        return view($view, $data);
    }
}
