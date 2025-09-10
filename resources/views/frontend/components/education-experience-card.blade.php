@props([
    'item',
    'type' => 'education', // education, experience
    'layout' => 'default' // default, timeline
])

@php
    $icon = $type === 'education' ? 'lucide:graduation-cap' : 'lucide:briefcase';
    $bgColor = $type === 'education' ? 'bg-blue-50 dark:bg-blue-900/20' : 'bg-green-50 dark:bg-green-900/20';
    $textColor = $type === 'education' ? 'text-blue-600 dark:text-blue-400' : 'text-green-600 dark:text-green-400';
@endphp

@if($layout === 'timeline')
    <!-- Timeline Layout -->
    <div class="relative">
        <!-- Timeline Line -->
        <div class="absolute left-4 top-12 bottom-0 w-0.5 bg-gray-300 dark:bg-gray-600"></div>
        
        <!-- Timeline Dot -->
        <div class="absolute left-2 top-8 w-4 h-4 {{ $bgColor }} border-2 border-white dark:border-gray-800 rounded-full shadow-sm"></div>
        
        <!-- Content -->
        <div class="ml-12 pb-8">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
                <!-- Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="p-2 {{ $bgColor }} rounded-lg">
                            <iconify-icon icon="{{ $icon }}" class="w-5 h-5 {{ $textColor }}"></iconify-icon>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                {{ $item->title }}
                            </h3>
                            @if($item->getMeta('institution') || $item->getMeta('company'))
                                <p class="text-primary font-medium">
                                    {{ $item->getMeta('institution') ?? $item->getMeta('company') }}
                                </p>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Date Range -->
                    <div class="text-right">
                        @if($item->getMeta('start_date'))
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                {{ \Carbon\Carbon::parse($item->getMeta('start_date'))->format('M Y') }} - 
                                @if($item->getMeta('end_date'))
                                    {{ \Carbon\Carbon::parse($item->getMeta('end_date'))->format('M Y') }}
                                @else
                                    {{ __('Present') }}
                                @endif
                            </p>
                        @endif
                        
                        @if($item->getMeta('location'))
                            <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center justify-end mt-1">
                                <iconify-icon icon="lucide:map-pin" class="w-3 h-3 mr-1"></iconify-icon>
                                {{ $item->getMeta('location') }}
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Description -->
                @if($item->excerpt)
                    <p class="text-gray-600 dark:text-gray-300 mb-4">
                        {{ $item->excerpt }}
                    </p>
                @endif

                <!-- Detailed Content -->
                @if($item->content)
                    <div class="prose prose-sm max-w-none dark:prose-invert text-gray-600 dark:text-gray-300">
                        {!! $item->content !!}
                    </div>
                @endif

                <!-- Additional Meta Information -->
                <div class="mt-4 flex flex-wrap gap-4 text-sm text-gray-500 dark:text-gray-400">
                    @if($item->getMeta('degree') && $type === 'education')
                        <span class="flex items-center">
                            <iconify-icon icon="lucide:award" class="w-4 h-4 mr-1"></iconify-icon>
                            {{ $item->getMeta('degree') }}
                        </span>
                    @endif
                    
                    @if($item->getMeta('position') && $type === 'experience')
                        <span class="flex items-center">
                            <iconify-icon icon="lucide:user-check" class="w-4 h-4 mr-1"></iconify-icon>
                            {{ $item->getMeta('position') }}
                        </span>
                    @endif
                    
                    @if($item->getMeta('gpa') && $type === 'education')
                        <span class="flex items-center">
                            <iconify-icon icon="lucide:star" class="w-4 h-4 mr-1"></iconify-icon>
                            GPA: {{ $item->getMeta('gpa') }}
                        </span>
                    @endif
                </div>

                <!-- Skills/Technologies -->
                @if($item->getMeta('skills'))
                    <div class="mt-4">
                        <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            {{ $type === 'education' ? __('Key Subjects') : __('Technologies & Skills') }}
                        </h4>
                        <div class="flex flex-wrap gap-2">
                            @foreach(explode(',', $item->getMeta('skills')) as $skill)
                                <span class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md">
                                    {{ trim($skill) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@else
    <!-- Card Layout -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm border border-gray-200 dark:border-gray-700 p-6 hover:shadow-md transition-shadow duration-200">
        <!-- Header -->
        <div class="flex items-start space-x-4 mb-4">
            <div class="p-3 {{ $bgColor }} rounded-lg flex-shrink-0">
                <iconify-icon icon="{{ $icon }}" class="w-6 h-6 {{ $textColor }}"></iconify-icon>
            </div>
            
            <div class="flex-1 min-w-0">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-1">
                    {{ $item->title }}
                </h3>
                
                @if($item->getMeta('institution') || $item->getMeta('company'))
                    <p class="text-primary font-medium mb-2">
                        {{ $item->getMeta('institution') ?? $item->getMeta('company') }}
                    </p>
                @endif
                
                <!-- Date and Location -->
                <div class="flex flex-wrap gap-4 text-sm text-gray-500 dark:text-gray-400">
                    @if($item->getMeta('start_date'))
                        <span class="flex items-center">
                            <iconify-icon icon="lucide:calendar" class="w-4 h-4 mr-1"></iconify-icon>
                            {{ \Carbon\Carbon::parse($item->getMeta('start_date'))->format('M Y') }} - 
                            @if($item->getMeta('end_date'))
                                {{ \Carbon\Carbon::parse($item->getMeta('end_date'))->format('M Y') }}
                            @else
                                {{ __('Present') }}
                            @endif
                        </span>
                    @endif
                    
                    @if($item->getMeta('location'))
                        <span class="flex items-center">
                            <iconify-icon icon="lucide:map-pin" class="w-4 h-4 mr-1"></iconify-icon>
                            {{ $item->getMeta('location') }}
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <!-- Description -->
        @if($item->excerpt)
            <p class="text-gray-600 dark:text-gray-300 mb-4">
                {{ $item->excerpt }}
            </p>
        @endif

        <!-- Content -->
        @if($item->content)
            <div class="prose prose-sm max-w-none dark:prose-invert text-gray-600 dark:text-gray-300 mb-4">
                {!! Str::limit(strip_tags($item->content), 200) !!}
            </div>
        @endif

        <!-- Meta Information -->
        @if($item->getMeta('degree') || $item->getMeta('position') || $item->getMeta('gpa'))
            <div class="flex flex-wrap gap-4 text-sm text-gray-500 dark:text-gray-400 mb-4">
                @if($item->getMeta('degree') && $type === 'education')
                    <span class="flex items-center">
                        <iconify-icon icon="lucide:award" class="w-4 h-4 mr-1"></iconify-icon>
                        {{ $item->getMeta('degree') }}
                    </span>
                @endif
                
                @if($item->getMeta('position') && $type === 'experience')
                    <span class="flex items-center">
                        <iconify-icon icon="lucide:user-check" class="w-4 h-4 mr-1"></iconify-icon>
                        {{ $item->getMeta('position') }}
                    </span>
                @endif
                
                @if($item->getMeta('gpa') && $type === 'education')
                    <span class="flex items-center">
                        <iconify-icon icon="lucide:star" class="w-4 h-4 mr-1"></iconify-icon>
                        GPA: {{ $item->getMeta('gpa') }}
                    </span>
                @endif
            </div>
        @endif

        <!-- Skills -->
        @if($item->getMeta('skills'))
            <div>
                <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    {{ $type === 'education' ? __('Key Subjects') : __('Technologies & Skills') }}
                </h4>
                <div class="flex flex-wrap gap-2">
                    @foreach(array_slice(explode(',', $item->getMeta('skills')), 0, 6) as $skill)
                        <span class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-md">
                            {{ trim($skill) }}
                        </span>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
@endif
