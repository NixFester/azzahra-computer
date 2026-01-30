@props(['id', 'image', 'category', 'name', 'price', 'badge' => null, 'oldPrice' => null])

<style>
    .kartu-modern {
        height: 460px;
        border: 1px solid #e9ecef;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        background: white;
        display: flex;
        flex-direction: column;
        position: relative;
    }

    .kartu-modern:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(18, 2, 99, 0.15), 0 4px 8px rgba(0, 0, 0, 0.08) !important;
        border-color: #120263;
    }

    .kartu-image-wrapper {
        position: relative;
        height: 220px;
        overflow: hidden;
        background: linear-gradient(135deg, #f5f7fa 0%, #f8f9fa 100%);
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
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
        color: #120263;
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
        min-height: 2.8rem;
    }

    .kartu-price-section {
        margin-top: auto;
        margin-bottom: 12px;
    }

    .price-current {
        font-size: 1.1rem;
        font-weight: 700;
        color: #120263;
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
        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%);
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
        text-decoration: none;
    }

    .kartu-btn-cart:hover {
        background: linear-gradient(135deg, #128C7E 0%, #0D7C66 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(37, 211, 102, 0.3);
        color: white;
        text-decoration: none;
    }

    .kartu-btn-cart:active {
        transform: translateY(0);
    }

    .kartu-btn-cart i {
        font-size: 1.1em;
    }

    .btn-whatsapp {
        background: linear-gradient(135deg, #25D366 0%, #128C7E 100%) !important;
        border: none !important;
        color: white !important;
    }

    .btn-whatsapp:hover {
        background: linear-gradient(135deg, #128C7E 0%, #0D7C66 100%) !important;
        color: white !important;
    }

    .btn-whatsapp i {
        font-size: 1.1em;
    }

    /* Ensure card link doesn't break layout */
    a.kartu-modern {
        text-decoration: none;
        color: inherit;
    }

    a.kartu-modern:hover {
        text-decoration: none;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .kartu-modern {
            height: 400px;
        }

        .kartu-image-wrapper {
            height: 200px;
        }

        .kartu-title {
            font-size: 0.9rem;
        }

        .price-current {
            font-size: 1rem;
        }

        .kartu-btn-cart {
            font-size: 0.85rem;
            padding: 8px 12px;
        }
    }

    @media (max-width: 480px) {
        .kartu-modern {
            height: 380px;
        }

        .kartu-image-wrapper {
            height: 180px;
        }

        .kartu-body {
            padding: 12px;
        }
    }
</style>

<div class="kartu-modern position-relative shadow-sm">
    <a href="/product/{{ $id }}" class="text-decoration-none" style="color: inherit; display: contents;">
        <div class="kartu-image-wrapper">
            @if ($badge)
                <span class="badge-discount">{{ $badge }}</span>
            @endif
            <img src="{{ $image }}" alt="{{ $name }}" loading="lazy"
                onerror="this.onerror=null;this.src='{{ asset('images/fallback/product.jpg') }}';">
        </div>
        <div class="kartu-body">
            <p class="kartu-category">{{ $category }}</p>
            <h5 class="kartu-title">{{ ucfirst(htmlspecialchars_decode($name)) }}</h5>
            <div class="kartu-price-section">
                <span class="price-current">{{ $price }}</span>
                @if ($oldPrice)
                    <span class="price-old">{{ $oldPrice }}</span>
                @endif
            </div>
        </div>
    </a>
    @php
        $message = "Halo, kak\n" . 'Saya mau beli ' . $name . "\n" . "Apakah stok masih ada?\n" . 'Terimakasih.';
    @endphp
    <div style="padding: 0 16px 16px;">
        <a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text={{ urlencode($message) }}" target="_blank"
            rel="noopener" class="kartu-btn-cart btn-whatsapp" title="Order via WhatsApp"
            onclick="event.stopPropagation();">
            <i class="bi bi-whatsapp"></i>
            Order via WhatsApp
        </a>
    </div>
</div>
