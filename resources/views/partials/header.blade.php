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
      <div class="search-area">
        <input type="text" placeholder="Search">
        <select>
          <option>All Categories</option>
          <option>Laptop</option>
          <option>Printer</option>
        </select>
        <button class="search-btn">
          <i class="bi bi-search"></i>
        </button>
      </div>

      <!-- Account & Cart -->
      <div class="user-area">

        <div class="user-item">
          <i class="bi bi-person"></i>
          <small>My Account</small>
        </div>

        <div class="user-item">
          <i class="bi bi-cart"></i>
          <small>Cart</small>
        </div>

      </div>

    </div>
  </div>

  <!-- NAVBAR -->
  <div class="nav-bar">
    <div class="container nav-inner">

      <!-- Kategori -->
      <div class="category-btn">
        <span>Kategori Produk</span>
        <i class="bi bi-list"></i>
      </div>

      <!-- Menu -->
      <nav class="menu">
        <a href="#">Home</a>
        <a href="#">About Us</a>
        <a href="#">Blog</a>
        <a href="#">Contact</a>
        <a href="#">Promo</a>
        <a href="#">Intership/Magang</a>
      </nav>

    </div>
  </div>

</header>

<style>
/* Reset */
body {
    margin: 0;
    font-family: 'Segoe UI', sans-serif;
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
    gap: 28px;
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
    color: #fff;
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