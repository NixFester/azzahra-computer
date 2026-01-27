@extends('layouts.app')
@section('title', 'promo')
@section('content')

@include('partials.header-mobile')

<section class="container py-3">

  <!-- Judul -->
  <h1 class="mb-4">PROMO</h1>

  <!-- Gambar -->
  <div class="row g-4">
    <div class="col-md-4">
      <img src="images/promo3.png" alt="promo3" class="img-fluid">
    </div>
    <div class="col-md-4">
      <img src="images/promo4.png" alt="promo4" class="img-fluid">
    </div>
    <div class="col-md-4">
      <img src="images/promo5.png" alt="promo5" class="img-fluid">
    </div>
  </div>

</section>


@include('partials.footer-mobile')
@endsection