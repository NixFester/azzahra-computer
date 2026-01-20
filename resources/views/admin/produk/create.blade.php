@extends('layouts.admin')

@section('title', 'Tambah Produk')
@section('breadcrumb', 'Dashboards / Produk / Tambah')

@section('content')
<div class="content">
    <h2 style="margin-bottom: 20px;">Tambah Produk Baru</h2>
    
    <form action="{{ route('admin.produk.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Nama Produk</label>
            <input type="text" name="nama" value="{{ old('nama') }}" required>
            @error('nama')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga</label>
            <input type="number" name="harga" value="{{ old('harga') }}" required>
            @error('harga')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Stok</label>
            <input type="number" name="stok" value="{{ old('stok') }}" required>
            @error('stok')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.produk.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>
@endsection