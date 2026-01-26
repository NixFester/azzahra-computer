<div class="new-product-collection bg-black text-white py-5">
    <div class="container-fluid">
        <div class="row">
            <!-- Left Sidebar -->
            <div class="col-md-2">
                <h2 class="mb-4">New<br>product</h2>
                <ul class="list-unstyled category-list">
                    @foreach($categories ?? [] as $category)
                        <li class="mb-2">
                            <a href="{{ $category->slug ? '/products?category=' . $category->slug : '/products' }}" 
                               class="text-decoration-none {{ !$category->slug ? 'text-danger' : 'text-white' }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach
                    <li class="mb-2">
                        <a href="/products" class="text-decoration-none text-white">more</a>
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
                    <div class="product-carousel d-flex" id="productCarousel">
                        @foreach($products ?? [] as $product)
                            <div class="product-item flex-shrink-0 px-3">
                                <div class="product-card position-relative">
                                    <a href="/product/{{ $product['id'] }}" class="d-block text-decoration-none">
                                        <div class="product-image-wrapper position-relative overflow-hidden">
                                            <img src="{{ $product['image'] }}" 
                                                 alt="{{ $product['name'] }}" 
                                                 class="img-fluid w-100">
                                            
                                            <!-- WhatsApp Overlay -->
                                            <div class="whatsapp-overlay position-absolute bottom-0 w-100 bg-dark bg-opacity-75 p-3">
                                                <a href="https://wa.me/6285942001720?text=Halo,%20saya%20ingin%20menanyakan%20ketersediaan%20{{ urlencode($product['name']) }}" 
                                                   target="_blank"
                                                   class="btn btn-success btn-sm w-100"
                                                   onclick="event.stopPropagation()">
                                                    <i class="bi bi-whatsapp me-2"></i>Tanya Ketersediaan
                                                </a>
                                            </div>
                                        </div>
                                        <h5 class="product-name text-white text-center mt-3">{{ $product['name'] }}</h5>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Carousel Indicators -->
                <div class="carousel-indicators d-flex justify-content-center mt-4">
                    <span class="indicator bg-secondary rounded-circle mx-1" data-index="0"></span>
                    <span class="indicator bg-secondary rounded-circle mx-1" data-index="1"></span>
                    <span class="indicator bg-danger rounded-circle mx-1 active" data-index="2"></span>
                    <span class="indicator bg-secondary rounded-circle mx-1" data-index="3"></span>
                </div>
            </div>
        </div>
    </div>
</div>

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
    width: 300px;
}

.product-image-wrapper {
    background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
    border-radius: 8px;
    height: 350px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.product-image-wrapper img {
    object-fit: contain;
    max-height: 100%;
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('productCarousel');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const indicators = document.querySelectorAll('.indicator');
    
    let currentIndex = 0;
    const itemsPerView = 4;
    const totalItems = {{ count($products ?? []) }};
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