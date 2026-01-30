<style>
    .banner-section {
        position: relative;
        height: 500px;
        overflow: hidden;
    }
    
    /* Background image container */
    .seksi {
        height: 100vh;
        position: relative;
        overflow: hidden;
    }
    
    .banner-bg-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        opacity: 0;
        transition: opacity 1.5s ease-in-out;
    }
    
    .banner-bg-image.active {
        opacity: 1;
    }
    
    /* Black alpha overlay - first layer */
    .banner-overlay-black {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.4);
        z-index: 1;
    }
    
    /* Gradient overlay - second layer */
    .banner-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background: radial-gradient(ellipse 140% 180% at top, rgba(232, 243, 255, 0) 50%, rgba(232, 243, 255, 0.8) 53%, rgb(232, 243, 255) 55%);
        display: flex;
        flex-direction: column;
        justify-content: end;
        align-items: center;
        text-align: center;
        height: 100%;
        padding-bottom: 4%;
        z-index: 2;
    }
    
    .banner-overlay-two {
        position: relative;
        z-index: 3;
    }
    
    .banner-title {
        font-size: 3.5rem;
        font-weight: bold;
        color: #ffffff;
        margin-bottom: 2rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        -webkit-text-stroke: 1px #000000;
    }
    
    .banner-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .banner-buttons .btn {
        padding: 0.75rem 2rem;
        font-size: 1.1rem;
        font-weight: 500;
        border-radius: 50px;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background-color: #3498db;
        border: none;
    }
    
    .btn-primary:hover {
        background-color: #298bb9;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    
    .btn-outline-primary {
        color: #120263;
        background-color: #ffffff;
    }
    
    .btn-outline-primary:hover {
        background-color: #120263;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
    }
    
    @media (max-width: 768px) {
        .banner-title {
            font-size: 2.5rem;
        }
        .seksi {
            height: 400px !important;
        }
        .banner-buttons .btn {
            padding: 0.6rem 1.5rem;
            font-size: 1rem;
        }
    }
</style>

@php
    $pesan = 'Permisi Kak! Saya ingin bertanya-tanya tentang Service di Azzahra Komputer!';
    
    // Get all images from the images/head folder
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
    
    // Fallback if no images found
    if (empty($images)) {
        $images[] = asset('images/head/header.jpg');
    }
@endphp

<section class="seksi" id="banner-section">
    <!-- Background images -->
    @foreach($images as $index => $image)
        <div class="banner-bg-image {{ $index === 0 ? 'active' : '' }}" 
             style="background-image: url('{{ $image }}');"
             data-index="{{ $index }}"></div>
    @endforeach
    
    <!-- Black alpha overlay (first layer) -->
    <div class="banner-overlay-black"></div>
    
    <!-- Gradient overlay (second layer) -->
    <div class="banner-overlay">
        <div class="banner-overlay-two">
            <h1 class="banner-title" style="margin-top: -30px;">Authorized Service Center</h1>
            <h1 class="banner-title" style="margin-top: -30px;">Azzahra Computer</h1>
            <div class="banner-buttons">
                <a href="/products" class="btn btn-outline-primary">All Products</a>
                <a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text={{ urlencode($pesan) }}"
                    class="btn btn-outline-primary">Service Center</a>
            </div>
        </div>
    </div>
</section>

<script>
    // Fade in/out image cycling functionality
    const bgImages = document.querySelectorAll('.banner-bg-image');
    const totalImages = bgImages.length;
    let currentIndex = 0;
    
    function cycleImages() {
        if (totalImages > 1) {
            // Fade out current image
            bgImages[currentIndex].classList.remove('active');
            
            // Move to next image
            currentIndex = (currentIndex + 1) % totalImages;
            
            // Fade in next image
            bgImages[currentIndex].classList.add('active');
        }
    }
    
    // Change image every 5 seconds (adjust as needed)
    if (totalImages > 1) {
        setInterval(cycleImages, 5000);
    }
</script>