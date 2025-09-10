@extends('frontend.layouts.app')

@section('title', 'Experience - Civil Engineer Portfolio')

@section('content')
<section class="experience-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Professional Experience</h1>
                <p class="lead">My career journey and professional achievements</p>
            </div>
        </div>
    </div>
</section>

<section class="experience-timeline py-5">
    <div class="container">
        @if(isset($experiences) && $experiences->count() > 0)
            <div class="row">
                <div class="col-12">
                    <div class="timeline">
                        @foreach($experiences as $experience)
                        <div class="timeline-item">
                            <div class="timeline-year">
                                <span>{{ $experience->start_date->format('Y') }} - {{ $experience->is_current ? 'Present' : $experience->end_date->format('Y') }}</span>
                            </div>
                            <div class="timeline-content">
                                <div class="card">
                                    <div class="card-body">
                                        <h3 class="h4">{{ $experience->position }}</h3>
                                        <h4 class="h5 text-muted">{{ $experience->company }}</h4>
                                        <p class="text-secondary mb-3">{{ $experience->start_date->format('M Y') }} - {{ $experience->is_current ? 'Present' : $experience->end_date->format('M Y') }}</p>

                                        @if($experience->description)
                                        <div class="mt-3">
                                            <p>{{ $experience->description }}</p>
                                        </div>
                                        @endif

                                        @if($experience->responsibilities && count($experience->responsibilities) > 0)
                                        <div class="mt-3">
                                            <h5>Key Responsibilities</h5>
                                            <ul class="list-group list-group-flush">
                                                @foreach($experience->responsibilities as $responsibility)
                                                <li class="list-group-item">{{ $responsibility }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        @if($experience->achievements && count($experience->achievements) > 0)
                                        <div class="mt-3">
                                            <h5>Key Achievements</h5>
                                            <ul class="list-group list-group-flush">
                                                @foreach($experience->achievements as $achievement)
                                                <li class="list-group-item">{{ $achievement }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No experience records found. Check back soon for updates!
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

<section class="skills py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>Professional Skills</h2>
                <p>Key technical and soft skills developed throughout my career</p>
            </div>
        </div>

        @if(isset($skills) && $skills->count() > 0)
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h3 class="h5">Technical Skills</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($skills->where('category', 'technical') as $skill)
                                <div class="col-md-6 mb-3">
                                    <div class="skill-item">
                                        <h4 class="h6 mb-2">{{ $skill->name }}</h4>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $skill->proficiency }}%"
                                                 aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100">
                                                {{ $skill->proficiency }}%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header">
                            <h3 class="h5">Soft Skills</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($skills->where('category', 'soft') as $skill)
                                <div class="col-md-6 mb-3">
                                    <div class="skill-item">
                                        <h4 class="h6 mb-2">{{ $skill->name }}</h4>
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: {{ $skill->proficiency }}%"
                                                 aria-valuenow="{{ $skill->proficiency }}" aria-valuemin="0" aria-valuemax="100">
                                                {{ $skill->proficiency }}%
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-info text-center">
                        No skills data found. Check back soon for updates!
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
@endsection

@push('styles')
<style>
    .timeline {
        position: relative;
        padding: 20px 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        width: 2px;
        background: #dee2e6;
        top: 0;
        bottom: 0;
        left: 50px;
        margin-left: -1px;
    }

    .timeline-item {
        padding-left: 80px;
        position: relative;
        margin-bottom: 50px;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-year {
        position: absolute;
        width: 50px;
        text-align: right;
        left: 0;
        top: 0;
        font-weight: bold;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        left: 42px;
        top: 15px;
        background: var(--bs-primary);
    }

    .progress {
        height: 10px;
    }
</style>
@endpush
