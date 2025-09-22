@extends('frontend.layouts.app')

@section('title', $project->title . ' - Portfolio Project')

@section('content')
<section class="project-header py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('frontend.portfolio') }}">Portfolio</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $project->title }}</li>
                    </ol>
                </nav>
                <h1 class="display-4">{{ $project->title }}</h1>
                @if($project->category)
                <p class="text-muted">{{ $project->category->name }}</p>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="project-details py-5">
    <div class="container">
        <div class="row mb-4">
            <div class="col-lg-8">
                <p class="lead">{{ $project->description }}</p>
                <div class="project-content mt-4">
                    {!! $project->content !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Project Details</h5>
                        <ul class="list-group list-group-flush">
                            @if($project->client_name)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Client:</strong>
                                <span>{{ $project->client_name }}</span>
                            </li>
                            @endif
                            @if($project->location)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Location:</strong>
                                <span>{{ $project->location }}</span>
                            </li>
                            @endif
                            @if($project->project_value)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Project Value:</strong>
                                <span>{{ $project->formatted_value }}</span>
                            </li>
                            @endif
                            @if($project->start_date)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Start Date:</strong>
                                <span>{{ $project->start_date->format('M Y') }}</span>
                            </li>
                            @endif
                            @if($project->completion_date)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Completion:</strong>
                                <span>{{ $project->completion_date->format('M Y') }}</span>
                            </li>
                            @endif
                            @if(!$project->completion_date)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Status:</strong>
                                <span class="badge bg-primary">Ongoing</span>
                            </li>
                            @endif
                        </ul>

                        @if($project->technologies && count($project->technologies) > 0)
                        <div class="mt-3">
                            <h5>Technologies</h5>
                            <div class="d-flex flex-wrap gap-2 mt-2">
                                @foreach($project->technologies as $tech)
                                    <span class="badge bg-light text-dark">{{ $tech }}</span>
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

@if(isset($relatedProjects) && $relatedProjects->count() > 0)
<section class="related-projects py-5 bg-light">
    <div class="container">
        <h2 class="mb-4">Related Projects</h2>
        <div class="row">
            @foreach($relatedProjects as $relatedProject)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">{{ $relatedProject->title }}</h5>
                        <p class="card-text">{{ Str::limit($relatedProject->description, 100) }}</p>
                        <a href="{{ route('frontend.portfolio.show', $relatedProject->slug) }}" class="btn btn-outline-primary">View Project</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
