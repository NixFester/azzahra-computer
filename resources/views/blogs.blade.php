@extends('layouts.app')
@section('title', 'blogs - Azzahra Computer')
@section('content')

    @include('partials.header-mobile')

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">Welcome to Our Blog</h1>
        <p class="text-lg mb-4">Discover our latest articles and insights.</p>
        <a href="{{ route('blog.index') }}" class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
            View All Posts
        </a>
    </div>

    @include('partials.footer-mobile')
@endsection
