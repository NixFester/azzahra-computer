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
