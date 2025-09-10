@extends('frontend.layouts.app')

@section('title', 'Home - Civil Engineer Portfolio')

@section('content')
<!-- Hero Section -->
@if($hero)
<section class="hero-section bg-primary text-white py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold">{{ $hero->title }}</h1>
                @if($hero->subtitle)
                    <h2 class="h4 mb-3">{{ $hero->subtitle }}</h2>
                @endif
                @if($hero->description)
                    <p class="lead mb-4">{{ $hero->description }}</p>
                @endif
                <div class="d-flex gap-3">
                    @if($hero->primary_button_text && $hero->primary_button_url)
                        <a href="{{ $hero->primary_button_url }}" class="btn btn-light btn-lg">{{ $hero->primary_button_text }}</a>
                    @endif
                    @if($hero->secondary_button_text && $hero->secondary_button_url)
                        <a href="{{ $hero->secondary_button_url }}" class="btn btn-outline-light btn-lg">{{ $hero->secondary_button_text }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- About Section -->
@if($about)
<section class="about-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="h1 mb-4">{{ $about->title }}</h2>
                <p class="lead mb-4">{{ $about->short_description }}</p>
                <div class="row text-center mb-5">
                    @if($about->years_of_experience)
                    <div class="col-md-4">
                        <h3 class="h2 text-primary">{{ $about->years_of_experience }}+</h3>
                        <p>Years Experience</p>
                    </div>
                    @endif
                    @if($about->projects_completed)
                    <div class="col-md-4">
                        <h3 class="h2 text-primary">{{ $about->projects_completed }}+</h3>
                        <p>Projects Completed</p>
                    </div>
                    @endif
                    @if($about->happy_clients)
                    <div class="col-md-4">
                        <h3 class="h2 text-primary">{{ $about->happy_clients }}+</h3>
                        <p>Happy Clients</p>
                    </div>
                    @endif
                </div>
                <a href="{{ route('frontend.about') }}" class="btn btn-primary">Learn More About Me</a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Featured Projects Section -->
@if($featured_projects && $featured_projects->count() > 0)
<section class="featured-projects py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1">Featured Projects</h2>
            <p class="lead">Some of my recent engineering projects</p>
        </div>
        <div class="row">
            @foreach($featured_projects as $project)
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text">{{ $project->description }}</p>
                        <div class="mb-3">
                            @if($project->location)
                                <small class="text-muted"><i class="fas fa-map-marker-alt"></i> {{ $project->location }}</small>
                            @endif
                        </div>
                        @if($project->project_value)
                            <div class="mb-3">
                                <strong class="text-primary">{{ $project->formatted_value }}</strong>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('frontend.portfolio.show', $project->slug) }}" class="btn btn-outline-primary">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('frontend.portfolio') }}" class="btn btn-primary">View All Projects</a>
        </div>
    </div>
</section>
@endif

<!-- Experience Section -->
@if($recent_experiences && $recent_experiences->count() > 0)
<section class="experience-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1">Work Experience</h2>
            <p class="lead">My professional journey</p>
        </div>
        <div class="row">
            @foreach($recent_experiences as $experience)
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $experience->position }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $experience->company_name }}</h6>
                        <p class="text-muted mb-2">{{ $experience->formatted_duration }}</p>
                        <p class="card-text">{{ Str::limit($experience->description, 100) }}</p>
                        @if($experience->location)
                            <small class="text-muted"><i class="fas fa-map-marker-alt"></i> {{ $experience->location }}</small>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('frontend.experience') }}" class="btn btn-primary">View Full Experience</a>
        </div>
    </div>
</section>
@endif

<!-- Blog Posts Section -->
@if($blog_posts && $blog_posts->count() > 0)
<section class="blog-section py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="h1">Latest Blog Posts</h2>
            <p class="lead">Insights and thoughts on civil engineering</p>
        </div>
        <div class="row">
            @foreach($blog_posts as $post)
            <div class="col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <small class="text-muted">{{ $post->published_at->format('M d, Y') }}</small>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-outline-primary">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Contact CTA Section -->
<section class="contact-cta py-5 bg-primary text-white">
    <div class="container text-center">
        <h2 class="h1 mb-4">Ready to Start Your Project?</h2>
        <p class="lead mb-4">Let's discuss how I can help bring your engineering vision to life.</p>
        <a href="{{ route('frontend.contact') }}" class="btn btn-light btn-lg">Get In Touch</a>
    </div>
</section>
@endsection
