@extends('frontend.layouts.app')

@section('title', 'Projects - Civil Engineer Portfolio')

@section('content')
<section class="projects-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Project Showcase</h1>
                <p class="lead">Explore my portfolio of civil engineering projects</p>
            </div>
        </div>
    </div>
</section>

<section class="projects-filter py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="{{ route('projects') }}" class="btn {{ !request()->has('category') ? 'btn-primary' : 'btn-outline-primary' }}">All Projects</a>

                    @if(isset($categories) && $categories->count() > 0)
                        @foreach($categories as $category)
                            <a href="{{ route('projects', ['category' => $category->slug]) }}"
                               class="btn {{ request('category') == $category->slug ? 'btn-primary' : 'btn-outline-primary' }}">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="projects-grid py-5">
    <div class="container">
        @if(isset($projects) && $projects->count() > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($projects as $project)
                <div class="col">
                    <div class="card h-100 shadow-sm project-card">
                        <div class="project-image-container">
                            @if($project->featured_image)
                                <img src="{{ $project->featured_image }}" class="card-img-top" alt="{{ $project->title }}">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-building fa-3x text-secondary"></i>
                                </div>
                            @endif
                            <div class="project-overlay">
                                <a href="{{ route('projects.show', $project->slug) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h5">{{ $project->title }}</h3>
                            <p class="card-text text-muted mb-2">
                                @if($project->location)
                                    <i class="fas fa-map-marker-alt me-1"></i> {{ $project->location }}
                                @endif

                                @if($project->completion_date)
                                    <span class="ms-2"><i class="far fa-calendar-alt me-1"></i> {{ $project->completion_date->format('M Y') }}</span>
                                @endif
                            </p>
                            <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            @if($project->category)
                                <span class="badge bg-secondary me-1">{{ $project->category->name }}</span>
                            @endif

                            @if($project->tags && $project->tags->count() > 0)
                                @foreach($project->tags->take(2) as $tag)
                                    <span class="badge bg-light text-dark me-1">{{ $tag->name }}</span>
                                @endforeach

                                @if($project->tags->count() > 2)
                                    <span class="badge bg-light text-dark">+{{ $project->tags->count() - 2 }}</span>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-center">
                    {{ $projects->links() }}
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No projects found. Check back soon for updates!
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<section class="project-stats py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-6 col-md-3 p-4 text-center border-end">
                                <div class="h1 mb-0 fw-bold text-primary">{{ $stats['total_projects'] ?? 0 }}</div>
                                <p class="text-muted">Total Projects</p>
                            </div>
                            <div class="col-6 col-md-3 p-4 text-center border-end">
                                <div class="h1 mb-0 fw-bold text-primary">{{ $stats['happy_clients'] ?? 0 }}</div>
                                <p class="text-muted">Happy Clients</p>
                            </div>
                            <div class="col-6 col-md-3 p-4 text-center border-end">
                                <div class="h1 mb-0 fw-bold text-primary">{{ $stats['categories'] ?? 0 }}</div>
                                <p class="text-muted">Project Types</p>
                            </div>
                            <div class="col-6 col-md-3 p-4 text-center">
                                <div class="h1 mb-0 fw-bold text-primary">{{ $stats['years_experience'] ?? 0 }}</div>
                                <p class="text-muted">Years Experience</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="cta-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 text-center text-md-start">
                <h2>Need a Civil Engineer for Your Project?</h2>
                <p class="lead mb-0">Let's discuss how my expertise can bring your vision to life.</p>
            </div>
            <div class="col-md-4 text-center text-md-end mt-3 mt-md-0">
                <a href="{{ route('contact') }}" class="btn btn-light btn-lg">Contact Me</a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .project-image-container {
        position: relative;
        overflow: hidden;
    }

    .project-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .project-card:hover .project-overlay {
        opacity: 1;
    }

    .card-img-top {
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .project-card:hover .card-img-top {
        transform: scale(1.05);
    }

    .pagination {
        --bs-pagination-color: var(--bs-primary);
        --bs-pagination-active-bg: var(--bs-primary);
        --bs-pagination-active-border-color: var(--bs-primary);
    }
</style>
@endpush
