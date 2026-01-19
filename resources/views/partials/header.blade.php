<header class="border-bottom shadow-md">

  <!-- Top header (row 1) -->
  <div class="container py-3">
    <div class="d-flex align-items-center gap-3">

      <div class="logo">
        <a href="{{ route('home') }}">
          <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40">
        </a>
      </div>

      <div class="flex-grow-1 d-flex">
        <input class="form-control rounded-0 rounded-start" placeholder="Search">
        <select class="form-select rounded-0 w-auto">
          <option>All Categories</option>
        </select>
        <button class="btn btn-primary rounded-0 rounded-end">Search</button>
      </div>

      <div class="d-flex gap-3">
        <span>Account</span>
        <span>Cart</span>
      </div>

    </div>
  </div>

  <!-- Navigation (row 2) -->
  <nav class="bg-primary">
  <div class="container py-2">
    <div class="d-flex align-items-center justify-content-between text-white">

      <!-- Kiri -->
      <strong>Kategori Produk</strong>

      <!-- Kanan -->
      <div class="d-flex gap-4">
        <a class="text-white text-decoration-none" href="/">Home</a>
        <a class="text-white text-decoration-none" href="/tentang">About Us</a>
        <a class="text-white text-decoration-none" href="#">Blog</a>
        <a class="text-white text-decoration-none" href="/kontak">Contact</a>
        <a class="text-white text-decoration-none" href="/promo">Promo</a>
        <a class="text-white text-decoration-none" href="/intern">Internship/Magang</a>
      </div>

    </div>
  </div>
</nav>

</header>
