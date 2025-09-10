<x-frontend.layouts.app>
    @php
        $pageTitle = __('Home');
        $metaDescription = $siteSettings['site_description'];
    @endphp

    <!-- Hero Section -->
    <x-frontend.hero 
        :title="$heroContent['title']"
        :subtitle="$heroContent['subtitle']"
        :description="$heroContent['content']"
        :background-image="$heroContent['featured_image']"
        :cta-url="route('portfolio.projects.index')"
        :secondary-cta-url="route('portfolio.contact')"
    />

    <!-- Featured Projects Section -->
    @if($featuredProjects->isNotEmpty())
        <section class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Section Header -->
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ __('Featured Projects') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
                        {{ __('Explore some of my recent engineering projects that showcase innovation, sustainability, and technical excellence.') }}
                    </p>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @foreach($featuredProjects as $project)
                        <x-frontend.project-card :project="$project" />
                    @endforeach
                </div>

                <!-- View All Projects Button -->
                <div class="text-center">
                    <a href="{{ route('portfolio.projects.index') }}" 
                       class="inline-flex items-center px-8 py-3 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg transition-colors duration-200">
                        {{ __('View All Projects') }}
                        <iconify-icon icon="lucide:arrow-right" class="w-5 h-5 ml-2"></iconify-icon>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- About Preview Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-2 lg:gap-12 lg:items-center">
                <!-- Content -->
                <div>
                    <div class="mb-6">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-primary/10 text-primary">
                            <iconify-icon icon="lucide:user" class="w-4 h-4 mr-2"></iconify-icon>
                            {{ __('About Me') }}
                        </span>
                    </div>
                    
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">
                        {{ __('Passionate About Building Better Infrastructure') }}
                    </h2>
                    
                    <p class="text-lg text-gray-600 dark:text-gray-300 mb-6">
                        {{ __('With over a decade of experience in civil engineering, I specialize in sustainable infrastructure design, project management, and innovative construction solutions that meet the challenges of tomorrow.') }}
                    </p>
                    
                    <div class="grid grid-cols-2 gap-6 mb-8">
                        <div class="text-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div class="text-2xl font-bold text-primary mb-1">10+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-300">{{ __('Years Experience') }}</div>
                        </div>
                        <div class="text-center p-4 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div class="text-2xl font-bold text-primary mb-1">{{ $featuredProjects->count() }}+</div>
                            <div class="text-sm text-gray-600 dark:text-gray-300">{{ __('Projects Completed') }}</div>
                        </div>
                    </div>
                    
                    <a href="{{ route('portfolio.about') }}" 
                       class="inline-flex items-center text-primary hover:text-primary/80 font-medium">
                        {{ __('Learn More About Me') }}
                        <iconify-icon icon="lucide:arrow-right" class="w-4 h-4 ml-2"></iconify-icon>
                    </a>
                </div>

                <!-- Image/Visual -->
                <div class="mt-12 lg:mt-0">
                    <div class="aspect-square bg-gradient-to-br from-primary/10 to-blue-500/10 rounded-2xl p-8 flex items-center justify-center">
                        <div class="text-center">
                            <iconify-icon icon="lucide:hard-hat" class="w-24 h-24 text-primary mx-auto mb-4"></iconify-icon>
                            <p class="text-lg font-medium text-gray-700 dark:text-gray-300">
                                {{ __('Professional Engineer') }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ __('Licensed & Certified') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Education & Experience Preview -->
    @if($education->isNotEmpty() || $experience->isNotEmpty())
        <section class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ __('Professional Background') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        {{ __('My educational foundation and professional journey in civil engineering.') }}
                    </p>
                </div>

                <div class="lg:grid lg:grid-cols-2 lg:gap-12">
                    <!-- Education Preview -->
                    @if($education->isNotEmpty())
                        <div>
                            <div class="flex items-center mb-6">
                                <div class="p-2 bg-blue-50 dark:bg-blue-900/20 rounded-lg mr-3">
                                    <iconify-icon icon="lucide:graduation-cap" class="w-6 h-6 text-blue-600 dark:text-blue-400"></iconify-icon>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    {{ __('Education') }}
                                </h3>
                            </div>
                            
                            <div class="space-y-4 mb-6">
                                @foreach($education->take(2) as $edu)
                                    <x-frontend.education-experience-card :item="$edu" type="education" />
                                @endforeach
                            </div>
                            
                            <a href="{{ route('portfolio.education') }}" 
                               class="inline-flex items-center text-blue-600 dark:text-blue-400 hover:text-blue-500 font-medium">
                                {{ __('View All Education') }}
                                <iconify-icon icon="lucide:arrow-right" class="w-4 h-4 ml-2"></iconify-icon>
                            </a>
                        </div>
                    @endif

                    <!-- Experience Preview -->
                    @if($experience->isNotEmpty())
                        <div class="{{ $education->isEmpty() ? '' : 'mt-12 lg:mt-0' }}">
                            <div class="flex items-center mb-6">
                                <div class="p-2 bg-green-50 dark:bg-green-900/20 rounded-lg mr-3">
                                    <iconify-icon icon="lucide:briefcase" class="w-6 h-6 text-green-600 dark:text-green-400"></iconify-icon>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    {{ __('Experience') }}
                                </h3>
                            </div>
                            
                            <div class="space-y-4 mb-6">
                                @foreach($experience->take(2) as $exp)
                                    <x-frontend.education-experience-card :item="$exp" type="experience" />
                                @endforeach
                            </div>
                            
                            <a href="{{ route('portfolio.experience') }}" 
                               class="inline-flex items-center text-green-600 dark:text-green-400 hover:text-green-500 font-medium">
                                {{ __('View All Experience') }}
                                <iconify-icon icon="lucide:arrow-right" class="w-4 h-4 ml-2"></iconify-icon>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section class="py-16 bg-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                {{ __('Ready to Start Your Next Project?') }}
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                {{ __("Let's work together to bring your civil engineering vision to life with innovative and sustainable solutions.") }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('portfolio.contact') }}" 
                   class="inline-flex items-center px-8 py-3 bg-white hover:bg-gray-100 text-primary font-medium rounded-lg transition-colors duration-200">
                    <iconify-icon icon="lucide:mail" class="w-5 h-5 mr-2"></iconify-icon>
                    {{ __('Get In Touch') }}
                </a>
                <a href="{{ route('portfolio.projects.index') }}" 
                   class="inline-flex items-center px-8 py-3 bg-transparent hover:bg-white/10 text-white font-medium rounded-lg border-2 border-white/30 hover:border-white/50 transition-all duration-200">
                    <iconify-icon icon="lucide:eye" class="w-5 h-5 mr-2"></iconify-icon>
                    {{ __('View Portfolio') }}
                </a>
            </div>
        </div>
    </section>
</x-frontend.layouts.app>
