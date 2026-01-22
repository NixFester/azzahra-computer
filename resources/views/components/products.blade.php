@props(['products', 'tabs' => ['Power Deals', 'New Arrival', 'Top Rate', 'Best Selling']])

<style>
    .product-section {
   
        position: relative;
  
    }

    .product-section::before {
        content: '';
        position: absolute;
        top: -30%;
        left: -10%;
        width: 400px;
        height: 400px;
        background: radial-gradient(circle, rgba(61, 143, 239, 0.08) 0%, transparent 70%);
        border-radius: 50%;
    }

    .product-tabs {
        border-bottom: 2px solid #e0e0e0;
        display: flex;
        gap: 1rem;  
        flex-wrap: wrap;
    }

    .product-tabs .nav-item {
        margin-bottom: -2px;
    }

    .product-tabs .nav-link {
        background: transparent;
        border: none;
        border-bottom: 3px solid transparent;
        color: #666;
        font-weight: 600;
        padding: 1rem 1.5rem;
        transition: all 0.3s ease;
        border-radius: 0;
        position: relative;
    }

    .product-tabs .nav-link:hover {
        color: #3D8FEF;
        background: rgba(61, 143, 239, 0.05);
    }

    .product-tabs .nav-link.active {
        color: #3D8FEF;
        border-bottom-color: #3D8FEF;
        background: transparent;
    }

    .product-tabs .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #3D8FEF, #2a6bc4);
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            transform: scaleX(0);
        }
        to {
            transform: scaleX(1);
        }
    }

    .product-carousel-wrapper {
        position: relative;
        padding: 1rem 0;
    }

    #productCarousel {
        position: relative;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 50px;
        height: 50px;
        background: white;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 1;
        box-shadow: 0 4px 15px rgba(61, 143, 239, 0.2);
        transition: all 0.3s ease;
    }

    .carousel-control-prev:hover,
    .carousel-control-next:hover {
        background: #3D8FEF;
        box-shadow: 0 6px 20px rgba(61, 143, 239, 0.4);
    }

    .carousel-control-prev {
        left: -25px;
    }

    .carousel-control-next {
        right: -25px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        width: 20px;
        height: 20px;
        background-size: 20px 20px;
        filter: invert(48%) sepia(79%) saturate(2476%) hue-rotate(196deg) brightness(98%) contrast(91%);
    }

    .carousel-control-prev:hover .carousel-control-prev-icon,
    .carousel-control-next:hover .carousel-control-next-icon {
        filter: brightness(0) invert(1);
    }

    .carousel-inner {
        overflow: visible;
    }

    .carousel-item {
        transition: transform 0.6s ease-in-out;
    }

    /* ABSTRACT FLOWING SHAPE for category backgrounds */
    .category-bg-shape {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 180px;
        height: 180px;
        background: linear-gradient(135deg, #3D8FEF 0%, #2563eb 50%, #1d4ed8 100%);
        border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;
        box-shadow:
            0 10px 30px rgba(61, 143, 239, 0.4),
            0 20px 60px rgba(37, 99, 235, 0.2),
            inset 0 -2px 8px rgba(255, 255, 255, 0.3);
        animation: morphShape 10s ease-in-out infinite;
        overflow: hidden;
        z-index: 0;
    }

    .card-img-top {
        position: relative;
        z-index: 1;
        mix-blend-mode: multiply;
        filter: contrast(1.1);
    }

    .card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(61, 143, 239, 0.15) !important;
    }

    .card:hover .category-bg-shape {
        animation-play-state: paused;
    }

    /* Flowing light streak */
    .category-bg-shape::before {
        content: '';
        position: absolute;
        width: 120%;
        height: 120%;
        background: 
            radial-gradient(ellipse at 20% 30%, rgba(255, 255, 255, 0.4) 0%, transparent 40%),
            radial-gradient(ellipse at 80% 70%, rgba(61, 143, 239, 0.6) 0%, transparent 50%);
        border-radius: 48% 52% 65% 35% / 42% 58% 42% 58%;
        animation: flowingLight 8s ease-in-out infinite reverse;
    }

    /* Depth layer */
    .category-bg-shape::after {
        content: '';
        position: absolute;
        width: 70%;
        height: 70%;
        background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 70%);
        border-radius: 50%;
        top: 5%;
        left: 15%;
        filter: blur(10px);
    }

    @keyframes morphShape {
        0%, 100% {
            border-radius: 63% 37% 54% 46% / 55% 48% 52% 45%;
            transform: rotate(0deg);
        }
        25% {
            border-radius: 48% 52% 68% 32% / 42% 61% 39% 58%;
            transform: rotate(5deg);
        }
        50% {
            border-radius: 38% 62% 43% 57% / 51% 44% 56% 49%;
            transform: rotate(-3deg);
        }
        75% {
            border-radius: 56% 44% 61% 39% / 68% 35% 65% 32%;
            transform: rotate(4deg);
        }
    }

    @keyframes flowingLight {
        0%, 100% {
            border-radius: 48% 52% 65% 35% / 42% 58% 42% 58%;
            transform: rotate(0deg) scale(1);
        }
        50% {
            border-radius: 35% 65% 48% 52% / 58% 42% 58% 42%;
            transform: rotate(180deg) scale(1.1);
        }
    }

    /* Alternative: Twisted ribbon shape */
    .category-bg-shape.ribbon {
        border-radius: 45% 55% 65% 35% / 72% 28% 72% 28%;
        background: linear-gradient(165deg, #3D8FEF 0%, #60a5fa 50%, #3D8FEF 100%);
        box-shadow:
            0 12px 35px rgba(61, 143, 239, 0.5),
            0 25px 70px rgba(61, 143, 239, 0.25);
        animation: twistRibbon 12s ease-in-out infinite;
    }

    @keyframes twistRibbon {
        0%, 100% {
            border-radius: 45% 55% 65% 35% / 72% 28% 72% 28%;
            transform: rotate(0deg) scale(1);
        }
        33% {
            border-radius: 72% 28% 45% 55% / 35% 65% 35% 65%;
            transform: rotate(120deg) scale(1.05);
        }
        66% {
            border-radius: 28% 72% 55% 45% / 65% 35% 65% 35%;
            transform: rotate(240deg) scale(1);
        }
    }

    /* Alternative: Asymmetric wave */
    .category-bg-shape.wave {
        border-radius: 73% 27% 39% 61% / 48% 71% 29% 52%;
        background: 
            linear-gradient(220deg, rgba(61, 143, 239, 0.9) 0%, #3D8FEF 100%),
            radial-gradient(circle at 70% 30%, rgba(96, 165, 250, 0.8) 0%, transparent 60%);
        box-shadow:
            0 8px 25px rgba(61, 143, 239, 0.45),
            0 18px 55px rgba(29, 78, 216, 0.3);
        animation: waveFlow 9s ease-in-out infinite;
    }

    @keyframes waveFlow {
        0%, 100% {
            border-radius: 73% 27% 39% 61% / 48% 71% 29% 52%;
            transform: translateY(0) rotate(0deg);
        }
        50% {
            border-radius: 27% 73% 61% 39% / 71% 48% 52% 29%;
            transform: translateY(-5px) rotate(8deg);
        }
    }

    @media (max-width: 768px) {
        .product-tabs .nav-link {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 40px;
            height: 40px;
        }

        .carousel-control-prev {
            left: -10px;
        }

        .carousel-control-next {
            right: -10px;
        }

        .category-bg-shape {
            width: 120px;
            height: 120px;
        }
    }
</style>

<section class="product-section container">


    <!-- Products carousel -->
    <div class="product-carousel-wrapper">
        <div id="productCarousel"
             class="carousel slide"
             data-bs-ride="carousel"
             data-bs-interval="4500"
             data-bs-wrap="true">
            <div class="carousel-inner">
                @foreach(array_chunk($products, 4) as $i => $chunk)
                    <div class="carousel-item {{ $i === 0 ? 'active' : '' }}">
                        <div class="row g-4">
                            @foreach($chunk as $product)
                                <div class="col-md-3">
                                    <x-kartu-produk 
                                        image="{{ $product['image'] }}" 
                                        category="{{ $product['category'] }}"
                                        name="{{ $product['name'] }}"
                                        price="{{ $product['price'] }}"
                                        badge="{{ $product['badge'] ?? null }}"
                                        old-price="{{ $product['oldPrice'] ?? null }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>