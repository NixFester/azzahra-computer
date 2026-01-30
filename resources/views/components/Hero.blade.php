<style>
   .banner-section {
            position: relative;
            height: 500px;
            overflow: hidden;
        }
        
        .banner-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
.banner-overlay {
    background: radial-gradient(ellipse 140% 180% at top, rgba(232, 243, 255, 0) 50%, rgba(232, 243, 255, 0.8) 53%, rgb(232, 243, 255) 55%);
    display: flex;
    flex-direction: column;
    justify-content: end;
    align-items: center;
    text-align: center;
    height: 100%;
    padding-bottom: 4%;
}
        
.banner-title {
    font-size: 3.5rem;
    font-weight: bold;
    color: #ffffff;
    margin-bottom: 2rem;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
    -webkit-text-stroke: 1px #000000; /* 2px ketebalan, warna hitam */
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
            border: 1px solid #ffffff;
            color: #ffffff;
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
            
            .banner-section {
                height: 400px;
            }
            
            .banner-buttons .btn {
                padding: 0.6rem 1.5rem;
                font-size: 1rem;
            }
        }
        .seksi {
            background-image: url('images/head/header.jpg');
            background-size: cover;
            background-position: center;
            height: 100vh;
        }
</style>

@php
    $pesan = "Permisi Kak! Saya ingin bertanya-tanya tentang Service di Azzahra Komputer!"
@endphp

<section class="seksi">
    <div class="banner-overlay">
    <h1 class="banner-title" style="margin-top: -30px;">Azzahra Computer</h1>
        <div class="banner-buttons">
            <a href="/products" class="btn btn-outline-primary">All Products</a>
            <a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text={{ urlencode($pesan) }}" class="btn btn-outline-primary">Service Center</a>
        </div>
    </div>
</section>