<aside class="sidebar" id="sidebar">
    <div class="sidebar-header d-lg-none">
        <div class="logo">
            <a href="/" class="d-inline-block">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" height="40">
            </a>
        </div>
        <button class="sidebar-close" id="sidebarClose" type="button">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="sidebar-top">
        <div class="logo d-none d-lg-block">
            <a href="/" class="d-inline-block">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" height="40">
            </a>
        </div>

        <nav>
            <ul class="menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                        class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="bi bi-speedometer2"></i>
                        <span>Overview</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.produk.index') }}"
                        class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                        <i class="bi bi-box-seam"></i>
                        <span>Produk</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.iklan.index') }}"
                        class="{{ request()->routeIs('admin.iklan.*') ? 'active' : '' }}">
                        <i class="bi bi-megaphone"></i>
                        <span>Iklan</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.blog.index') }}"
                        class="{{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                        <i class="bi bi-file-text"></i>
                        <span>Blog</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.social.index') }}"
                        class="{{ request()->routeIs('admin.social.*') ? 'active' : '' }}">
                        <i class="bi bi-share"></i>
                        <span>Social</span>
                    </a>
                </li>
                <li>
                    <a href="/" class="">
                        <i class="bi bi-house-door"></i>
                        <span>Beranda</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="sidebar-bottom">
        <div class="profile">
            <div class="avatar">
                {{ strtoupper(substr(Session::get('username', 'Admin'), 0, 1)) }}
            </div>
            <div class="profile-info">
                <span>{{ Session::get('username', 'Admin') }}</span>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="logout-link" title="Logout">
                    <i class="bi bi-box-arrow-right"></i>
                </button>
            </form>
        </div>
    </div>
</aside>
