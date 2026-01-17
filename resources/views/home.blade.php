@extends('layouts.app')
@section('title', 'Home')
@section('content')
    <section class="text-white" style="">
        <div class="container py-5 m-0">
            <img src="{{ asset('images/banner1.png') }}" alt="banner" class="img-fluid">
        </div>
    </section>

        <!-- Rating -->
        <section class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-4">
            <h2 class="display-4 fw-bold">4,8</h2>
            <div class="text-warning fs-4">★★★★★</div>
            <small>Berdasarkan 8.218 ulasan Google</small>
            </div>
            <div class="col-md-8">
            <div class="row g-3">
                <div class="col-md-4">
                <div class="border p-3 rounded">Review pelanggan</div>
                </div>
                <div class="col-md-4">
                <div class="border p-3 rounded">Review pelanggan</div>
                </div>
                <div class="col-md-4">
                <div class="border p-3 rounded">Review pelanggan</div>
                </div>
            </div>
            </div>
        </div>
        </section>

        <!-- Categories -->
        <section class="container py-4">
        <h5 class="fw-semibold mb-3">Top Categories</h5>
        <div class="row text-center g-3">
            <div class="col-4 col-md-2">Laptop</div>
            <div class="col-4 col-md-2">HP & Tablet</div>
            <div class="col-4 col-md-2">Aksesoris</div>
            <div class="col-4 col-md-2">Desktop</div>
            <div class="col-4 col-md-2">Komponen</div>
            <div class="col-4 col-md-2">Networking</div>
        </div>
        </section>

        <!-- Good Better Best -->
        <section class="container py-5">
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
        <section class="bg-light py-5">
        <div class="container text-center">
            <div class="row">
            <div class="col-md-4">
                <h4 class="fw-bold">9000</h4>
                <small>Unit Selesai Service</small>
            </div>
            <div class="col-md-4">
                <h4 class="fw-bold">8.500 / 9000</h4>
                <small>Kepuasan</small>
            </div>
            <div class="col-md-4">
                <h4 class="fw-bold">9500</h4>
                <small>Customer (2010–2023)</small>
            </div>
            </div>
        </div>
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
            <div class="card">
                <img src="https://via.placeholder.com/200x150" class="card-img-top">
                <div class="card-body">
                <p class="card-text">Product Name</p>
                <button class="btn btn-primary w-100">Add to Cart</button>
                </div>
            </div>
            </div>
            <div class="col-md-3"><div class="card h-100"></div></div>
            <div class="col-md-3"><div class="card h-100"></div></div>
            <div class="col-md-3"><div class="card h-100"></div></div>
        </div>
        </section>

        <!-- Company Info -->
        <section class="bg-primary text-white py-5">
        <div class="container">
            <div class="row g-4">
            <div class="col-md-6">
                <h4 class="fw-bold">AZZAHRA COMPUTER</h4>
                <p class="small">
                Solusi teknologi lengkap sejak 2010 dari penjualan,
                service, hingga sistem digital dan pelatihan IT.
                </p>
                <small>Tegal, Jawa Tengah | WA: 0859-4200-1720</small>
            </div>
            <div class="col-md-6 bg-dark bg-opacity-25 d-flex align-items-center justify-content-center">
                Video / Company Profile
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