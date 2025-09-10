<x-frontend.layouts.app>
    @php
        $pageTitle = __('Work Experience');
        $metaDescription = __('Discover my professional journey in civil engineering, including project leadership, technical expertise, and career milestones.');
    @endphp

    <!-- Page Header -->
    <section class="pt-24 pb-16 bg-gradient-to-br from-emerald-50 to-emerald-100 dark:from-emerald-900/20 dark:to-emerald-800/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="mb-6">
                    <div class="p-4 bg-emerald-100 dark:bg-emerald-900/30 rounded-full w-20 h-20 flex items-center justify-center mx-auto">
                        <iconify-icon icon="lucide:briefcase" class="w-10 h-10 text-emerald-600 dark:text-emerald-400"></iconify-icon>
                    </div>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ __('Work Experience') }}
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    {{ __('A comprehensive overview of my professional journey, highlighting key projects, leadership roles, and technical achievements in civil engineering.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Experience Page Content -->
    @if($experiencePage)
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="prose prose-lg max-w-none dark:prose-invert">
                    {!! $experiencePage->content !!}
                </div>
            </div>
        </section>
    @endif

    <!-- Experience Timeline -->
    @if($experience->isNotEmpty())
        <section class="py-16 {{ $experiencePage ? 'bg-gray-50 dark:bg-gray-900' : 'bg-white dark:bg-gray-800' }}">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                @if(!$experiencePage)
                    <div class="text-center mb-16">
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                            {{ __('Professional Journey') }}
                        </h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300">
                            {{ __('A chronological timeline of my career progression and key achievements.') }}
                        </p>
                    </div>
                @endif

                <!-- Timeline Container -->
                <div class="relative">
                    @foreach($experience as $index => $exp)
                        <x-frontend.education-experience-card 
                            :item="$exp" 
                            type="experience" 
                            layout="timeline" 
                        />
                    @endforeach
                </div>
            </div>
        </section>
    @else
        <!-- No Experience Content -->
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="mb-8">
                    <iconify-icon icon="lucide:building" class="w-16 h-16 text-gray-400 mx-auto"></iconify-icon>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
                    {{ __('Experience Information Coming Soon') }}
                </h3>
                <p class="text-gray-600 dark:text-gray-300 mb-8">
                    {{ __('Detailed work experience and professional achievements will be available soon.') }}
                </p>
                <a href="{{ route('portfolio.home') }}" 
                   class="inline-flex items-center px-6 py-3 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg transition-colors duration-200">
                    <iconify-icon icon="lucide:arrow-left" class="w-4 h-4 mr-2"></iconify-icon>
                    {{ __('Back to Home') }}
                </a>
            </div>
        </section>
    @endif

    <!-- Professional Expertise -->
    @if($experience->isNotEmpty())
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ __('Professional Expertise') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        {{ __('Key areas of specialization developed through hands-on experience.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Project Management -->
                    <div class="text-center p-6 bg-blue-50 dark:bg-blue-900/20 rounded-lg">
                        <div class="mb-4">
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/40 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                                <iconify-icon icon="lucide:clipboard-list" class="w-8 h-8 text-blue-600 dark:text-blue-400"></iconify-icon>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ __('Project Management') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            {{ __('Leading complex projects from conception to completion') }}
                        </p>
                    </div>

                    <!-- Team Leadership -->
                    <div class="text-center p-6 bg-green-50 dark:bg-green-900/20 rounded-lg">
                        <div class="mb-4">
                            <div class="p-3 bg-green-100 dark:bg-green-900/40 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                                <iconify-icon icon="lucide:users" class="w-8 h-8 text-green-600 dark:text-green-400"></iconify-icon>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ __('Team Leadership') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            {{ __('Managing multidisciplinary teams and stakeholders') }}
                        </p>
                    </div>

                    <!-- Technical Design -->
                    <div class="text-center p-6 bg-purple-50 dark:bg-purple-900/20 rounded-lg">
                        <div class="mb-4">
                            <div class="p-3 bg-purple-100 dark:bg-purple-900/40 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                                <iconify-icon icon="lucide:settings" class="w-8 h-8 text-purple-600 dark:text-purple-400"></iconify-icon>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ __('Technical Design') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            {{ __('Innovative engineering solutions and system design') }}
                        </p>
                    </div>

                    <!-- Quality Assurance -->
                    <div class="text-center p-6 bg-orange-50 dark:bg-orange-900/20 rounded-lg">
                        <div class="mb-4">
                            <div class="p-3 bg-orange-100 dark:bg-orange-900/40 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                                <iconify-icon icon="lucide:shield-check" class="w-8 h-8 text-orange-600 dark:text-orange-400"></iconify-icon>
                            </div>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ __('Quality Assurance') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 text-sm">
                            {{ __('Ensuring compliance and maintaining high standards') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Industry Recognition -->
        <section class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ __('Professional Achievements') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        {{ __('Recognitions and milestones that define my professional journey.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <!-- Years of Experience -->
                    <div class="text-center p-8 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                        <div class="text-4xl font-bold text-primary mb-2">
                            {{ $totalYearsExperience ?? '5+' }}
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ __('Years of Experience') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __('Professional practice in civil engineering') }}
                        </p>
                    </div>

                    <!-- Projects Completed -->
                    <div class="text-center p-8 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                        <div class="text-4xl font-bold text-primary mb-2">
                            {{ $totalProjects ?? '50+' }}
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ __('Projects Completed') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __('Successful delivery of engineering solutions') }}
                        </p>
                    </div>

                    <!-- Client Satisfaction -->
                    <div class="text-center p-8 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                        <div class="text-4xl font-bold text-primary mb-2">
                            100%
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ __('Client Satisfaction') }}
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300">
                            {{ __('Commitment to excellence and quality delivery') }}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technical Proficiencies -->
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ __('Technical Proficiencies') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        {{ __('Software tools and technical skills mastered through professional practice.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Design Software -->
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <iconify-icon icon="lucide:pen-tool" class="w-5 h-5 mr-2 text-blue-600 dark:text-blue-400"></iconify-icon>
                            {{ __('Design Software') }}
                        </h3>
                        <div class="space-y-2">
                            @php
                                $designSoftware = ['AutoCAD', 'Revit', 'Civil 3D', 'SketchUp', 'MicroStation'];
                            @endphp
                            @foreach($designSoftware as $software)
                                <div class="flex items-center justify-between bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $software }}</span>
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <iconify-icon icon="lucide:star" class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}"></iconify-icon>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Analysis Tools -->
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <iconify-icon icon="lucide:calculator" class="w-5 h-5 mr-2 text-green-600 dark:text-green-400"></iconify-icon>
                            {{ __('Analysis Tools') }}
                        </h3>
                        <div class="space-y-2">
                            @php
                                $analysisTools = ['SAP2000', 'ETABS', 'STAAD Pro', 'MATLAB', 'Excel'];
                            @endphp
                            @foreach($analysisTools as $tool)
                                <div class="flex items-center justify-between bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $tool }}</span>
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <iconify-icon icon="lucide:star" class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}"></iconify-icon>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Project Management -->
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                            <iconify-icon icon="lucide:gantt-chart" class="w-5 h-5 mr-2 text-purple-600 dark:text-purple-400"></iconify-icon>
                            {{ __('Project Management') }}
                        </h3>
                        <div class="space-y-2">
                            @php
                                $pmTools = ['MS Project', 'Primavera P6', 'Trello', 'Asana', 'Slack'];
                            @endphp
                            @foreach($pmTools as $tool)
                                <div class="flex items-center justify-between bg-gray-50 dark:bg-gray-700 rounded-lg p-3">
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $tool }}</span>
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            <iconify-icon icon="lucide:star" class="w-4 h-4 {{ $i <= 4 ? 'text-yellow-400' : 'text-gray-300' }}"></iconify-icon>
                                        @endfor
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- CTA Section -->
    <section class="py-16 bg-emerald-600 dark:bg-emerald-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                {{ __('Let\'s Build Something Great Together') }}
            </h2>
            <p class="text-xl text-emerald-100 mb-8 max-w-2xl mx-auto">
                {{ __('My experience and expertise are at your service. Ready to discuss your next engineering project?') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('portfolio.projects.index') }}" 
                   class="inline-flex items-center px-8 py-3 bg-white hover:bg-gray-100 text-emerald-600 font-medium rounded-lg transition-colors duration-200">
                    <iconify-icon icon="lucide:eye" class="w-5 h-5 mr-2"></iconify-icon>
                    {{ __('See My Work') }}
                </a>
                <a href="{{ route('portfolio.contact') }}" 
                   class="inline-flex items-center px-8 py-3 bg-transparent hover:bg-white/10 text-white font-medium rounded-lg border-2 border-white/30 hover:border-white/50 transition-all duration-200">
                    <iconify-icon icon="lucide:phone" class="w-5 h-5 mr-2"></iconify-icon>
                    {{ __('Get In Touch') }}
                </a>
            </div>
        </div>
    </section>
</x-frontend.layouts.app>
