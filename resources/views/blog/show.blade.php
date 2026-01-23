@extends('layouts.app')
@section('title', $blog->title)
@section('content')
    @include('partials.header')
    
    <div class="container-fluid py-5 bg-light">
        <div class="container">
            <article>
                <div class="mb-4">
                    <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-arrow-left me-2"></i>Back to Posts
                    </a>
                </div>

                <div class="bg-white rounded-3 shadow-sm p-5 mb-5">
                    <header class="mb-5 pb-5 border-bottom">
                        <h1 class="display-5 fw-bold mb-4">{{ $blog->title }}</h1>
                        <div class="d-flex flex-wrap gap-3 text-muted">
                            <span>
                                <i class="bi bi-calendar3 me-2 text-primary"></i>
                                {{ $blog->date->format('F d, Y') }}
                            </span>
                            <span>
                                <i class="bi bi-bookmark-fill me-2 text-primary"></i>
                                <span class="badge bg-primary">Blog Post</span>
                            </span>
                        </div>
                    </header>

                    <div class="prose-content lh-lg">
                        {!! $blog->body_html !!}
                    </div>
                </div>
            </article>
        </div>
    </div>

    <style>
        .prose-content {
            font-size: 1.05rem;
            color: #333;
            line-height: 1.8;
        }
        .prose-content h1 {
            font-size: 2rem;
            font-weight: 600;
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: #222;
        }
        .prose-content h2 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 1.5rem;
            margin-bottom: 0.8rem;
            color: #333;
        }
        .prose-content p {
            margin-bottom: 1rem;
        }
        .prose-content ul, .prose-content ol {
            margin-bottom: 1rem;
            margin-left: 2rem;
        }
        .prose-content li {
            margin-bottom: 0.5rem;
        }
        .prose-content code {
            background-color: #f5f5f5;
            padding: 0.2rem 0.4rem;
            border-radius: 0.25rem;
            font-family: 'Courier New', monospace;
            color: #d63384;
        }
        .prose-content pre {
            background-color: #f5f5f5;
            padding: 1rem;
            border-radius: 0.5rem;
            overflow-x: auto;
            margin-bottom: 1rem;
        }
        .prose-content blockquote {
            border-left: 4px solid #0d6efd;
            padding-left: 1rem;
            margin-left: 0;
            margin-bottom: 1rem;
            color: #666;
        }
        .prose-content img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1rem 0;
        }
    </style>
    
    @include('partials.footer')
@endsection