@extends('frontend.layouts.app')

@section('title', 'Contact - Civil Engineer Portfolio')

@section('content')
<section class="contact-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Get in Touch</h1>
                <p class="lead">Let's discuss your civil engineering project needs</p>
            </div>
        </div>
    </div>
</section>

<section class="contact-form py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="pe-md-4">
                    <h2 class="mb-4">Send Me a Message</h2>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Your Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone Number (Optional)</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject" name="subject" value="{{ old('subject') }}" required>
                            @error('subject')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="message" class="form-label">Your Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                            @error('message')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="contact-info ps-md-4 mt-5 mt-md-0">
                    <h2 class="mb-4">Contact Information</h2>

                    @if(isset($contactInfo))
                    <div class="card mb-4">
                        <div class="card-body">
                            <ul class="list-unstyled">
                                @if($contactInfo->email)
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <div class="icon me-3">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                        <div>
                                            <h5>Email</h5>
                                            <p><a href="mailto:{{ $contactInfo->email }}">{{ $contactInfo->email }}</a></p>
                                        </div>
                                    </div>
                                </li>
                                @endif

                                @if($contactInfo->phone)
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <div class="icon me-3">
                                            <i class="fas fa-phone"></i>
                                        </div>
                                        <div>
                                            <h5>Phone</h5>
                                            <p><a href="tel:{{ $contactInfo->phone }}">{{ $contactInfo->phone }}</a></p>
                                        </div>
                                    </div>
                                </li>
                                @endif

                                @if($contactInfo->address)
                                <li class="mb-3">
                                    <div class="d-flex">
                                        <div class="icon me-3">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </div>
                                        <div>
                                            <h5>Office Address</h5>
                                            <p>{{ $contactInfo->address }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endif

                                @if($contactInfo->office_hours)
                                <li>
                                    <div class="d-flex">
                                        <div class="icon me-3">
                                            <i class="fas fa-clock"></i>
                                        </div>
                                        <div>
                                            <h5>Office Hours</h5>
                                            <p>{{ $contactInfo->office_hours }}</p>
                                        </div>
                                    </div>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    @endif

                    @if(isset($socialLinks) && $socialLinks->count() > 0)
                    <div class="social-links mb-4">
                        <h3 class="h5 mb-3">Connect With Me</h3>
                        <div class="d-flex">
                            @foreach($socialLinks as $link)
                            <a href="{{ $link->url }}" class="btn btn-outline-primary me-2" target="_blank" title="{{ $link->platform }}">
                                <i class="fab fa-{{ strtolower($link->platform) }}"></i>
                            </a>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    @if(isset($contactInfo) && $contactInfo->map_embed)
                    <div class="map-container">
                        <h3 class="h5 mb-3">Location</h3>
                        <div class="ratio ratio-16x9">
                            {!! $contactInfo->map_embed !!}
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="faq py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>Frequently Asked Questions</h2>
                <p>Common questions about my services and expertise</p>
            </div>
        </div>

        @if(isset($faqs) && $faqs->count() > 0)
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $index => $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqHeading{{ $index }}">
                            <button class="accordion-button {{ $index > 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="faqCollapse{{ $index }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="faqCollapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="faqHeading{{ $index }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    .contact-info .icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: var(--bs-primary);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .map-container {
        border: 1px solid #dee2e6;
        border-radius: 0.375rem;
        overflow: hidden;
    }
</style>
@endpush
