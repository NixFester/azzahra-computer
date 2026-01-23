@props(['products', 'pagination' => false, 'tabs' => ['Power Deals']])

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
        color: black;
    }

    .carousel-control-prev:hover .carousel-control-prev-icon,
    .carousel-control-next:hover .carousel-control-next-icon {
        color: black;
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

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 24px;
        margin-top: 2rem;
    }

    .products-grid.grid-4col {
        grid-template-columns: repeat(4, 1fr);
    }

    .products-grid.grid-3col {
        grid-template-columns: repeat(3, 1fr);
    }

    .products-grid.grid-2col {
        grid-template-columns: repeat(2, 1fr);
    }

    .products-grid.grid-1col {
        grid-template-columns: 1fr;
    }

    .pagination-modern {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
        margin-top: 3rem;
        margin-bottom: 2rem;
        flex-wrap: wrap;
    }

    .pagination-modern .page-link {
        min-width: 40px;
        height: 40px;
        padding: 8px 12px;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        color: #3D8FEF;
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        background: white;
    }

    .pagination-modern .page-link:hover:not(.disabled) {
        background: #f8f9fa;
        border-color: #3D8FEF;
        color: #3D8FEF;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(61, 143, 239, 0.15);
    }

    .pagination-modern .page-link.active {
        background: linear-gradient(135deg, #3D8FEF 0%, #2563eb 100%);
        color: white;
        border-color: #3D8FEF;
        box-shadow: 0 6px 16px rgba(61, 143, 239, 0.3);
    }

    .pagination-modern .page-link.disabled {
        color: #999;
        cursor: not-allowed;
        border-color: #e9ecef;
        background: #f8f9fa;
    }

    .pagination-modern .page-item:first-child .page-link,
    .pagination-modern .page-item:last-child .page-link {
        min-width: auto;
        padding: 8px 12px;
    }

    .pagination-info {
        text-align: center;
        color: #666;
        font-size: 0.9rem;
        margin-bottom: 1rem;
        font-weight: 500;
    }

    @media (max-width: 1200px) {
        .products-grid.grid-4col {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    @media (max-width: 768px) {
        .products-grid.grid-4col {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .product-tabs .nav-link {
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
        }

        .category-bg-shape {
            width: 120px;
            height: 120px;
        }
    }

    @media (max-width: 576px) {
        .products-grid.grid-4col {
            grid-template-columns: 1fr;
        }

        .pagination-modern {
            gap: 4px;
        }

        .pagination-modern .page-link {
            min-width: 36px;
            height: 36px;
            font-size: 0.85rem;
            padding: 6px 10px;
        }
    }
</style>

<section class="product-section container">
    @if($pagination)
        <!-- PRODUCTS PAGE: Grid Layout -->
        <div class="products-grid grid-4col">
            @forelse($products as $product)
                <x-kartu-produk 
                    image="{{ $product['image'] }}" 
                    category="{{ $product['category'] }}"
                    name="{{ $product['name'] }}"
                    price="{{ $product['price'] }}"
                    badge="{{ $product['badge'] ?? null }}"
                    old-price="{{ $product['oldPrice'] ?? null }}" />
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted fs-5">No products found</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="pagination-info">
            Showing {{ count($products) }} products
        </div>
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-modern">
                {{-- Previous Page Link --}}
                @if($pagination['current_page'] > 1)
                    <li class="page-item">
                        <a class="page-link" href="{{ $pagination['first_url'] }}" aria-label="First">
                            <i class="bi bi-chevron-double-left"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $pagination['prev_url'] }}" aria-label="Previous">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="First">
                            <i class="bi bi-chevron-double-left"></i>
                        </span>
                    </li>
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Previous">
                            <i class="bi bi-chevron-left"></i>
                        </span>
                    </li>
                @endif

                {{-- Pagination Elements --}}
                @foreach($pagination['links'] as $link)
                    @if($link['url'] === null)
                        <li class="page-item disabled" aria-label="Page {{ $link['label'] }}">
                            <span class="page-link">{{ $link['label'] }}</span>
                        </li>
                    @else
                        <li class="page-item {{ $link['active'] ? 'active' : '' }}" aria-label="Page {{ $link['label'] }}">
                            <a class="page-link {{ $link['active'] ? 'active' : '' }}" href="{{ $link['url'] }}">
                                {{ $link['label'] }}
                            </a>
                        </li>
                    @endif
                @endforeach

                {{-- Next Page Link --}}
                @if($pagination['current_page'] < $pagination['last_page'])
                    <li class="page-item">
                        <a class="page-link" href="{{ $pagination['next_url'] }}" aria-label="Next">
                            <i class="bi bi-chevron-right"></i>
                        </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="{{ $pagination['last_url'] }}" aria-label="Last">
                            <i class="bi bi-chevron-double-right"></i>
                        </a>
                    </li>
                @else
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Next">
                            <i class="bi bi-chevron-right"></i>
                        </span>
                    </li>
                    <li class="page-item disabled">
                        <span class="page-link" aria-label="Last">
                            <i class="bi bi-chevron-double-right"></i>
                        </span>
                    </li>
                @endif
            </ul>
        </nav>
    @else
        <!-- HOME PAGE: Carousel Layout -->
        <ul class="nav nav-tabs product-tabs" role="tablist">
            @foreach($tabs as $index => $tab)
                <li class="nav-item" role="presentation">
                    <button 
                        class="nav-link {{ $index === 0 ? 'active' : '' }}" 
                        id="tab-{{ $index }}" 
                        data-bs-toggle="tab" 
                        data-bs-target="#content-{{ $index }}" 
                        type="button">
                        {{ $tab }}
                    </button>
                </li>
            @endforeach
        </ul>

        <div class="tab-content">
            @foreach($tabs as $index => $tab)
                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="content-{{ $index }}">
                    <div class="product-carousel-wrapper">
                        <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                @forelse(array_chunk($products, 4) as $productKey => $productChunk)
                                    <div class="carousel-item {{ $productKey === 0 ? 'active' : '' }}">
                                        <div class="row g-4">
                                            @for($i = 0; $i < 4 && ($productKey * 4 + $i) < count($products); $i++)
                                                <div class="col-lg-3 col-md-6">
                                                    <x-kartu-produk 
                                                        image="{{ $products[$productKey * 4 + $i]['image'] }}" 
                                                        category="{{ $products[$productKey * 4 + $i]['category'] }}"
                                                        name="{{ $products[$productKey * 4 + $i]['name'] }}"
                                                        price="{{ $products[$productKey * 4 + $i]['price'] }}"
                                                        badge="{{ $products[$productKey * 4 + $i]['badge'] ?? null }}"
                                                        old-price="{{ $products[$productKey * 4 + $i]['oldPrice'] ?? null }}" />
                                                </div>
                                            @endfor
                                        </div>
                                    </div>
                                @empty
                                    <div class="carousel-item active">
                                        <div class="text-center py-5">
                                            <p class="text-muted fs-5">No products found</p>
                                        </div>
                                    </div>
                                @endforelse
                            </div>
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
                </div>
            @endforeach
        </div>
    @endif
</section>