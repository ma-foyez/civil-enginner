@props([
    'transparent' => false,
    'fixed' => true
])

<header class="{{ $fixed ? 'fixed' : 'relative' }} top-0 left-0 right-0 z-50 {{ $transparent ? 'bg-transparent' : 'bg-white/95 backdrop-blur-sm shadow-sm' }} dark:bg-gray-900/95 transition-all duration-300"
        x-data="{ 
            isOpen: false, 
            scrolled: false,
            transparent: {{ $transparent ? 'true' : 'false' }}
        }"
        x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 10 })"
        :class="{ 
            'bg-white/95 backdrop-blur-sm shadow-sm dark:bg-gray-900/95': scrolled && transparent,
            'bg-transparent shadow-none': !scrolled && transparent 
        }">
    
    <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-20">
            <!-- Logo -->
            <div class="flex-shrink-0">
                <a href="{{ route('portfolio.home') }}" class="flex items-center space-x-2">
                    @if($siteSettings['site_logo_lite'])
                        <img src="{{ asset($siteSettings['site_logo_lite']) }}" 
                             alt="{{ $siteSettings['site_name'] }}" 
                             class="h-8 md:h-10 w-auto dark:hidden">
                    @endif
                    @if($siteSettings['site_logo_dark'])
                        <img src="{{ asset($siteSettings['site_logo_dark']) }}" 
                             alt="{{ $siteSettings['site_name'] }}" 
                             class="h-8 md:h-10 w-auto hidden dark:block">
                    @endif
                    @if(!$siteSettings['site_logo_lite'] && !$siteSettings['site_logo_dark'])
                        <span class="text-xl md:text-2xl font-bold text-primary">
                            {{ $siteSettings['site_name'] }}
                        </span>
                    @endif
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:block">
                <div class="ml-10 flex items-baseline space-x-8">
                    <a href="{{ route('portfolio.home') }}" 
                       class="nav-link {{ request()->routeIs('portfolio.home') ? 'active' : '' }}">
                        {{ __('Home') }}
                    </a>
                    <a href="{{ route('portfolio.about') }}" 
                       class="nav-link {{ request()->routeIs('portfolio.about') ? 'active' : '' }}">
                        {{ __('About') }}
                    </a>
                    <a href="{{ route('portfolio.projects.index') }}" 
                       class="nav-link {{ request()->routeIs('portfolio.projects.*') ? 'active' : '' }}">
                        {{ __('Portfolio') }}
                    </a>
                    <a href="{{ route('portfolio.education') }}" 
                       class="nav-link {{ request()->routeIs('portfolio.education') ? 'active' : '' }}">
                        {{ __('Education') }}
                    </a>
                    <a href="{{ route('portfolio.experience') }}" 
                       class="nav-link {{ request()->routeIs('portfolio.experience') ? 'active' : '' }}">
                        {{ __('Experience') }}
                    </a>
                    <a href="{{ route('portfolio.contact') }}" 
                       class="nav-link {{ request()->routeIs('portfolio.contact') ? 'active' : '' }}">
                        {{ __('Contact') }}
                    </a>
                </div>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button @click="isOpen = !isOpen" 
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 dark:text-gray-300 hover:text-primary hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary">
                    <span class="sr-only">Open main menu</span>
                    <iconify-icon :icon="isOpen ? 'lucide:x' : 'lucide:menu'" class="h-6 w-6"></iconify-icon>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div x-show="isOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1 bg-white/95 backdrop-blur-sm dark:bg-gray-900/95 shadow-lg rounded-lg mt-2">
                <a href="{{ route('portfolio.home') }}" 
                   class="mobile-nav-link {{ request()->routeIs('portfolio.home') ? 'active' : '' }}">
                    {{ __('Home') }}
                </a>
                <a href="{{ route('portfolio.about') }}" 
                   class="mobile-nav-link {{ request()->routeIs('portfolio.about') ? 'active' : '' }}">
                    {{ __('About') }}
                </a>
                <a href="{{ route('portfolio.projects.index') }}" 
                   class="mobile-nav-link {{ request()->routeIs('portfolio.projects.*') ? 'active' : '' }}">
                    {{ __('Portfolio') }}
                </a>
                <a href="{{ route('portfolio.education') }}" 
                   class="mobile-nav-link {{ request()->routeIs('portfolio.education') ? 'active' : '' }}">
                    {{ __('Education') }}
                </a>
                <a href="{{ route('portfolio.experience') }}" 
                   class="mobile-nav-link {{ request()->routeIs('portfolio.experience') ? 'active' : '' }}">
                    {{ __('Experience') }}
                </a>
                <a href="{{ route('portfolio.contact') }}" 
                   class="mobile-nav-link {{ request()->routeIs('portfolio.contact') ? 'active' : '' }}">
                    {{ __('Contact') }}
                </a>
            </div>
        </div>
    </nav>
</header>

<style>
    .nav-link {
        @apply text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary px-3 py-2 rounded-md text-sm font-medium transition-colors duration-200;
    }
    
    .nav-link.active {
        @apply text-primary font-semibold;
    }
    
    .mobile-nav-link {
        @apply text-gray-700 dark:text-gray-300 hover:text-primary dark:hover:text-primary hover:bg-gray-50 dark:hover:bg-gray-800 block px-3 py-2 rounded-md text-base font-medium transition-colors duration-200;
    }
    
    .mobile-nav-link.active {
        @apply text-primary bg-gray-50 dark:bg-gray-800 font-semibold;
    }
</style>
