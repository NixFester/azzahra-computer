

<!-- NAVBAR -->
<div class="nav-bar navigasi">
  <div class="nav-inner ">

    <div>
        <img src="{{ asset('images/logo.png') }}" alt="Azzahra Computer Logo" class="logo-area" style="margin-left:15px; margin-right:10px;"/>
        <x-nav-dropdown title="Kategori Produk">
            <a href="/products">Semua Produk</a>
            @foreach($navCategories as $category)
                <a href="/products?category={{ $category }}">
                    {{ $category }}
                </a>
            @endforeach
        </x-nav-dropdown>
    </div>

    <!-- Kategori -->
    
        

    <!-- Menu -->
    <nav class="menu">
      <a href="/">Home</a>
      <a href="/tentang">About Us</a>
      <a href="/blog">Blog</a>
      <a href="/kontak">Contact</a>
      <a href="/promo">Promo</a>
      <a href="/intern">Intership</a>
      <a href="/login">Admin</a>
    </nav>

  </div>
</div>

<style>
    .navigasi {
        background-color: #120263;
    }

.user-area {
    display: flex;
    align-items: center;

}

.user-circle-btn {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, #3D8FEF 0%, #2563eb 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(61, 143, 239, 0.2);
}

.user-circle-btn:hover {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(61, 143, 239, 0.3);
    color: white;
}

.user-circle-btn:active {
    transform: translateY(0);
}

.user-circle-btn i {
    font-size: 1.2rem;
}

.user-area small {
    color: #333;
    font-weight: 500;
}

/* Container */
.container {
    max-width: 1200px;
    margin: auto;
}

/* TOP HEADER */
.top-header {
    background: #fff;
    border-bottom: 1px solid #ddd;
}

.header-top-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 0;
}

/* Logo */
.logo-area {
  width: 9%;

}

.logo-area img {
    height: 42px;
}

/* Search */
.search-area {
    display: flex;
    width: 45%;
    border: 1px solid #ccc;
    border-radius: 4px;
    overflow: hidden;
}

.search-area input {
    flex: 1;
    border: none;
    padding: 10px;
    outline: none;
}

.search-area select {
    border: none;
    border-left: 1px solid #ccc;
    padding: 10px;
    outline: none;
    background: #f9f9f9;
}

.search-btn {
    background: #2f80ed;
    border: none;
    padding: 0 16px;
    color: #fff;
    cursor: pointer;
}

.search-btn i {
    font-size: 18px;
}

/* Account & Cart */
.user-area {
    display: flex;
    gap: 8px;
}

.user-item {
    text-align: center;
    font-size: 12px;
    cursor: pointer;
    color: #333;
}

.user-item i {
    font-size: 22px;
    display: block;
}

/* NAVBAR */
.nav-bar {
    position: sticky !important;
    top: 0 !important;
    z-index: 1000 !important;
}

.nav-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-right: 20px;
}

/* Category */
.category-btn {
    background: #3b7ddd;
    color: #ffffff;
    padding: 14px 20px;
    font-weight: 600;
    display: flex;
    align-items: center;
}

.category-btn i {
    font-size: 20px;
}

/* Menu */
.menu {
    display: flex;
    gap: 30px;
}

.menu a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
}

.menu a:hover {
    text-decoration: underline;
}

</style>