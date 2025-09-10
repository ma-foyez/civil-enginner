<x-frontend.layouts.app>
    @php
        $pageTitle = __('Portfolio');
        $metaDescription = __('Explore my civil engineering portfolio featuring innovative infrastructure projects, sustainable design solutions, and construction excellence.');
    @endphp

    <!-- Page Header -->
    <section class="pt-24 pb-16 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ __('My Portfolio') }}
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    {{ __('A collection of civil engineering projects showcasing innovation, sustainability, and technical excellence in infrastructure development.') }}
                </p>
            </div>
        </div>
    </section>

    <!-- Filters and Search -->
    <section class="py-8 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                <!-- Search -->
                <div class="flex-1 max-w-md">
                    <form method="GET" action="{{ route('portfolio.projects.index') }}" class="relative">
                        <input type="text" 
                               name="search" 
                               value="{{ request('search') }}"
                               placeholder="{{ __('Search projects...') }}"
                               class="w-full pl-10 pr-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:ring-2 focus:ring-primary focus:border-primary">
                        <div class="absolute left-3 top-1/2 transform -translate-y-1/2">
                            <iconify-icon icon="lucide:search" class="w-4 h-4 text-gray-400"></iconify-icon>
                        </div>
                        @if(request('search'))
                            <a href="{{ route('portfolio.projects.index') }}" 
                               class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600">
                                <iconify-icon icon="lucide:x" class="w-4 h-4"></iconify-icon>
                            </a>
                        @endif
                    </form>
                </div>

                <!-- Filter Buttons -->
                <div class="flex flex-wrap gap-4">
                    <!-- Categories Filter -->
                    @if($categories->isNotEmpty())
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                <iconify-icon icon="lucide:folder" class="w-4 h-4 mr-2"></iconify-icon>
                                {{ __('Categories') }}
                                @if(request('category'))
                                    <span class="ml-2 px-2 py-0.5 text-xs bg-primary text-white rounded-full">1</span>
                                @endif
                                <iconify-icon icon="lucide:chevron-down" class="w-4 h-4 ml-2"></iconify-icon>
                            </button>
                            
                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition
                                 class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 z-10">
                                <div class="p-2">
                                    <a href="{{ route('portfolio.projects.index', array_filter(request()->except('category'))) }}" 
                                       class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded {{ !request('category') ? 'bg-primary/10 text-primary' : '' }}">
                                        {{ __('All Categories') }}
                                    </a>
                                    @foreach($categories as $category)
                                        <a href="{{ route('portfolio.projects.index', array_merge(array_filter(request()->except('category')), ['category' => $category->slug])) }}" 
                                           class="flex items-center justify-between px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded {{ request('category') === $category->slug ? 'bg-primary/10 text-primary' : '' }}">
                                            <span>{{ $category->name }}</span>
                                            <span class="text-xs text-gray-500">({{ $category->posts_count }})</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Tags Filter -->
                    @if($tags->isNotEmpty())
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                                <iconify-icon icon="lucide:tag" class="w-4 h-4 mr-2"></iconify-icon>
                                {{ __('Tags') }}
                                @if(request('tag'))
                                    <span class="ml-2 px-2 py-0.5 text-xs bg-primary text-white rounded-full">1</span>
                                @endif
                                <iconify-icon icon="lucide:chevron-down" class="w-4 h-4 ml-2"></iconify-icon>
                            </button>
                            
                            <div x-show="open" 
                                 @click.away="open = false"
                                 x-transition
                                 class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 z-10">
                                <div class="p-2">
                                    <a href="{{ route('portfolio.projects.index', array_filter(request()->except('tag'))) }}" 
                                       class="block px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded {{ !request('tag') ? 'bg-primary/10 text-primary' : '' }}">
                                        {{ __('All Tags') }}
                                    </a>
                                    @foreach($tags as $tag)
                                        <a href="{{ route('portfolio.projects.index', array_merge(array_filter(request()->except('tag')), ['tag' => $tag->slug])) }}" 
                                           class="flex items-center justify-between px-3 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 rounded {{ request('tag') === $tag->slug ? 'bg-primary/10 text-primary' : '' }}">
                                            <span>#{{ $tag->name }}</span>
                                            <span class="text-xs text-gray-500">({{ $tag->posts_count }})</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Clear Filters -->
                    @if(request()->hasAny(['search', 'category', 'tag']))
                        <a href="{{ route('portfolio.projects.index') }}" 
                           class="flex items-center px-4 py-2 text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 rounded-lg transition-colors">
                            <iconify-icon icon="lucide:x" class="w-4 h-4 mr-2"></iconify-icon>
                            {{ __('Clear All') }}
                        </a>
                    @endif
                </div>
            </div>

            <!-- Active Filters Display -->
            @if(request()->hasAny(['search', 'category', 'tag']))
                <div class="mt-4 flex flex-wrap gap-2">
                    @if(request('search'))
                        <span class="inline-flex items-center px-3 py-1 text-sm bg-primary/10 text-primary rounded-full">
                            {{ __('Search') }}: "{{ request('search') }}"
                            <a href="{{ route('portfolio.projects.index', array_filter(request()->except('search'))) }}" 
                               class="ml-2 hover:text-primary/80">
                                <iconify-icon icon="lucide:x" class="w-3 h-3"></iconify-icon>
                            </a>
                        </span>
                    @endif
                    
                    @if(request('category'))
                        @php $categoryName = $categories->where('slug', request('category'))->first()?->name ?? request('category'); @endphp
                        <span class="inline-flex items-center px-3 py-1 text-sm bg-blue-100 dark:bg-blue-900/20 text-blue-800 dark:text-blue-400 rounded-full">
                            {{ __('Category') }}: {{ $categoryName }}
                            <a href="{{ route('portfolio.projects.index', array_filter(request()->except('category'))) }}" 
                               class="ml-2 hover:text-blue-600">
                                <iconify-icon icon="lucide:x" class="w-3 h-3"></iconify-icon>
                            </a>
                        </span>
                    @endif
                    
                    @if(request('tag'))
                        @php $tagName = $tags->where('slug', request('tag'))->first()?->name ?? request('tag'); @endphp
                        <span class="inline-flex items-center px-3 py-1 text-sm bg-green-100 dark:bg-green-900/20 text-green-800 dark:text-green-400 rounded-full">
                            {{ __('Tag') }}: #{{ $tagName }}
                            <a href="{{ route('portfolio.projects.index', array_filter(request()->except('tag'))) }}" 
                               class="ml-2 hover:text-green-600">
                                <iconify-icon icon="lucide:x" class="w-3 h-3"></iconify-icon>
                            </a>
                        </span>
                    @endif
                </div>
            @endif
        </div>
    </section>

    <!-- Projects Grid -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if($projects->count() > 0)
                <!-- Results Count -->
                <div class="mb-8">
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ __('Showing :from-:to of :total projects', [
                            'from' => $projects->firstItem(),
                            'to' => $projects->lastItem(),
                            'total' => $projects->total()
                        ]) }}
                    </p>
                </div>

                <!-- Projects Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
                    @foreach($projects as $project)
                        <x-frontend.project-card :project="$project" />
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($projects->hasPages())
                    <div class="flex justify-center">
                        {{ $projects->appends(request()->query())->links() }}
                    </div>
                @endif
            @else
                <!-- No Results -->
                <div class="text-center py-16">
                    <div class="mb-6">
                        <iconify-icon icon="lucide:folder-x" class="w-16 h-16 text-gray-400 mx-auto"></iconify-icon>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">
                        {{ __('No Projects Found') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        @if(request()->hasAny(['search', 'category', 'tag']))
                            {{ __('No projects match your current filters. Try adjusting your search criteria.') }}
                        @else
                            {{ __('There are no projects to display at the moment.') }}
                        @endif
                    </p>
                    @if(request()->hasAny(['search', 'category', 'tag']))
                        <a href="{{ route('portfolio.projects.index') }}" 
                           class="inline-flex items-center px-6 py-3 bg-primary hover:bg-primary/90 text-white font-medium rounded-lg transition-colors duration-200">
                            <iconify-icon icon="lucide:refresh-cw" class="w-4 h-4 mr-2"></iconify-icon>
                            {{ __('View All Projects') }}
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    @if($projects->count() > 0)
        <section class="py-16 bg-primary">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                    {{ __('Interested in Working Together?') }}
                </h2>
                <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
                    {{ __('These projects represent just a glimpse of what we can accomplish together. Let\'s discuss your vision.') }}
                </p>
                <a href="{{ route('portfolio.contact') }}" 
                   class="inline-flex items-center px-8 py-3 bg-white hover:bg-gray-100 text-primary font-medium rounded-lg transition-colors duration-200">
                    <iconify-icon icon="lucide:mail" class="w-5 h-5 mr-2"></iconify-icon>
                    {{ __('Start a Conversation') }}
                </a>
            </div>
        </section>
    @endif
</x-frontend.layouts.app>
