<x-frontend.layouts.app>
    @php
        $pageTitle = __('Education');
        $metaDescription = __('Explore my educational background, academic achievements, and qualifications in civil engineering and related fields.');
    @endphp

    <!-- Page Header -->
    <section class="pt-24 pb-16 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="mb-6">
                    <div class="p-4 bg-blue-100 dark:bg-blue-900/30 rounded-full w-20 h-20 flex items-center justify-center mx-auto">
                        <iconify-icon icon="lucide:graduation-cap" class="w-10 h-10 text-blue-600 dark:text-blue-400"></iconify-icon>
                    </div>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ __('Education') }}
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    {{ __('My academic journey in civil engineering, featuring degrees, certifications, and continuous learning that shape my professional expertise.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Education Page Content -->
    @if($educationPage)
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="prose prose-lg max-w-none dark:prose-invert">
                    {!! $educationPage->content !!}
                </div>
            </div>
        </section>
    @endif

    <!-- Education Timeline -->
    @if($education->isNotEmpty())
        <section class="py-16 {{ $educationPage ? 'bg-gray-50 dark:bg-gray-900' : 'bg-white dark:bg-gray-800' }}">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                @if(!$educationPage)
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ __('Academic Background') }}
                        </h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300">
                            {{ __('A chronological overview of my educational achievements and qualifications.') }}
                        </p>
                    </div>
                @endif

                <!-- Timeline Container -->
                <div class="relative">
                    @foreach($education as $index => $edu)
                        <x-frontend.education-experience-card 
                            :item="$edu" 
                            type="education" 
                            layout="timeline" 
                        />
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <!-- No Education Content -->
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="mb-8">
                    <iconify-icon icon="lucide:book-open" class="w-16 h-16 text-gray-400 mx-auto"></iconify-icon>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    {{ __('Education Information Coming Soon') }}
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-8">
                    {{ __('Detailed educational background and academic achievements will be available soon.') }}
                </p>
                <a href="{{ route('portfolio.home') }}" 
                   class="inline-flex items-center px-6 py-3 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg transition-colors duration-200">
                    <iconify-icon icon="lucide:arrow-left" class="w-4 h-4 mr-2"></iconify-icon>
                    {{ __('Back to Home') }}
                </a>
            </div>
        </section>
    @endif

    <!-- Academic Excellence Section -->
    @if($education->isNotEmpty())
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ __('Academic Highlights') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        {{ __('Key achievements and distinctions throughout my academic career.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Academic Excellence -->
                    <div class="text-center p-6 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                        <div class="mb-4">
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/40 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                                <iconify-icon icon="lucide:award" class="w-8 h-8 text-blue-600 dark:text-blue-400"></iconify-icon>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ __('Academic Excellence') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __('Consistent high performance and recognition throughout my studies') }}
                        </p>
                    </div>

                    <!-- Research Focus -->
                    <div class="text-center p-6 bg-green-50 dark:bg-green-900/20 rounded-lg">
                        <div class="mb-4">
                            <div class="p-3 bg-green-100 dark:bg-green-900/40 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                                <iconify-icon icon="lucide:search" class="w-8 h-8 text-green-600 dark:text-green-400"></iconify-icon>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ __('Research Focus') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __('Specialized research in sustainable infrastructure and innovative design') }}
                        </p>
                    </div>

                    <!-- Continuous Learning -->
                    <div class="text-center p-6 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                        <div class="mb-4">
                            <div class="p-3 bg-purple-100 dark:bg-purple-900/40 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                                <iconify-icon icon="lucide:trending-up" class="w-8 h-8 text-purple-600 dark:text-purple-400"></iconify-icon>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ __('Continuous Learning') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __('Ongoing professional development and certification maintenance') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Skills Developed -->
        <section class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ __('Skills & Knowledge Areas') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        {{ __('Core competencies and specialized knowledge developed through academic study.') }}
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @php
                        $academicSkills = [
                            'Structural Analysis',
                            'Fluid Mechanics',
                            'Geotechnical Engineering',
                            'Transportation Systems',
                            'Environmental Engineering',
                            'Construction Management',
                            'Materials Science',
                            'Surveying & Mapping',
                            'CAD Design',
                            'Project Planning',
                            'Safety Engineering',
                            'Sustainability Design'
                        ];
                    @endphp

                    @foreach($academicSkills as $skill)
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 text-center shadow-sm border border-gray-200 dark:border-gray-700">
                            <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $skill }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section class="py-16 bg-blue-600 dark:bg-blue-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                {{ __('Ready to Apply This Knowledge?') }}
            </h2>
            <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                {{ __('My educational foundation combined with practical experience is ready to tackle your next civil engineering challenge.') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('portfolio.projects.index') }}" 
                   class="inline-flex items-center px-8 py-3 bg-white hover:bg-gray-100 text-blue-600 font-medium rounded-lg transition-colors duration-200">
                    <iconify-icon icon="lucide:folder" class="w-5 h-5 mr-2"></iconify-icon>
                    {{ __('View My Work') }}
                </a>
                <a href="{{ route('portfolio.contact') }}" 
                   class="inline-flex items-center px-8 py-3 bg-transparent hover:bg-white/10 text-white font-medium rounded-lg border-2 border-white/30 hover:border-white/50 transition-all duration-200">
                    <iconify-icon icon="lucide:mail" class="w-5 h-5 mr-2"></iconify-icon>
                    {{ __('Discuss Your Project') }}
                </a>
            </div>
        </div>
    </section>
</x-frontend.layouts.app>
