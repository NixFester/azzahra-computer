<div class="container">
            <!-- Main Company Profile -->
            <div class="row">
                <div class="col-12">
                    <div class="company-card">
                        
<div class="row">
                            <div class="col-lg-6">
                                <div class="company-header">
                                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="company-logo">
                                    <h4 class="company-title">Azzahra Computer Tegal</h4>
                                </div>
                                <p class="company-info">
                                    Kami menyediakan solusi teknologi lengkap sejak 2010 — dari penjualan perangkat komputer, laptop,
                                    printer, CCTV, hingga pengembangan sistem digital dan pelatihan IT. Melayani instansi, pendidikan,
                                    dan bisnis dengan harga kompetitif, garansi resmi, dan tim profesional.
                                </p>
                                <div class="info-item">
                                    <span class="info-icon">📍</span>
                                    <span>Tegal, Jawa Tengah</span>
                                </div>
                                <div class="info-item">
                                    <span><i class="bi bi-whatsapp me-1"></i> WA: {{ $storeInfo?->whatsapp }}</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">🌐</span>
                                    <span>bit.ly/ProfileAzzahraComputer</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="video-wrapper">
                                    <iframe src="https://www.youtube.com/embed/noDPPzCI1Uk" 
                                            allowfullscreen
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Branch Profile -->
            <div class="row mt-3">
                <div class="col-12">
                    <div class="company-card">
                        
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="company-header">
                                    <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="company-logo">
                                    <h4 class="company-title">Cabang Bekasi</h4>
                                </div>
                                <p class="company-info">
                                    Cabang kami di Bekasi siap melayani kebutuhan teknologi Anda dengan layanan yang sama berkualitas.
                                    Akses mudah, stok lengkap, dan tim yang responsif untuk mendukung bisnis dan kebutuhan personal Anda.
                                </p>
                                <div class="info-item">
                                    <span class="info-icon">📍</span>
                                    <span>Cibubur, Bekasi, Jawa Barat</span>
                                </div>
                                <div class="info-item">
                                    <span class="info-icon">📞</span>
                                    <span>WA: 0818-0387-7777-1</span>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="video-wrapper">
                                    <iframe src="https://www.youtube.com/embed/DT1j33eBb2U" 
                                            allowfullscreen
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<style>
/* Company Header - Logo & Title Container */
.company-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.25rem;
}

.company-logo {
    height: auto;
    max-height: 60px;
    width: auto;
}

.company-title {
    margin: 0;
    font-size: 1.5rem;
    font-weight: 700;
    color: #120263;
    line-height: 1.2;
}

.company-info {
    margin-bottom: 1.5rem;
    line-height: 1.7;
    color: #555;
    text-align: justify;
}

.info-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 0.875rem;
    font-size: 0.95rem;
    color: #444;
}

.info-icon {
    font-size: 1.25rem;
    flex-shrink: 0;
}

/* Video Wrapper */
.video-wrapper {
    position: relative;
    width: 100%;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    height: 0;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.video-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
    border-radius: 12px;
}

/* Company Card */
.company-card {
    background: white;
    padding: 2rem;
    border-radius: 16px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
}

.company-card:hover {
    box-shadow: 0 6px 30px rgba(18, 2, 99, 0.12);
    transform: translateY(-2px);
}

/* Section Divider */
.section-divider {
    height: 2px;
    background: linear-gradient(90deg, transparent, #120263, transparent);
    margin: 3rem 0;
    opacity: 0.2;
}

/* Responsive Adjustments */
@media (max-width: 991px) {
    .company-header {
        margin-bottom: 1rem;
    }
    
    .company-logo {
        max-height: 50px;
    }
    
    .company-title {
        font-size: 1.35rem;
    }
    
    .video-wrapper {
        margin-top: 1.5rem;
    }
}

@media (max-width: 576px) {
    .company-header {
        gap: 0.75rem;
    }
    
    .company-logo {
        max-height: 45px;
    }
    
    .company-title {
        font-size: 1.2rem;
    }
    
    .company-info {
        font-size: 0.9rem;
    }
    
    .info-item {
        font-size: 0.875rem;
        gap: 0.5rem;
    }
    
    .company-card {
        padding: 1.5rem;
    }
    
    .section-divider {
        margin: 2rem 0;
    }
}
</style>