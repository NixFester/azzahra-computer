@extends('layouts.app')
@section('title', 'Home')
@section('content')
@include('partials.header')

    <!-- Banner Section -->
    <section class="text-white m-10" style="margin-bottom: 25px;">
        <div class="container">
            <img src="{{ asset('images/banner1.png') }}" alt="banner" class="">
        </div>
    </section>

    <!-- Rating Component -->
    <x-rating :ratings="app('App\Http\Controllers\RatingController')->getRatings()" />

    <!-- Categories Component -->
    <x-categories :categories="app('App\Http\Controllers\CategoriesController')->getCategories()" />

    <!-- Good Better Best -->
    <section class="container">
        <div class="row g-3">
            <div class="col-md-4">
                <div class="bg-light text-center py-5 fw-bold">GOOD</div>
            </div>
            <div class="col-md-4">
                <div class="bg-light text-center py-5 fw-bold">BETTER</div>
            </div>
            <div class="col-md-4">
                <div class="bg-light text-center py-5 fw-bold">BEST</div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="container">
        <x-stats-bar service-count="9000" satisfaction="8500" max-satisfaction="9000" customer-count="9500" />
    </section>

    <!-- Products Component -->
    <x-products :products="app('App\Http\Controllers\ProductsController')->getProducts()" :tabs="app('App\Http\Controllers\ProductsController')->getTabs()" />

    <section class="container">
        <img src="{{ asset('images/produkBanner.png') }}" alt="produk banner" class="img-fluid">

    </section>

    <!-- Company Info -->
    <section class="profile-section py-5">
        <div class="container">
            <!-- Main Company Profile -->
            <div class="row">
                <div class="col-12">
                    <div class="company-card">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="60">
                                <p class="company-info">
                                    Kami menyediakan solusi teknologi lengkap sejak 2010 — dari penjualan perangkat komputer, laptop,
                                    printer, CCTV, hingga pengembangan sistem digital dan pelatihan IT. Melayani instansi, pendidikan,
                                    dan bisnis dengan harga kompetitif, garansi resmi, dan tim profesional.
                                </p>
                                <div class="info-item">
                                    <span class="info-icon">📍</span>
                                    <span>Tegal, Jawa Tengah</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">📞</span>
                                    <span>WA: 0859-4200-1720</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">🌐</span>
                                    <span>bit.ly/ProfileAzzahraComputer</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="video-wrapper">
                                    <iframe src="https://www.youtube.com/embed/noDPPzCI1Uk" 
                                            allowfullscreen
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="section-divider"></div>

            <!-- Branch Profile -->
            <div class="row">
                <div class="col-12">
                    <div class="company-card">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo" height="60">
                        <h4 class="company-title">CABANG BEKASI</h4>
                                <p class="company-info">
                                    Cabang kami di Bekasi siap melayani kebutuhan teknologi Anda dengan layanan yang sama berkualitas.
                                    Akses mudah, stok lengkap, dan tim yang responsif untuk mendukung bisnis dan kebutuhan personal Anda.
                                </p>
                                <div class="info-item">
                                    <span class="info-icon">📍</span>
                                    <span>Cibubur, Bekasi, Jawa Barat</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">📞</span>
                                    <span>WA: 0818-0387-7777-1</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="video-wrapper">
                                    <iframe src="https://www.youtube.com/embed/DT1j33eBb2U " 
                                            allowfullscreen
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Brands -->
    <section class="brand-section container py-5">
        <h3 class="brand-title">
            AUTHORIZED MULTIBRAND SERVICE CENTER TEGAL
        </h3>

        <div class="brand-logos">
            <img src="{{ asset('images/asus.png') }}" alt="Asus">
            <img src="{{ asset('images/lenovo.png') }}" alt="Lenovo">
            <img src="{{ asset('images/zyrex.png') }}" alt="Zyrex">
            <img src="{{ asset('images/xiami.png') }}" alt="Xiaomi">
            <img src="{{ asset('images/avita.png') }}" alt="Avita">
            <img src="{{ asset('images/infinix.png') }}" alt="Infinix">
            <img src="{{ asset('images/canon.png') }}" alt="Canon">
            <img src="{{ asset('images/hp.png') }}" alt="HP">
        </div>
    </section>
@include('partials.footer')
@endsection
