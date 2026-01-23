@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    @include('partials.header')
    
    <div class="container-fluid py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <h1 class="display-4 fw-bold">
                    <i class="bi bi-newspaper me-3 text-primary"></i>Blog Posts
                </h1>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row g-4">
                @forelse($blogs as $blog)
                    <a href="{{ route('blog.show', $blog) }}" class="col-md-6 col-lg-4 text-decoration-none">
                        <div class="card h-100 shadow-sm border-0 hover-shadow transition">
                            <div class="card-body d-flex flex-column">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-calendar3 text-primary me-2"></i>
                                    <small class="text-muted">{{ $blog->date->format('F d, Y') }}</small>
                                </div>
                                <h5 class="card-title fw-bold mb-3 text-dark">{{ $blog->title }}</h5>
                                <p class="card-text text-muted flex-grow-1">
                                    {!! str(strip_tags($blog->body_html))->limit(150) !!}
                                </p>
                                <div class="pt-3">
                                    <span class="badge bg-primary-subtle text-primary rounded-pill">
                                        <i class="bi bi-pencil-square me-1"></i>Blog
                                    </span>
                                </div>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="col-12">
                        <div class="alert alert-info text-center py-5" role="alert">
                            <i class="bi bi-inbox display-4 mb-3 d-block text-info"></i>
                            <p class="mb-0">No blog posts yet. Stay tuned for updates!</p>
                        </div>
                    </div>
                @endforelse
            </div>

            @if($blogs->hasPages())
                <div class="d-flex justify-content-center mt-5">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </div>
            @endif
        </div>
    </div>

    <style>
        .hover-shadow {
            transition: box-shadow 0.3s ease;
        }
        .hover-shadow:hover {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
        .bg-primary-subtle {
            background-color: rgba(13, 110, 253, 0.1);
        }
    </style>
    
    @include('partials.footer')
@endsection