@extends('layouts.app')
@section('title', 'Blog')
@section('content')

@include('partials.header-mobile')

<section class="container py-5">
  <div class="row">
    <div class="col-12 mb-3 text-center">
      <img src="images/promo1.png" alt="promo1" class="img-fluid">
    </div>
    <div class="col-12 text-center">
      <img src="images/promo2.png" alt="promo2" class="img-fluid">
    </div>
  </div>
</section>


@include('partials.footer-mobile')
@endsection