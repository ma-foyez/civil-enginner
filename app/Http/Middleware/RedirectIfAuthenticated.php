<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Only redirect authenticated users when accessing login pages or register pages
        if (Auth::guard($guard)->check() && ($request->is('login') || $request->is('admin/login') || $request->is('register'))) {
            // For admin-related paths, redirect to admin dashboard
            if (str_starts_with($request->path(), 'admin')) {
                return redirect(RouteServiceProvider::ADMIN_DASHBOARD);
            }

            // For non-admin paths, redirect to home
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
