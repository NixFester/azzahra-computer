@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <section class="text-white" style="">
        <div class="container">
            <img src="{{ asset('images/banner1.png') }}" alt="banner" class="">
        </div>
    </section>

    <!-- Rating -->
    <section class="container py-2 pl-5">
        <div class="row align-items-center g-4">

            <!-- Rating summary -->
            <div class="col-lg-3 col-md-4 text-center">
                <h2 class="display-4 fw-bold">4,8</h2>
                <div class="text-warning fs-4">★★★★★</div>
                <small>Berdasarkan 8.218 ulasan Google</small>
                <div class="mt-3 mx-auto" style="max-width:120px;">
                    <img src="{{ asset('images/logo 1.png') }}" alt="banner" class="img-fluid">
                </div>
            </div>

            <!-- Reviews -->
            <div class="col-lg-9 col-md-8">
                <div class="row g-3">

                    <div class="col-lg-4 col-md-6">
                        <x-kartu-review name="Pulafa Pulafa" :rating="5"
                            review="Pelayanan sangat baik, staff ramah. Mereka menemukan bahwa masalahnya adalah konflik driver yang sangat spesifik setelah update BIOS. Selama proses perbaikan, mereka secara proaktif memberikan update melalui WhatsApp..." />
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <x-kartu-review name="Farhan Denta" image="{{ asset('images/farhan.png') }}" :rating="5"
                            review="Pelayanan oke, Staff ramah dan informatif, layar bergaris garansi Asus full cover juga tanpa bayar. Sekalian saya tambah cleaning + ganti thermal pasta 300 ribu, laptop adem lagi 👍. Makasih Azzahra Computer 🙏" />
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <x-kartu-review name="Khalim Mahfud" image="{{ asset('images/khalim.png') }}" :rating="5"
                            review="Baru pertama kali klaim kerusakan HP, merk Motorola dan disini alhamdulillah dibantu maksimal sekali sampai ganti unit baru. Jarak waktu klaim 5 harian. Pelayanannya oke, CS nya ramah & solutif. Keren! Tegal nih, laka-laka." />
                    </div>

                </div>
            </div>

        </div>
    </section>

    <!-- Categories -->
    <section class="container py-5">
        <h5 class="fw-semibold mb-3">Top Categories</h5>
        <div class="row text-center ">
            <div class="col-4 col-md-2">
                <x-kategori image="{{ asset('images/laptop.png') }}" kategori="Laptop" />
            </div>
            <div class="col-4 col-md-2"><x-kategori image="{{ asset('images/laptop.png') }}" kategori="Laptop" />
            </div>
            <div class="col-4 col-md-2"><x-kategori image="{{ asset('images/laptop.png') }}" kategori="Aksesoris" /></div>
            <div class="col-4 col-md-2"><x-kategori image="{{ asset('images/laptop.png') }}" kategori="Desktop" /></div>
            <div class="col-4 col-md-2"><x-kategori image="{{ asset('images/laptop.png') }}" kategori="Komponen" /></div>
            <div class="col-4 col-md-2"><x-kategori image="{{ asset('images/laptop.png') }}" kategori="Networking" /></div>
        </div>
    </section>

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

    <!-- Products -->
    <section class="container py-5">
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item"><a class="nav-link active">Power Deals</a></li>
            <li class="nav-item"><a class="nav-link">New Arrival</a></li>
            <li class="nav-item"><a class="nav-link">Top Rate</a></li>
            <li class="nav-item"><a class="nav-link">Best Selling</a></li>
        </ul>

        <div class="row g-4">
            <div class="col-md-3">
                <x-kartu-produk image="images/Nereus-AP1602-4.jpg" category="Backpack" name="Asus Nereus AP1602 Backpack"
                    price="Rp299.000,00" badge="5% OFF" old-price="Rp314.000,00" />
            </div>
            <div class="col-md-3"> <x-kartu-produk image="images/Nereus-AP1602-4.jpg" category="Backpack"
                    name="Asus Nereus AP1602 Backpack" price="Rp299.000,00" badge="5% OFF" old-price="Rp314.000,00" /></div>
            <div class="col-md-3"> <x-kartu-produk image="images/Nereus-AP1602-4.jpg" category="Backpack"
                    name="Asus Nereus AP1602 Backpack" price="Rp299.000,00" badge="5% OFF" old-price="Rp314.000,00" /></div>
            <div class="col-md-3"> <x-kartu-produk image="images/Nereus-AP1602-4.jpg" category="Backpack"
                    name="Asus Nereus AP1602 Backpack" price="Rp299.000,00" badge="5% OFF" old-price="Rp314.000,00" />
            </div>
        </div>
    </section>

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
    <section class="container py-5 text-center">
        <p class="fw-semibold">AUTHORIZED MULTIBRAND SERVICE CENTER TEGAL</p>
        <div class="d-flex flex-wrap justify-content-center gap-4 text-muted">
            <span>ASUS</span>
            <span>Lenovo</span>
            <span>Zyrex</span>
            <span>Xiaomi</span>
            <span>Canon</span>
            <span>HP</span>
        </div>
    </section>
@endsection
