@extends('layouts.app')
@section('title', 'Home')
@section('content')
@include('partials.header')

    <section style="height: 1600px;">
        <img src="{{ asset('images/irisout.png') }}" alt="Banner Azzahra Computer" class="img-fluid h-100 w-100">  

    </section>

    <!-- Banner -->
    <section class="text-white container">
            
        @include('components.bannerCarousel',['banners' => $banners])
        
    </section>
    
    <!-- Rating  -->
    <section class="container">
        <x-rating :ratings="app('App\Http\Controllers\RatingController')->getRatings()" />
    </section>




    <!-- Categories -->
    <section class="container">
        <x-categories :categories="app('App\Http\Controllers\CategoriesController')->getCategories()" />
    </section>

    <!-- box -->
    <section class="container">
        <x-bannerIklan :urlgambar="['images/tiers/good.png', 'images/tiers/better.png', 'images/tiers/best.png']" />
    </section>

    @foreach($navCategories as $greeting)
        {{-- Just a test for loop --}}
        <p>{{ $greeting }}, welcome to Azzahra Computer!</p>
    @endforeach


    <!-- Stats -->
    <section class="container">
        <x-stats-bar service-count="9000" satisfaction="8500" max-satisfaction="9000" customer-count="9500" />
    </section>

    <!-- Products -->
    <section class="container">
        <x-products :products="app('App\Http\Controllers\ProductsController')->getFeaturedProducts()" :tabs="['Power Deals']" />
    </section>

    
    <!-- box -->
    <section class="container">
        <x-bannerIklan :urlgambar="['images/box1.png', 'images/box2.png', 'images/box3.png']" />
    </section>


    <!-- Info perusahaan -->
    <section class="profile-section py-5">
        <x-companyInfo/>
    </section>

    <!-- Brands -->
    <section class="brand-section container py-5">
        <x-brandShow/>
    </section>

@include('partials.footer')
@endsection
