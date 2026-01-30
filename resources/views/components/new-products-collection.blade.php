@props(['products', 'categories'])

<div class="container my-5">
    <div class="">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-md-2">
                <h2 class="mb-4">New<br>product</h2>
                <ul class="list-unstyled category-list">
                    <li class="mb-2">
                        <a href="/products" class="text-decoration-none">All</a>
                    </li>
                    @foreach ($categories as $category)
                        <li class="mb-2">
                            <a href="/products?category={{ $category }}" class="text-decoration-none text-black">
                                {{ $category }}
                            </a>
                        </li>
                    @endforeach
                    <li class="mb-2">
                        <a href="/products" class="text-decoration-none text-black">more</a>
                    </li>
                </ul>
            </div>

            <!-- Products Grid -->
            <div class="col-md-10">
                <!-- Navigation Arrows -->
                <div class="d-flex justify-content-end mb-4">
                    <button class="btn btn-outline-light rounded-circle me-2" id="prevBtn">
                        <i class="bi bi-arrow-left"></i>
                    </button>
                    <button class="btn btn-outline-light rounded-circle" id="nextBtn">
                        <i class="bi bi-arrow-right"></i>
                    </button>
                </div>

                <!-- Product Carousel -->
                <div class="product-carousel-wrapper position-relative overflow-hidden">
                    <div class="product-carousel d-flex gap-0" id="productCarousel">
                        @foreach ($products as $product)
                            <div class="product-item flex-shrink-0">
                                <div class="product-card position-relative">
                                    <a href="/product/{{ $product['id'] }}" class="d-block text-decoration-none">
                                        <div class="product-image-wrapper position-relative overflow-hidden">
                                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                                                loading="lazy"
                                                onerror="this.onerror=null;this.src='{{ asset('images/fallback/product.jpg') }}';"
                                                class="img-fluid w-100">

                                            <!-- WhatsApp Overlay -->
                                            <div
                                                class="whatsapp-overlay position-absolute bottom-0 w-100 bg-dark bg-opacity-75 p-3">
                                                <a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text=Halo,%20saya%20ingin%20menanyakan%20ketersediaan%20{{ urlencode($product['name']) }}"
                                                    target="_blank" class="btn btn-success btn-sm w-100"
                                                    onclick="event.stopPropagation()">
                                                    <i class="bi bi-whatsapp me-2"></i>Order
                                                </a>
                                            </div>
                                        </div>
                                        <h5 class="product-name text-center mt-2">{{ $product['name'] }}</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@pushOnce('styles')
    <style>
        .new-product-collection {
            min-height: 600px;
        }

        .category-list a {
            transition: color 0.3s ease;
        }

        .category-list a:hover {
            color: #dc3545 !important;
        }

        .product-carousel-wrapper {
            width: 100%;
        }

        .product-carousel {
            transition: transform 0.5s ease;
        }

        .product-item {
            margin-right: 24px;
            width: 220px;
        }

        .product-image-wrapper {
            background: #fff;
            border-radius: 8px;
            height: 270px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .product-image-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .whatsapp-overlay {
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }



        .product-card:hover .whatsapp-overlay {
            transform: translateY(0);
        }

        .product-name {
            font-size: 1rem;
            font-weight: 400;
            background: transparent;
        }

        .btn-outline-light {
            width: 45px;
            height: 45px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .indicator {
            width: 10px;
            height: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .indicator:hover {
            transform: scale(1.2);
        }

        .indicator.active {
            background-color: #dc3545 !important;
        }

        .bi-arrow-left,
        .bi-arrow-right {
            color: #120263;
        }
    </style>
@endPushOnce

@pushOnce('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carousel = document.getElementById('productCarousel');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            const indicators = document.querySelectorAll('.indicator');

            let currentIndex = 0;
            const itemsPerView = 4;
            const totalItems = {{ count($products) }};
            const maxIndex = Math.ceil(totalItems / itemsPerView) - 1;

            function updateCarousel() {
                const offset = currentIndex * (itemsPerView * 300 + (itemsPerView * 24));
                carousel.style.transform = `translateX(-${offset}px)`;

                indicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentIndex);
                });
            }

            prevBtn.addEventListener('click', () => {
                if (currentIndex > 0) {
                    currentIndex--;
                    updateCarousel();
                }
            });

            nextBtn.addEventListener('click', () => {
                if (currentIndex < maxIndex) {
                    currentIndex++;
                    updateCarousel();
                }
            });

            indicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    currentIndex = index;
                    updateCarousel();
                });
            });
        });
    </script>
@endPushOnce
