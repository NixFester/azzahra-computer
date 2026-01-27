@extends('layouts.app')
@section('title', 'Internship Program')
@section('content')
@include('partials.header-mobile')
<section class="container py-3">
    <h1 class="mb-4">INTERNSHIP</h1>
    <div class="row g-3">
        @if($batchImage)
        <div class="col-md-4 col-sm-6">
            <img src="{{ asset( $batchImage->image_url) }}" class="img-fluid rounded" alt="{{ $batchImage->title ?? 'Batch Internship' }}">
        </div>
        @endif
        
        @foreach($brochureImages as $image)
        <div class="col-md-4 col-sm-6">
            <img src="{{ asset( $image->image_url) }}" class="img-fluid rounded" alt="{{ $image->title ?? 'Internship Brochure' }}">
        </div>
        @endforeach
    </div>
</section>
@include('partials.footer-mobile')
@endsection