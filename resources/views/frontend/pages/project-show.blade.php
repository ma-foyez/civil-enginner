@extends('frontend.layouts.app')

@section('title', $project->title . ' - Civil Engineer Portfolio')

@section('content')
<section class="project-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-2">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('projects') }}" class="text-white">Projects</a></li>
                        <li class="breadcrumb-item active text-white-50" aria-current="page">{{ $project->title }}</li>
                    </ol>
                </nav>
                <h1 class="display-4">{{ $project->title }}</h1>
                <div class="d-flex flex-wrap align-items-center mt-3">
                    @if($project->category)
                        <span class="badge bg-light text-primary me-2 mb-2">{{ $project->category->name }}</span>
                    @endif

                    @if($project->completion_date)
                        <span class="badge bg-light text-primary me-2 mb-2">
                            <i class="far fa-calendar-alt me-1"></i> {{ $project->completion_date->format('M Y') }}
                        </span>
                    @endif

                    @if($project->location)
                        <span class="badge bg-light text-primary me-2 mb-2">
                            <i class="fas fa-map-marker-alt me-1"></i> {{ $project->location }}
                        </span>
                    @endif

                    @if($project->client)
                        <span class="badge bg-light text-primary me-2 mb-2">
                            <i class="fas fa-user me-1"></i> {{ $project->client }}
                        </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

<section class="project-gallery py-5">
    <div class="container">
        <div class="row">
            @if($project->featured_image || ($project->gallery && count($project->gallery) > 0))
                <div class="col-lg-8">
                    <div id="projectCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                        <div class="carousel-inner rounded shadow">
                            @if($project->featured_image)
                                <div class="carousel-item active">
                                    <img src="{{ $project->featured_image }}" class="d-block w-100" alt="{{ $project->title }}">
                                </div>
                            @endif

                            @if($project->gallery && count($project->gallery) > 0)
                                @foreach($project->gallery as $index => $image)
                                    <div class="carousel-item {{ !$project->featured_image && $index === 0 ? 'active' : '' }}">
                                        <img src="{{ $image->url }}" class="d-block w-100" alt="{{ $image->caption ?? $project->title }}">
                                        @if($image->caption)
                                            <div class="carousel-caption d-none d-md-block">
                                                <p>{{ $image->caption }}</p>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        @if(($project->gallery && count($project->gallery) > 0) || $project->featured_image)
                            <button class="carousel-control-prev" type="button" data-bs-target="#projectCarousel" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#projectCarousel" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                            <div class="carousel-indicators position-static mt-2">
                                @if($project->featured_image)
                                    <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Featured Image"></button>
                                @endif

                                @if($project->gallery && count($project->gallery) > 0)
                                    @foreach($project->gallery as $index => $image)
                                        @php $slideIndex = $project->featured_image ? $index + 1 : $index; @endphp
                                        <button type="button" data-bs-target="#projectCarousel" data-bs-slide-to="{{ $slideIndex }}"
                                            aria-label="Gallery Image {{ $index + 1 }}"
                                            class="{{ !$project->featured_image && $index === 0 ? 'active' : '' }}"></button>
                                    @endforeach
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            @endif

            <div class="{{ ($project->featured_image || ($project->gallery && count($project->gallery) > 0)) ? 'col-lg-4' : 'col-12' }}">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h2 class="card-title h3 border-bottom pb-3 mb-3">Project Details</h2>

                        <div class="project-info">
                            @if($project->budget)
                                <div class="d-flex mb-3">
                                    <div class="project-info-icon me-3">
                                        <i class="fas fa-dollar-sign text-primary"></i>
                                    </div>
                                    <div>
                                        <h3 class="h6 mb-0">Budget</h3>
                                        <p class="mb-0">{{ $project->budget }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($project->duration)
                                <div class="d-flex mb-3">
                                    <div class="project-info-icon me-3">
                                        <i class="fas fa-clock text-primary"></i>
                                    </div>
                                    <div>
                                        <h3 class="h6 mb-0">Duration</h3>
                                        <p class="mb-0">{{ $project->duration }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($project->scope)
                                <div class="d-flex mb-3">
                                    <div class="project-info-icon me-3">
                                        <i class="fas fa-tasks text-primary"></i>
                                    </div>
                                    <div>
                                        <h3 class="h6 mb-0">Project Scope</h3>
                                        <p class="mb-0">{{ $project->scope }}</p>
                                    </div>
                                </div>
                            @endif

                            @if($project->team && count($project->team) > 0)
                                <div class="d-flex mb-3">
                                    <div class="project-info-icon me-3">
                                        <i class="fas fa-users text-primary"></i>
                                    </div>
                                    <div>
                                        <h3 class="h6 mb-0">Team</h3>
                                        <p class="mb-0">{{ implode(', ', $project->team) }}</p>
                                    </div>
                                </div>
                            @endif
                        </div>

                        @if($project->tags && $project->tags->count() > 0)
                            <div class="mt-4">
                                <h3 class="h6">Tags</h3>
                                <div class="d-flex flex-wrap gap-1">
                                    @foreach($project->tags as $tag)
                                        <span class="badge bg-light text-dark">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="project-content py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="mb-4">Project Overview</h2>
                        <div class="mb-4">
                            {{ $project->description }}
                        </div>

                        @if($project->challenges)
                            <h3 class="h4 mt-5 mb-3">Challenges</h3>
                            <div class="mb-4">
                                {{ $project->challenges }}
                            </div>
                        @endif

                        @if($project->solutions)
                            <h3 class="h4 mt-5 mb-3">Solutions</h3>
                            <div class="mb-4">
                                {{ $project->solutions }}
                            </div>
                        @endif

                        @if($project->results)
                            <h3 class="h4 mt-5 mb-3">Results</h3>
                            <div class="mb-4">
                                {{ $project->results }}
                            </div>
                        @endif

                        @if($project->technologies && count($project->technologies) > 0)
                            <h3 class="h4 mt-5 mb-3">Technologies & Methods Used</h3>
                            <div class="row">
                                <div class="col-md-8">
                                    <ul class="list-group list-group-flush">
                                        @foreach($project->technologies as $tech)
                                            <li class="list-group-item bg-transparent ps-0">
                                                <i class="fas fa-check-circle text-primary me-2"></i> {{ $tech }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if(isset($testimonial) && $testimonial)
<section class="project-testimonial py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4 p-md-5">
                        <h2 class="text-center mb-4">Client Testimonial</h2>
                        <div class="d-flex justify-content-center mb-4">
                            @for($i = 0; $i < 5; $i++)
                                <i class="fas fa-star {{ $i < $testimonial->rating ? 'text-warning' : 'text-muted' }} mx-1"></i>
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
        </div>
    </div>
</section>
@endif

<section class="related-projects py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h2>Related Projects</h2>
            </div>
        </div>

        @if(isset($relatedProjects) && $relatedProjects->count() > 0)
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach($relatedProjects as $relatedProject)
                <div class="col">
                    <div class="card h-100 shadow-sm project-card">
                        <div class="project-image-container">
                            @if($relatedProject->featured_image)
                                <img src="{{ $relatedProject->featured_image }}" class="card-img-top" alt="{{ $relatedProject->title }}">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                                    <i class="fas fa-building fa-3x text-secondary"></i>
                                </div>
                            @endif
                            <div class="project-overlay">
                                <a href="{{ route('projects.show', $relatedProject->slug) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title h5">{{ $relatedProject->title }}</h3>
                            <p class="card-text">{{ Str::limit($relatedProject->description, 100) }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info">
                        No related projects found.
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<section class="cta-section py-5 bg-primary text-white">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 text-center text-md-start">
                <h2>Have a Similar Project in Mind?</h2>
                <p class="lead mb-0">Let's discuss how I can help bring your vision to life.</p>
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
    .carousel-item img {
        height: 500px;
        object-fit: cover;
    }

    .project-info-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background-color: rgba(var(--bs-primary-rgb), 0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }

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

    .carousel-indicators button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }

    @media (max-width: 767.98px) {
        .carousel-item img {
            height: 300px;
        }
    }
</style>
@endpush
