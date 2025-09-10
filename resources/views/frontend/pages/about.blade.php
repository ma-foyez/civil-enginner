@extends('frontend.layouts.app')

@section('title', 'About Me - Civil Engineer Portfolio')

@section('content')
<section class="about-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">About Me</h1>
                <p class="lead">Learn about my background, expertise and approach to civil engineering</p>
            </div>
        </div>
    </div>
</section>

@if($about)
<section class="about-main py-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-8">
                <h2>{{ $about->title }}</h2>
                <p class="lead mb-4">{{ $about->short_description }}</p>
                <div class="about-full-description">
                    {!! nl2br($about->full_description) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="row g-4">
                    @if($about->years_of_experience)
                    <div class="col-6">
                        <div class="card text-center h-100 p-3">
                            <h3 class="h1 text-primary">{{ $about->years_of_experience }}+</h3>
                            <p class="mb-0">Years Experience</p>
                        </div>
                    </div>
                    @endif
                    @if($about->projects_completed)
                    <div class="col-6">
                        <div class="card text-center h-100 p-3">
                            <h3 class="h1 text-primary">{{ $about->projects_completed }}+</h3>
                            <p class="mb-0">Projects Done</p>
                        </div>
                    </div>
                    @endif
                    @if($about->happy_clients)
                    <div class="col-6">
                        <div class="card text-center h-100 p-3">
                            <h3 class="h1 text-primary">{{ $about->happy_clients }}+</h3>
                            <p class="mb-0">Happy Clients</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        @if($about->specializations && count($about->specializations) > 0)
        <div class="row mb-5">
            <div class="col-12">
                <h3 class="mb-4">Areas of Specialization</h3>
                <div class="row">
                    @foreach($about->specializations as $specialization)
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 p-3">
                            <h4 class="h5">{{ $specialization }}</h4>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif

        @if($about->skills && count($about->skills) > 0)
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4">Skills & Technologies</h3>
                <div class="d-flex flex-wrap gap-2">
                    @foreach($about->skills as $skill)
                    <span class="badge bg-light text-dark p-2">{{ $skill }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endif
@endsection
