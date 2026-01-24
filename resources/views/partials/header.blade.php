<header class="header">

  <!-- TOP HEADER -->
  <div class="top-header">
    <div class="container header-top-inner">

      <!-- Logo -->
      <div class="logo-area">
        <img src="images/logo.png" alt="Azzahra Computer">
        <span>Azzahra Computer</span>
      </div>

      <!-- Search -->
      <form action="/products" method="GET" class="search-area">
        <input type="text" name="search" placeholder="Search" value="{{ request('search', '') }}">
        <select name="category">
          <option value="">All Categories</option>
          @foreach($searchCategories as $cat)
            <option value="{{ $cat }}" @if(request('category') == $cat) selected @endif>
              {{ ucfirst($cat) }}
            </option>
          @endforeach
        </select>
        <button type="submit" class="search-btn">
          <i class="bi bi-search"></i>
        </button>
      </form>

      <!-- Account & Cart -->
        <a href="/login " class="user-area" style="text-decoration: none;">
            <div href="/login" class="user-circle-btn" title="Admin">
                <i class="bi bi-person"></i>
            </div>
            <small >Admin</small>
        </a>
            

    </div>
  </div>

  <!-- NAVBAR -->
  <div class="nav-bar">
    <div class="container nav-inner">

      <!-- Kategori -->
      <x-nav-dropdown title="Categories">
                <a href="/products">All Products</a>
                @foreach($navCategories as $category)
                    <a href="/products?category={{ $category }}">
                        {{ $category }}
                    </a>
                @endforeach
            </x-nav-dropdown>
          

      <!-- Menu -->
      <nav class="menu">
        <a href="/">Home</a>
        <a href="/tentang">About Us</a>
        <a href="/blog">Blog</a>
        <a href="/kontak">Contact</a>
        <a href="/promo">Promo</a>
        <a href="/intern">Intership/Magang</a>
      </nav>

    </div>
  </div>

</header>

<style>

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
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 20px;
    font-weight: 700;
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
    background: #4a90e2;
}

.nav-inner {
    display: flex;
    align-items: center;
    justify-content: space-between;
}

/* Category */
.category-btn {
    background: #3b7ddd;
    color: #ffffff;
    padding: 14px 20px;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 12px;
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