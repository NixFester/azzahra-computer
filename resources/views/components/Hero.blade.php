<style>
    /* ─── Hero Section ─── */
    .hero-seksi {
        position: relative;
        height: 100vh;
        min-height: 560px;
        overflow: hidden;
        font-family: 'Segoe UI', sans-serif;
    }

    /* Background images */
    .hero-bg {
        position: absolute;
        inset: 0;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transform: scale(1.05);
        transition: opacity 1.5s ease-in-out, transform 6s ease-in-out;
        will-change: opacity, transform;
    }

    .hero-bg.active {
        opacity: 1;
        transform: scale(1);
    }

    /* Dark overlay */
    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(
            to bottom,
            rgba(0,0,0,0.25) 0%,
            rgba(0,0,0,0.45) 50%,
            rgba(0,0,0,0.75) 100%
        );
        z-index: 1;
    }

    /* Content */
    .hero-content {
        position: absolute;
        inset: 0;
        z-index: 2;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        padding: 0 7%;
        padding-bottom: 60px;
        gap: 40px;
    }

    .hero-content-left {
        flex: 1;
        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    /* Logo right side */
    .hero-logo-wrap {
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transform: translateY(24px) scale(0.9);
        animation: heroFadeUp 0.8s ease forwards 1.0s;
    }

    .hero-logo-ring {
        position: relative;
        width: 220px;
        height: 220px;
    }

    .hero-logo-ring::before {
        content: '';
        position: absolute;
        inset: -8px;
        border-radius: 50%;
        border: 2px solid rgba(52, 152, 219, 0.4);
        animation: heroRingPulse 3s ease-in-out infinite;
    }

    .hero-logo-ring::after {
        content: '';
        position: absolute;
        inset: -18px;
        border-radius: 50%;
        border: 1px solid rgba(52, 152, 219, 0.2);
        animation: heroRingPulse 3s ease-in-out infinite 0.5s;
    }

    .hero-logo-img {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid rgba(255,255,255,0.15);
        box-shadow:
            0 0 40px rgba(52,152,219,0.3),
            0 20px 60px rgba(0,0,0,0.4);
        backdrop-filter: blur(2px);
    }

    @keyframes heroRingPulse {
        0%, 100% { opacity: 0.6; transform: scale(1); }
        50% { opacity: 1; transform: scale(1.03); }
    }

    @media (max-width: 768px) {
        .hero-logo-wrap { display: none; }
        .hero-content { flex-direction: column; align-items: flex-start; justify-content: center; }
    }

    /* Badge */
    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: rgba(52, 152, 219, 0.25);
        border: 1px solid rgba(52, 152, 219, 0.6);
        color: #a8d8f8;
        font-size: 0.78rem;
        font-weight: 600;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        padding: 6px 14px;
        border-radius: 50px;
        margin-bottom: 1.4rem;
        opacity: 0;
        transform: translateY(20px);
        animation: heroFadeUp 0.7s ease forwards 0.3s;
    }

    .hero-badge-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #3498db;
        box-shadow: 0 0 6px #3498db;
        animation: heroPulse 1.8s ease-in-out infinite;
    }

    /* Title */
    .hero-title {
        font-size: clamp(2.4rem, 5.5vw, 4.2rem);
        font-weight: 800;
        color: #ffffff;
        line-height: 1.1;
        margin: 0 0 0.5rem;
        opacity: 0;
        transform: translateY(24px);
        animation: heroFadeUp 0.7s ease forwards 0.5s;
    }

    .hero-title .accent {
        color: #3498db;
        display: block;
    }

    /* Subtitle */
    .hero-subtitle {
        font-size: clamp(1rem, 2vw, 1.25rem);
        color: rgba(255,255,255,0.7);
        max-width: 500px;
        margin: 0.8rem 0 2.2rem;
        line-height: 1.6;
        opacity: 0;
        transform: translateY(24px);
        animation: heroFadeUp 0.7s ease forwards 0.7s;
    }

    /* Buttons */
    .hero-buttons {
        display: flex;
        gap: 14px;
        flex-wrap: wrap;
        opacity: 0;
        transform: translateY(24px);
        animation: heroFadeUp 0.7s ease forwards 0.9s;
    }

    .hero-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 0.8rem 2rem;
        font-size: 0.95rem;
        font-weight: 600;
        border-radius: 50px;
        text-decoration: none;
        transition: transform 0.25s ease, box-shadow 0.25s ease, background 0.25s ease;
        cursor: pointer;
    }

    .hero-btn-primary {
        background: #3498db;
        color: #fff;
        border: none;
        box-shadow: 0 4px 20px rgba(52,152,219,0.45);
    }

    .hero-btn-primary:hover {
        background: #2186c7;
        transform: translateY(-3px);
        box-shadow: 0 8px 28px rgba(52,152,219,0.55);
        color: #fff;
        text-decoration: none;
    }

    .hero-btn-ghost {
        background: rgba(255,255,255,0.1);
        color: #fff;
        border: 1.5px solid rgba(255,255,255,0.4);
        backdrop-filter: blur(4px);
    }

    .hero-btn-ghost:hover {
        background: rgba(255,255,255,0.22);
        transform: translateY(-3px);
        color: #fff;
        text-decoration: none;
        border-color: rgba(255,255,255,0.7);
    }

    /* Stats bar */
    .hero-stats {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 3;
        display: flex;
        justify-content: center;
        gap: 0;
        background: rgba(10,10,20,0.6);
        backdrop-filter: blur(12px);
        border-top: 1px solid rgba(255,255,255,0.08);
        opacity: 0;
        animation: heroFadeUp 0.7s ease forwards 1.1s;
    }

    .hero-stat {
        flex: 1;
        max-width: 220px;
        text-align: center;
        padding: 18px 16px;
        border-right: 1px solid rgba(255,255,255,0.08);
        color: #fff;
    }

    .hero-stat:last-child { border-right: none; }

    .hero-stat-num {
        font-size: 1.5rem;
        font-weight: 800;
        color: #3498db;
        line-height: 1;
    }

    .hero-stat-label {
        font-size: 0.72rem;
        color: rgba(255,255,255,0.55);
        letter-spacing: 0.06em;
        text-transform: uppercase;
        margin-top: 4px;
    }

    /* Scroll indicator */
    .hero-scroll {
        position: absolute;
        bottom: 90px;
        right: 7%;
        z-index: 3;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 6px;
        opacity: 0;
        animation: heroFadeUp 0.7s ease forwards 1.3s;
    }

    .hero-scroll span {
        font-size: 0.65rem;
        color: rgba(255,255,255,0.45);
        letter-spacing: 0.12em;
        text-transform: uppercase;
        writing-mode: vertical-rl;
    }

    .hero-scroll-line {
        width: 1.5px;
        height: 48px;
        background: linear-gradient(to bottom, rgba(255,255,255,0.5), transparent);
        animation: heroScrollLine 1.8s ease-in-out infinite;
    }

    /* Image dots indicator */
    .hero-dots {
        position: absolute;
        bottom: 90px;
        left: 7%;
        z-index: 3;
        display: flex;
        gap: 8px;
        opacity: 0;
        animation: heroFadeUp 0.7s ease forwards 1.2s;
    }

    .hero-dot {
        width: 24px;
        height: 3px;
        border-radius: 2px;
        background: rgba(255,255,255,0.3);
        cursor: pointer;
        transition: background 0.3s, width 0.3s;
    }

    .hero-dot.active {
        background: #3498db;
        width: 40px;
    }

    /* Animations */
    @keyframes heroFadeUp {
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes heroPulse {
        0%, 100% { opacity: 1; box-shadow: 0 0 6px #3498db; }
        50% { opacity: 0.5; box-shadow: 0 0 12px #3498db; }
    }

    @keyframes heroScrollLine {
        0% { transform: scaleY(0); transform-origin: top; opacity: 1; }
        50% { transform: scaleY(1); transform-origin: top; opacity: 1; }
        100% { transform: scaleY(1); transform-origin: bottom; opacity: 0; }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .hero-seksi { height: 100svh; min-height: 480px; }
        .hero-content { padding: 0 5%; padding-bottom: 80px; }
        .hero-stats { gap: 0; }
        .hero-stat { padding: 14px 10px; }
        .hero-stat-num { font-size: 1.2rem; }
        .hero-scroll { display: none; }
        .hero-title { font-size: 2rem; }
    }

    @media (prefers-reduced-motion: reduce) {
        .hero-bg, .hero-badge, .hero-title, .hero-subtitle,
        .hero-buttons, .hero-stats, .hero-dots, .hero-scroll,
        .hero-scroll-line, .hero-badge-dot {
            animation: none !important;
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
    }
</style>

@php
    $pesan = 'Permisi Kak! Saya ingin bertanya-tanya tentang Service di Azzahra Komputer!';

    $imagePath = public_path('images/head');
    $images = [];

    if (is_dir($imagePath)) {
        $files = scandir($imagePath);
        foreach ($files as $file) {
            if (in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $images[] = asset('images/head/' . $file);
            }
        }
    }

    if (empty($images)) {
        $images[] = asset('images/head/header.jpg');
    }
@endphp

<section class="hero-seksi" id="hero-section">

    {{-- Background images --}}
    @foreach($images as $index => $image)
        <div class="hero-bg {{ $index === 0 ? 'active' : '' }}"
             style="background-image: url('{{ $image }}');"
             data-index="{{ $index }}"></div>
    @endforeach

    {{-- Overlay --}}
    <div class="hero-overlay"></div>

    {{-- Main content --}}
    <div class="hero-content">

        {{-- Kiri: teks & tombol --}}
        <div class="hero-content-left">
            <div class="hero-badge">
                <span class="hero-badge-dot"></span>
                Authorized Service Center
            </div>

            <h1 class="hero-title">
                Solusi Terpercaya
                <span class="accent">Azzahra Computer</span>
            </h1>

            <p class="hero-subtitle">
                Service laptop, PC, dan sparepart original — ditangani teknisi berpengalaman di Tegal &amp; Cibubur.
            </p>

            <div class="hero-buttons">
                <a href="/products" class="hero-btn hero-btn-primary">
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3h18l-2 13H5L3 3z"/><circle cx="9" cy="21" r="1"/><circle cx="20" cy="21" r="1"/></svg>
                    Lihat Produk
                </a>
                <a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text={{ urlencode($pesan) }}"
                   class="hero-btn hero-btn-ghost" target="_blank">
                    <svg width="16" height="16" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 0C5.373 0 0 5.373 0 12c0 2.123.552 4.117 1.523 5.849L.057 23.617a.75.75 0 00.921.921l5.768-1.466A11.946 11.946 0 0012 24c6.627 0 12-5.373 12-12S18.627 0 12 0zm0 22c-1.934 0-3.752-.522-5.309-1.433l-.38-.227-3.943 1.003 1.003-3.943-.227-.38A9.956 9.956 0 012 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10z"/></svg>
                    Hubungi Kami
                </a>
            </div>
        </div>

        {{-- Kanan: logo bulat --}}
        <div class="hero-logo-wrap">
            <div class="hero-logo-ring">
                <img src="{{ asset('logo-azzahra-computer.jpg') }}"
                     alt="Azzahra Computer Logo"
                     class="hero-logo-img">
            </div>
        </div>

    </div>

    {{-- Image dots --}}
    <div class="hero-dots" id="hero-dots">
        @foreach($images as $index => $image)
            <div class="hero-dot {{ $index === 0 ? 'active' : '' }}"
                 data-target="{{ $index }}"
                 onclick="goToImage({{ $index }})"></div>
        @endforeach
    </div>

    {{-- Scroll indicator --}}
    <div class="hero-scroll">
        <span>Scroll</span>
        <div class="hero-scroll-line"></div>
    </div>

    {{-- Stats bar --}}
    <div class="hero-stats">
        <div class="hero-stat">
            <div class="hero-stat-num">10+</div>
            <div class="hero-stat-label">Tahun Berpengalaman</div>
        </div>
        <div class="hero-stat">
            <div class="hero-stat-num">5000+</div>
            <div class="hero-stat-label">Perangkat Diservis</div>
        </div>
        <div class="hero-stat">
            <div class="hero-stat-num">2</div>
            <div class="hero-stat-label">Lokasi Cabang</div>
        </div>
        <div class="hero-stat">
            <div class="hero-stat-num">4.9★</div>
            <div class="hero-stat-label">Rating Pelanggan</div>
        </div>
    </div>

</section>

<script>
    const heroBgs  = document.querySelectorAll('.hero-bg');
    const heroDots = document.querySelectorAll('.hero-dot');
    const total    = heroBgs.length;
    let current    = 0;
    let timer;

    function goToImage(index) {
        heroBgs[current].classList.remove('active');
        heroDots[current]?.classList.remove('active');
        current = index;
        heroBgs[current].classList.add('active');
        heroDots[current]?.classList.add('active');
        resetTimer();
    }

    function nextImage() {
        goToImage((current + 1) % total);
    }

    function resetTimer() {
        clearInterval(timer);
        if (total > 1) timer = setInterval(nextImage, 5500);
    }

    if (total > 1) resetTimer();
</script>