@extends('layouts.app')
@section('title', 'Internship Program')
@section('content')
@include('partials.header')

<section class="container py-5">
    <h1 class="mb-4">Internship</h1>

    <div class="row g-3">
        <div class="col-md-4 col-sm-6">
            <img src="images/intern1.png" class="img-fluid rounded" alt="Internship 1">
        </div>
        <div class="col-md-4 col-sm-6">
            <img src="images/intern2.png" class="img-fluid rounded" alt="Internship 2">
        </div>
        <div class="col-md-4 col-sm-6">
            <img src="images/intern3.png" class="img-fluid rounded" alt="Internship 3">
        </div>
        <div class="col-md-4 col-sm-6">
            <img src="images/intern4.png" class="img-fluid rounded" alt="Internship 4">
        </div>
        <div class="col-md-4 col-sm-6">
            <img src="images/intern5.png" class="img-fluid rounded" alt="Internship 5">
        </div>
        <div class="col-md-4 col-sm-6">
            <img src="images/intern6.png" class="img-fluid rounded" alt="Internship 6">
        </div>
        <div class="col-md-4 col-sm-6">
            <img src="images/intern7.png" class="img-fluid rounded" alt="Internship 7">
        </div>
    </div>
</section>

@include('partials.footer')
@endsection