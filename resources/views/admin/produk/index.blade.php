@extends('layouts.admin')

@section('title', 'Produk')
@section('breadcrumb', 'Dashboards / Produk')

@section('content')
<div class="content">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <h2>Daftar Produk</h2>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">+ Tambah Produk</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produks as $index => $produk)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $produk->nama }}</td>
                <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td>{{ $produk->stok }}</td>
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
                <td colspan="5" style="text-align: center; color: #999; padding: 30px;">Belum ada data produk</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection