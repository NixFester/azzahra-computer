<footer class="border-top mt-5 pt-4 bg-light">
    <div class="px-10">
        <div class="row align-items-start justify-content-center pb-4">

            {{-- LEFT: Original Location Widget --}}
            <div class="col-md-6">
                <div class="containertempat ml-10 p-0">
                    <div class="sidebar">
                        <div class="tab active" onclick="showTegal()">Tegal</div>
                        <div class="tab" onclick="showCibubur()">Cibubur</div>
                    </div>

                    <div class="content">
                        <h2 id="title">Toko Reparasi Komputer Tegal</h2>

                        <p class="address" id="address">
                            Ruko Citraland Tegal, Blk. B No.11, Kraton, Kec. <br>
                            Tegal Bar., Kota Tegal, Jawa Tengah 52112
                        </p>

                        <a id="maps" class="maps" href="#" target="_blank">
                            📌 Open di Google Maps
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
                            <li><a href="#">Tentang Kami</a></li>
                            <li><a href="#">Kontak</a></li>
                            <li><a href="#">Lokasi</a></li>
                        </ul>
                    </div>

                    <div class="">
                        <h5>Our Service</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Service Laptop</a></li>
                            <li><a href="#">Service PC</a></li>
                            <li><a href="#">Sparepart</a></li>
                        </ul>
                    </div>

                    <div class="">
                        <h5>My Account</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Login</a></li>
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Order Saya</a></li>
                        </ul>
                    </div>

                </div>
            </div>

            {{-- RIGHT: Payment & Shipping --}}
            <div class="col-md-3 pt-5">
                <h5>Pembayaran</h5>
                <div class="d-flex flex-wrap gap-2 mb-3">
                    <span>BCA</span>
                    <span>Mandiri</span>
                    <span>BRI</span>
                    <span>BNI</span>
                    <span>DANA</span>
                    <span>OVO</span>
                    <span>Gopay</span>
                </div>

                <h5>Pengiriman</h5>
                <div class="d-flex flex-wrap gap-2">
                    <span>JNE</span>
                    <span>J&T</span>
                    <span>SiCepat</span>
                    <span>AnterAja</span>
                    <span>Pos Indonesia</span>
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
    document.getElementById('title').innerText = 'Toko Pusat Tegal';
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
        'https://maps.app.goo.gl/H6K6RkaLKGMXGvDi8';
}
</script>

