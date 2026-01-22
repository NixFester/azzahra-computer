<aside class="sidebar">
    <div class="sidebar-top">
        <div class="logo">
            {{-- Jika ada logo gambar, uncomment baris dibawah --}}
            {{-- <img src="{{ asset('images/logo.png') }}" alt="Logo"> --}}
            <h2><a href="/" style="text-decoration: none; color: blue   "><img src="{{ asset('images/logo.png') }}" alt="Logo" height="40"></a></h2>
        </div>

        <ul class="menu">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Overview
                </a>
            </li>
            <li>
                <a href="{{ route('admin.produk.index') }}" class="{{ request()->routeIs('admin.produk.*') ? 'active' : '' }}">
                    Produk
                </a>
            </li>
            <li>
                <a href="{{ route('admin.iklan.index') }}" class="{{ request()->routeIs('admin.iklan.*') ? 'active' : '' }}">
                    Iklan
                </a>
            </li>
            <li>
                <a href="{{ route('admin.blog.index') }}" class="{{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">
                    Blog
                </a>
            </li>
            <li>
                <a href="{{ route('admin.social.index') }}" class="{{ request()->routeIs('admin.social.*') ? 'active' : '' }}">
                    Social
                </a>
            </li>
            <li>
                <a href="/" class="">
                    beranda
                </a>
            </li>
        </ul>
    </div>

    <div class="sidebar-bottom">
        <div class="profile">
            <div class="avatar">A</div>
            <span>{{ Session::get('username', 'Admin') }}</span>
            <form method="POST" action="{{ route('logout') }}" style="margin-left: auto;">
                @csrf
                <button type="submit" class="logout-link">Logout</button>
            </form>
        </div>
    </div>
</aside>