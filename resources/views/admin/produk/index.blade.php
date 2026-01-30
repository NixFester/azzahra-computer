@extends('layouts.admin')
@section('title', 'Produk')
@section('breadcrumb', 'Dashboards / Produk')
@section('content')
    <div class="content">
        <div
            class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
            <h4 class="mb-0 fw-bold">Daftar Produk</h4>

            <div class="d-flex flex-column flex-md-row gap-2 w-100 w-md-auto">
                <form action="{{ route('admin.produk.index') }}" method="GET" class="d-flex gap-2 flex-grow-1">
                    <input type="text" name="search" value="{{ request('search') }}"
                        placeholder="Cari nama produk atau ID..." class="form-control form-control-sm"
                        style="min-width: 200px;">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="bi bi-search"></i> Cari
                    </button>
                    @if (request('search'))
                        <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-x-circle"></i> Reset
                        </a>
                    @endif
                </form>
                <a href="{{ route('admin.produk.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle me-1"></i>Tambah Produk
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th style="width: 60px;">No</th>
                        <th style="width: 80px;">Gambar</th>
                        <th>Nama Produk</th>
                        <th>Kategori</th>
                        <th>Brand</th>
                        <th>Harga</th>
                        <th style="width: 150px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($produks as $index => $produk)
                        <tr>
                            <td>{{ ($produks->currentPage() - 1) * $produks->perPage() + $index + 1 }}</td>
                            <td>
                                @if ($produk->image_array)
                                    <img src="{{ Storage::url($produk->image_array) }}" alt="Product Image" class="rounded"
                                        style="width: 60px; height: 60px; object-fit: cover;">
                                @else
                                    <div class="d-flex align-items-center justify-content-center rounded bg-light text-muted"
                                        style="width: 60px; height: 60px;">
                                        <i class="bi bi-image" style="font-size: 1.5rem;"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="fw-semibold">{{ $produk->product_name ?? '-' }}</div>
                            </td>
                            <td>
                                <span class="badge bg-info bg-opacity-10 text-info">{{ $produk->category ?? '-' }}</span>
                            </td>
                            <td>{{ $produk->brand ?? '-' }}</td>
                            <td class="fw-semibold text-primary">Rp.
                                {{ number_format($produk->price * 1000, 2, ',', '.') ?? '-' }}</td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="{{ route('admin.produk.edit', $produk->id) }}"
                                        class="btn btn-sm btn-outline-primary" title="Edit">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Yakin hapus produk ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger" title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox" style="font-size: 3rem; opacity: 0.3;"></i>
                                    <p class="mt-2 mb-0">
                                        @if (request('search'))
                                            Tidak ada produk yang ditemukan dengan kata kunci
                                            "<strong>{{ request('search') }}</strong>"
                                        @else
                                            Belum ada data produk
                                        @endif
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if ($produks->hasPages())
            <div class="d-flex justify-content-center mt-4">
                {{ $produks->links() }}
            </div>
        @endif
    </div>
@endsection
