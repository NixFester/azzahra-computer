@props(['banners'])

<div id="bannerCarousel" class="carousel slide carousel-wrapper" data-bs-ride="carousel" data-bs-interval="4000">

            {{-- Indicators (titik bawah) --}}
            <div class="carousel-indicators">
                @foreach($banners as $index => $banner)
                <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="{{ $index }}" @if($index === 0) class="active" @endif></button>
                @endforeach
            </div>

            {{-- Slides --}}
            <div class="carousel-inner">
                @forelse($banners as $index => $banner)
                <div class="carousel-item @if($index === 0) active @endif">
                    <a href="{{ $banner->link ?? '#' }}">
                        <img src="{{ $banner->image_url }}" class="d-block w-100" alt="{{ $banner->title }}">
                    </a>
                </div>
                @empty
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner1.png') }}" class="d-block w-100" alt="Default Banner">
                </div>
                @endforelse
            </div>

            {{-- Prev / Next --}}
            <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#bannerCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>

        </div>
