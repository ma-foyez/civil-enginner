<x-frontend.layouts.app>
    @php
        $pageTitle = __('About Me');
        $metaDescription = __('Learn about my professional background, experience, and passion for civil engineering and sustainable infrastructure development.');
    @endphp

    <!-- Page Header -->
    <section class="pt-24 pb-16 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ __('About Me') }}
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    {{ __('Passionate civil engineer dedicated to creating sustainable infrastructure solutions that make a positive impact on communities and the environment.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Main About Content -->
    @if($aboutPage)
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="prose prose-lg max-w-none dark:prose-invert">
                    {!! $aboutPage->content !!}
                </div>
            </div>
        </section>
    @else
        <!-- Default About Content -->
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="lg:grid lg:grid-cols-2 lg:gap-12 lg:items-center">
                    <!-- Content -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">
                            {{ __('Building Tomorrow\'s Infrastructure Today') }}
                        </h2>
                        
                        <div class="space-y-4 text-gray-600 dark:text-gray-300">
                            <p>
                                {{ __('As a licensed Professional Engineer with over a decade of experience in civil engineering, I specialize in sustainable infrastructure design, project management, and innovative construction solutions.') }}
                            </p>
                            
                            <p>
                                {{ __('My expertise spans across structural design, transportation engineering, water resources management, and environmental sustainability. I am passionate about creating solutions that not only meet current needs but also consider long-term environmental impact.') }}
                            </p>
                            
                            <p>
                                {{ __('Throughout my career, I have led multimillion-dollar projects, collaborated with diverse teams, and consistently delivered results that exceed client expectations while adhering to the highest safety and quality standards.') }}
                            </p>
                        </div>
                    </div>

                    <!-- Professional Image Placeholder -->
                    <div class="mt-12 lg:mt-0">
                        <div class="aspect-square bg-gradient-to-br from-primary/10 to-blue-500/10 rounded-2xl p-8 flex items-center justify-center">
                            <iconify-icon icon="lucide:user" class="w-32 h-32 text-primary/50"></iconify-icon>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Skills Section -->
    @if($skills)
        <section class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ __('Core Competencies') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        {{ __('Areas of expertise and technical skills developed throughout my career.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    @foreach($skills as $skill)
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
                            <div class="flex items-center mb-4">
                                <div class="p-2 bg-primary/10 rounded-lg mr-3">
                                    <iconify-icon icon="{{ $skill['icon'] }}" class="w-6 h-6 text-primary"></iconify-icon>
                                </div>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    {{ $skill['name'] }}
                                </h3>
                            </div>
                            
                            <div class="mb-2">
                                <div class="flex justify-between text-sm text-gray-600 dark:text-gray-300 mb-1">
                                    <span>{{ __('Proficiency') }}</span>
                                    <span>{{ $skill['percentage'] }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                                    <div class="bg-primary h-2 rounded-full transition-all duration-1000 ease-out" 
                                         style="width: {{ $skill['percentage'] }}%" 
                                         x-data 
                                         x-init="$el.style.width = '0%'; setTimeout(() => $el.style.width = '{{ $skill['percentage'] }}%', 500)">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Achievements Section -->
    @if($achievements)
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ __('Achievements & Certifications') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        {{ __('Recognition and credentials that validate my expertise and commitment to excellence.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($achievements as $achievement)
                        <div class="text-center p-6 bg-gray-50 dark:bg-gray-700 rounded-lg">
                            <div class="mb-4">
                                <div class="p-3 bg-primary/10 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                                    <iconify-icon icon="{{ $achievement['icon'] }}" class="w-8 h-8 text-primary"></iconify-icon>
                                </div>
                            </div>
                            
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                                {{ $achievement['title'] }}
                            </h3>
                            
                            <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">
                                {{ $achievement['organization'] }}
                            </p>
                            
                            <p class="text-sm text-primary font-medium">
                                {{ $achievement['year'] }}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Values/Philosophy Section -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    {{ __('My Engineering Philosophy') }}
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    {{ __('Core principles that guide my approach to engineering and project management.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Sustainability -->
                <div class="text-center">
                    <div class="mb-6">
                        <div class="p-4 bg-green-100 dark:bg-green-900/30 rounded-full w-20 h-20 flex items-center justify-center mx-auto">
                            <iconify-icon icon="lucide:leaf" class="w-10 h-10 text-green-600 dark:text-green-400"></iconify-icon>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                        {{ __('Sustainability') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ __('Every project should consider environmental impact and contribute to a sustainable future for generations to come.') }}
                    </p>
                </div>

                <!-- Innovation -->
                <div class="text-center">
                    <div class="mb-6">
                        <div class="p-4 bg-blue-100 dark:bg-blue-900/30 rounded-full w-20 h-20 flex items-center justify-center mx-auto">
                            <iconify-icon icon="lucide:lightbulb" class="w-10 h-10 text-blue-600 dark:text-blue-400"></iconify-icon>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                        {{ __('Innovation') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ __('Embracing new technologies and methodologies to create more efficient and effective engineering solutions.') }}
                    </p>
                </div>

                <!-- Excellence -->
                <div class="text-center">
                    <div class="mb-6">
                        <div class="p-4 bg-purple-100 dark:bg-purple-900/30 rounded-full w-20 h-20 flex items-center justify-center mx-auto">
                            <iconify-icon icon="lucide:target" class="w-10 h-10 text-purple-600 dark:text-purple-400"></iconify-icon>
                        </div>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                        {{ __('Excellence') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ __('Commitment to delivering the highest quality work while maintaining safety standards and meeting project deadlines.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                {{ __('Let\'s Collaborate') }}
            </h2>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                {{ __('Ready to discuss your next civil engineering project? I\'d love to hear about your vision and explore how we can bring it to life.') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('portfolio.contact') }}" 
                   class="inline-flex items-center px-8 py-3 bg-white hover:bg-gray-100 text-primary font-medium rounded-lg transition-colors duration-200">
                    <iconify-icon icon="lucide:mail" class="w-5 h-5 mr-2"></iconify-icon>
                    {{ __('Contact Me') }}
                </a>
                <a href="{{ route('portfolio.projects.index') }}" 
                   class="inline-flex items-center px-8 py-3 bg-transparent hover:bg-white/10 text-white font-medium rounded-lg border-2 border-white/30 hover:border-white/50 transition-all duration-200">
                    <iconify-icon icon="lucide:folder" class="w-5 h-5 mr-2"></iconify-icon>
                    {{ __('View My Portfolio') }}
                </a>
            </div>
        </div>
    </section>
</x-frontend.layouts.app>
