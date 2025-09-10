<footer class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Company Info -->
            <div class="col-span-1 md:col-span-2">
                <div class="flex items-center space-x-2 mb-4">
                    @if($siteSettings['site_logo_dark'])
                        <img src="{{ asset($siteSettings['site_logo_dark']) }}" 
                             alt="{{ $siteSettings['site_name'] }}" 
                             class="h-8 w-auto">
                    @elseif($siteSettings['site_logo_lite'])
                        <img src="{{ asset($siteSettings['site_logo_lite']) }}" 
                             alt="{{ $siteSettings['site_name'] }}" 
                             class="h-8 w-auto">
                    @else
                        <span class="text-xl font-bold text-primary">
                            {{ $siteSettings['site_name'] }}
                        </span>
                    @endif
                </div>
                <p class="text-gray-300 mb-4 max-w-md">
                    {{ $siteSettings['site_description'] }}
                </p>
                
                <!-- Social Links -->
                <div class="flex space-x-4">
                    @if(config('settings.social_linkedin'))
                        <a href="{{ config('settings.social_linkedin') }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="text-gray-400 hover:text-primary transition-colors duration-200">
                            <iconify-icon icon="lucide:linkedin" class="w-5 h-5"></iconify-icon>
                        </a>
                    @endif
                    @if(config('settings.social_twitter'))
                        <a href="{{ config('settings.social_twitter') }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="text-gray-400 hover:text-primary transition-colors duration-200">
                            <iconify-icon icon="lucide:twitter" class="w-5 h-5"></iconify-icon>
                        </a>
                    @endif
                    @if(config('settings.social_github'))
                        <a href="{{ config('settings.social_github') }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="text-gray-400 hover:text-primary transition-colors duration-200">
                            <iconify-icon icon="lucide:github" class="w-5 h-5"></iconify-icon>
                        </a>
                    @endif
                    @if(config('settings.social_facebook'))
                        <a href="{{ config('settings.social_facebook') }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="text-gray-400 hover:text-primary transition-colors duration-200">
                            <iconify-icon icon="lucide:facebook" class="w-5 h-5"></iconify-icon>
                        </a>
                    @endif
                    @if(config('settings.social_instagram'))
                        <a href="{{ config('settings.social_instagram') }}" 
                           target="_blank" 
                           rel="noopener noreferrer"
                           class="text-gray-400 hover:text-primary transition-colors duration-200">
                            <iconify-icon icon="lucide:instagram" class="w-5 h-5"></iconify-icon>
                        </a>
                    @endif
                </div>
            </div>

            <!-- Quick Links -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('portfolio.home') }}" 
                           class="text-gray-300 hover:text-primary transition-colors duration-200">
                            {{ __('Home') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('portfolio.about') }}" 
                           class="text-gray-300 hover:text-primary transition-colors duration-200">
                            {{ __('About') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('portfolio.projects.index') }}" 
                           class="text-gray-300 hover:text-primary transition-colors duration-200">
                            {{ __('Portfolio') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('portfolio.education') }}" 
                           class="text-gray-300 hover:text-primary transition-colors duration-200">
                            {{ __('Education') }}
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('portfolio.experience') }}" 
                           class="text-gray-300 hover:text-primary transition-colors duration-200">
                            {{ __('Experience') }}
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <ul class="space-y-2">
                    @if(config('settings.contact_email'))
                        <li class="flex items-center space-x-2">
                            <iconify-icon icon="lucide:mail" class="w-4 h-4 text-gray-400"></iconify-icon>
                            <a href="mailto:{{ config('settings.contact_email') }}" 
                               class="text-gray-300 hover:text-primary transition-colors duration-200">
                                {{ config('settings.contact_email') }}
                            </a>
                        </li>
                    @endif
                    @if(config('settings.contact_phone'))
                        <li class="flex items-center space-x-2">
                            <iconify-icon icon="lucide:phone" class="w-4 h-4 text-gray-400"></iconify-icon>
                            <a href="tel:{{ config('settings.contact_phone') }}" 
                               class="text-gray-300 hover:text-primary transition-colors duration-200">
                                {{ config('settings.contact_phone') }}
                            </a>
                        </li>
                    @endif
                    @if(config('settings.contact_address'))
                        <li class="flex items-start space-x-2">
                            <iconify-icon icon="lucide:map-pin" class="w-4 h-4 text-gray-400 mt-1"></iconify-icon>
                            <span class="text-gray-300">
                                {{ config('settings.contact_address') }}
                            </span>
                        </li>
                    @endif
                    <li>
                        <a href="{{ route('portfolio.contact') }}" 
                           class="inline-flex items-center space-x-1 text-primary hover:text-white transition-colors duration-200">
                            <iconify-icon icon="lucide:send" class="w-4 h-4"></iconify-icon>
                            <span>{{ __('Send Message') }}</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Bottom Border -->
        <div class="border-t border-gray-800 mt-8 pt-8 flex flex-col sm:flex-row justify-between items-center">
            <p class="text-gray-400 text-sm">
                © {{ date('Y') }} {{ $siteSettings['site_name'] }}. {{ __('All rights reserved.') }}
            </p>
            <div class="flex items-center space-x-4 mt-4 sm:mt-0">
                <span class="text-gray-400 text-sm">
                    {{ __('Built with') }} 
                    <span class="text-red-500">♥</span> 
                    {{ __('using Laravel') }}
                </span>
            </div>
        </div>
    </div>
</footer>
