@extends('layouts.app')
@section('title', 'Blog')
@section('content')
    @include('partials.header')
    
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-4xl font-bold mt-4">Blog Posts</h1>
            <a href="{{ route('blog.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                New Post
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6">
            @forelse($blogs as $blog)
                <article class=" shadow-md rounded-lg p-6">
                    <h2 class="text-2xl font-bold mb-2">
                        <a href="{{ route('blog.show', $blog) }}" class="hover:text-blue-600">
                            {{ $blog->title }}
                        </a>
                    </h2>
                    <p class="text-gray-600 text-sm mb-4">{{ $blog->date->format('F d, Y') }}</p>
                    <div class="text-gray-700 prose prose-sm">
                {!! str(strip_tags($blog->body_html))->limit(200) !!}
            </div>
                    <a href="{{ route('blog.show', $blog) }}" class="text-blue-500 hover:underline mt-2 inline-block">
                        Read more →
                    </a>
                </article>
            @empty
                <p class="text-gray-600">No blog posts yet. Create your first post!</p>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $blogs->links() }}
        </div>
    </div>
    
    @include('partials.footer')
@endsection