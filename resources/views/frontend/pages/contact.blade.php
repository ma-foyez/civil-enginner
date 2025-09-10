<x-frontend.layouts.app>
    @php
        $pageTitle = __('Contact Me');
        $metaDescription = __('Get in touch for civil engineering consultations, project collaborations, or professional inquiries. Ready to discuss your next project.');
    @endphp

    <!-- Page Header -->
    <section class="pt-24 pb-16 bg-gradient-to-br from-indigo-50 to-indigo-100 dark:from-indigo-900/20 dark:to-indigo-800/20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="mb-6">
                    <div class="p-4 bg-indigo-100 dark:bg-indigo-900/30 rounded-full w-20 h-20 flex items-center justify-center mx-auto">
                        <iconify-icon icon="lucide:mail" class="w-10 h-10 text-indigo-600 dark:text-indigo-400"></iconify-icon>
                    </div>
                </div>
                
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ __('Contact Me') }}
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    {{ __('Ready to discuss your civil engineering project? I\'m here to help bring your vision to life with professional expertise and innovative solutions.') }}
                </p>
            </div>
        </div>
    </section>

    <div class="bg-white dark:bg-gray-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
                <!-- Contact Information -->
                <div class="lg:col-span-1">
                    <div class="sticky top-24">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                            {{ __('Let\'s Connect') }}
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300 mb-8">
                            {{ __('Whether you have a specific project in mind or need professional consultation, I\'m here to help. Let\'s discuss how we can work together.') }}
                        </p>

                        <!-- Contact Methods -->
                        <div class="space-y-6">
                            <!-- Email -->
                            @if($contactEmail = getSetting('contact_email'))
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="p-3 bg-indigo-100 dark:bg-indigo-900/40 rounded-lg">
                                            <iconify-icon icon="lucide:mail" class="w-6 h-6 text-indigo-600 dark:text-indigo-400"></iconify-icon>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                            {{ __('Email') }}
                                        </h3>
                                        <a href="mailto:{{ $contactEmail }}" 
                                           class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-500 dark:hover:text-indigo-300 transition-colors duration-200">
                                            {{ $contactEmail }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <!-- Phone -->
                            @if($contactPhone = getSetting('contact_phone'))
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="p-3 bg-green-100 dark:bg-green-900/40 rounded-lg">
                                            <iconify-icon icon="lucide:phone" class="w-6 h-6 text-green-600 dark:text-green-400"></iconify-icon>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                            {{ __('Phone') }}
                                        </h3>
                                        <a href="tel:{{ $contactPhone }}" 
                                           class="text-green-600 dark:text-green-400 hover:text-green-500 dark:hover:text-green-300 transition-colors duration-200">
                                            {{ $contactPhone }}
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <!-- Location -->
                            @if($contactLocation = getSetting('contact_location'))
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="p-3 bg-blue-100 dark:bg-blue-900/40 rounded-lg">
                                            <iconify-icon icon="lucide:map-pin" class="w-6 h-6 text-blue-600 dark:text-blue-400"></iconify-icon>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                            {{ __('Location') }}
                                        </h3>
                                        <p class="text-gray-600 dark:text-gray-300">
                                            {{ $contactLocation }}
                                        </p>
                                    </div>
                                </div>
                            @endif

                            <!-- Business Hours -->
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="p-3 bg-purple-100 dark:bg-purple-900/40 rounded-lg">
                                        <iconify-icon icon="lucide:clock" class="w-6 h-6 text-purple-600 dark:text-purple-400"></iconify-icon>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white">
                                        {{ __('Business Hours') }}
                                    </h3>
                                    <p class="text-gray-600 dark:text-gray-300">
                                        {{ getSetting('business_hours') ?? __('Monday - Friday: 9:00 AM - 6:00 PM') }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Social Links -->
                        @if($socialLinks = collect(['linkedin', 'twitter', 'facebook', 'instagram'])->filter(fn($platform) => getSetting("social_{$platform}"))->isNotEmpty())
                            <div class="mt-12">
                                <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">
                                    {{ __('Follow Me') }}
                                </h3>
                                <div class="flex space-x-4">
                                    @if($linkedin = getSetting('social_linkedin'))
                                        <a href="{{ $linkedin }}" 
                                           target="_blank" 
                                           rel="noopener noreferrer"
                                           class="p-3 bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900/40 rounded-lg transition-colors duration-200">
                                            <iconify-icon icon="lucide:linkedin" class="w-5 h-5 text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400"></iconify-icon>
                                        </a>
                                    @endif
                                    @if($twitter = getSetting('social_twitter'))
                                        <a href="{{ $twitter }}" 
                                           target="_blank" 
                                           rel="noopener noreferrer"
                                           class="p-3 bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900/40 rounded-lg transition-colors duration-200">
                                            <iconify-icon icon="lucide:twitter" class="w-5 h-5 text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400"></iconify-icon>
                                        </a>
                                    @endif
                                    @if($facebook = getSetting('social_facebook'))
                                        <a href="{{ $facebook }}" 
                                           target="_blank" 
                                           rel="noopener noreferrer"
                                           class="p-3 bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900/40 rounded-lg transition-colors duration-200">
                                            <iconify-icon icon="lucide:facebook" class="w-5 h-5 text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400"></iconify-icon>
                                        </a>
                                    @endif
                                    @if($instagram = getSetting('social_instagram'))
                                        <a href="{{ $instagram }}" 
                                           target="_blank" 
                                           rel="noopener noreferrer"
                                           class="p-3 bg-gray-100 dark:bg-gray-700 hover:bg-blue-100 dark:hover:bg-blue-900/40 rounded-lg transition-colors duration-200">
                                            <iconify-icon icon="lucide:instagram" class="w-5 h-5 text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400"></iconify-icon>
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-gray-50 dark:bg-gray-900 rounded-2xl p-8">
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">
                            {{ __('Send Me a Message') }}
                        </h2>

                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="mb-6 p-4 bg-green-100 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-lg">
                                <div class="flex">
                                    <iconify-icon icon="lucide:check-circle" class="w-5 h-5 text-green-600 dark:text-green-400 mt-0.5 mr-3"></iconify-icon>
                                    <p class="text-green-700 dark:text-green-300">
                                        {{ session('success') }}
                                    </p>
                                </div>
                            </div>
                        @endif

                        <!-- Error Messages -->
                        @if($errors->any())
                            <div class="mb-6 p-4 bg-red-100 dark:bg-red-900/30 border border-red-200 dark:border-red-800 rounded-lg">
                                <div class="flex">
                                    <iconify-icon icon="lucide:alert-circle" class="w-5 h-5 text-red-600 dark:text-red-400 mt-0.5 mr-3"></iconify-icon>
                                    <div>
                                        <p class="text-red-700 dark:text-red-300 font-medium mb-2">
                                            {{ __('Please correct the following errors:') }}
                                        </p>
                                        <ul class="text-red-600 dark:text-red-400 text-sm space-y-1">
                                            @foreach($errors->all() as $error)
                                                <li>• {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('portfolio.contact.send') }}" method="POST" class="space-y-6">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        {{ __('Full Name') }} <span class="text-red-500">*</span>
                                    </label>
                                    <input type="text" 
                                           id="name" 
                                           name="name" 
                                           value="{{ old('name') }}"
                                           required
                                           class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 @error('name') border-red-500 @enderror">
                                    @error('name')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        {{ __('Email Address') }} <span class="text-red-500">*</span>
                                    </label>
                                    <input type="email" 
                                           id="email" 
                                           name="email" 
                                           value="{{ old('email') }}"
                                           required
                                           class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 @error('email') border-red-500 @enderror">
                                    @error('email')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Phone -->
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        {{ __('Phone Number') }}
                                    </label>
                                    <input type="tel" 
                                           id="phone" 
                                           name="phone" 
                                           value="{{ old('phone') }}"
                                           class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 @error('phone') border-red-500 @enderror">
                                    @error('phone')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Subject -->
                                <div>
                                    <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        {{ __('Subject') }} <span class="text-red-500">*</span>
                                    </label>
                                    <select id="subject" 
                                            name="subject" 
                                            required
                                            class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 @error('subject') border-red-500 @enderror">
                                        <option value="">{{ __('Select a subject') }}</option>
                                        <option value="consultation" {{ old('subject') == 'consultation' ? 'selected' : '' }}>
                                            {{ __('Project Consultation') }}
                                        </option>
                                        <option value="collaboration" {{ old('subject') == 'collaboration' ? 'selected' : '' }}>
                                            {{ __('Collaboration Opportunity') }}
                                        </option>
                                        <option value="quote" {{ old('subject') == 'quote' ? 'selected' : '' }}>
                                            {{ __('Request Quote') }}
                                        </option>
                                        <option value="general" {{ old('subject') == 'general' ? 'selected' : '' }}>
                                            {{ __('General Inquiry') }}
                                        </option>
                                        <option value="other" {{ old('subject') == 'other' ? 'selected' : '' }}>
                                            {{ __('Other') }}
                                        </option>
                                    </select>
                                    @error('subject')
                                        <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    {{ __('Message') }} <span class="text-red-500">*</span>
                                </label>
                                <textarea id="message" 
                                          name="message" 
                                          rows="6" 
                                          required
                                          placeholder="{{ __('Please describe your project or inquiry in detail...') }}"
                                          class="w-full px-4 py-3 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-colors duration-200 resize-vertical @error('message') border-red-500 @enderror">{{ old('message') }}</textarea>
                                @error('message')
                                    <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Privacy Notice -->
                            <div class="p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
                                <div class="flex">
                                    <iconify-icon icon="lucide:shield" class="w-5 h-5 text-blue-600 dark:text-blue-400 mt-0.5 mr-3"></iconify-icon>
                                    <p class="text-sm text-blue-700 dark:text-blue-300">
                                        {{ __('Your privacy is important to me. All information submitted through this form will be kept confidential and used solely for responding to your inquiry.') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" 
                                        class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:ring-indigo-200 dark:focus:ring-indigo-800 text-white font-medium rounded-lg transition-all duration-200 shadow-lg hover:shadow-xl">
                                    <iconify-icon icon="lucide:send" class="w-5 h-5 mr-2"></iconify-icon>
                                    {{ __('Send Message') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Contact Information -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    {{ __('Why Work With Me?') }}
                </h2>
                <p class="text-lg text-gray-600 dark:text-gray-300">
                    {{ __('Here\'s what you can expect when we collaborate on your project.') }}
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Professional Expertise -->
                <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                    <div class="mb-4">
                        <div class="p-3 bg-blue-100 dark:bg-blue-900/40 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                            <iconify-icon icon="lucide:award" class="w-8 h-8 text-blue-600 dark:text-blue-400"></iconify-icon>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                        {{ __('Professional Expertise') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ __('Years of experience in civil engineering with a proven track record of successful projects.') }}
                    </p>
                </div>

                <!-- Reliable Communication -->
                <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                    <div class="mb-4">
                        <div class="p-3 bg-green-100 dark:bg-green-900/40 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                            <iconify-icon icon="lucide:message-circle" class="w-8 h-8 text-green-600 dark:text-green-400"></iconify-icon>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                        {{ __('Clear Communication') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ __('Regular updates and transparent communication throughout the entire project lifecycle.') }}
                    </p>
                </div>

                <!-- Quality Delivery -->
                <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-lg shadow-sm">
                    <div class="mb-4">
                        <div class="p-3 bg-purple-100 dark:bg-purple-900/40 rounded-full w-16 h-16 flex items-center justify-center mx-auto">
                            <iconify-icon icon="lucide:check-circle" class="w-8 h-8 text-purple-600 dark:text-purple-400"></iconify-icon>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                        {{ __('Quality Delivery') }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300">
                        {{ __('Commitment to delivering high-quality solutions on time and within budget.') }}
                    </p>
                </div>
            </div>
        </div>
    </section>
</x-frontend.layouts.app>
