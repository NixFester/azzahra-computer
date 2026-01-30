@extends('layouts.app')
@section('title', 'Home')
@section('content')

    @include('partials.header-mobile')

    <!-- Hero Section -->
    <x-Hero />

    <!-- Brands -->
    <section class="brand-section container py-5">
        <x-brandShow :brands="$brands" />
    </section>


    <!-- Banner -->
    <section class="text-white container">

        @include('components.bannerCarousel', ['banners' => $banners])

    </section>
    <!-- Rating  -->
    <section class="container pt-5 pb-3">
        <x-rating :ratings="app('App\Http\Controllers\RatingController')->getRatings()" />
    </section>


    <!-- Products -->
    <x-new-products-collection-mobile :products="app('App\Http\Controllers\ProductsController')->getFeaturedProducts()" :categories="$navCategories" />

    <!-- rusak kalau di hapus hehe -->
    <section class="container " style="display:none;">
        <x-products :products="app('App\Http\Controllers\ProductsController')->getFeaturedProducts()" :tabs="['Power Deals']" />
    </section>

    <!-- Info perusahaan -->
    <section class="profile-section py-5">
        <x-companyInfo />
    </section>



    @include('partials.footer-mobile')
@endsection
