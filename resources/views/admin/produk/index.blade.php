@extends('layouts.admin')
@section('title', 'Produk')
@section('breadcrumb', 'Dashboards / Produk')
@section('content')
<div class="content">
    @if(session('success'))
        <div style="background: #d4edda; color: #155724; padding: 12px 20px; border-radius: 4px; margin-bottom: 20px; border: 1px solid #c3e6cb;">
            {{ session('success') }}
        </div>
    @endif

    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Daftar Produk</h2>
        <div style="display: flex; gap: 10px; align-items: center;">
            <form action="{{ route('admin.produk.index') }}" method="GET" style="display: flex; gap: 10px;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama produk atau ID..." style="padding: 8px 12px; border: 1px solid #ddd; border-radius: 4px; width: 250px;">
                <button type="submit" class="btn btn-primary" style="padding: 8px 16px;">Cari</button>
                @if(request('search'))
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-danger" style="padding: 8px 16px;">Reset</a>
                @endif
            </form>
            <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
        </div>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Brand</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produks as $index => $produk)
            <tr>
                <td>{{ ($produks->currentPage() - 1) * $produks->perPage() + $index + 1 }}</td>
                <td>
                    @if($produk->image_array)
                        @php
                            $images = json_decode($produk->image_array, true);
                            $firstImage = !empty($images) ? $images[0] : null;
                        @endphp
                        @if($firstImage)
                            <img src="{{ asset('storage/' . $firstImage) }}" alt="{{ $produk->product_name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 4px;">
                        @else
                            <div style="width: 60px; height: 60px; background: #e9ecef; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #adb5bd;">
                                <span style="font-size: 12px;">No Image</span>
                            </div>
                        @endif
                    @else
                        <div style="width: 60px; height: 60px; background: #e9ecef; border-radius: 4px; display: flex; align-items: center; justify-content: center; color: #adb5bd;">
                            <span style="font-size: 12px;">No Image</span>
                        </div>
                    @endif
                </td>
                <td>{{ $produk->product_name ?? '-' }}</td>
                <td>{{ $produk->category ?? '-' }}</td>
                <td>{{ $produk->brand ?? '-' }}</td>
                <td>{{ $produk->price ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-success" style="padding: 6px 12px; margin-right: 5px;">Edit</a>
                    <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding: 6px 12px;" onclick="return confirm('Yakin hapus produk ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" style="text-align: center; color: #999; padding: 30px;">
                    @if(request('search'))
                        Tidak ada produk yang ditemukan dengan kata kunci "{{ request('search') }}"
                    @else
                        Belum ada data produk
                    @endif
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    @if($produks->hasPages())
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Page navigation">
            {{ $produks->links() }}
        </nav>
    </div>
@endif
</div>
@endsection