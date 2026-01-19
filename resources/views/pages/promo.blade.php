@extends('layouts.app')
@section('title', 'promo')
@section('content')
@include('partials.header')

<section class="container py-5">

  <!-- Judul -->
  <h3 class="fw-bold mb-4">PROMO</h3>

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


@include('partials.footer')
@endsection