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
                <li class="breadcrumb-item"><a href="{{ url('/products?category=' . urlencode($product['category'])) }}"
                        class="text-decoration-none">{{ $product['category'] }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($product['name'], 50) }}</li>
            </ol>
        </nav>

        <!-- Alert Messages -->
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mb-4 rounded-3 shadow-sm" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4 rounded-3 shadow-sm" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row g-4">
            <!-- Product Image -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="position-relative">
                            @if ($product['badge'])
                                <span class="badge position-absolute top-0 start-0 m-3 fs-6 px-3 py-2 text-white"
                                    style="background-color: #120263;">
                                    <i class="bi bi-tag-fill me-1"></i>{{ $product['badge'] }}
                                </span>
                            @endif
                            <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="img-fluid rounded w-100"
                                onerror="this.onerror=null;this.src='{{ asset('images/fallback/product.jpg') }}';"
                                style="object-fit: cover; min-height: 400px; max-height: 500px;">
                        </div>

                        <!-- Thumbnail Gallery (Optional) -->
                        <div class="d-flex gap-2 mt-3 overflow-auto">
                            @for ($i = 1; $i <= 4; $i++)
                                <img src="{{ $product['image'] }}" alt="Thumbnail {{ $i }}"
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
                            @if ($product['brand'])
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
                                @if ($product['oldPrice'])
                                    <span
                                        class="text-muted text-decoration-line-through fs-5">{{ $product['oldPrice'] }}</span>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-grid gap-2 mb-4">
                            <button type="button" class="btn btn-lg text-white fw-semibold btn-buy-now"
                                data-bs-toggle="modal" data-bs-target="#checkoutModal"
                                style="background: linear-gradient(135deg, #120263, #1e0590); border: none; border-radius: 12px; padding: 14px;">
                                <i class="bi bi-bag-check me-2 fs-5"></i>Beli Sekarang
                            </button>
                            <a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text=Hi%2C%20Apakah%20Produk%2C%20{{ urlencode($product['name']) }}%2C%20tersedia%3F"
                                target="_blank" class="btn btn-lg fw-semibold btn-wa-detail"
                                style="background-color: #25D366; color: white; border-radius: 12px; padding: 14px;">
                                <i class="bi bi-whatsapp me-2 fs-5"></i>Hubungi via WhatsApp
                            </a>
                        </div>

                        <!-- Product Details Tabs -->
                        <hr class="my-4">

                        <ul class="nav nav-tabs mb-3" id="productTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab">
                                    <i class="bi bi-file-text me-1"></i>Description
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs"
                                    type="button" role="tab">
                                    <i class="bi bi-list-check me-1"></i>Specifications
                                </button>
                            </li>
                        </ul>

                        <div class="tab-content" id="productTabContent">
                            <!-- Description Tab -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                <h6 class="fw-bold mb-2">Product Description</h6>
                                <p class="text-muted small mb-0">
                                    {{ $product['name'] }} is a premium quality product from
                                    {{ $product['brand'] ?? 'our trusted brand' }}.
                                    This product offers excellent features and performance, perfect for your needs.
                                </p>
                            </div>

                            <!-- Specifications Tab -->
                            <div class="tab-pane fade" id="specs" role="tabpanel">
                                <h6 class="fw-bold mb-2">Technical Specifications</h6>
                                @if (!empty($product['specs']))
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
                                                @foreach ($specs as $index => $spec)
                                                    <tr>
                                                        <td class="small">{{ trim($spec) }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="alert alert-light small mb-0">
                                        <i class="bi bi-info-circle me-1"></i>Detailed specifications will be available
                                        soon.
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
        <x-new-products-collection-mobile :products="app('App\Http\Controllers\ProductsController')->getFeaturedProducts()" :categories="$navCategories" />
    </section>

    @include('partials.footer-mobile')

    <!-- Checkout Modal -->
    <div class="modal fade" id="checkoutModal" tabindex="-1" aria-labelledby="checkoutModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 20px; border: none; overflow: hidden;">
                <div class="modal-header border-0 pb-0" style="background: linear-gradient(135deg, #120263, #1e0590); padding: 28px 28px 20px;">
                    <div>
                        <h5 class="modal-title text-white fw-bold" id="checkoutModalLabel">
                            <i class="bi bi-bag-check me-2"></i>Checkout
                        </h5>
                        <p class="text-white-50 mb-0 mt-1 small">Lengkapi data untuk melanjutkan pembayaran</p>
                    </div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4">
                    {{-- Product Summary --}}
                    <div class="d-flex align-items-center p-3 mb-4 rounded-3" style="background: #f8f9fa;">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                            class="rounded-3 me-3" style="width: 64px; height: 64px; object-fit: cover;"
                            onerror="this.onerror=null;this.src='{{ asset('images/fallback/product.jpg') }}';">
                        <div class="flex-grow-1 overflow-hidden">
                            <div class="fw-semibold text-truncate" style="font-size: 0.9rem;">{{ $product['name'] }}</div>
                            <div class="fw-bold mt-1" style="color: #120263;">{{ $product['price'] }}</div>
                        </div>
                    </div>

                    {{-- Checkout Form --}}
                    <form action="{{ route('payment.checkout') }}" method="POST" id="checkoutForm">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product['id'] }}">

                        <div class="mb-3">
                            <label for="buyer_name" class="form-label fw-semibold small">
                                <i class="bi bi-person me-1"></i>Nama Lengkap
                            </label>
                            <input type="text" class="form-control form-control-lg" id="buyer_name"
                                name="buyer_name" required placeholder="Masukkan nama lengkap"
                                style="border-radius: 12px; border: 2px solid #e5e7eb; font-size: 0.9rem;"
                                onfocus="this.style.borderColor='#120263'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>

                        <div class="mb-3">
                            <label for="buyer_email" class="form-label fw-semibold small">
                                <i class="bi bi-envelope me-1"></i>Email
                            </label>
                            <input type="email" class="form-control form-control-lg" id="buyer_email"
                                name="buyer_email" required placeholder="nama@email.com"
                                style="border-radius: 12px; border: 2px solid #e5e7eb; font-size: 0.9rem;"
                                onfocus="this.style.borderColor='#120263'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>

                        <div class="mb-4">
                            <label for="buyer_phone" class="form-label fw-semibold small">
                                <i class="bi bi-phone me-1"></i>No. HP <span class="text-muted">(opsional)</span>
                            </label>
                            <input type="tel" class="form-control form-control-lg" id="buyer_phone"
                                name="buyer_phone" placeholder="08xxxxxxxxxx"
                                style="border-radius: 12px; border: 2px solid #e5e7eb; font-size: 0.9rem;"
                                onfocus="this.style.borderColor='#120263'" onblur="this.style.borderColor='#e5e7eb'">
                        </div>

                        <button type="submit" class="btn btn-lg w-100 text-white fw-bold" id="checkoutSubmitBtn"
                            style="background: linear-gradient(135deg, #120263, #1e0590); border: none; border-radius: 14px; padding: 16px;">
                            <span class="checkout-btn-text">
                                <i class="bi bi-shield-lock me-2"></i>Bayar Sekarang
                            </span>
                            <span class="checkout-btn-loading d-none">
                                <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                Memproses...
                            </span>
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <small class="text-muted">
                            <i class="bi bi-shield-check me-1"></i>Pembayaran aman diproses oleh Xendit
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript for Image Gallery -->
    <script>
        // Image gallery functionality
        document.querySelectorAll('.img-thumbnail').forEach((thumb, index) => {
            thumb.style.cursor = 'pointer';
            thumb.addEventListener('click', function() {
                document.querySelector('.img-fluid.rounded').src = this.src;
            });
        });

        // Checkout form submit handler
        const checkoutForm = document.getElementById('checkoutForm');
        if (checkoutForm) {
            checkoutForm.addEventListener('submit', function() {
                const btn = document.getElementById('checkoutSubmitBtn');
                btn.disabled = true;
                btn.querySelector('.checkout-btn-text').classList.add('d-none');
                btn.querySelector('.checkout-btn-loading').classList.remove('d-none');
            });
        }
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
            box-shadow: 0 .5rem 1rem rgba(18, 2, 99, 0.15) !important;
        }

        .btn-buy-now:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(18, 2, 99, 0.35);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .btn-wa-detail:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(37, 211, 102, 0.35);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #checkoutModal .form-control:focus {
            box-shadow: 0 0 0 3px rgba(18, 2, 99, 0.15);
        }
    </style>

@endsection
