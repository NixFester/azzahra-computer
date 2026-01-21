@extends('layouts.app')

@section('title', 'Products - Azzahra Computer')

@section('content')
@include('partials.header')

<div class="products-page">
    <!-- Main Products Section -->
    <div class="px-5">
        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-3 mb-4">
                <div class="sidebar">
                    <!-- Filter by Price -->
                   <div class="filter-section mb-4">
       <h5 class="filter-title border-bottom mb-3">Filter By Price</h5>

                 <form method="GET" action="{{ url()->current() }}">
                    <p class="mb-2">
                        Price:
                        <strong>
                            Rp<span id="minPriceText">0</span>
                            —
                            Rp<span id="maxPriceText">50,000,000.00</span>
                        </strong>
                    </p>
        <div id="priceSlider"></div>
                <input type="hidden" id="minPriceInput" name="min_price"
                    value="{{ request('min_price', 0) }}">

                <input type="hidden" id="maxPriceInput" name="max_price"
                    value="{{ request('max_price', 50000000) }}">

            <button type="submit" class="btn btn-primary  mt-3">
                Apply Filter
            </button>
    </form>
</div>
                    <!-- Product Categories -->
                    <div class="categories-section mb-4">
                        <h5 class="filter-title border-bottom pb-2 mb-3">Product Categories</h5>
                        <ul class="list-unstyled category-list">
                            <li class="mb-2">
                                <a href="?category=backpack" class="text-decoration-none text-dark">
                                    Backpack <span class="text-muted">(2)</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="?category=digital-antena" class="text-decoration-none text-dark">
                                    Digital Antena <span class="text-muted">(0)</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="?category=handphone-tablet" class="text-decoration-none text-dark">
                                    Handphone & Tablet <span class="text-muted">(67)</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="?category=laptop" class="text-decoration-none text-dark">
                                    Laptop <span class="text-muted">(676)</span>
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="?category=komputer" class="text-decoration-none text-dark">
                                    Komputer <span class="text-muted">(467)</span>
                                </a>
                            </li>
                            <li class="mt-3">
                                <a href="#" class="text-primary text-decoration-none">
                                    <i class="bi bi-plus-circle"></i> Show More
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
           <div class="col-lg-8 col-md-7">

                <!-- Products Component -->
                <x-products 
                    :products="app('App\Http\Controllers\ProductsController')->getProducts()" 
                    :tabs="app('App\Http\Controllers\ProductsController')->getTabs()" 
                />
            </div>
        </div>
    </div>
</div>

@include('partials.footer')
@endsection

@push('styles')
<style>
    .products-page {
        background-color: #f8f9fa;
    }

    .page-banner {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .breadcrumb-item a {
        text-decoration: none;
    }

    .sidebar {
    background: white;
    width: 100%;
    border-radius: 8px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.08);
    }

    /* jarak antar section */
    .filter-section,
    .categories-section {
        margin-bottom: 2rem;
    }


    .filter-title {
        font-size: 1.1rem;
        font-weight: 600;
        color: #333;
    }

    .category-list li a {
        transition: all 0.3s ease;
        padding: 0.25rem 0;
        display: block;
    }

    .category-list li a:hover {
        color: #667eea !important;
        padding-left: 0.5rem;
    }

    .form-range::-webkit-slider-thumb {
        background: #667eea;
    }

    .form-range::-moz-range-thumb {
        background: #667eea;
    }

    @media (max-width: 768px) {
        .sidebar {
            margin-bottom: 2rem;
        }
    }
    #priceSlider {
    margin-top: 1rem;
    margin-bottom: 1rem;
    }

    .noUi-target {
        height: 12px;
    }

    .noUi-connect {
        background: #667eea;
    }

    .noUi-handle {
        width: 18px;
        height: 18px;
        top: 0px;
        border-radius: 50%;
    }

</style>

@endpush

@push('scripts')
<script>
    // Price range filter functionality
    document.getElementById('priceRange')?.addEventListener('input', function(e) {
        console.log('Price range:', e.target.value);
        // Add your filtering logic here
    });
    const slider = document.getElementById('priceSlider');

    const minPriceText = document.getElementById('minPriceText');
    const maxPriceText = document.getElementById('maxPriceText');

    const minPriceInput = document.getElementById('minPriceInput');
    const maxPriceInput = document.getElementById('maxPriceInput');

    function formatRupiah(number) {
        return new Intl.NumberFormat('id-ID').format(Math.round(number));
    }

    noUiSlider.create(slider, {
        start: [
            minPriceInput.value,
            maxPriceInput.value
        ],
        connect: true,
        range: {
            min: 0,
            max: 50000000
        },
        step: 5000
    });

    slider.noUiSlider.on('update', function (values) {
        const min = values[0];
        const max = values[1];

        minPriceText.textContent = formatRupiah(min);
        maxPriceText.textContent = formatRupiah(max);

        minPriceInput.value = Math.round(min);
        maxPriceInput.value = Math.round(max);
    });

    /* 🔥 OPTIONAL: auto submit saat slider dilepas */
    // slider.noUiSlider.on('change', () => {
    //     minPriceInput.form.submit();
    // });
    updatePrice();
</script>
@endpush