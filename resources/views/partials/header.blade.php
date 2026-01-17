<header class="border-bottom">
  <div class="container py-3 d-flex align-items-center gap-3">
    <div class="logo">
      <a href="{{ route('home') }}">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40">
      </a>

    <div class="grow d-flex">
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

  <!-- Navigation -->
  <nav class="bg-primary">
    <div class="container d-flex flex-wrap gap-4 py-2 text-white">
      <strong>Kategori Produk</strong>
      <a class="text-white text-decoration-none" href="#">Home</a>
      <a class="text-white text-decoration-none" href="#">About Us</a>
      <a class="text-white text-decoration-none" href="#">Blog</a>
      <a class="text-white text-decoration-none" href="#">Contact</a>
      <a class="text-white text-decoration-none" href="#">Promo</a>
      <a class="text-white text-decoration-none" href="#">Internship/Magang</a>
    </div>
  </nav>
</header>