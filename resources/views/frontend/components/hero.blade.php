@props([
    'title' => 'Professional Civil Engineer',
    'subtitle' => 'Designing and building the infrastructure of tomorrow',
    'description' => 'Welcome to my portfolio showcasing innovative civil engineering projects, sustainable solutions, and professional expertise.',
    'backgroundImage' => null,
    'ctaText' => 'View My Work',
    'ctaUrl' => null,
    'secondaryCtaText' => 'Get In Touch',
    'secondaryCtaUrl' => null,
    'height' => 'min-h-screen'
])

<section class="relative {{ $height }} flex items-center justify-center overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0 z-0">
        @if($backgroundImage)
            <img src="{{ $backgroundImage }}" 
                 alt="Hero Background" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/50"></div>
        @else
            <div class="w-full h-full bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900"></div>
            <!-- Animated background shapes -->
            <div class="absolute inset-0">
                <div class="absolute top-10 left-10 w-72 h-72 bg-primary/10 rounded-full mix-blend-multiply filter blur-xl animate-blob"></div>
                <div class="absolute top-20 right-10 w-72 h-72 bg-blue-500/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-2000"></div>
                <div class="absolute -bottom-8 left-20 w-72 h-72 bg-purple-500/10 rounded-full mix-blend-multiply filter blur-xl animate-blob animation-delay-4000"></div>
            </div>
        @endif
    </div>

    <!-- Content -->
    <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="max-w-4xl mx-auto">
            <!-- Badge/Label -->
            <div class="mb-6">
                <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-primary/10 text-primary border border-primary/20">
                    <iconify-icon icon="lucide:hard-hat" class="w-4 h-4 mr-2"></iconify-icon>
                    {{ __('Civil Engineer') }}
                </span>
            </div>

            <!-- Main Title -->
            <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-bold text-white mb-6 leading-tight">
                {{ $title }}
            </h1>

            <!-- Subtitle -->
            @if($subtitle)
                <p class="text-xl sm:text-2xl lg:text-3xl text-gray-200 mb-8 font-light">
                    {{ $subtitle }}
                </p>
            @endif

            <!-- Description -->
            @if($description)
                <p class="text-lg text-gray-300 mb-12 max-w-2xl mx-auto leading-relaxed">
                    {{ $description }}
                </p>
            @endif

            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                @if($ctaUrl)
                    <a href="{{ $ctaUrl }}" 
                       class="inline-flex items-center px-8 py-4 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-105 hover:shadow-lg">
                        <iconify-icon icon="lucide:eye" class="w-5 h-5 mr-2"></iconify-icon>
                        {{ $ctaText }}
                    </a>
                @endif

                @if($secondaryCtaUrl)
                    <a href="{{ $secondaryCtaUrl }}" 
                       class="inline-flex items-center px-8 py-4 bg-transparent hover:bg-white/10 text-white font-medium rounded-lg border-2 border-white/30 hover:border-white/50 transition-all duration-300">
                        <iconify-icon icon="lucide:mail" class="w-5 h-5 mr-2"></iconify-icon>
                        {{ $secondaryCtaText }}
                    </a>
                @endif
            </div>

            <!-- Scroll Down Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
                <iconify-icon icon="lucide:chevron-down" class="w-6 h-6 text-white/70"></iconify-icon>
            </div>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-white to-transparent"></div>
</section>

<style>
    @keyframes blob {
        0% { transform: translate(0px, 0px) scale(1); }
        33% { transform: translate(30px, -50px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
        100% { transform: translate(0px, 0px) scale(1); }
    }
    
    .animate-blob {
        animation: blob 7s infinite;
    }
    
    .animation-delay-2000 {
        animation-delay: 2s;
    }
    
    .animation-delay-4000 {
        animation-delay: 4s;
    }
</style>
