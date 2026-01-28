<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", Arial, sans-serif;
        }

        body {
            background: #f4f6fa;
        }

        /* APP */
        .app {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .sidebar {
            width: 260px;
            background: #ffffff;
            border-right: 1px solid #eee;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 24px 20px;
        }

        .logo {
            margin-bottom: 30px;
            text-align: center;
        }

        .logo img {
            max-width: 160px;
            height: auto;
            object-fit: contain;
        }

        .logo h2 {
            color: #3D8FEF;
            font-size: 24px;
            font-weight: 700;
        }

        .menu {
            list-style: none;
        }

        .menu li {
            padding: 12px 14px;
            border-radius: 10px;
            margin-bottom: 10px;
            cursor: pointer;
            font-size: 14px;
            color: #555;
            transition: all 0.2s ease;
        }

        .menu li.active,
        .menu li:hover {
            background: #eef4ff;
            color: #3D8FEF;
        }

        /* PROFILE */
        .profile {
            display: flex;
            align-items: center;
            gap: 10px;
            padding-top: 16px;
            border-top: 1px solid #eee;
            font-size: 14px;
        }

        .avatar {
            width: 36px;
            height: 36px;
            background: #3D8FEF;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .logout-link {
            margin-left: auto;
            color: #ff3b3b;
            text-decoration: none;
            font-size: 13px;
            cursor: pointer;
        }

        .logout-link:hover {
            text-decoration: underline;
        }

        /* MAIN */
        .main {
            flex: 1;
            padding: 30px;
        }

        /* TOPBAR */
        .topbar {
            margin-bottom: 26px;
        }

        .breadcrumb {
            color: #777;
            font-size: 14px;
        }

        /* STATS */
        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: linear-gradient(135deg, #3D8FEF, #2563eb);
            color: #fff;
            padding: 22px;
            border-radius: 18px;
            box-shadow: 0 12px 30px rgba(61, 143, 239, 0.25);
        }

        .stat-card p {
            font-size: 13px;
            opacity: 0.9;
        }

        .stat-card h2 {
            margin: 10px 0;
            font-size: 24px;
        }

        .up {
            color: #d6ffe7;
            font-size: 13px;
        }

        .down {
            color: #ffd6d6;
            font-size: 13px;
        }

        /* CONTENT CARD */
        .card {
            background: #fff;
            padding: 22px;
            border-radius: 18px;
            margin-bottom: 24px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
        }

        .card.large {
            height: 280px;
        }

        .red {
            color: #ff3b3b;
        }

        /* CHART PLACEHOLDER */
        .chart-placeholder {
            height: 190px;
            background: #f1f3f7;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            margin-top: 14px;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 600px) {

            .stats {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="app">
    <!-- SIDEBAR -->
    <aside class="sidebar">
        <div class="sidebar-top">
            <div class="logo">
                <img src="images/logo.png" alt="Logo">
            </div>

            <ul class="menu">
                <li class="active">Overview</li>
                <li>Produk</li>
                <li>Iklan</li>
                <li>Kelola Pengguna</li>
                <li>Blog</li>
                <li>Social</li>
            </ul>
        </div>

        <div class="sidebar-bottom">
            <div class="profile">
                <div class="avatar">A</div>
                <span>{{ Session::get('username') }}</span>
                <form method="POST" action="{{ route('logout') }}" style="margin-left: auto;">
                    @csrf
                    <button type="submit" class="logout-link" style="background: none; border: none;">Logout</button>
                </form>
            </div>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="main">
        <div class="topbar">
            <span class="breadcrumb">Dashboards / Overview</span>
        </div>

        <!-- STAT CARDS -->
        <div class="stats">
            <div class="stat-card">
                <p>Kunjungan</p>
                <h2>7,265</h2>
                <span class="up">▲ 11.01%</span>
            </div>
            <div class="stat-card">
                <p>Produk Masuk</p>
                <h2>3,671</h2>
                <span class="down">▼ 0.03%</span>
            </div>
            <div class="stat-card">
                <p>Produk Keluar</p>
                <h2>256</h2>
                <span class="up">▲ 15.03%</span>
            </div>
            <div class="stat-card">
                <p>Pengguna Baru</p>
                <h2>2,318</h2>
                <span class="up">▲ 6.08%</span>
            </div>
        </div>

        <!-- CHART -->
        <div class="card large">
            <h4>Users</h4>
            <div class="chart-placeholder">Line Chart</div>
        </div>

        <div class="card">
            <h4 class="red">Grafik Penjualan</h4>
            <div class="chart-placeholder">Bar Chart</div>
        </div>
    </main>
</div>

</body>
</html>