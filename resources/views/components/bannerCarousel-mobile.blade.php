@props(['banners'])

<div class="banner-carousel-mobile">
    <div id="bannerCarouselMobile" class="carousel slide" data-bs-ride="carousel">
        <!-- Indicators -->
        <div class="carousel-indicators">
            @foreach($banners as $index => $banner)
                <button type="button" 
                        data-bs-target="#bannerCarouselMobile" 
                        data-bs-slide-to="{{ $index }}" 
                        class="{{ $index === 0 ? 'active' : '' }}"
                        aria-label="Slide {{ $index + 1 }}">
                </button>
            @endforeach
        </div>

        <!-- Slides -->
        <div class="carousel-inner">
            @foreach($banners as $index => $banner)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset($banner) }}" 
                         class="d-block w-100 carousel-image" 
                         alt="Banner {{ $index + 1 }}"
                         loading="lazy">
                </div>
            @endforeach
        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerCarouselMobile" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerCarouselMobile" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<style>
/* Desktop Banner Carousel */
.banner-carousel-mobile {
    width: 100%;
    max-width: 1200px;
    margin: 2rem auto;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
}

.carousel-image {
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.carousel-indicators {
    margin-bottom: 1rem;
}

.carousel-indicators [data-bs-target] {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin: 0 5px;
    background-color: rgba(255, 255, 255, 0.5);
    border: none;
    transition: all 0.3s;
}

.carousel-indicators .active {
    width: 30px;
    border-radius: 5px;
    background-color: white;
}

.carousel-control-prev,
.carousel-control-next {
    width: 50px;
    height: 50px;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    opacity: 0.9;
    transition: all 0.3s;
}

.carousel-control-prev {
    left: 20px;
}

.carousel-control-next {
    right: 20px;
}

.carousel-control-prev:hover,
.carousel-control-next:hover {
    opacity: 1;
    background: white;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 20px;
    height: 20px;
    background-size: 20px 20px;
    filter: invert(1);
}

/* ======================================
   MOBILE STYLES - 768px and below
   ====================================== */
@media (max-width: 768px) {
    .banner-carousel-mobile {
        margin: 1.5rem 0;
        border-radius: 12px;
        max-width: 100%;
    }

    .carousel-image {
        height: 250px !important;
        object-fit: cover !important;
        width: 100% !important;
    }

    .carousel-indicators {
        margin-bottom: 0.75rem;
    }

    .carousel-indicators [data-bs-target] {
        width: 8px;
        height: 8px;
        margin: 0 3px;
    }

    .carousel-indicators .active {
        width: 24px;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 40px;
        height: 40px;
    }

    .carousel-control-prev {
        left: 10px;
    }

    .carousel-control-next {
        right: 10px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 16px;
        height: 16px;
        background-size: 16px 16px;
    }
}

/* Small Mobile - 480px and below */
@media (max-width: 480px) {
    .banner-carousel-mobile {
        margin: 1rem 0;
        border-radius: 8px;
    }

    .carousel-image {
        height: 200px !important;
    }

    .carousel-indicators {
        margin-bottom: 0.5rem;
    }

    .carousel-indicators [data-bs-target] {
        width: 6px;
        height: 6px;
        margin: 0 2px;
    }

    .carousel-indicators .active {
        width: 20px;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 35px;
        height: 35px;
        background: rgba(255, 255, 255, 0.8);
    }

    .carousel-control-prev {
        left: 5px;
    }

    .carousel-control-next {
        right: 5px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 14px;
        height: 14px;
        background-size: 14px 14px;
    }
}

/* Ensure full width on all screens */
.carousel-item img {
    width: 100% !important;
    display: block !important;
}

/* Smooth transitions */
.carousel-item {
    transition: transform 0.6s ease-in-out;
}

/* Fix for image aspect ratio */
@media (max-width: 768px) {
    .carousel-inner {
        width: 100% !important;
    }
    
    .carousel-item {
        width: 100% !important;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto play carousel
    const carousel = document.querySelector('#bannerCarouselMobile');
    if (carousel) {
        const bsCarousel = new bootstrap.Carousel(carousel, {
            interval: 4000,
            wrap: true,
            touch: true
        });
    }
});
</script>