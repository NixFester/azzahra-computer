<style>
    .kartu-modern {
        height: 420px;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: white;
        display: flex;
        flex-direction: column;
    }

    .kartu-modern:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(61, 143, 239, 0.15), 0 4px 8px rgba(0, 0, 0, 0.08) !important;
        border-color: #3D8FEF;
    }

    .kartu-image-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: linear-gradient(135deg, #f5f7fa 0%, #f8f9fa 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .kartu-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .kartu-modern:hover .kartu-image-wrapper img {
        transform: scale(1.08);
    }

    .badge-discount {
        position: absolute;
        top: 12px;
        left: 12px;
        background: linear-gradient(135deg, #ff4757 0%, #ff3838 100%);
        color: white;
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.85rem;
        box-shadow: 0 4px 12px rgba(255, 71, 87, 0.3);
        z-index: 10;
    }

    .kartu-body {
        padding: 16px;
        flex: 1;
        display: flex;
        flex-direction: column;
        background: white;
    }

    .kartu-category {
        font-size: 0.8rem;
        font-weight: 600;
        color: #3D8FEF;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin: 0;
    }

    .kartu-title {
        font-size: 0.95rem;
        font-weight: 600;
        color: #1a1a1a;
        margin: 8px 0;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .kartu-price-section {
        margin-top: auto;
        margin-bottom: 12px;
    }

    .price-current {
        font-size: 1.1rem;
        font-weight: 700;
        color: #3D8FEF;
        display: inline-block;
    }

    .price-old {
        font-size: 0.85rem;
        color: #999;
        text-decoration: line-through;
        margin-left: 8px;
        display: inline-block;
    }

    .kartu-btn-cart {
        background: linear-gradient(135deg, #3D8FEF 0%, #2563eb 100%);
        border: none;
        border-radius: 8px;
        padding: 10px 16px;
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
        width: 100%;
    }

    .kartu-btn-cart:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(61, 143, 239, 0.3);
        color: white;
        text-decoration: none;
    }

    .kartu-btn-cart:active {
        transform: translateY(0);
    }

    .icon-cart {
        width: 18px;
        height: 18px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>

<div class="kartu-modern position-relative shadow-sm">
    <div class="kartu-image-wrapper">
        @if($badge)
            <span class="badge-discount">{{ $badge }}</span>
        @endif
        <img src="{{ asset($image) }}" alt="{{ $name }}" loading="lazy">
    </div>

    <div class="kartu-body">
        <p class="kartu-category">{{ $category }}</p>
        <h5 class="kartu-title">{{ $name }}</h5>

        <div class="kartu-price-section">
            <span class="price-current">{{ $price }}</span>
            @if($oldPrice)
                <span class="price-old">{{ $oldPrice }}</span>
            @endif
        </div>

        <button class="kartu-btn-cart" title="Add to cart">
            <svg class="icon-cart" fill="currentColor" viewBox="0 0 16 16">
                <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.352l.646 2.585H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 6.5H12.5l1.313-6.5H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </svg>
            Add To Cart
        </button>
    </div>
</div>
