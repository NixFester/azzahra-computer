@extends('layouts.app')

@section('title', 'Products - Azzahra Computer')

@section('content')
@include('partials.header')

<div class="products-page">
    <!-- Banner Section (Optional) -->
    <div class="page-banner bg-primary text-white py-4">
        <div class="container">
            <h1 class="mb-0">Our Products</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white">Home</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Main Products Section -->
    <div class="container my-5">
        <div class="row">
            <!-- Sidebar Filter -->
            <div class="col-lg-3 col-md-4 mb-4">
                <div class="sidebar">
                    <!-- Filter by Price -->
                    <div class="filter-section mb-4">
                        <h5 class="filter-title border-bottom pb-2 mb-3">Filter By Price</h5>
                        <div class="price-range">
                            <p class="mb-2">Price: Rp299,000.00 - Rp350,000.00</p>
                            <input type="range" class="form-range" id="priceRange" min="299000" max="350000">
                        </div>
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
            <div class="col-lg-9 col-md-8">
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
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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
</style>
@endpush

@push('scripts')
<script>
    // Price range filter functionality
    document.getElementById('priceRange')?.addEventListener('input', function(e) {
        console.log('Price range:', e.target.value);
        // Add your filtering logic here
    });
</script>
@endpush