@props(['ratings'])

<section class="container py-2 pl-5">
    <div class="row align-items-center g-4">

        <!-- Rating summary (unchanged) -->
        <div class="col-lg-3 col-md-4 text-center">
            <h2 class="display-4 fw-bold">{{ $ratings['summary']['score'] }}</h2>
            <div class="text-warning fs-4">{{ str_repeat('★', $ratings['summary']['stars']) }}</div>
            <small>Berdasarkan {{ number_format($ratings['summary']['reviews']) }} ulasan Google</small>
            <div class="mt-3 mx-auto" style="max-width:120px;">
                <img src="{{ asset('images/logo 1.png') }}" alt="banner" class="img-fluid">
            </div>
        </div>

         <!-- Reviews carousel -->
        <div class="col-lg-9 col-md-8 ">

            <div id="reviewCarousel"
                 class="carousel slide carousel-wrapper"
                 data-bs-ride="carousel"
                 data-bs-interval="4000"
                 data-bs-wrap="true">

                <div class="carousel-inner">

                    @foreach(array_chunk($ratings['reviews'], 3) as $i => $chunk)
                        <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                            <div class="row g-3">
                                @foreach($chunk as $review)
                                    <div class="col-lg-4 col-md-6">
                                        <x-kartu-review 
                                            name="{{ $review['name'] }}" 
                                            image="{{ $review['image'] ?? null }}"
                                            :rating="$review['rating']"
                                            review="{{ $review['review'] }}" />
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#reviewCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#reviewCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>

            </div>

    </div>
</section>
<style>
    /* Custom styles for the rating component */
    .carousel-item {
        transition: transform 0.5s ease, opacity 0.5s ease;
    }
    .blur-btn {
    width: 48px;
    backdrop-filter: blur(1px);
    background: rgba(255,255,255,0);
}
    .blur-btn:hover {
        backdrop-filter: blur(8px);
    background: rgba(255,255,255,0.3);
}

    .carousel-control-prev.blur-btn,
    .carousel-control-next.blur-btn {
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        height: 120px; /* vertical blur area */
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        filter: invert(1);
    }

</style>

<script>
 
    </script>