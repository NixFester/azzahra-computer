@extends('layouts.app')
@section('title', 'tentangkami')
@section('content')
@include('partials.header')

<section class="container py-5">
    <!-- Header -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-uppercase">Pusat Service Computer</h2>
        <h1 class="fw-bold">Azzahra Computer</h1>
    </div>

    <!-- Info Section -->
    <div class="row align-items-center mb-5">
        <!-- Image -->
        <div class="col-md-5 mb-4 mb-md-0">
          <img 
            src="images/kantor.png" 
            alt="Kantor Azzahra Computer"
            class="img-fluid rounded shadow">

        </div>

        <!-- Text -->
        <div class="col-md-7">
    <p class="mb-0 fw-semibold text-danger">
        Pusat Service Computer
    </p>

    <h4 class="mb-1 fw-bold">
        Azzahra Computer
    </h4>

    <p class="mb-1">
        Authorized Service Center Resmi Asus, Lenovo, Infinix, Xiaomi, Canon,
        Zyrex, Avita, HP & Non Warranty ALL BRAND.
    </p>

    <p class="mb-1">
        Pusat layanan Service Center Resmi di Kota Tegal, Jawa Tengah.
    </p>

    <p class="mb-0">
        <strong>Whatsapp:</strong> 0859.4200.1720
    </p>
    <p class="mb-0">
        <strong>Instagram:</strong> @Authorized_servicecenter
    </p>
    <p class="mb-0">
        <strong>Alamat:</strong>
        Komplek Ruko Citraland blok Belleza Plaza No. 11 /
        Jl. Sipelem Raya Kota Tegal – Jawa Tengah
    </p>
</div>

    </div>
<!-- VIDEO YOUTUBE -->
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-7">
        <div class="ratio ratio-16x9 shadow rounded">
            <iframe
                src="https://www.youtube.com/embed/0XwYJPq35iY?start=2"
                title="Azzahra Computer"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen>
            </iframe>
        </div>
    </div>
</div>

<!-- GOOGLE MAP -->
<div class="row justify-content-center mb-5">
    <div class="col-md-8 col-lg-7">
        <iframe
            src="https://www.google.com/maps?q=Komplek+Ruko+Citraland+Tegal&output=embed"
            width="100%"
            height="300"
            style="border:0;"
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

</section>


@include('partials.footer')
@endsection