@extends('frontend.layouts.app')

@section('title', 'Education - Civil Engineer Portfolio')

@section('content')
<section class="education-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">Education & Credentials</h1>
                <p class="lead">My academic background and professional certifications</p>
            </div>
        </div>
    </div>
</section>

<section class="education-timeline py-5">
    <div class="container">
        @if(isset($educations) && $educations->count() > 0)
            <div class="row">
                <div class="col-12">
                    <h2 class="mb-4">Academic Background</h2>
                    <div class="timeline">
                        @foreach($educations as $education)
                        <div class="timeline-item">
                            <div class="timeline-item-content">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-2">
                                            <h3 class="h4 mb-0">{{ $education->degree }}</h3>
                                            <span class="badge bg-primary">{{ $education->year_completed }}</span>
                                        </div>
                                        <h4 class="h5 text-muted">{{ $education->institution }}</h4>
                                        @if($education->description)
                                        <p class="mt-3">{{ $education->description }}</p>
                                        @endif
                                        @if($education->achievements && count($education->achievements) > 0)
                                        <div class="mt-3">
                                            <h5>Achievements</h5>
                                            <ul class="list-group list-group-flush">
                                                @foreach($education->achievements as $achievement)
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
                        No education records found. Check back soon for updates!
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

@if(isset($certifications) && $certifications->count() > 0)
<section class="certifications py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4">Professional Certifications</h2>
                <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                    @foreach($certifications as $cert)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h3 class="h5">{{ $cert->title }}</h3>
                                <p class="text-muted">{{ $cert->issuing_organization }}</p>
                                <div class="d-flex justify-content-between">
                                    <span>Issued: {{ $cert->issue_date->format('M Y') }}</span>
                                    @if($cert->expiry_date)
                                    <span>Expires: {{ $cert->expiry_date->format('M Y') }}</span>
                                    @else
                                    <span>No expiration</span>
                                    @endif
                                </div>
                                @if($cert->description)
                                <p class="mt-3">{{ $cert->description }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
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
        left: 20px;
        margin-left: -1px;
    }

    .timeline-item {
        padding-left: 40px;
        position: relative;
        margin-bottom: 30px;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-item::before {
        content: '';
        position: absolute;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        left: 12px;
        top: 15px;
        background: var(--bs-primary);
    }
</style>
@endpush
