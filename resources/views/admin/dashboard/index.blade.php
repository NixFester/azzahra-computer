@extends('layouts.admin')

@section('title', 'Dashboard')
@section('breadcrumb', 'Dashboards / Overview')

@section('content')
    <style>
        :root {
            --primary: #3D8FEF;
            --primary-dark: #2563eb;
            --success: #10b981;
            --danger: #ff3b3b;
            --warning: #f59e0b;
            --info: #0ea5e9;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --border: #e5e7eb;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: #fff;
            padding: 24px;
            border-radius: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            border-left: 4px solid var(--primary);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .stat-card.blue {
            border-left-color: var(--primary);
        }

        .stat-card.green {
            border-left-color: var(--success);
        }

        .stat-card.red {
            border-left-color: var(--danger);
        }

        .stat-card.orange {
            border-left-color: var(--warning);
        }

        .stat-card.purple {
            border-left-color: #a855f7;
        }

        .stat-label {
            font-size: 12px;
            color: var(--text-light);
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 12px;
        }

        .stat-growth {
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
        }

        .stat-growth.up {
            color: var(--success);
        }

        .stat-growth.down {
            color: var(--danger);
        }

        .card {
            background: #fff;
            padding: 24px;
            border-radius: 16px;
            margin-bottom: 24px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
        }

        .card h4 {
            margin-top: 0;
            color: var(--text-dark);
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .chart-placeholder {
            height: 280px;
            background: linear-gradient(135deg, #f3f4f6 0%, #e5e7eb 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-light);
            font-size: 14px;
        }

        .recent-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .recent-item {
            padding: 16px 0;
            border-bottom: 1px solid var(--border);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .recent-item:last-child {
            border-bottom: none;
        }

        .recent-item-title {
            color: var(--text-dark);
            font-weight: 600;
            font-size: 14px;
        }

        .recent-item-date {
            color: var(--text-light);
            font-size: 12px;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .badge-primary {
            background: #dbeafe;
            color: #1e40af;
        }

        .badge-success {
            background: #dcfce7;
            color: #166534;
        }

        .badge-warning {
            background: #fef3c7;
            color: #92400e;
        }

        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 24px;
        }

        @media (max-width: 1024px) {
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }

            .grid-2 {
                grid-template-columns: 1fr;
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
        <div class="stat-card blue">
            <div class="stat-label">Jumlah Kunjungan</div>
            <div class="stat-value">{{ number_format($stats['kunjungan']) }}</div>
            <span class="stat-growth up">
                @if ($stats['user_growth'] > 0)
                    ▲ {{ $stats['user_growth'] }}% dari bulan lalu
                @elseif($stats['user_growth'] < 0)
                    ▼ {{ abs($stats['user_growth']) }}% dari bulan lalu
                @else
                    — Sama dengan bulan lalu
                @endif
            </span>
        </div>

        <div class="stat-card green">
            <div class="stat-label">Produk Masuk (Bulan Ini)</div>
            <div class="stat-value">{{ number_format($stats['produk_masuk']) }}</div>
            <span class="stat-growth up">
                @if ($stats['product_growth'] > 0)
                    ▲ {{ $stats['product_growth'] }}% dari bulan lalu
                @elseif($stats['product_growth'] < 0)
                    ▼ {{ abs($stats['product_growth']) }}% dari bulan lalu
                @else
                    — Sama dengan bulan lalu
                @endif
            </span>
        </div>

        <div class="stat-card orange">
            <div class="stat-label">Total Produk</div>
            <div class="stat-value">{{ number_format($stats['produk_keluar']) }}</div>
            <span class="stat-growth up">Semua produk tersimpan</span>
        </div>

        <div class="stat-card purple">
            <div class="stat-label">Konten Aktif</div>
            <div class="stat-value">{{ number_format($stats['total_blogs'] + $stats['active_iklan']) }}</div>
            <span class="badge badge-success">{{ $stats['total_blogs'] }} artikel | {{ $stats['active_iklan'] }}
                iklan</span>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <div class="grid-2">
        <!-- RECENT PRODUCTS -->
        <div class="card">
            <h4>Produk Terbaru</h4>
            @if ($recentProducts->count() > 0)
                <ul class="recent-list">
                    @foreach ($recentProducts as $product)
                        <li class="recent-item">
                            <div>
                                <div class="recent-item-title">{{ $product->product_name }}</div>
                                <div class="recent-item-date">
                                    {{ $product->created_at ? $product->created_at->diffForHumans() : '-' }}
                                </div>
                            </div>
                            <span class="badge badge-primary">{{ $product->category ?? 'Tanpa Kategori' }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <div class="chart-placeholder">Belum ada produk</div>
            @endif
        </div>



        <!-- RECENT BLOGS -->
        <div class="grid-2">
            <div class="card">
                <h4>Artikel Terbaru</h4>
                @if ($recentBlogs->count() > 0)
                    <ul class="recent-list">
                        @foreach ($recentBlogs as $blog)
                            <li class="recent-item">
                                <div style="flex: 1;">
                                    <div class="recent-item-title">{{ $blog->title }}</div>
                                    <div class="recent-item-date">
                                        {{ $blog->date ? $blog->date->format('d M Y') : 'Tidak tersedia' }}
                                    </div>
                                </div>
                                <span class="badge badge-primary">Artikel</span>
                            </li>
                        @endforeach
                    </ul>
                @else
                    <div class="chart-placeholder">Belum ada artikel</div>
                @endif
            </div>
        </div>

    @endsection
