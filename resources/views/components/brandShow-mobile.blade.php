<div class="brand-section-mobile">
    <h3 class="brand-title">
        AUTHORIZED MULTIBRAND SERVICE CENTER TEGAL
    </h3>

    <div class="brand-logos-wrapper">
        <div class="brand-logo-item">
            <img src="{{ asset('images/asus.png') }}" alt="Asus">
        </div>
        <div class="brand-logo-item">
            <img src="{{ asset('images/lenovo.png') }}" alt="Lenovo">
        </div>
        <div class="brand-logo-item">
            <img src="{{ asset('images/zyrex.png') }}" alt="Zyrex">
        </div>
        <div class="brand-logo-item">
            <img src="{{ asset('images/xiami.png') }}" alt="Xiaomi">
        </div>
        <div class="brand-logo-item">
            <img src="{{ asset('images/avita.png') }}" alt="Avita">
        </div>
        <div class="brand-logo-item">
            <img src="{{ asset('images/infinix.png') }}" alt="Infinix">
        </div>
        <div class="brand-logo-item">
            <img src="{{ asset('images/canon.png') }}" alt="Canon">
        </div>
        <div class="brand-logo-item">
            <img src="{{ asset('images/hp.png') }}" alt="HP">
        </div>
    </div>
</div>

<style>
/* Desktop Brand Section */
.brand-section-mobile {
    display: block !important;
    text-align: center;
    padding: 3rem 0;
}

.brand-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 2.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.brand-logos-wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 2.5rem;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 2rem;
}

.brand-logo-item {
    transition: all 0.3s ease;
}

.brand-logo-item img {
    height: 60px;
    width: auto;
    max-width: 150px;
    object-fit: contain;
    filter: grayscale(1);
    opacity: 0.6;
    transition: all 0.3s ease;
}

.brand-logo-item:hover img {
    filter: grayscale(0);
    opacity: 1;
    transform: scale(1.1);
}

/* ======================================
   MOBILE STYLES - 768px and below
   ====================================== */
@media (max-width: 768px) {
    .brand-section-mobile {
        padding: 2.5rem 1rem;
    }

    .brand-title {
        font-size: 1.15rem;
        margin-bottom: 2rem;
        padding: 0 0.5rem;
        line-height: 1.4;
    }

    .brand-logos-wrapper {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 1.5rem !important;
        padding: 0 0.5rem !important;
    }

    .brand-logo-item {
        flex: 0 0 calc(33.333% - 1rem);
        max-width: calc(33.333% - 1rem);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0.75rem;
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    }

    .brand-logo-item img {
        height: 45px;
        max-width: 100%;
        filter: grayscale(0.5);
        opacity: 0.8;
    }

    .brand-logo-item:active img {
        filter: grayscale(0);
        opacity: 1;
        transform: scale(1.05);
    }
}

/* Small Mobile - 480px and below */
@media (max-width: 480px) {
    .brand-section-mobile {
        padding: 2rem 0.875rem;
    }

    .brand-title {
        font-size: 1rem;
        margin-bottom: 1.5rem;
    }

    .brand-logos-wrapper {
        gap: 1rem !important;
    }

    .brand-logo-item {
        flex: 0 0 calc(50% - 0.5rem);
        max-width: calc(50% - 0.5rem);
        padding: 0.6rem;
    }

    .brand-logo-item img {
        height: 35px;
    }
}
</style>