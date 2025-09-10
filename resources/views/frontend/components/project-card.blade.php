@props([
    'project',
    'showDescription' => true,
    'showMeta' => true,
    'showTags' => true,
    'size' => 'default' // default, large, small
])

@php
    $cardClasses = match($size) {
        'large' => 'col-span-1 md:col-span-2',
        'small' => 'col-span-1',
        default => 'col-span-1'
    };
@endphp

<div class="{{ $cardClasses }}">
    <article class="group bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-lg transition-all duration-300 overflow-hidden border border-gray-200 dark:border-gray-700">
        <!-- Project Image -->
        <div class="relative aspect-video overflow-hidden">
            @if($project->hasFeaturedImage())
                <img src="{{ $project->getFeaturedImageUrl('medium') }}" 
                     alt="{{ $project->title }}"
                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            @else
                <div class="w-full h-full bg-gradient-to-br from-gray-100 to-gray-200 dark:from-gray-700 dark:to-gray-800 flex items-center justify-center">
                    <iconify-icon icon="lucide:image" class="w-12 h-12 text-gray-400"></iconify-icon>
                </div>
            @endif
            
            <!-- Overlay -->
            <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center">
                <a href="{{ route('portfolio.projects.show', $project->slug) }}" 
                   class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 bg-white/90 dark:bg-gray-900/90 p-3 rounded-full">
                    <iconify-icon icon="lucide:eye" class="w-6 h-6 text-gray-700 dark:text-gray-300"></iconify-icon>
                </a>
            </div>

            <!-- Project Categories -->
            @if($showTags && $project->terms->where('taxonomy', 'project_category')->isNotEmpty())
                <div class="absolute top-4 left-4">
                    @foreach($project->terms->where('taxonomy', 'project_category')->take(2) as $category)
                        <span class="inline-block px-2 py-1 text-xs font-medium bg-primary text-white rounded-full mb-1 mr-1">
                            {{ $category->name }}
                        </span>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Project Content -->
        <div class="p-6">
            <!-- Project Title -->
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2 group-hover:text-primary transition-colors duration-200">
                <a href="{{ route('portfolio.projects.show', $project->slug) }}" class="hover:underline">
                    {{ $project->title }}
                </a>
            </h3>

            <!-- Project Description -->
            @if($showDescription && $project->excerpt)
                <p class="text-gray-600 dark:text-gray-300 mb-4 line-clamp-3">
                    {{ $project->excerpt }}
                </p>
            @endif

            <!-- Project Meta -->
            @if($showMeta)
                <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400 mb-4">
                    <div class="flex items-center space-x-4">
                        <!-- Date -->
                        <span class="flex items-center">
                            <iconify-icon icon="lucide:calendar" class="w-4 h-4 mr-1"></iconify-icon>
                            {{ $project->published_at ? $project->published_at->format('M Y') : $project->created_at->format('M Y') }}
                        </span>

                        <!-- Author -->
                        @if($project->user)
                            <span class="flex items-center">
                                <iconify-icon icon="lucide:user" class="w-4 h-4 mr-1"></iconify-icon>
                                {{ $project->user->first_name ?? 'Admin' }}
                            </span>
                        @endif
                    </div>
                </div>
            @endif

            <!-- Project Tags -->
            @if($showTags && $project->terms->where('taxonomy', 'project_tag')->isNotEmpty())
                <div class="flex flex-wrap gap-2 mb-4">
                    @foreach($project->terms->where('taxonomy', 'project_tag')->take(3) as $tag)
                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md">
                            #{{ $tag->name }}
                        </span>
                    @endforeach
                    @if($project->terms->where('taxonomy', 'project_tag')->count() > 3)
                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 rounded-md">
                            +{{ $project->terms->where('taxonomy', 'project_tag')->count() - 3 }} more
                        </span>
                    @endif
                </div>
            @endif

            <!-- View Project Link -->
            <div class="flex justify-between items-center">
                <a href="{{ route('portfolio.projects.show', $project->slug) }}" 
                   class="inline-flex items-center text-primary hover:text-primary/80 font-medium transition-colors duration-200">
                    {{ __('View Project') }}
                    <iconify-icon icon="lucide:arrow-right" class="w-4 h-4 ml-1 group-hover:translate-x-1 transition-transform duration-200"></iconify-icon>
                </a>

                <!-- Project Type/Status -->
                @if($project->getMeta('project_status'))
                    <span class="px-2 py-1 text-xs font-medium rounded-full {{ 
                        $project->getMeta('project_status') === 'completed' ? 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400' : 
                        ($project->getMeta('project_status') === 'in_progress' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/20 dark:text-yellow-400' : 
                        'bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300')
                    }}">
                        {{ ucfirst(str_replace('_', ' ', $project->getMeta('project_status'))) }}
                    </span>
                @endif
            </div>
        </div>
    </article>
</div>
