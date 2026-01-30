@props(['brands'])
<div class="brand-desktop">
    <h3 class="brand-title">
        AUTHORIZED MULTIBRAND SERVICE CENTER TEGAL
    </h3>

    <div class="brand-logos">
        @foreach ($brands as $brand)
            <img class="brand" src="{{ Storage::url($brand['image_path']) }}" alt="{{ $brand['title'] }}">
        @endforeach
    </div>
</div>

<style>
    /* Desktop Brand Section */
    .brand-desktop {
        text-align: center;
        padding: 4rem 0;
    }

    /* Title */
    .brand-title {
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 28px;
        color: #000;
    }

    /* Desktop: 4 columns (2 rows) */
    .brand-logos {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 24px;
        align-items: center;
        justify-items: center;
    }

    /* Logo size */
    .brand-logos img {
        max-height: 150px;
        max-width: 200px;
        object-fit: contain;
        transition: transform 0.25s ease;
    }

    .brand-logos img:hover {
        transform: scale(1.08);
    }

    /* Mobile: 1 logo per row */
    @media (max-width: 768px) {
        .brand-desktop {
            padding: 2rem 0;
        }

        .brand-logos {
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .brand-logos img {
            max-height: 90px;
            max-width: 160px;
        }
    }
</style>
