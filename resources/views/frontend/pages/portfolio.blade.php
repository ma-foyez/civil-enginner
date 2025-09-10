@extends('frontend.layouts.app')

@section('title', 'Portfolio - Civil Engineer Projects')

@section('content')
<section class="portfolio-header py-5 bg-primary text-white">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="display-4">My Portfolio</h1>
                <p class="lead">Explore my civil engineering projects and achievements</p>
            </div>
        </div>
    </div>
</section>

<section class="portfolio-projects py-5">
    <div class="container">
        @if(isset($categories) && $categories->count() > 0)
        <div class="row mb-4">
            <div class="col-12">
                <div class="portfolio-filter">
                    <ul class="nav nav-pills mb-4 justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="#" data-filter="*">All Projects</a>
                        </li>
                        @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-filter=".{{ Str::slug($category->name) }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <div class="row">
            @forelse($projects as $project)
            <div class="col-md-6 col-lg-4 mb-4 portfolio-item {{ $project->category ? Str::slug($project->category->name) : '' }}">
                <div class="card h-100">
                    <div class="card-body">
                        @if($project->category)
                        <div class="badge bg-primary mb-2">{{ $project->category->name }}</div>
                        @endif
                        <h5 class="card-title">{{ $project->title }}</h5>
                        <p class="card-text">{{ Str::limit($project->description, 150) }}</p>

                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="small text-muted">{{ $project->duration }}</div>
                            <a href="{{ route('frontend.portfolio.show', $project->slug) }}" class="btn btn-sm btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="alert alert-info text-center">
                    No portfolio projects found. Check back soon for updates!
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Simple filtering functionality
        const filterLinks = document.querySelectorAll('.portfolio-filter .nav-link');
        const portfolioItems = document.querySelectorAll('.portfolio-item');

        filterLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Update active state
                filterLinks.forEach(l => l.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');

                // Show/hide items
                portfolioItems.forEach(item => {
                    if (filter === '*') {
                        item.style.display = 'block';
                    } else if (item.classList.contains(filter.substring(1))) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    });
</script>
@endpush
