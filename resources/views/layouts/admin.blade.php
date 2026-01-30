<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider@15.7.1/dist/nouislider.min.css">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <style>
        :root {
            --primary-color: #3D8FEF;
            --primary-hover: #2563eb;
            --sidebar-width: 260px;
            --topbar-height: 70px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f4f6fa;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: #ffffff;
            border-right: 1px solid #e8e9ed;
            z-index: 1030;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease-in-out;
            overflow-y: auto;
            transform: translateX(0);
            /* Visible on desktop */
        }

        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 1rem 1.25rem;
            border-bottom: 1px solid #e8e9ed;
        }

        .sidebar-close {
            background: none;
            border: none;
            font-size: 1.25rem;
            color: #555;
            cursor: pointer;
            padding: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            transition: all 0.2s;
            width: 36px;
            height: 36px;
        }

        .sidebar-close:hover {
            background: #f0f0f0;
            color: #333;
        }

        .sidebar.show {
            transform: translateX(0);
        }

        .sidebar-top {
            flex: 1;
            padding: 1.5rem 1.25rem;
        }

        .sidebar-bottom {
            padding: 1.25rem;
            border-top: 1px solid #e8e9ed;
        }

        .logo {
            text-align: center;
        }

        .logo img {
            max-width: 160px;
            height: auto;
            object-fit: contain;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .menu li {
            margin-bottom: 0.5rem;
        }

        .menu li a {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            border-radius: 10px;
            color: #555;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu li a i {
            font-size: 1.25rem;
            width: 24px;
            text-align: center;
            flex-shrink: 0;
        }

        .menu li a span {
            flex: 1;
        }

        .menu li a:hover {
            background: #eef4ff;
            color: var(--primary-color);
        }

        .menu li a.active {
            background: #eef4ff;
            color: var(--primary-color);
            font-weight: 600;
        }

        .profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .avatar {
            width: 40px;
            height: 40px;
            background: var(--primary-color);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 0.875rem;
            flex-shrink: 0;
        }

        .profile-info {
            flex: 1;
            min-width: 0;
        }

        .profile-info span {
            display: block;
            font-size: 0.875rem;
            font-weight: 600;
            color: #333;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .logout-link {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            padding: 0.375rem 0.5rem;
            border-radius: 6px;
            transition: all 0.2s;
            font-size: 0.875rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .logout-link:hover {
            background: #fff5f5;
        }

        .logout-link i {
            font-size: 1.125rem;
        }

        /* Main Content */
        .main-wrapper {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left 0.3s ease-in-out;
        }

        .topbar {
            background: #ffffff;
            padding: 1.25rem 1.875rem;
            border-bottom: 1px solid #e8e9ed;
            position: sticky;
            top: 0;
            z-index: 1020;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 1rem;
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.5rem;
            color: #555;
            cursor: pointer;
            padding: 0.5rem;
            line-height: 1;
            width: 44px;
            height: 44px;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .mobile-toggle:hover {
            background: #f0f0f0;
            color: var(--primary-color);
        }

        .mobile-toggle:active {
            background: #e0e0e0;
        }

        .breadcrumb-wrapper {
            flex: 1;
        }

        .breadcrumb {
            margin: 0;
            background: transparent;
            padding: 0;
            font-size: 0.875rem;
        }

        .breadcrumb-item {
            color: #777;
        }

        .breadcrumb-item.active {
            color: #333;
            font-weight: 600;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: "/";
            color: #ccc;
        }

        .content-wrapper {
            padding: 1.875rem;
        }

        .content {
            background: #fff;
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.04);
        }

        /* Overlay for mobile */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1025;
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            pointer-events: none;
        }

        .sidebar-overlay.show {
            opacity: 1;
            pointer-events: auto;
        }

        /* Alerts */
        .alert {
            border: none;
            border-radius: 10px;
            padding: 1rem 1.25rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert i {
            font-size: 1.25rem;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
        }

        /* Buttons */
        .btn {
            padding: 0.625rem 1.25rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .btn i {
            font-size: 1rem;
        }

        /* Tables */
        .table {
            margin-top: 1.25rem;
        }

        .table thead th {
            background: #f8f9fa;
            font-weight: 600;
            color: #333;
            border-bottom: 2px solid #e8e9ed;
            padding: 0.875rem;
            font-size: 0.875rem;
        }

        .table tbody td {
            padding: 0.875rem;
            vertical-align: middle;
            border-bottom: 1px solid #f0f0f0;
            font-size: 0.875rem;
        }

        /* Form */
        .form-label {
            font-weight: 500;
            color: #555;
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #ddd;
            padding: 0.625rem 0.875rem;
            font-size: 0.875rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(61, 143, 239, 0.15);
        }

        /* Responsive Styles */
        @media (max-width: 991.98px) {
            .sidebar {
                transform: translateX(-100%);
                /* Hidden by default on mobile */
                width: 100vw;
                max-width: 100vw;
            }

            .sidebar-top {
                padding: 1rem;
                width: 100%;
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay {
                display: block;
            }

            .main-wrapper {
                margin-left: 0;
            }

            .mobile-toggle {
                display: flex;
                align-items: center;
                justify-content: center;
            }

            .topbar {
                padding: 1rem 1.25rem;
            }

            .content-wrapper {
                padding: 1.25rem;
            }

            .content {
                padding: 1.25rem;
            }

            /* Mobile menu styling - vertical list */
            .menu {
                padding: 0;
                width: 100%;
                display: block;
                /* Force block display */
            }

            .menu li {
                margin-bottom: 0;
                border-bottom: 1px solid #f0f0f0;
                width: 100%;
                /* Full width */
                display: block;
                /* Force block display */
            }

            .menu li a {
                width: 100%;
                display: flex;
                /* Keep flex for icon alignment */
                padding: 1.25rem 1.5rem;
                font-size: 1.6rem;
                border-radius: 0;
                background: transparent;
                border-left: 4px solid transparent;
            }
        }

        @media (max-width: 575.98px) {
            .topbar {
                padding: 0.875rem 1rem;
            }

            .breadcrumb {
                font-size: 0.8125rem;
            }

            .content-wrapper {
                padding: 1rem;
            }

            .content {
                padding: 1rem;
                border-radius: 12px;
            }

            .table {
                font-size: 0.8125rem;
            }

            .btn {
                padding: 0.5rem 1rem;
                font-size: 0.8125rem;
            }

            /* Larger touch targets for mobile */
            .menu li a {
                padding: 1.125rem 1.25rem;
            }

            .sidebar-header {
                padding: 1.25rem;
            }
        }

        /* Scrollbar Styles */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #999;
        }

        @media (min-width: 992px) {
            .logo {
                margin-bottom: 2rem;
            }
        }
    </style>
    @stack('styles')
</head>

<body>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Topbar -->
        @include('admin.partials.breadcrumb')

        <!-- Content -->
        <div class="content-wrapper">
            @if (session('success'))
                <div class="alert alert-success">
                    <i class="bi bi-check-circle-fill"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle-fill"></i>
                    <span>{{ session('error') }}</span>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script>
        // Wait for DOM to be fully loaded
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Sidebar Toggle
            const mobileToggle = document.getElementById('mobileToggle');
            const sidebarClose = document.getElementById('sidebarClose');
            const sidebar = document.getElementById('sidebar');
            const sidebarOverlay = document.getElementById('sidebarOverlay');

            console.log('Mobile Toggle:', mobileToggle); // Debug
            console.log('Sidebar:', sidebar); // Debug

            function toggleSidebar() {
                console.log('Toggle clicked'); // Debug
                if (sidebar && sidebarOverlay) {
                    sidebar.classList.toggle('show');
                    sidebarOverlay.classList.toggle('show');
                    document.body.style.overflow = sidebar.classList.contains('show') ? 'hidden' : '';
                }
            }

            function closeSidebar() {
                console.log('Close clicked'); // Debug
                if (sidebar && sidebarOverlay) {
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                    document.body.style.overflow = '';
                }
            }

            if (mobileToggle) {
                mobileToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    toggleSidebar();
                });
            }

            if (sidebarClose) {
                sidebarClose.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    closeSidebar();
                });
            }

            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', closeSidebar);
            }

            // Close sidebar when clicking menu items on mobile
            const menuLinks = document.querySelectorAll('.menu a');
            menuLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 991.98) {
                        setTimeout(closeSidebar, 100);
                    }
                });
            });

            // Close sidebar on window resize to desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth > 991.98) {
                    closeSidebar();
                }
            });
        });
    </script>
    @stack('scripts')

</body>

</html>
