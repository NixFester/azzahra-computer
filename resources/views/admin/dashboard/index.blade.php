@extends('layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboards / Overview')

@section('content')
<style>
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

<!-- STAT CARDS -->
<div class="stats">
    <div class="stat-card">
        <p>Kunjungan</p>
        <h2>{{ number_format($stats['kunjungan']) }}</h2>
        <span class="up">▲ 11.01%</span>
    </div>
    <div class="stat-card">
        <p>Produk Masuk</p>
        <h2>{{ number_format($stats['produk_masuk']) }}</h2>
        <span class="down">▼ 0.03%</span>
    </div>
    <div class="stat-card">
        <p>Produk Keluar</p>
        <h2>{{ number_format($stats['produk_keluar']) }}</h2>
        <span class="up">▲ 15.03%</span>
    </div>
    <div class="stat-card">
        <p>Pengguna Baru</p>
        <h2>{{ number_format($stats['pengguna_baru']) }}</h2>
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
@endsection