@extends('layouts.app')
@section('title', 'Home')
@section('content')
@include('partials.header')
<section class="text-white">
    <div class="container">

        <div id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">

            {{-- Indicators (titik bawah) --}}
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="3"></button>
            </div>

            {{-- Slides --}}
            <div class="carousel-inner">

                <div class="carousel-item active">
                    <a href="/promo-1">
                        <img src="{{ asset('images/banner1.png') }}" class="d-block w-100" alt="Banner 1">
                    </a>
                </div>

                <div class="carousel-item">
                    <a href="/promo-2">
                        <img src="{{ asset('images/banner2.png') }}" class="d-block w-100" alt="Banner 2">
                    </a>
                </div>

                <div class="carousel-item">
                    <a href="/promo-3">
                        <img src="{{ asset('images/banner3.png') }}" class="d-block w-100" alt="Banner 3">
                    </a>
                </div>

                <div class="carousel-item">
                    <a href="/promo-4">
                        <img src="{{ asset('images/banner4.png') }}" class="d-block w-100" alt="Banner 4">
                    </a>
                </div>

            </div>

            {{-- Prev / Next --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>

    </div>
</section>


    <!-- Rating Component -->
    <x-rating :ratings="app('App\Http\Controllers\RatingController')->getRatings()" />

    <!-- Categories Component -->
    <x-categories :categories="app('App\Http\Controllers\CategoriesController')->getCategories()" />

    <!-- Good Better Best -->
    <section class="container">
    <div class="row g-3 text-center">
        <div class="col-md-4">
            <img src="{{ asset('images/tiers/good.png') }}"
                 alt="Good"
                 class="img-fluid">
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/tiers/better.png') }}"
                 alt="Better"
                 class="img-fluid">
        </div>
        <div class="col-md-4">
            <img src="{{ asset('images/tiers/best.png') }}"
                 alt="Best"
                 class="img-fluid">
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
