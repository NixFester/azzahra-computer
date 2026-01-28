@extends('layouts.app')
@section('title', 'Kontak')
@section('content')

@include('partials.header-mobile')

<section class="contact-page-modern">
    <!-- Page Header -->
    <div class="contact-header">
        <div class="container">
            <div class="header-content">
                <h1 class="contact-title">Contact Us</h1>
                <p class="contact-subtitle">We're here to help you</p>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <div class="row g-4">
            <!-- Contact Information Cards -->
            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <div class="card-icon phone">
                        <i class="bi bi-whatsapp"></i>
                    </div>
                    <h3 class="card-title">WhatsApp</h3>
                    <a href="https://wa.me/6285942001720" target="_blank" class="card-link">
                        +62 859-4200-1720
                    </a>
                    <p class="card-desc">Chat with us on WhatsApp</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <div class="card-icon instagram">
                        <i class="bi bi-instagram"></i>
                    </div>
                    <h3 class="card-title">Instagram</h3>
                    <a href="https://instagram.com/authorized_servicecenter.tegal" target="_blank" class="card-link">
                        @authorized_servicecenter.tegal
                    </a>
                    <p class="card-desc">Follow us on Instagram</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="contact-card">
                    <div class="card-icon youtube">
                        <i class="bi bi-youtube"></i>
                    </div>
                    <h3 class="card-title">YouTube</h3>
                    <a href="https://youtube.com/@authorizedmultibrandservic9761" target="_blank" class="card-link">
                        @authorizedmultibrandservic9761
                    </a>
                    <p class="card-desc">Subscribe to our channel</p>
                </div>
            </div>
        </div>

        <!-- Main Content Row -->
        <div class="row g-4 mt-4">
            <!-- Left Column: Business Info & Location -->
            <div class="col-lg-6">
                <!-- About Us Card -->
                <div class="info-card mb-4">
                    <div class="info-header">
                        <i class="bi bi-building"></i>
                        <h3>Azzahra Computer</h3>
                    </div>
                    <div class="info-content">
                        <p class="info-text">
                            <strong>Authorized Service Center Resmi</strong><br>
                            Asus, Lenovo, Infinix, Xiaomi, Canon, Zyrex, Avita, HP & Non Warranty ALL BRAND.
                        </p>
                        <p class="info-text mb-0">
                            Pusat layanan Service Center Resmi di Kota Tegal, Jawa Tengah.
                        </p>
                    </div>
                </div>

                <!-- Location Card -->
                <div class="info-card">
                    <div class="info-header">
                        <i class="bi bi-geo-alt-fill"></i>
                        <h3>Lokasi kami</h3>
                    </div>
                    <div class="info-content">
                        <p class="location-address">
                            <i class="bi bi-pin-map-fill"></i>
                            Komplek Ruko Citraland blok Belleza Plaza No. 11 / Jl. Sipelem Raya Kota Tegal – Jawa Tengah
                        </p>
                        <a href="https://maps.google.com/?q=Komplek Ruko Citraland blok Belleza Plaza No. 11 Jl. Sipelem Raya Kota Tegal Jawa Tengah" 
                           target="_blank" 
                           class="btn-direction">
                            <i class="bi bi-map"></i> Dapatkan Arah
                        </a>
                    </div>
                </div>
            </div>

            <!-- Right Column: Business Hours -->
            <div class="col-lg-6">
                <div class="business-hours-card">
                    <div class="hours-header">
                        <div class="header-icon">
                            <i class="bi bi-clock-history"></i>
                        </div>
                        <div class="header-text">
                            <h3>Jam Buka</h3>
                            <p>Kunjungi kami pada saat jam operasi</p>
                        </div>
                    </div>
                    
                    <div class="hours-body">
                        <div class="hours-schedule">
                            <div class="schedule-day">
                                <div class="day-info">
                                    <i class="bi bi-calendar-check-fill"></i>
                                    <span class="day-name">Monday</span>
                                </div>
                                <span class="day-time">08:00 - 17:00</span>
                            </div>
                            
                            <div class="schedule-day">
                                <div class="day-info">
                                    <i class="bi bi-calendar-check-fill"></i>
                                    <span class="day-name">Tuesday</span>
                                </div>
                                <span class="day-time">08:00 - 17:00</span>
                            </div>
                            
                            <div class="schedule-day">
                                <div class="day-info">
                                    <i class="bi bi-calendar-check-fill"></i>
                                    <span class="day-name">Wednesday</span>
                                </div>
                                <span class="day-time">08:00 - 17:00</span>
                            </div>
                            
                            <div class="schedule-day">
                                <div class="day-info">
                                    <i class="bi bi-calendar-check-fill"></i>
                                    <span class="day-name">Thursday</span>
                                </div>
                                <span class="day-time">08:00 - 17:00</span>
                            </div>
                            
                            <div class="schedule-day">
                                <div class="day-info">
                                    <i class="bi bi-calendar-check-fill"></i>
                                    <span class="day-name">Friday</span>
                                </div>
                                <span class="day-time">08:00 - 17:00</span>
                            </div>
                            
                            <div class="schedule-day saturday">
                                <div class="day-info">
                                    <i class="bi bi-calendar-event-fill"></i>
                                    <span class="day-name">Saturday</span>
                                </div>
                                <span class="day-time">08:00 - 17:00</span>
                            </div>
                            
                            <div class="schedule-day closed">
                                <div class="day-info">
                                    <i class="bi bi-calendar-x-fill"></i>
                                    <span class="day-name">Sunday</span>
                                </div>
                                <span class="day-time">Closed</span>
                            </div>
                        </div>
                        
                        <div class="hours-note">
                            <i class="bi bi-info-circle-fill"></i>
                            <p>Kami siap melayani Anda selama jam operasional. Untuk keperluan mendesak di luar jam kerja, silakan hubungi kami melalui WhatsApp.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Google Maps (Optional - uncomment jika mau pakai) -->
        <!-- 
        <div class="row mt-5">
            <div class="col-12">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=YOUR_EMBED_LINK_HERE" 
                            width="100%" 
                            height="450" 
                            style="border:0; border-radius: 16px;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
        -->
    </div>
</section>

<style>
/* ================================
   CONTACT PAGE MODERN STYLES
   ================================ */

:root {
    --primary-color: #120263;
    --primary-light: #1a0380;
    --whatsapp-color: #25D366;
    --instagram-color: #E4405F;
    --youtube-color: #FF0000;
}

.contact-page-modern {
    padding-bottom: 0rem;
}

/* ================================
   PAGE HEADER
   ================================ */

.contact-header {
    position: relative;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    padding:1rem 0;
    margin-bottom: 0rem;
    overflow: hidden;
}

.contact-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.08) 0%, transparent 50%);
    pointer-events: none;
}

.header-content {
    position: relative;
    text-align: center;
    color: white;
}

.contact-title {
    font-size: 2.5rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    color: white !important;
    letter-spacing: -0.5px;
}

.contact-subtitle {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.85);
    margin: 0;
    font-weight: 400;
}

/* ================================
   CONTACT CARDS
   ================================ */

.contact-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    transition: all 0.3s ease;
    height: 100%;
}

.contact-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 8px 30px rgba(18, 2, 99, 0.15);
}

.card-icon {
    width: 70px;
    height: 70px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    color: white;
    margin-bottom: 1.25rem;
}

.card-icon.phone {
    background: linear-gradient(135deg, var(--whatsapp-color) 0%, #20ba5a 100%);
}

.card-icon.instagram {
    background: linear-gradient(135deg, #F58529 0%, var(--instagram-color) 50%, #833AB4 100%);
}

.card-icon.youtube {
    background: linear-gradient(135deg, var(--youtube-color) 0%, #cc0000 100%);
}

.card-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: var(--primary-color);
    margin-bottom: 0.75rem;
}

.card-link {
    display: block;
    font-size: 1rem;
    font-weight: 600;
    color: var(--primary-light);
    text-decoration: none;
    margin-bottom: 0.5rem;
    transition: all 0.3s ease;
}

.card-link:hover {
    color: var(--primary-color);
    transform: translateX(3px);
}

.card-desc {
    font-size: 0.9rem;
    color: #666;
    margin: 0;
}

/* ================================
   INFO CARDS
   ================================ */

.info-card {
    background: white;
    border-radius: 16px;
    padding: 2rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
}

.info-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid #f0f0f0;
}

.info-header i {
    font-size: 1.75rem;
    color: var(--primary-color);
}

.info-header h3 {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--primary-color);
    margin: 0;
}

.info-content {
    color: #666;
}

.info-text {
    font-size: 1rem;
    line-height: 1.7;
    margin-bottom: 1rem;
}

.location-address {
    display: flex;
    gap: 0.75rem;
    font-size: 1rem;
    line-height: 1.7;
    margin-bottom: 1.25rem;
}

.location-address i {
    color: var(--primary-color);
    font-size: 1.25rem;
    flex-shrink: 0;
    margin-top: 0.25rem;
}

.btn-direction {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    color: white;
    padding: 0.875rem 1.75rem;
    border-radius: 10px;
    text-decoration: none;
    font-weight: 700;
    transition: all 0.3s ease;
}

.btn-direction:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(18, 2, 99, 0.3);
    color: white;
}

/* Business Hours */

/* ================================
   BUSINESS HOURS CARD
   ================================ */

.business-hours-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
    height: 100%;
}

.hours-header {
    background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-light) 100%);
    padding: 2rem;
    display: flex;
    align-items: center;
    gap: 1.25rem;
    color: white;
}

.header-icon {
    width: 60px;
    height: 60px;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.header-icon i {
    font-size: 1.75rem;
}

.header-text h3 {
    font-size: 1.75rem;
    font-weight: 700;
    margin-bottom: 0.25rem;
}

.header-text p {
    font-size: 0.95rem;
    opacity: 0.9;
    margin: 0;
}

.hours-body {
    padding: 2rem;
}

.hours-schedule {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-bottom: 2rem;
}

.schedule-day {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem 1.25rem;
    background: #f8f9fa;
    border-radius: 12px;
    border-left: 4px solid var(--primary-color);
    transition: all 0.3s ease;
}

.schedule-day:hover {
    background: #e9ecef;
    transform: translateX(5px);
}

.schedule-day.saturday {
    border-left-color: #ffa500;
}

.schedule-day.closed {
    border-left-color: #dc3545;
    opacity: 0.7;
}

.day-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.day-info i {
    font-size: 1.25rem;
    color: var(--primary-color);
}

.schedule-day.saturday .day-info i {
    color: #ffa500;
}

.schedule-day.closed .day-info i {
    color: #dc3545;
}

.day-name {
    font-size: 1.05rem;
    font-weight: 600;
    color: #333;
}

.day-time {
    font-size: 1rem;
    font-weight: 600;
    color: #666;
    padding: 0.375rem 1rem;
    background: white;
    border-radius: 8px;
}

.schedule-day.closed .day-time {
    color: #dc3545;
}

.hours-note {
    display: flex;
    gap: 1rem;
    padding: 1.25rem;
    background: linear-gradient(135deg, rgba(18, 2, 99, 0.05) 0%, rgba(26, 3, 128, 0.08) 100%);
    border-radius: 12px;
    border: 1px solid rgba(18, 2, 99, 0.1);
}

.hours-note i {
    font-size: 1.5rem;
    color: var(--primary-color);
    flex-shrink: 0;
    margin-top: 0.125rem;
}

.hours-note p {
    font-size: 0.95rem;
    color: #666;
    line-height: 1.6;
    margin: 0;
}

/* ================================
   RESPONSIVE
   ================================ */

@media (max-width: 991px) {
    .contact-title {
        font-size: 2rem;
    }
}

@media (max-width: 768px) {
    .contact-header {
        padding: 1.75rem 0;
    }

    .contact-title {
        font-size: 1.85rem;
    }

    .contact-subtitle {
        font-size: 0.95rem;
    }

    .contact-card {
        padding: 1.5rem;
    }

    .info-card {
        padding: 1.5rem;
    }

    .business-hours-card .hours-header {
        padding: 1.5rem;
        flex-direction: column;
        text-align: center;
    }

    .business-hours-card .hours-body {
        padding: 1.5rem;
    }

    .header-icon {
        width: 55px;
        height: 55px;
    }

    .header-icon i {
        font-size: 1.5rem;
    }

    .header-text h3 {
        font-size: 1.5rem;
    }

    .schedule-day {
        padding: 0.875rem 1rem;
    }
}

@media (max-width: 576px) {
    .contact-page-modern {
        padding-bottom: 2rem;
    }

    .contact-header {
        padding: 1.5rem 0;
        margin-bottom: 2rem;
    }

    .contact-title {
        font-size: 1.65rem;
    }

    .card-icon {
        width: 60px;
        height: 60px;
        font-size: 1.75rem;
    }

    .info-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
    }

    .hours-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.25rem;
    }

    .header-icon {
        width: 50px;
        height: 50px;
    }

    .header-icon i {
        font-size: 1.35rem;
    }

    .header-text h3 {
        font-size: 1.35rem;
    }

    .header-text p {
        font-size: 0.875rem;
    }

    .schedule-day {
        flex-direction: column;
        align-items: flex-start;
        gap: 0.5rem;
        padding: 0.875rem;
    }

    .day-time {
        width: 100%;
        text-align: center;
    }
}
</style>

<script>
// Optional: Add smooth scroll or other interactive features
document.addEventListener('DOMContentLoaded', function() {
    console.log('Contact page loaded');
});
</script>


@include('partials.footer-mobile')
@endsection