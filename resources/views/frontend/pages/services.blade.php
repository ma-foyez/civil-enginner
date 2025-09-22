@extends('frontend.layouts.app')

@section('title', 'Services - Civil Engineer Portfolio')

@section('content')
<section class="services-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Professional Services</h1>
                <p class="lead">Expert civil engineering solutions for your projects</p>
            </div>
        </div>
    </div>
</section>

<section class="services-intro py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="text-center mb-4">How I Can Help You</h2>
                        <p class="lead text-center mb-4">As a civil engineer with extensive experience, I provide comprehensive engineering services across various domains to meet your project needs with precision and expertise.</p>

                        @if(isset($serviceIntro) && $serviceIntro->description)
                            <p>{{ $serviceIntro->description }}</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="services-list py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>Services Offered</h2>
                <p>Comprehensive civil engineering solutions tailored to your needs</p>
            </div>
        </div>

        @if(isset($services) && $services->count() > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($services as $service)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        @if($service->icon)
                        <div class="service-icon p-4 text-center">
                            <i class="fas fa-{{ $service->icon }} fa-3x text-primary"></i>
                        </div>
                        @endif
                        <div class="card-body">
                            <h3 class="card-title h4">{{ $service->title }}</h3>
                            <p class="card-text">{{ $service->description }}</p>

                            @if($service->key_features && count($service->key_features) > 0)
                            <ul class="list-group list-group-flush mt-3">
                                @foreach($service->key_features as $feature)
                                <li class="list-group-item bg-transparent">
                                    <i class="fas fa-check-circle text-success me-2"></i> {{ $feature }}
                                </li>
                                @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No services data found. Check back soon for updates!
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<section class="service-process py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h2>My Work Process</h2>
                <p>How I approach each civil engineering project</p>
            </div>
        </div>

        @if(isset($workProcess) && count($workProcess) > 0)
            <div class="row">
                <div class="col-12">
                    <div class="process-timeline">
                        @foreach($workProcess as $index => $step)
                        <div class="process-step d-flex">
                            <div class="process-step-number">
                                <span>{{ $index + 1 }}</span>
                            </div>
                            <div class="process-step-content">
                                <div class="card border-0 shadow-sm">
                                    <div class="card-body">
                                        <h3 class="h4">{{ $step->title }}</h3>
                                        <p>{{ $step->description }}</p>
                                    </div>
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

<section class="service-cta py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 text-center text-md-start">
                <h2>Ready to Start Your Project?</h2>
                <p class="lead mb-0">Let's discuss your civil engineering needs and how I can help you achieve your goals.</p>
            </div>
            <div class="col-md-4 text-center text-md-end mt-3 mt-md-0">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Get in Touch</a>
            </div>
        </div>
    </div>
</section>

<section class="testimonials py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>Client Testimonials</h2>
                <p>What others say about my engineering services</p>
            </div>
        </div>

        @if(isset($testimonials) && $testimonials->count() > 0)
            <div class="row">
                <div class="col-12">
                    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($testimonials as $index => $testimonial)
                                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body p-4 p-md-5">
                                            <div class="d-flex justify-content-center mb-4">
                                                @for($i = 0; $i < 5; $i++)
                                                    <i class="fas fa-star {{ $i < $testimonial->rating ? 'text-warning' : 'text-muted' }}"></i>
                                                @endfor
                                            </div>
                                            <blockquote class="blockquote text-center mb-0">
                                                <p class="mb-4">{{ $testimonial->content }}</p>
                                                <footer class="blockquote-footer">
                                                    {{ $testimonial->client_name }}
                                                    @if($testimonial->client_company)
                                                        <cite title="{{ $testimonial->client_company }}"> - {{ $testimonial->client_company }}</cite>
                                                    @endif
                                                </footer>
                                            </blockquote>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    .service-icon {
        transition: transform 0.3s ease;
    }

    .card:hover .service-icon {
        transform: scale(1.1);
    }

    .process-timeline {
        position: relative;
        max-width: 800px;
        margin: 0 auto;
    }

    .process-step {
        margin-bottom: 40px;
    }

    .process-step:last-child {
        margin-bottom: 0;
    }

    .process-step-number {
        width: 50px;
        min-width: 50px;
        height: 50px;
        background-color: var(--bs-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 1.2rem;
        margin-right: 20px;
    }

    .process-step-content {
        flex-grow: 1;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: auto;
        opacity: 1;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 40px;
        height: 40px;
        padding: 10px;
        background-size: 50% 50%;
    }
</style>
@endpush
