@extends('layouts.app')

@section('title', 'Products - Azzahra Computer')

@section('content')

    @include('partials.header-mobile')

    <div class="products-page-modern">

        <!-- Modern Page Header -->
        <div class="page-header">
            <div class="header-overlay"></div>

            <div class="container-fluid px-3 px-lg-5">
                <div class="row align-items-center">
                    <div class="col-lg-7">
                        <nav aria-label="breadcrumb" class="mb-3">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a href="/" class="text-decoration-none">
                                        <i class="bi bi-house-door me-1"></i>Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Products</li>
                            </ol>
                        </nav>

                        <h1 class="page-title mb-2">
                            <i class="bi bi-grid-3x3-gap-fill me-2"></i>Our Products
                        </h1>
                        <p class="page-subtitle mb-0">Discover our wide range of quality products</p>
                    </div>

                    <div class="col-lg-5 text-lg-end mt-3 mt-lg-0">
                        <div class="results-info">
                            <i class="bi bi-box-seam"></i>
                            <span class="fw-semibold" id="totalProducts">
                                @if (is_object($products) && method_exists($products, 'total'))
                                    {{ $products->total() }}
                                @else
                                    {{ is_array($products) ? count($products) : $products->count() }}
                                @endif
                            </span> products available
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Products Section -->
        <div class="products-section">
            <div class="container-fluid px-3 px-lg-5">
                <div class="row g-4">

                    <!-- Sidebar Filter -->
                    <div class="col-lg-3 col-md-4">
                        <div class="filters-wrapper">
                            <!-- Mobile Filter Toggle -->
                            <button class="btn btn-outline-primary w-100 d-lg-none mb-3 filter-toggle" type="button"
                                data-bs-toggle="collapse" data-bs-target="#filterSidebar">
                                <i class="bi bi-funnel me-2"></i>Filters & Categories
                                <i class="bi bi-chevron-down ms-auto"></i>
                            </button>

                            <div class="sidebar collapse d-lg-block" id="filterSidebar">
                                <!-- Active Filters -->
                                @php
                                    $hasFilters =
                                        request('category') ||
                                        request('search') ||
                                        request('min_price') ||
                                        request('max_price');
                                @endphp

                                @if ($hasFilters)
                                    <div class="filter-section active-filters" id="activeFiltersSection">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="filter-title mb-0">
                                                <i class="bi bi-funnel-fill me-2"></i>Active Filters
                                            </h6>
                                            <a href="{{ route('products') }}" class="btn btn-sm btn-link text-danger p-0">
                                                Clear All
                                            </a>
                                        </div>
                                        <div id="activeFiltersList" class="d-flex flex-wrap gap-2">
                                            @if (request('category'))
                                                <span class="badge">
                                                    Category: {{ ucfirst(request('category')) }}
                                                    <a href="{{ route('products', array_filter(request()->except('category'))) }}"
                                                        class="btn-close ms-2"></a>
                                                </span>
                                            @endif

                                            @if (request('search'))
                                                <span class="badge">
                                                    Search: "{{ request('search') }}"
                                                    <a href="{{ route('products', array_filter(request()->except('search'))) }}"
                                                        class="btn-close ms-2"></a>
                                                </span>
                                            @endif

                                            @if (request('min_price') || request('max_price'))
                                                <span class="badge">
                                                    Price: Rp{{ number_format(request('min_price', 0), 0, ',', '.') }} -
                                                    Rp{{ number_format(request('max_price', 33795), 0, ',', '.') }}
                                                    <a href="{{ route('products', array_filter(request()->except(['min_price', 'max_price']))) }}"
                                                        class="btn-close ms-2"></a>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                @endif

                                <!-- Search Filter -->
                                <div class="filter-section">
                                    <h6 class="filter-title mb-3">
                                        <i class="bi bi-search me-2"></i>Search Products
                                    </h6>
                                    <form method="GET" action="{{ route('products') }}" id="searchForm">
                                        @if (request('category'))
                                            <input type="hidden" name="category" value="{{ request('category') }}">
                                        @endif
                                        @if (request('min_price'))
                                            <input type="hidden" name="min_price" value="{{ request('min_price') }}">
                                        @endif
                                        @if (request('max_price'))
                                            <input type="hidden" name="max_price" value="{{ request('max_price') }}">
                                        @endif

                                        <div class="input-group">
                                            <input type="text" class="form-control" name="search" id="searchInput"
                                                value="{{ request('search', '') }}" placeholder="Search by name...">
                                            @if (request('search'))
                                                <a href="{{ route('products', array_filter(request()->except('search'))) }}"
                                                    class="btn btn-outline-secondary">
                                                    <i class="bi bi-x-lg"></i>
                                                </a>
                                            @else
                                                <button class="btn btn-outline-secondary" type="submit">
                                                    <i class="bi bi-search"></i>
                                                </button>
                                            @endif
                                        </div>
                                    </form>
                                </div>

                                <!-- Filter by Price -->
                                <div class="filter-section">
                                    <h6 class="filter-title mb-3">
                                        <i class="bi bi-cash-stack me-2"></i>Price Range (Rp)
                                    </h6>

                                    <form method="GET" action="{{ route('products') }}" id="priceFilterForm">
                                        @if (request('category'))
                                            <input type="hidden" name="category" value="{{ request('category') }}">
                                        @endif
                                        @if (request('search'))
                                            <input type="hidden" name="search" value="{{ request('search') }}">
                                        @endif

                                        <div class="price-inputs mb-3">
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <label class="small text-muted mb-1">Min Price</label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        name="min_price" id="minPriceInput" placeholder="0"
                                                        value="{{ request('min_price', '') }}" max="00"
                                                        min="0" step="10000">
                                                </div>
                                                <div class="col-6">
                                                    <label class="small text-muted mb-1">Max Price</label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        name="max_price" id="maxPriceInput" placeholder="00"
                                                        value="{{ request('max_price', '') }}" min="0"
                                                        max="90000000" step="10000">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Quick Price Buttons -->
                                        <div class="quick-prices mb-3">
                                            <p class="small text-muted mb-2">Quick Select:</p>
                                            <div class="d-flex flex-wrap gap-2">
                                                <button type="button"
                                                    class="btn btn-sm btn-outline-secondary quick-price" data-min="0"
                                                    data-max="1000000">
                                                    < 1,000,000 </button>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-secondary quick-price"
                                                            data-min="1000000" data-max="3000000">
                                                            1,000,000 - 3,000,000
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-secondary quick-price"
                                                            data-min="3000000" data-max="6000000">
                                                            3,000,000 - 6,000,000
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-secondary quick-price"
                                                            data-min="6000000" data-max="90000000">
                                                            > 6,000,000
                                                        </button>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="bi bi-check2-circle me-2"></i>Apply Price Filter
                                        </button>
                                    </form>
                                </div>

                                <!-- Reset Filters -->
                                <div class="filter-section border-0">
                                    <a href="{{ route('products') }}" class="btn btn-outline-secondary w-100">
                                        <i class="bi bi-arrow-clockwise me-2"></i>Reset All Filters
                                    </a>
                                </div>

                                <!-- Product Categories -->
                                <div class="filter-section">
                                    <h6 class="filter-title mb-3">
                                        <i class="bi bi-grid-3x3 me-2"></i>Categories
                                    </h6>
                                    <div class="category-list">
                                        @php
                                            $currentCategory = request('category');
                                            $isAllActive = empty($currentCategory);
                                        @endphp

                                        <a href="{{ route('products') }}"
                                            class="category-item {{ $isAllActive ? 'active' : '' }}">
                                            <div class="category-icon">
                                                <i class="bi bi-grid-3x3-gap"></i>
                                            </div>
                                            <span class="category-name">All Products</span>
                                            <i class="bi bi-chevron-right ms-auto"></i>
                                        </a>

                                        @forelse($searchCategories as $cat)
                                            @php
                                                $isActive = strtolower($currentCategory) === strtolower($cat);
                                            @endphp
                                            <a href="{{ route('products', ['category' => strtolower($cat)]) }}"
                                                class="category-item {{ $isActive ? 'active' : '' }}">
                                                <div class="category-icon">
                                                    <i class="bi bi-tag"></i>
                                                </div>
                                                <span class="category-name">{{ ucfirst($cat) }}</span>
                                                <i class="bi bi-chevron-right ms-auto"></i>
                                            </a>
                                        @empty
                                            <div class="text-center py-3">
                                                <i class="bi bi-inbox text-muted" style="font-size: 2rem;"></i>
                                                <p class="text-muted small mb-0 mt-2">No categories available</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Products Grid -->
                    <div class="col-lg-9 col-md-8">
                        <!-- Sort & View Options -->
                        <div class="products-toolbar mb-4">
                            <div class="row align-items-center g-3">
                                <div class="col-md-6">
                                    <div class="showing-results">
                                        @if (request('search') || request('category') || request('min_price') || request('max_price'))
                                            <i class="bi bi-funnel me-2"></i>
                                            <span class="text-muted">Filtered results</span>
                                        @else
                                            <i class="bi bi-box-seam me-2"></i>
                                            <span class="text-muted">All products</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex gap-2 justify-content-md-end">
                                        <form method="GET" action="{{ route('products') }}" id="sortForm">
                                            @if (request('category'))
                                                <input type="hidden" name="category" value="{{ request('category') }}">
                                            @endif
                                            @if (request('search'))
                                                <input type="hidden" name="search" value="{{ request('search') }}">
                                            @endif
                                            @if (request('min_price'))
                                                <input type="hidden" name="min_price"
                                                    value="{{ request('min_price') }}">
                                            @endif
                                            @if (request('max_price'))
                                                <input type="hidden" name="max_price"
                                                    value="{{ request('max_price') }}">
                                            @endif

                                            <select class="form-select form-select-sm" name="sort" id="sortBy"
                                                style="max-width: 200px;" onchange="this.form.submit()">
                                                <option value="">Sort by</option>
                                                <option value="name_asc"
                                                    {{ request('sort') === 'name_asc' ? 'selected' : '' }}>Name: A to Z
                                                </option>
                                                <option value="name_desc"
                                                    {{ request('sort') === 'name_desc' ? 'selected' : '' }}>Name: Z to A
                                                </option>
                                                <option value="price_asc"
                                                    {{ request('sort') === 'price_asc' ? 'selected' : '' }}>Price: Low to
                                                    High</option>
                                                <option value="price_desc"
                                                    {{ request('sort') === 'price_desc' ? 'selected' : '' }}>Price: High to
                                                    Low</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Products Component -->
                        <x-products :products="$products" :pagination="$pagination" :tabs="$tabs" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('partials.footer-mobile')
@endsection

@push('styles')
    <style>
        /* ================================
       MODERN PRODUCTS PAGE STYLES
       ================================ */

        :root {
            --primary-color: #120263;
            --primary-light: #1a0380;
            --primary-dark: #0a0140;
        }

        .products-page-modern {
            min-height: 100vh;
        }

        /* ================================
       ENHANCED PAGE HEADER
       ================================ */

        .page-header {
            position: relative;
            background: linear-gradient(135deg, #120263 0%, #1a0380 100%);
            padding: 2rem 0;
            color: white;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(18, 2, 99, 0.15);
        }

        /* Subtle Background Overlay */
        .header-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background:
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.05) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Header Content */
        .page-header .container-fluid {
            position: relative;
            z-index: 1;
        }

        /* Breadcrumb */
        .page-header .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }

        .page-header .breadcrumb-item,
        .page-header .breadcrumb-item a {
            color: rgba(255, 255, 255, 0.85);
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .page-header .breadcrumb-item a:hover {
            color: white;
        }

        .page-header .breadcrumb-item+.breadcrumb-item::before {
            color: rgba(255, 255, 255, 0.6);
        }

        .page-header .breadcrumb-item.active {
            color: white;
            font-weight: 500;
        }

        /* Page Title */
        .page-title {
            font-size: 2.25rem;
            font-weight: 700;
            margin: 0;
            color: white;
            display: flex;
            align-items: center;
            letter-spacing: -0.5px;
        }

        .page-title i {
            font-size: 1.75rem;
            opacity: 0.9;
        }

        .page-subtitle {
            font-size: 1.05rem;
            color: rgba(255, 255, 255, 0.85);
            font-weight: 400;
            margin-left: 2.5rem;
        }

        /* Results Info */
        .results-info {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 0.875rem 1.5rem;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .results-info:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .results-info i {
            font-size: 1.25rem;
            opacity: 0.9;
        }

        /* Products Section */
        .products-section {
            padding: 2rem 0 4rem;
        }

        /* Sidebar */
        .filters-wrapper {
            position: sticky;
            top: 20px;
        }

        .sidebar {
            background: white;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.06);
            overflow: hidden;
        }

        .filter-toggle {
            border-radius: 12px;
            padding: 0.875rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(18, 2, 99, 0.2);
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .filter-toggle:hover {
            background: var(--primary-color);
            color: white;
        }

        /* Filter Sections */
        .filter-section {
            padding: 1.5rem;
            border-bottom: 1px solid #f0f0f0;
        }

        .filter-section:last-child {
            border-bottom: none;
        }

        .filter-title {
            font-size: 1rem;
            font-weight: 600;
            color: #333;
            display: flex;
            align-items: center;
        }

        .filter-title i {
            color: var(--primary-color);
        }

        /* Active Filters */
        .active-filters .badge {
            background: var(--primary-color);
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .active-filters .badge .btn-close {
            --bs-btn-close-bg: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23fff'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e");
            width: 0.75rem;
            height: 0.75rem;
            opacity: 0.8;
        }

        .active-filters .badge .btn-close:hover {
            opacity: 1;
        }

        /* Price Inputs */
        .price-inputs .form-control {
            border-radius: 8px;
            border: 1px solid #e9ecef;
            padding: 0.5rem 0.75rem;
        }

        .price-inputs .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(18, 2, 99, 0.15);
        }

        /* Quick Price Buttons */
        .quick-prices .btn {
            font-size: 0.8rem;
            padding: 0.375rem 0.75rem;
            border-radius: 50px;
            font-weight: 500;
        }

        .quick-prices .btn:hover {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .quick-prices .btn.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        /* Category List */
        .category-list {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .category-item {
            display: flex;
            align-items: center;
            padding: 0.875rem 1rem;
            border-radius: 12px;
            text-decoration: none;
            color: #495057;
            background: #f8f9fa;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .category-item:hover {
            background: #e9ecef;
            color: var(--primary-color);
            transform: translateX(4px);
            border-color: var(--primary-color);
        }

        .category-item.active {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            color: white;
            font-weight: 600;
            border-color: var(--primary-color);
            box-shadow: 0 4px 12px rgba(18, 2, 99, 0.3);
        }

        .category-item.active .category-icon {
            background: rgba(255, 255, 255, 0.2);
        }

        .category-icon {
            width: 36px;
            height: 36px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: white;
            border-radius: 10px;
            margin-right: 0.75rem;
            font-size: 1.1rem;
            flex-shrink: 0;
        }

        .category-name {
            flex: 1;
            font-size: 0.95rem;
            font-weight: 500;
        }

        .category-item i.bi-chevron-right {
            opacity: 0.5;
            transition: transform 0.3s ease;
        }

        .category-item:hover i.bi-chevron-right,
        .category-item.active i.bi-chevron-right {
            opacity: 1;
            transform: translateX(4px);
        }

        /* Search Input */
        .input-group .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(18, 2, 99, 0.15);
        }

        /* Products Toolbar */
        .products-toolbar {
            background: white;
            padding: 1rem 1.5rem;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .showing-results {
            font-size: 0.95rem;
        }

        .form-select {
            border-radius: 8px;
            border: 1px solid #e9ecef;
            cursor: pointer;
        }

        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(18, 2, 99, 0.15);
        }

        /* Buttons */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
            border: none;
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(18, 2, 99, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(18, 2, 99, 0.4);
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
        }

        .btn-outline-primary {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
        }

        .btn-outline-secondary {
            border-radius: 10px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            border-width: 2px;
        }

        .btn-outline-secondary:hover {
            background: #6c757d;
            border-color: #6c757d;
        }

        /* ================================
       RESPONSIVE STYLES
       ================================ */

        @media (max-width: 991px) {
            .page-header {
                padding: 1.75rem 0;
            }

            .page-title {
                font-size: 1.85rem;
            }

            .page-subtitle {
                font-size: 0.95rem;
                margin-left: 2.25rem;
            }

            .results-info {
                width: 100%;
                justify-content: center;
            }

            .filters-wrapper {
                position: static;
            }

            .sidebar {
                border-radius: 12px;
            }

            #filterSidebar.collapsing,
            #filterSidebar.collapse.show {
                transition: height 0.3s ease;
            }
        }

        @media (max-width: 768px) {
            .page-header {
                padding: 1.5rem 0;
            }

            .page-title {
                font-size: 1.65rem;
            }

            .page-title i {
                font-size: 1.5rem;
            }

            .page-subtitle {
                font-size: 0.9rem;
                margin-left: 2rem;
            }

            .results-info {
                padding: 0.75rem 1.25rem;
                font-size: 0.9rem;
            }

            .results-info i {
                font-size: 1.1rem;
            }

            .products-section {
                padding: 1.5rem 0 3rem;
            }

            .filter-section {
                padding: 1.25rem;
            }

            .category-item {
                padding: 0.75rem 0.875rem;
            }

            .products-toolbar {
                padding: 1rem;
            }
        }

        @media (max-width: 480px) {
            .page-header {
                padding: 1.25rem 0;
            }

            .page-title {
                font-size: 1.4rem;
            }

            .page-title i {
                font-size: 1.25rem;
            }

            .page-subtitle {
                font-size: 0.85rem;
                margin-left: 0;
                margin-top: 0.25rem;
            }

            .results-info {
                padding: 0.65rem 1rem;
                font-size: 0.85rem;
                gap: 0.5rem;
            }

            .results-info i {
                font-size: 1rem;
            }

            .breadcrumb {
                font-size: 0.8rem;
            }

            .filter-title {
                font-size: 0.95rem;
            }

            .category-item {
                padding: 0.65rem 0.75rem;
                font-size: 0.9rem;
            }

            .category-icon {
                width: 32px;
                height: 32px;
                font-size: 1rem;
            }
        }

        /* Product items fade */
        .product-item {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .product-item.hiding {
            opacity: 0;
            transform: scale(0.95);
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Quick price buttons
            document.querySelectorAll('.quick-price').forEach(button => {
                button.addEventListener('click', function() {
                    const min = this.dataset.min;
                    const max = this.dataset.max;

                    document.getElementById('minPriceInput').value = min;
                    document.getElementById('maxPriceInput').value = max;

                    // Auto-submit the form
                    document.getElementById('priceFilterForm').submit();
                });
            });

            // Auto-submit search after typing (with debounce)
            let searchTimeout;
            const searchInput = document.getElementById('searchInput');

            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        if (this.value.length >= 3 || this.value.length === 0) {
                            document.getElementById('searchForm').submit();
                        }
                    }, 800);
                });
            }
        });
    </script>
@endpush
