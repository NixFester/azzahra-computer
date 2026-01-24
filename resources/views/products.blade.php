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
                            Rp<span id="minPriceText">100,000.00</span>
                            —
                            Rp<span id="maxPriceText">40,000,000.00</span>
                        </strong>
                    </p>
        <div id="priceSlider"></div>
                <input type="hidden" id="minPriceInput" name="min_price"
                    value="{{ request('min_price', 100) }}">

                <input type="hidden" id="maxPriceInput" name="max_price"
                    value="{{ request('max_price', 40000) }}">

                <!-- Preserve search and category filters -->
                <input type="hidden" name="search" value="{{ request('search', '') }}">
                <input type="hidden" name="category" value="{{ request('category', '') }}">

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
                                @php
                                    $isActive = request('category') === null;
                                @endphp
                                <a href="?search={{ request('search', '') }}&min_price={{ request('min_price', 100) }}&max_price={{ request('max_price', 40000000) }}" 
                                   class="text-decoration-none {{ $isActive ? 'text-primary fw-bold' : 'text-dark' }} category-link">
                                    Semua Produk
                                </a>
                            </li>
                            @forelse($searchCategories as $cat)
                            <li class="mb-2">
                                @php
                                    $isActive = request('category') === $cat;
                                @endphp
                                <a href="?category={{ urlencode($cat) }}&search={{ request('search', '') }}&min_price={{ request('min_price', 0) }}&max_price={{ request('max_price', 50000000) }}" 
                                   class="text-decoration-none {{ $isActive ? 'text-primary fw-bold' : 'text-dark' }} category-link">
                                    {{ ucfirst($cat) }}
                                </a>
                            </li>
                            @empty
                            <li class="mb-2">
                                <p class="text-muted">No categories available</p>
                            </li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Products Grid -->
           <div class="col-lg-8 col-md-7">

                <!-- Products Component -->
                <x-products 
                    :products="$products" 
                    :pagination="$pagination" 
                    :tabs="$tabs" 
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

    .category-link.text-primary {
        color: #667eea !important;
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
            min: 100,
            max: 40000000
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
    
    // Handle category click to toggle selection
    document.querySelectorAll('.category-link').forEach(link => {
        link.addEventListener('click', function(e) {
            const currentCategory = new URLSearchParams(window.location.search).get('category');
            const clickedCategory = new URL(this.href).searchParams.get('category');
            
            // If clicking the same category, clear it
            if (currentCategory === clickedCategory) {
                e.preventDefault();
                const url = new URL(window.location);
                url.searchParams.delete('category');
                window.location = url.toString();
            }
        });
    });
    
    updatePrice();
</script>
@endpush