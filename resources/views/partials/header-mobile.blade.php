<!-- MOBILE RESPONSIVE HEADER -->
<div class="nav-bar navigasi">
    <div class="nav-inner-mobile">
        
        <!-- Logo Section -->
        <div class="mobile-header-top">
            <a href="/"><img src="{{ asset('images/logo.jpg') }}" alt="Azzahra Computer Logo" class="logo-mobile"/></a>
            
            <div class="mobile-header-actions">
                <!-- Search Icon Button -->
                <button class="mobile-search-toggle" id="mobileSearchToggle">
                    <i class="bi bi-search"></i>
                </button>
                
                <!-- Mobile Menu Toggle Button -->
                <button class="mobile-menu-toggle" id="mobileMenuToggle">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>

        <!-- Mobile Search Bar (Hidden by default) -->
        <div class="mobile-search-bar" id="mobileSearchBar">
            <form action="/products" method="GET" class="mobile-search-form">
                <input type="text" name="search" placeholder="Search products..." value="{{ request('search', '') }}">
                <select name="category">
                    <option value="">All Categories</option>
                    @foreach($navCategories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="mobile-search-submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>

        <!-- Mobile Navigation Menu -->
        <div class="mobile-nav-menu" id="mobileNavMenu">
            <!-- Category Dropdown -->
            <div class="mobile-dropdown">
                <button class="mobile-dropdown-toggle">
                    Kategori Produk
                    <svg class="dropdown-icon-mobile" width="12" height="12" viewBox="0 0 12 12" fill="none">
                        <path d="M2 4L6 8L10 4" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </button>
                <div class="mobile-dropdown-content">
                    <a href="/products">Semua Produk</a>
                    @foreach($navCategories as $category)
                        <a href="/products?category={{ $category }}">{{ ucfirst($category) }}</a>
                    @endforeach
                </div>
            </div>

            <!-- Main Navigation Links -->
            <a href="/" class="mobile-nav-link">Home</a>
            <a href="/tentang" class="mobile-nav-link">About Us</a>
            <a href="/blog" class="mobile-nav-link">Blog</a>
            <a href="/kontak" class="mobile-nav-link">Contact</a>
            <a href="/promo" class="mobile-nav-link">Promo</a>
            <a href="/intern" class="mobile-nav-link">Internship</a>
            <a href="/login" class="mobile-nav-link">Admin</a>
        </div>
    </div>

    <!-- DESKTOP NAVIGATION -->
    <div class="nav-inner">
        <div>
            <a href="/"><img src="{{ asset('images/logo.jpg') }}" alt="Azzahra Computer Logo" class="logo-area" style="margin-left:15px; margin-right:10px;"/></a>
            <x-nav-dropdown title="Kategori Produk">
                <a href="/products">Semua Produk</a>
                @foreach($navCategories as $category)
                    <a href="/products?category={{ $category }}">
                        {{ ucfirst($category) }}
                    </a>
                @endforeach
            </x-nav-dropdown>
        </div>
        
        <!-- Menu -->
        <nav class="menu">
            <a href="/">Home</a>
            <a href="/tentang">About Us</a>
            <a href="/blog">Blog</a>
            <a href="/kontak">Contact</a>
            <a href="/promo">Promo</a>
            <a href="/intern">Intership</a>
            <a href="/login">Admin</a>
            
            <!-- Desktop Search Icon -->
            <button class="desktop-search-toggle" id="desktopSearchToggle">
                <i class="bi bi-search"></i>
            </button>
        </nav>
    </div>

    <!-- Desktop Search Bar (Dropdown) -->
    <div class="desktop-search-dropdown" id="desktopSearchDropdown">
        <div class="desktop-search-container">
            <form action="/products" method="GET" class="desktop-search-form">
                <input type="text" name="search" placeholder="Search products..." value="{{ request('search', '') }}" id="desktopSearchInput">
                <select name="category">
                    <option value="">All Categories</option>
                    @foreach($navCategories as $category)
                        <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="desktop-search-submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    /* Base Styles */
    .navigasi {
        background-color: #120263;
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    /* Desktop Navigation */
    .nav-inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
    }

    .logo-area {
        width: 9%;
        height: auto;
    }

    .menu {
        display: flex;
        gap: 20px;
        align-items: center;
    }

    .menu a {
        color: #fff;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .menu a:hover {
        text-decoration: underline;
    }

    /* Desktop Search Toggle Button */
    .desktop-search-toggle {
        background: none;
        border: none;
        color: white;
        font-size: 1.2rem;
        cursor: pointer;
        padding: 0.5rem;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .desktop-search-toggle:hover {
        color: #3D8FEF;
        transform: scale(1.1);
    }

    /* Desktop Search Dropdown */
    .desktop-search-dropdown {
        background: #0f0250;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), 
                    padding 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                    opacity 0.3s ease;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
        opacity: 0;
    }

    .desktop-search-dropdown.active {
        max-height: 100px;
        padding: 1rem 0;
        opacity: 1;
    }

    .desktop-search-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
        transform: translateY(-10px);
        transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .desktop-search-dropdown.active .desktop-search-container {
        transform: translateY(0);
    }

    .desktop-search-form {
        display: flex;
        gap: 0;
        background: white;
        border-radius: 4px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .desktop-search-form input {
        flex: 1;
        border: none;
        padding: 12px 16px;
        outline: none;
        font-size: 0.95rem;
    }

    .desktop-search-form select {
        border: none;
        border-left: 1px solid #e0e0e0;
        padding: 12px 16px;
        outline: none;
        background: #f9f9f9;
        cursor: pointer;
        min-width: 150px;
    }

    .desktop-search-submit {
        background: #2f80ed;
        border: none;
        padding: 0 20px;
        color: white;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .desktop-search-submit:hover {
        background: #1e6bd6;
    }

    .desktop-search-submit i {
        font-size: 1.1rem;
    }

    /* Mobile Navigation - Hidden by Default */
    .nav-inner-mobile {
        display: none;
    }

    /* ======================================
       MOBILE STYLES - 768px and below
       ====================================== */
    @media (max-width: 768px) {
        /* Hide desktop navigation */
        .nav-inner {
            display: none !important;
        }

        .desktop-search-dropdown {
            display: none !important;
        }

        /* Show mobile navigation */
        .nav-inner-mobile {
            display: block !important;
            width: 100%;
        }

        /* Mobile Header Top */
        .mobile-header-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 1rem;
        }

        .logo-mobile {
            height: 40px;
            width: auto;
            transition: transform 0.3s ease;
        }

        .logo-mobile:hover {
            transform: scale(1.05);
        }

        .mobile-header-actions {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        /* Mobile Search Toggle Button */
        .mobile-search-toggle {
            background: none;
            border: none;
            color: white;
            font-size: 1.3rem;
            cursor: pointer;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-search-toggle:hover {
            color: #3D8FEF;
            transform: scale(1.1);
        }

        .mobile-search-toggle.active {
            color: #3D8FEF;
            transform: rotate(90deg) scale(1.1);
        }

        /* Mobile Search Bar */
        .mobile-search-bar {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                        padding 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                        opacity 0.3s ease;
            background: #0f0250;
            opacity: 0;
        }

        .mobile-search-bar.active {
            max-height: 200px;
            padding: 0.75rem 1rem 1rem;
            opacity: 1;
        }

        .mobile-search-form {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
            transform: translateY(-10px);
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-search-bar.active .mobile-search-form {
            transform: translateY(0);
        }

        .mobile-search-form input {
            border: none;
            padding: 0.75rem;
            border-radius: 4px;
            outline: none;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .mobile-search-form input:focus {
            box-shadow: 0 0 0 2px #3D8FEF;
        }

        .mobile-search-form select {
            border: none;
            padding: 0.75rem;
            border-radius: 4px;
            outline: none;
            background: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mobile-search-form select:focus {
            box-shadow: 0 0 0 2px #3D8FEF;
        }

        .mobile-search-submit {
            background: #2f80ed;
            border: none;
            padding: 0.75rem;
            color: white;
            cursor: pointer;
            border-radius: 4px;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-search-submit:hover {
            background: #1e6bd6;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(47, 128, 237, 0.3);
        }

        .mobile-search-submit:active {
            transform: translateY(0);
        }

        .mobile-search-submit i {
            font-size: 1.1rem;
        }

        /* Mobile Menu Toggle Button */
        .mobile-menu-toggle {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            display: flex;
            flex-direction: column;
            gap: 5px;
            z-index: 1001;
        }

        .mobile-menu-toggle span {
            display: block;
            width: 25px;
            height: 3px;
            background: white;
            border-radius: 2px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-menu-toggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(7px, 7px);
        }

        .mobile-menu-toggle.active span:nth-child(2) {
            opacity: 0;
            transform: translateX(20px);
        }

        .mobile-menu-toggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -7px);
        }

        /* Mobile Navigation Menu */
        .mobile-nav-menu {
            background: #120263;
            padding: 0 1rem 0;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                        padding 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                        opacity 0.3s ease;
            opacity: 0;
        }

        .mobile-nav-menu.active {
            max-height: 600px;
            padding: 0 1rem 1rem;
            opacity: 1;
        }

        /* Mobile Navigation Links */
        .mobile-nav-link {
            display: block;
            color: white;
            text-decoration: none;
            padding: 0.875rem 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            font-weight: 500;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-10px);
            opacity: 0;
        }

        .mobile-nav-menu.active .mobile-nav-link {
            transform: translateX(0);
            opacity: 1;
        }

        /* Staggered animation for nav links */
        .mobile-nav-menu.active .mobile-nav-link:nth-child(2) { transition-delay: 0.05s; }
        .mobile-nav-menu.active .mobile-nav-link:nth-child(3) { transition-delay: 0.1s; }
        .mobile-nav-menu.active .mobile-nav-link:nth-child(4) { transition-delay: 0.15s; }
        .mobile-nav-menu.active .mobile-nav-link:nth-child(5) { transition-delay: 0.2s; }
        .mobile-nav-menu.active .mobile-nav-link:nth-child(6) { transition-delay: 0.25s; }
        .mobile-nav-menu.active .mobile-nav-link:nth-child(7) { transition-delay: 0.3s; }
        .mobile-nav-menu.active .mobile-nav-link:nth-child(8) { transition-delay: 0.35s; }

        .mobile-nav-link:hover {
            color: #3D8FEF;
            padding-left: 0.5rem;
            background: rgba(61, 143, 239, 0.1);
        }

        .mobile-nav-link:active {
            transform: scale(0.98);
        }

        /* Mobile Dropdown */
        .mobile-dropdown {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 0.5rem;
            transform: translateX(-10px);
            opacity: 0;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-nav-menu.active .mobile-dropdown {
            transform: translateX(0);
            opacity: 1;
        }

        .mobile-dropdown-toggle {
            width: 100%;
            background: none;
            border: none;
            color: white;
            text-align: left;
            padding: 0.875rem 0;
            font-weight: 500;
            font-size: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-dropdown-toggle:hover {
            color: #3D8FEF;
        }

        .dropdown-icon-mobile {
            transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .mobile-dropdown.active .dropdown-icon-mobile {
            transform: rotate(180deg);
        }

        .mobile-dropdown-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1),
                        padding 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            padding-left: 1rem;
        }

        .mobile-dropdown.active .mobile-dropdown-content {
            max-height: 400px;
            padding-bottom: 0.5rem;
        }

        .mobile-dropdown-content a {
            display: block;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            padding: 0.75rem 0;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            transform: translateX(-10px);
            opacity: 0;
        }

        .mobile-dropdown.active .mobile-dropdown-content a {
            transform: translateX(0);
            opacity: 1;
        }

        /* Staggered animation for dropdown items */
        .mobile-dropdown.active .mobile-dropdown-content a:nth-child(1) { transition-delay: 0.05s; }
        .mobile-dropdown.active .mobile-dropdown-content a:nth-child(2) { transition-delay: 0.1s; }
        .mobile-dropdown.active .mobile-dropdown-content a:nth-child(3) { transition-delay: 0.15s; }
        .mobile-dropdown.active .mobile-dropdown-content a:nth-child(4) { transition-delay: 0.2s; }
        .mobile-dropdown.active .mobile-dropdown-content a:nth-child(5) { transition-delay: 0.25s; }
        .mobile-dropdown.active .mobile-dropdown-content a:nth-child(6) { transition-delay: 0.3s; }

        .mobile-dropdown-content a:hover {
            color: #3D8FEF;
            padding-left: 0.5rem;
            background: rgba(61, 143, 239, 0.1);
        }

        .mobile-dropdown-content a:active {
            transform: scale(0.98);
        }
    }

    /* Small Mobile - 480px and below */
    @media (max-width: 480px) {
        .logo-mobile {
            height: 35px;
        }

        .mobile-header-top {
            padding: 0.6rem 0.875rem;
        }

        .mobile-nav-link,
        .mobile-dropdown-toggle {
            font-size: 0.95rem;
            padding: 0.75rem 0;
        }

        .mobile-search-form input,
        .mobile-search-form select,
        .mobile-search-submit {
            font-size: 0.9rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mobile Elements
        const mobileMenuToggle = document.getElementById('mobileMenuToggle');
        const mobileNavMenu = document.getElementById('mobileNavMenu');
        const mobileSearchToggle = document.getElementById('mobileSearchToggle');
        const mobileSearchBar = document.getElementById('mobileSearchBar');
        
        // Desktop Elements
        const desktopSearchToggle = document.getElementById('desktopSearchToggle');
        const desktopSearchDropdown = document.getElementById('desktopSearchDropdown');
        const desktopSearchInput = document.getElementById('desktopSearchInput');
        
        const dropdownToggles = document.querySelectorAll('.mobile-dropdown-toggle');

        // Toggle mobile menu
        if (mobileMenuToggle) {
            mobileMenuToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                this.classList.toggle('active');
                mobileNavMenu.classList.toggle('active');
                
                // Close search if open
                if (mobileSearchBar.classList.contains('active')) {
                    mobileSearchBar.classList.remove('active');
                    mobileSearchToggle.classList.remove('active');
                }
            });
        }

        // Toggle mobile search
        if (mobileSearchToggle) {
            mobileSearchToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                this.classList.toggle('active');
                mobileSearchBar.classList.toggle('active');
                
                // Close menu if open
                if (mobileNavMenu.classList.contains('active')) {
                    mobileNavMenu.classList.remove('active');
                    mobileMenuToggle.classList.remove('active');
                }
                
                // Focus input when opened
                if (mobileSearchBar.classList.contains('active')) {
                    setTimeout(() => {
                        mobileSearchBar.querySelector('input').focus();
                    }, 400);
                }
            });
        }

        // Toggle desktop search
        if (desktopSearchToggle) {
            desktopSearchToggle.addEventListener('click', function(e) {
                e.stopPropagation();
                desktopSearchDropdown.classList.toggle('active');
                
                // Focus input when opened
                if (desktopSearchDropdown.classList.contains('active')) {
                    setTimeout(() => {
                        desktopSearchInput.focus();
                    }, 400);
                }
            });
        }

        // Toggle dropdown menus
        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                const dropdown = this.parentElement;
                dropdown.classList.toggle('active');
            });
        });

        // Close menus when clicking outside
        document.addEventListener('click', function(event) {
            // Close mobile menu and search
            if (!event.target.closest('.nav-inner-mobile')) {
                if (mobileMenuToggle && mobileMenuToggle.classList.contains('active')) {
                    mobileMenuToggle.classList.remove('active');
                    mobileNavMenu.classList.remove('active');
                }
                if (mobileSearchToggle && mobileSearchToggle.classList.contains('active')) {
                    mobileSearchToggle.classList.remove('active');
                    mobileSearchBar.classList.remove('active');
                }
            }
            
            // Close desktop search
            if (!event.target.closest('.desktop-search-toggle') && 
                !event.target.closest('.desktop-search-dropdown')) {
                desktopSearchDropdown?.classList.remove('active');
            }
        });

        // Close mobile menu when clicking on a link
        const navLinks = document.querySelectorAll('.mobile-nav-link, .mobile-dropdown-content a');
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenuToggle?.classList.remove('active');
                mobileNavMenu?.classList.remove('active');
            });
        });

        // Close search bars on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                mobileSearchBar?.classList.remove('active');
                mobileSearchToggle?.classList.remove('active');
                desktopSearchDropdown?.classList.remove('active');
                
                // Reset menu toggle if needed
                if (mobileNavMenu?.classList.contains('active')) {
                    mobileMenuToggle?.classList.remove('active');
                    mobileNavMenu?.classList.remove('active');
                }
            }
        });
    });
</script>