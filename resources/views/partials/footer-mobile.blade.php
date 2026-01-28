<footer class="footer-mobile border-top mt-5 pt-4 bg-white">
    <div class="footer-container">
        <div class="footer-grid">

            {{-- Location Widget --}}
            <div class="footer-section location-section bg-#fffffff">
                <div class="location-tabs-wrapper">
                    <div class="location-tabs">
                        <div class="location-tab active" onclick="showTegal()">Tegal</div>
                        <div class="location-tab" onclick="showCibubur()">Cibubur</div>
                    </div>

                    <div class="location-content bg-white">
                        <h3 class="location-title" id="title">Toko Reparasi Komputer Tegal</h3>

                        <p class="location-address" id="address">
                            Ruko Citraland Tegal, Blk. B No.11, Kraton, Kec. <br>
                            Tegal Bar., Kota Tegal, Jawa Tengah 52112
                        </p>

                        <a href="https://maps.app.goo.gl/CeYe9bGF1zyYp6ZX7" id="maps" class="btn btn-primary btn-maps">
                            Lihat di Google Maps
                        </a>

                        <h4 class="contact-title">Kontak</h4>
                        <p class="contact-item"><i class="bi bi-whatsapp me-1"></i> {{ $storeInfo?->whatsapp }}</p>
                        <p class="contact-item">☎️ 0283 3409 09</p>

                        <h4 class="contact-title">Buka :</h4>
                        <p class="contact-item">Senin – Sabtu : 08:30 – 17:00</p>
                    </div>
                </div>
            </div>

            {{-- Links Section --}}
            <div class="footer-section links-section">
                <div class="footer-column">
                    <h5 class="footer-heading">Informasi</h5>
                    <ul class="footer-list">
                        <li><a href="/tentang">Tentang Kami</a></li>
                        <li><a href="/kontak">Kontak</a></li>
                        <li><a href="https://maps.app.goo.gl/gNrtrGizxMmiqGzx8">Lokasi</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h5 class="footer-heading">Our Service</h5>
                    <ul class="footer-list">
                        <li><a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20service%20laptop">Service Laptop</a></li>
                        <li><a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20service%20laptop">Service PC</a></li>
                        <li><a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20service%20laptop">Sparepart</a></li>
                    </ul>
                </div>
            </div>

            {{-- Payment & Shipping Section --}}
            <div class="footer-section payment-section">
                <h5 class="footer-heading">Pembayaran</h5>
                <div class="payment-logos">
                    <img src="{{ asset('images/payment/bca.png') }}" height="20" alt="BCA">
                    <img src="{{ asset('images/payment/mandiri.png') }}" height="20" alt="Mandiri">
                    <img src="{{ asset('images/payment/bri.png') }}" height="20" alt="BRI">
                    <img src="{{ asset('images/payment/bni.jpg') }}" height="20" alt="BNI">
                    <img src="{{ asset('images/payment/dana.png') }}" height="20" alt="DANA">
                    <img src="{{ asset('images/payment/ovo.png') }}" height="20" alt="OVO">
                    <img src="{{ asset('images/payment/gopay.png') }}" height="20" alt="GoPay">
                </div>

                <h5 class="footer-heading mt-4">Pengiriman</h5>
                <div class="shipping-logos">
                    <img src="{{ asset('images/tiki.png') }}" height="20" alt="TIKI">
                    <img src="{{ asset('images/jne.png') }}" height="20" alt="JNE">
                    <img src="{{ asset('images/j&t.png') }}" height="20" alt="J&T">
                    <img src="{{ asset('images/sicepat.png') }}" height="20" alt="SiCepat">
                </div>
            </div>

        </div>

        <hr class="footer-divider">

        <div class="footer-copyright">
            © 2026 - Profile Azzahra Computer | All rights reserved
        </div>
    </div>
</footer>

<style>
/* Desktop Footer Styles */
.footer-mobile {

    border-top: 1px solid #dee2e6;
}

.footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 2rem 1.5rem;
}

.footer-grid {
    display: grid;
    grid-template-columns: 2fr 1fr 1fr;
    gap: 2rem;
    align-items: start;
}

.footer-section {
    padding: 0;
}

/* Location Section */
.location-tabs-wrapper {
    background: white;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
}

.location-tabs {
    display: flex;
    background: #f8f9fa;
    border-bottom: 2px solid #e9ecef;
}

.location-tab {
    flex: 1;
    padding: 1rem;
    text-align: center;
    cursor: pointer;
    font-weight: 600;
    color: #666;
    background: transparent;
    border-bottom: 3px solid transparent;
    transition: all 0.3s;
}

.location-tab:hover {
    background: #fff;
    color: #3D8FEF;
}

.location-tab.active {
    background: white;
    color: #3D8FEF;
    border-bottom-color: #3D8FEF;
}

.location-content {
    padding: 1.5rem;
}

.location-title {
    font-size: 1.25rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: #333;
}

.location-address {
    color: #666;
    line-height: 1.6;
    margin-bottom: 1rem;
}

.btn-maps {
    display: inline-block;
    margin-bottom: 1.5rem;
}

.contact-title {
    font-size: 1rem;
    font-weight: 600;
    margin-top: 1rem;
    margin-bottom: 0.5rem;
    color: #333;
}

.contact-item {
    color: #666;
    margin-bottom: 0.5rem;
}

/* Links Section */
    .links-section {
        display: flex;
        flex-direction: column; /* Default: vertikal untuk desktop */
        gap: 20px;
    }

    .footer-column {
        width: 100%;
    }

    .footer-heading {
        margin-bottom: 15px;
        font-weight: 600;
    }

    .footer-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-list li {
        margin-bottom: 10px;
    }

    .footer-list a {
        text-decoration: none;
        color: inherit;
        transition: color 0.3s;
    }

    .footer-list a:hover {
        color: #007bff;
    }

/* Payment Section */
.payment-logos,
.shipping-logos {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    align-items: center;
}

.payment-logos img,
.shipping-logos img {
    height: 20px;
    width: auto;
    object-fit: contain;
}

.footer-divider {
    margin: 2rem 0 1rem;
    border-color: #dee2e6;
}

.footer-copyright {
    text-align: center;
    font-size: 0.875rem;
    color: #6c757d;
    padding-bottom: 1rem;
}

/* ======================================
   MOBILE STYLES - 768px and below
   ====================================== */
@media (max-width: 768px) {
    .footer-container {
        padding: 1.5rem 1rem;
    }

    .footer-grid {
        grid-template-columns: 1fr !important;
        gap: 2rem !important;
    }

    .location-tabs-wrapper {
        margin-bottom: 0;
    }

    .location-tabs {
        display: flex;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        scrollbar-width: none;
    }

    .location-tabs::-webkit-scrollbar {
        display: none;
    }

    .location-tab {
        flex-shrink: 0;
        padding: 0.875rem 1.5rem;
        font-size: 0.95rem;
    }

    .location-content {
        padding: 1.25rem;
    }

    .location-title {
        font-size: 1.1rem;
    }

    .location-address {
        font-size: 0.9rem;
    }

    .btn-maps {
        width: 100%;
        text-align: center;
        font-size: 0.95rem;
        padding: 0.75rem;
    }

    .contact-title {
        font-size: 0.95rem;
        margin-top: 1.25rem;
    }

    .contact-item {
        font-size: 0.9rem;
    }

    /* Links Section Mobile */
    .links-section {
        flex-direction: row; /* Horizontal di mobile */
        gap: 20px;
    }

    .footer-column {
        flex: 1;
    }

    .footer-heading {
        font-size: 0.95rem;
        margin-bottom: 0.875rem;
    }

    .footer-list li {
        margin-bottom: 0.6rem;
    }

    .footer-list a {
        font-size: 0.9rem;
    }

    /* Payment Section Mobile */
    .payment-section {
        text-align: center;
    }

    .payment-logos,
    .shipping-logos {
        justify-content: center;
        gap: 0.5rem;
    }

    .payment-logos img,
    .shipping-logos img {
        height: 18px;
    }

    .footer-divider {
        margin: 1.5rem 0 1rem;
    }

    .footer-copyright {
        font-size: 0.8rem;
        padding: 0 0.5rem 0.5rem;
    }
}

/* Small Mobile - 480px and below */
@media (max-width: 480px) {
    .footer-container {
        padding: 1.25rem 0.875rem;
    }

    .footer-grid {
        gap: 1.5rem !important;
    }

    .location-tab {
        padding: 0.75rem 1.25rem;
        font-size: 0.9rem;
    }

    .location-content {
        padding: 1rem;
    }

    .location-title {
        font-size: 1rem;
    }

    .location-address,
    .contact-item {
        font-size: 0.85rem;
    }

    .contact-title {
        font-size: 0.9rem;
    }

    .payment-logos,
    .shipping-logos {
        gap: 0.4rem;
    }

    .payment-logos img,
    .shipping-logos img {
        height: 16px;
    }
}
</style>

<script>
const tabs = document.querySelectorAll('.location-tab');

function setActive(index) {
    tabs.forEach(tab => tab.classList.remove('active'));
    tabs[index].classList.add('active');
}

function showTegal() {
    setActive(0);
    document.getElementById('title').innerText = 'Toko Reparasi Komputer Tegal';
    document.getElementById('address').innerHTML = `
        Ruko Citraland Tegal, Blk. B No.11, Kraton, Kec. <br>
        Tegal Bar., Kota Tegal, Jawa Tengah 52112
    `;
    document.getElementById('maps').href = 'https://maps.app.goo.gl/CeYe9bGF1zyYp6ZX7';
}

function showCibubur() {
    setActive(1);
    document.getElementById('title').innerText = 'Toko Reparasi Komputer Cibubur';
    document.getElementById('address').innerHTML = `
        Blok AS36, RT.003/RW.014, Jatisampurna, <br>
        Kec. Jatisampurna, Kota Bks, Jawa Barat 17433
    `;
    document.getElementById('maps').href = 'https://maps.app.goo.gl/gNrtrGizxMmiqGzx8';
}
</script>