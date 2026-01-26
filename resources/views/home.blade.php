
@extends('layouts.app')
@section('title', 'Home')
@section('content')
@include('partials.header')
<style>
   .banner-section {
            position: relative;
            height: 500px;
            overflow: hidden;
        }
        
        .banner-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
.banner-overlay {
position: absolute;
    top: 530px;
    left: 0;
    width: 100%;
    height: 62%;
    background: radial-gradient(ellipse 121% 160% at top, /* Perbesar elipse */ rgba(232, 243, 255, 0) 44%, rgba(232, 243, 255, 0.8) 53%, rgb(232, 243, 255) 56%);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;

}
        
        .banner-title {
            font-size: 3.5rem;
            font-weight: bold;
            color: #f7f7f7;
            margin-bottom: 2rem;
        }
        
        .banner-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .banner-buttons .btn {
            padding: 0.75rem 2rem;
            font-size: 1.1rem;
            font-weight: 500;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background-color: #3498db;
            border: none;
        }
        
        .btn-primary:hover {
            background-color: #2980b9;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        .btn-outline-primary {
            border: 2px solid #3498db;
            color: #3498db;
        }
        
        .btn-outline-primary:hover {
            background-color: #3498db;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        
        @media (max-width: 768px) {
            .banner-title {
                font-size: 2.5rem;
            }
            
            .banner-section {
                height: 400px;
            }
            
            .banner-buttons .btn {
                padding: 0.6rem 1.5rem;
                font-size: 1rem;
            }
        }
</style>
    <section>
        <img src="{{ asset('images/head/header.png') }}" alt="Banner Azzahra Computer" class="img-fluid h-100 w-100">  
        <div class="banner-overlay">
        <h1 class="banner-title" style="margin-top: -30px;">Azzahra Computer</h1>
            <div class="banner-buttons">
                <button class="btn btn-primary">Shop Now</button>
                <button class="btn btn-outline-primary">Service Center</button>
                <button class="btn btn-outline-primary">All Product</button>
            </div>
        </div>
    </section>

     <!-- Brands -->
    <section class="brand-section container py-5">
        <x-brandShow/>
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

   

@include('partials.footer')
@endsection
