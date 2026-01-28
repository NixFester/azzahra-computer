@extends('layouts.app')

@section('title', $product['name'] . ' - Product Detail')

@section('content')

@include('partials.header-mobile')

<!-- Product Detail Section -->
<section class="container my-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/products') }}" class="text-decoration-none">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/products?category=' . urlencode($product['category'])) }}" class="text-decoration-none">{{ $product['category'] }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($product['name'], 50) }}</li>
        </ol>
    </nav>

    <div class="row g-4">
        <!-- Product Image -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <div class="position-relative">
                        @if($product['badge'])
                        <span class="badge position-absolute top-0 start-0 m-3 fs-6 px-3 py-2 text-white" style="background-color: #120263;">
                            <i class="bi bi-tag-fill me-1"></i>{{ $product['badge'] }}
                        </span>
                        @endif
                        <img src="{{ $product['image'] }}" 
                             alt="{{ $product['name'] }}" 
                             class="img-fluid rounded w-100"
                             onerror="this.onerror=null;this.src='{{ asset('images/fallback/product.jpg') }}';"
                             style="object-fit: cover; min-height: 400px; max-height: 500px;">
                    </div>
                    
                    <!-- Thumbnail Gallery (Optional) -->
                    <div class="d-flex gap-2 mt-3 overflow-auto">
                        @for($i = 1; $i <= 4; $i++)
                        <img src="{{ $product['image'] }}" 
                             alt="Thumbnail {{ $i }}" 
                             class="img-thumbnail cursor-pointer" 
                            onerror="this.onerror=null;this.src='{{ asset('images/fallback/product.jpg') }}';"

                             style="width: 80px; height: 80px; object-fit: cover;">
                        @endfor
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Info -->
        <div class="col-lg-6">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <!-- Category & Brand -->
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <span class="badge text-white" style="background-color: #120263;">
                            <i class="bi bi-grid-fill me-1"></i>{{ $product['category'] }}
                        </span>
                        @if($product['brand'])
                        <span class="badge bg-secondary-subtle text-secondary">
                            <i class="bi bi-shield-check me-1"></i>{{ $product['brand'] }}
                        </span>
                        @endif
                    </div>

                    <!-- Product Name -->
                    <h1 class="h3 fw-bold mb-3">{{ $product['name'] }}</h1>



                    <!-- Price -->
                    <div class="mb-4">
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <h2 class="h3 fw-bold mb-0" style="color: #120263;">{{ $product['price'] }}</h2>
                            @if($product['oldPrice'])
                            <span class="text-muted text-decoration-line-through fs-5">{{ $product['oldPrice'] }}</span>
                            @endif
                        </div>
                    </div>

                    <!-- WhatsApp Contact -->
                    <div class="d-grid gap-2 mb-4">
                        <a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text=Hi%2C%20Apakah%20Produk%2C%20{{ urlencode($product['name']) }}%2C%20tersedia%3F" 
                           target="_blank"
                           class="btn btn-lg text-white fw-semibold" 
                           style="background-color: #25D366;">
                            <i class="bi bi-whatsapp me-2 fs-5"></i>Chat via WhatsApp
                        </a>
                    </div>

                    <!-- Product Details Tabs -->
                    <hr class="my-4">
                    
                    <ul class="nav nav-tabs mb-3" id="productTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab">
                                <i class="bi bi-file-text me-1"></i>Description
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button" role="tab">
                                <i class="bi bi-list-check me-1"></i>Specifications
                            </button>
                        </li>
                    </ul>

                    <div class="tab-content" id="productTabContent">
                        <!-- Description Tab -->
                        <div class="tab-pane fade show active" id="description" role="tabpanel">
                            <h6 class="fw-bold mb-2">Product Description</h6>
                            <p class="text-muted small mb-0">
                                {{ $product['name'] }} is a premium quality product from {{ $product['brand'] ?? 'our trusted brand' }}. 
                                This product offers excellent features and performance, perfect for your needs.
                            </p>
                        </div>

                        <!-- Specifications Tab -->
                        <div class="tab-pane fade" id="specs" role="tabpanel">
                            <h6 class="fw-bold mb-2">Technical Specifications</h6>
                            @if(!empty($product['specs']))
                                @php
                                    $rawSpecs = is_array($product['specs'])
                                        ? implode('/', $product['specs'])
                                        : $product['specs'];

                                    $specs = explode('/', $rawSpecs);
                                @endphp

                                <div class="table-responsive">
                                    <table class="table table-sm table-striped mb-0">
                                        <tbody>
                                            <tr>
                                                <th>Specification:</th>
                                            </tr>
                                            @foreach($specs as $index => $spec)
                                                <tr>
                                                    <td class="small">{{ trim($spec) }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                            <div class="alert alert-light small mb-0">
                                <i class="bi bi-info-circle me-1"></i>Detailed specifications will be available soon.
                            </div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products -->
<section class="container-fluid">
    <x-new-products-collection-mobile 
        :products="app('App\Http\Controllers\ProductsController')->getFeaturedProducts()" 
        :categories="$navCategories" 
    />
</section>

@include('partials.footer-mobile')

<!-- JavaScript for Image Gallery -->
<script>
// Image gallery functionality
document.querySelectorAll('.img-thumbnail').forEach((thumb, index) => {
    thumb.style.cursor = 'pointer';
    thumb.addEventListener('click', function() {
        document.querySelector('.img-fluid.rounded').src = this.src;
    });
});
</script>

<style>
/* Custom styles for better UX */
.cursor-pointer {
    cursor: pointer;
}

.img-thumbnail:hover {
    transform: scale(1.05);
    transition: transform 0.2s ease-in-out;
    border-color: #120263;
}

.nav-tabs .nav-link {
    color: #6c757d;
    border: none;
    border-bottom: 3px solid transparent;
}

.nav-tabs .nav-link:hover {
    color: #120263;
    border-bottom-color: #120263;
}

.nav-tabs .nav-link.active {
    color: #120263;
    background-color: transparent;
    border-bottom-color: #120263;
    font-weight: 600;
}

.card {
    transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-2px);
    box-shadow: 0 .5rem 1rem rgba(18, 2, 99, 0.15)!important;
}
</style>

@endsection