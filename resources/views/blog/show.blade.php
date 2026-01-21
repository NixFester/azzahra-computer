@extends('layouts.app')
@section('title', $blog->title)
@section('content')
    @include('partials.header')
    
    <div class="container mx-auto px-4 py-8">
        <article class="bg-white shadow-md rounded-lg p-8">
            <h1 class="text-4xl font-bold mb-4">{{ $blog->title }}</h1>
            <p class="text-gray-600 mb-6">{{ $blog->date->format('F d, Y') }}</p>
            
            <div class="prose prose-lg max-w-none mb-6">
                {!! $blog->body_html !!}
            </div>

            <div class="flex gap-4">
                <a href="{{ route('blog.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                    ← Back to Posts
                </a>
                <a href="{{ route('blog.edit', $blog) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    Edit
                </a>
                <form action="{{ route('blog.destroy', $blog) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
                        Delete
                    </button>
                </form>
            </div>
        </article>
    </div>
    
    @include('partials.footer')
@endsection