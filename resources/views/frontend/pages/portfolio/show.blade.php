<x-frontend.layouts.app>
    @php
        $pageTitle = $project->title;
        $metaDescription = $project->excerpt ?? Str::limit(strip_tags($project->content), 160);
        $ogImage = $project->getFeaturedImageUrl('large');
    @endphp

    <!-- Project Header -->
    <section class="pt-24 pb-8 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Breadcrumb -->
            <nav class="mb-6" aria-label="Breadcrumb">
                <ol class="flex items-center space-x-2 text-sm">
                    <li>
                        <a href="{{ route('portfolio.home') }}" 
                           class="text-gray-500 dark:text-gray-400 hover:text-primary">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <iconify-icon icon="lucide:chevron-right" class="w-4 h-4 text-gray-400"></iconify-icon>
                    </li>
                    <li>
                        <a href="{{ route('portfolio.projects.index') }}" 
                           class="text-gray-500 dark:text-gray-400 hover:text-primary">
                            {{ __('Portfolio') }}
                        </a>
                    </li>
                    <li>
                        <iconify-icon icon="lucide:chevron-right" class="w-4 h-4 text-gray-400"></iconify-icon>
                    </li>
                    <li class="text-gray-900 dark:text-white font-medium">
                        {{ $project->title }}
                    </li>
                </ol>
            </nav>

            <!-- Project Title and Meta -->
            <div class="lg:grid lg:grid-cols-3 lg:gap-12">
                <div class="lg:col-span-2">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                        {{ $project->title }}
                    </h1>

                    @if($project->excerpt)
                        <p class="text-xl text-gray-600 dark:text-gray-300 mb-8 leading-relaxed">
                            {{ $project->excerpt }}
                        </p>
                    @endif

                    <!-- Project Meta -->
                    <div class="flex flex-wrap gap-6 text-sm text-gray-500 dark:text-gray-400 mb-8">
                        <div class="flex items-center">
                            <iconify-icon icon="lucide:calendar" class="w-4 h-4 mr-2"></iconify-icon>
                            <span>{{ $project->published_at ? $project->published_at->format('F Y') : $project->created_at->format('F Y') }}</span>
                        </div>
                        
                        @if($project->user)
                            <div class="flex items-center">
                                <iconify-icon icon="lucide:user" class="w-4 h-4 mr-2"></iconify-icon>
                                <span>{{ $project->user->first_name ?? 'Admin' }}</span>
                            </div>
                        @endif

                        @if($project->getMeta('project_duration'))
                            <div class="flex items-center">
                                <iconify-icon icon="lucide:clock" class="w-4 h-4 mr-2"></iconify-icon>
                                <span>{{ $project->getMeta('project_duration') }}</span>
                            </div>
                        @endif

                        @if($project->getMeta('project_location'))
                            <div class="flex items-center">
                                <iconify-icon icon="lucide:map-pin" class="w-4 h-4 mr-2"></iconify-icon>
                                <span>{{ $project->getMeta('project_location') }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Project Status and Quick Info -->
                <div class="lg:col-span-1 mt-8 lg:mt-0">
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            {{ __('Project Details') }}
                        </h3>

                        <dl class="space-y-3">
                            @if($project->getMeta('project_status'))
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Status') }}</dt>
                                    <dd class="mt-1">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ 
                                            $project->getMeta('project_status') === 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400' : 
                                            ($project->getMeta('project_status') === 'in_progress' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400' : 
                                            'bg-gray-100 text-gray-800 dark:bg-gray-600 dark:text-gray-300')
                                        }}">
                                            {{ ucfirst(str_replace('_', ' ', $project->getMeta('project_status'))) }}
                                        </span>
                                    </dd>
                                </div>
                            @endif

                            @if($project->getMeta('client'))
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Client') }}</dt>
                                    <dd class="mt-1 text-gray-900 dark:text-white">{{ $project->getMeta('client') }}</dd>
                                </div>
                            @endif

                            @if($project->getMeta('project_value'))
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Project Value') }}</dt>
                                    <dd class="mt-1 text-gray-900 dark:text-white">${{ $project->getMeta('project_value') }}</dd>
                                </div>
                            @endif

                            @if($project->getMeta('team_size'))
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Team Size') }}</dt>
                                    <dd class="mt-1 text-gray-900 dark:text-white">{{ $project->getMeta('team_size') }} {{ __('members') }}</dd>
                                </div>
                            @endif

                            @if($project->getMeta('project_website'))
                                <div>
                                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ __('Website') }}</dt>
                                    <dd class="mt-1">
                                        <a href="{{ $project->getMeta('project_website') }}" 
                                           target="_blank" 
                                           rel="noopener noreferrer"
                                           class="text-primary hover:text-primary/80 flex items-center">
                                            {{ __('View Project') }}
                                            <iconify-icon icon="lucide:external-link" class="w-3 h-3 ml-1"></iconify-icon>
                                        </a>
                                    </dd>
                                </div>
                            @endif
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    @if($project->hasFeaturedImage())
        <section class="py-8 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="aspect-video rounded-lg overflow-hidden shadow-lg">
                    <img src="{{ $project->getFeaturedImageUrl('large') }}" 
                         alt="{{ $project->title }}"
                         class="w-full h-full object-cover">
                </div>
            </div>
        </section>
    @endif

    <!-- Project Content -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-3 lg:gap-12">
                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <div class="prose prose-lg max-w-none dark:prose-invert">
                        {!! $project->content !!}
                    </div>

                    <!-- Project Gallery -->
                    @if($project->getGalleryImages())
                        <div class="mt-12">
                            <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                                {{ __('Project Gallery') }}
                            </h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($project->getGalleryImages() as $image)
                                    <div class="aspect-square rounded-lg overflow-hidden">
                                        <img src="{{ $image['medium'] }}" 
                                             alt="{{ $image['name'] }}"
                                             class="w-full h-full object-cover hover:scale-105 transition-transform duration-300 cursor-pointer"
                                             onclick="openImageModal('{{ $image['large'] }}', '{{ $image['name'] }}')">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="lg:col-span-1 mt-12 lg:mt-0">
                    <!-- Categories -->
                    @if($project->terms->where('taxonomy', 'project_category')->isNotEmpty())
                        <div class="mb-8">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                {{ __('Categories') }}
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($project->terms->where('taxonomy', 'project_category') as $category)
                                    <a href="{{ route('portfolio.projects.index', ['category' => $category->slug]) }}" 
                                       class="inline-flex items-center px-3 py-1 bg-primary text-white text-sm font-medium rounded-full hover:bg-primary/90 transition-colors">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Tags -->
                    @if($project->terms->where('taxonomy', 'project_tag')->isNotEmpty())
                        <div class="mb-8">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                {{ __('Technologies & Tags') }}
                            </h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($project->terms->where('taxonomy', 'project_tag') as $tag)
                                    <a href="{{ route('portfolio.projects.index', ['tag' => $tag->slug]) }}" 
                                       class="inline-flex items-center px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-full hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                        #{{ $tag->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Share -->
                    <div class="mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            {{ __('Share Project') }}
                        </h4>
                        <div class="flex space-x-3">
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}&text={{ urlencode($project->title) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="p-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors">
                                <iconify-icon icon="lucide:twitter" class="w-5 h-5"></iconify-icon>
                            </a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(url()->current()) }}" 
                               target="_blank" 
                               rel="noopener noreferrer"
                               class="p-2 bg-blue-700 text-white rounded-lg hover:bg-blue-800 transition-colors">
                                <iconify-icon icon="lucide:linkedin" class="w-5 h-5"></iconify-icon>
                            </a>
                            <button onclick="copyToClipboard('{{ url()->current() }}')"
                                    class="p-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-colors">
                                <iconify-icon icon="lucide:copy" class="w-5 h-5"></iconify-icon>
                            </button>
                        </div>
                    </div>

                    <!-- Contact CTA -->
                    <div class="bg-primary/10 rounded-lg p-6">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">
                            {{ __('Interested in Similar Work?') }}
                        </h4>
                        <p class="text-gray-600 dark:text-gray-300 mb-4">
                            {{ __('Let\'s discuss how I can help bring your engineering vision to life.') }}
                        </p>
                        <a href="{{ route('portfolio.contact') }}" 
                           class="inline-flex items-center w-full justify-center px-4 py-2 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg transition-colors">
                            <iconify-icon icon="lucide:mail" class="w-4 h-4 mr-2"></iconify-icon>
                            {{ __('Get In Touch') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Projects -->
    @if($relatedProjects->isNotEmpty())
        <section class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ __('Related Projects') }}
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        {{ __('Explore other projects that showcase similar expertise and innovation.') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($relatedProjects as $relatedProject)
                        <x-frontend.project-card :project="$relatedProject" />
                    @endforeach
                </div>

                <div class="text-center mt-12">
                    <a href="{{ route('portfolio.projects.index') }}" 
                       class="inline-flex items-center px-6 py-3 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg transition-colors duration-200">
                        {{ __('View All Projects') }}
                        <iconify-icon icon="lucide:arrow-right" class="w-4 h-4 ml-2"></iconify-icon>
                    </a>
                </div>
            </div>
        </section>
    @endif

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 z-50 hidden bg-black/80 items-center justify-center p-4" onclick="closeImageModal()">
        <div class="max-w-4xl max-h-full">
            <img id="modalImage" src="" alt="" class="max-w-full max-h-full object-contain">
        </div>
        <button onclick="closeImageModal()" class="absolute top-4 right-4 text-white/70 hover:text-white">
            <iconify-icon icon="lucide:x" class="w-8 h-8"></iconify-icon>
        </button>
    </div>

    @push('scripts')
    <script>
        function openImageModal(src, alt) {
            const modal = document.getElementById('imageModal');
            const image = document.getElementById('modalImage');
            image.src = src;
            image.alt = alt;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeImageModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(function() {
                // Show a temporary success message
                const button = event.target.closest('button');
                const originalIcon = button.innerHTML;
                button.innerHTML = '<iconify-icon icon="lucide:check" class="w-5 h-5"></iconify-icon>';
                setTimeout(() => {
                    button.innerHTML = originalIcon;
                }, 2000);
            });
        }

        // Close modal with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeImageModal();
            }
        });
    </script>
    @endpush
</x-frontend.layouts.app>
