<footer class="border-top mt-5 pt-4 bg-white">
    <div class="px-10">
        <div class="row align-items-start justify-content-center pb-4">

            {{-- LEFT: Original Location Widget --}}
            <div class="col-md-6">
                <div class="containertempat p-0" style="width: 710px;">
                    <div class="sidebar tabs gap-10">
                        <div class="tab active" onclick="showTegal()">Tegal</div>
                        <div class="tab" onclick="showCibubur()">Cibubur</div>
                    </div>

                    <div class="content">
                        <h2 id="title">Toko Reparasi Komputer Tegal</h2>

                        <p class="address" id="address">
                            Ruko Citraland Tegal, Blk. B No.11, Kraton, Kec. <br>
                            Tegal Bar., Kota Tegal, Jawa Tengah 52112
                        </p>

                        <a href="https://maps.app.goo.gl/CeYe9bGF1zyYp6ZX7" id="maps" class="btn btn-primary mb-3">
                            Lihat di Google Maps
                        </a>

                        <h3>Kontak</h3>
                        <p>📱 0859 4200 1720</p>
                        <p>☎️ 0283 3409 09</p>

                        <h3>Buka :</h3>
                        <p>Senin – Sabtu : 08:30 – 17:00</p>
                    </div>
                </div>
            </div>

            {{-- MIDDLE: Links --}}
            <div class="col-md-1 pt-5">
                <div class="col">

                    <div class="">
                        <h5>Informasi</h5>
                        <ul class="list-unstyled">
                            <li><a href="/tentang">Tentang Kami</a></li>
                            <li><a href="/kontak">Kontak</a></li>
                            <li><a href="https://maps.app.goo.gl/gNrtrGizxMmiqGzx8">Lokasi</a></li>
                        </ul>
                    </div>

                    <div class="">
                        <h5>Our Service</h5>
                        <ul class="list-unstyled">
                            <li><a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20service%20laptop">Service Laptop</a></li>
                            <li><a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20service%20laptop">Service PC</a></li>
                            <li><a href="https://wa.me/{{ $storeInfo?->whatsapp }}?text=Halo%2C%20saya%20ingin%20bertanya%20tentang%20service%20laptop">Sparepart</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            {{-- RIGHT: Payment & Shipping --}}
           <div class="col-md-3 pt-5">
                <h5>Pembayaran</h5>
                <div class="d-flex flex-wrap gap-2">
                    <img src="{{ asset('images/payment/bca.jpg') }}" height="20">
                    <img src="{{ asset('images/payment/mandiri.jpg') }}" height="20">
                    <img src="{{ asset('images/payment/bri.jpg') }}" height="20">
                    <img src="{{ asset('images/payment/bni.jpg') }}" height="20">
                    <img src="{{ asset('images/payment/dana.jpg') }}" height="20">
                    <img src="{{ asset('images/payment/ovo.jpg') }}" height="20">
                    <img src="{{ asset('images/payment/gopay.jpg') }}" height="20">
                </div>

                <h5 class="mt-4">Pengiriman</h5>
                <div class="d-flex align-items-center gap-2">
                    <img src="{{ asset('images/tiki.jpg') }}" height="20">
                    <img src="{{ asset('images/jne.jpg') }}" height="20">
                    <img src="{{ asset('images/j&t.jpg') }}" height="20">
                    <img src="{{ asset('images/sicepat.jpg') }}" height="20">
                </div>
            </div>

        </div>

        <hr>

        <div class="text-center small text-muted pb-3">
            © 2026 - Profile Azzahra Computer | All rights reserved
        </div>
    </div>
</footer>


{{-- Original JS preserved --}}
<script>
const tabs = document.querySelectorAll('.tab');

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
    document.getElementById('maps').href = '#';
}

function showCibubur() {
    setActive(1);
    document.getElementById('title').innerText = 'Toko Reparasi Komputer Cibubur';
    document.getElementById('address').innerHTML = `
        Blok AS36, RT.003/RW.014, Jatisampurna, <br>
        Kec. Jatisampurna, Kota Bks, Jawa Barat 17433
    `;
    document.getElementById('maps').href =
        'https://maps.app.goo.gl/gNrtrGizxMmiqGzx8';
}
</script>

