<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- SEO Meta Tags -->
    <title>{{ isset($pageTitle) ? $pageTitle . ' - ' . $siteSettings['site_name'] : $siteSettings['site_name'] }}</title>
    <meta name="description" content="{{ $metaDescription ?? $siteSettings['site_description'] }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'civil engineer, portfolio, construction, infrastructure, engineering' }}">
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="{{ isset($pageTitle) ? $pageTitle . ' - ' . $siteSettings['site_name'] : $siteSettings['site_name'] }}">
    <meta property="og:description" content="{{ $metaDescription ?? $siteSettings['site_description'] }}">
    <meta property="og:image" content="{{ $ogImage ?? asset($siteSettings['site_logo_lite'] ?? '/images/default-og.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">

    <!-- Favicon -->
    @if($siteSettings['site_favicon'])
        <link rel="icon" type="image/x-icon" href="{{ asset($siteSettings['site_favicon']) }}">
    @endif

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Iconify -->
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Dynamic Theme Colors -->
    <style>
        :root {
            --color-primary: {{ $themeColors['primary'] }};
            --color-secondary: {{ $themeColors['secondary'] }};
        }
        
        .text-primary { color: var(--color-primary) !important; }
        .bg-primary { background-color: var(--color-primary) !important; }
        .border-primary { border-color: var(--color-primary) !important; }
        .hover\:bg-primary:hover { background-color: var(--color-primary) !important; }
        .hover\:text-primary:hover { color: var(--color-primary) !important; }
        .focus\:ring-primary:focus { --tw-ring-color: var(--color-primary) !important; }
    </style>

    <!-- Custom CSS -->
    @if(!empty(config('settings.global_custom_css')))
        <style>
            {!! config('settings.global_custom_css') !!}
        </style>
    @endif

    @stack('styles')
</head>
<body class="font-sans antialiased bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    <!-- Header -->
    <x-frontend.header />

    <!-- Main Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-frontend.footer />

    <!-- Toast Notifications -->
    @if(session('success'))
        <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2" x-init="setTimeout(() => show = false, 5000)"
             class="fixed top-4 right-4 z-50 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 translate-y-2" x-init="setTimeout(() => show = false, 5000)"
             class="fixed top-4 right-4 z-50 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('error') }}
        </div>
    @endif

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <!-- Custom JavaScript -->
    @if(!empty(config('settings.global_custom_js')))
        <script>
            {!! config('settings.global_custom_js') !!}
        </script>
    @endif

    @stack('scripts')
</body>
</html>
