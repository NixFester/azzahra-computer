@extends('layouts.admin')
@section('title', 'Tambah Produk')
@section('breadcrumb', 'Dashboards / Produk / Tambah')
@section('content')
<div class="content">
    <h2 style="margin-bottom: 20px;">Tambah Produk Baru</h2>
    
    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="form-group">
            <label>Nama Produk <span style="color: #ff3b3b;">*</span></label>
            <input type="text" name="product_name" value="{{ old('product_name') }}" required>
            @error('product_name')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Kategori <span style="color: #ff3b3b;">*</span></label>
            <input type="text" name="category" value="{{ old('category') }}" required>
            @error('category')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" value="{{ old('brand') }}">
            @error('brand')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Spesifikasi</label>
            <textarea name="specs" rows="4">{{ old('specs') }}</textarea>
            @error('specs')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga <span style="color: #ff3b3b;">*</span></label>
            <input type="text" name="price" value="{{ old('price') }}" required placeholder="contoh: Rp 100.000">
            @error('price')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Gambar Produk</label>
            <input type="file" name="image" accept="image/*" id="imageInput">
            <small style="color: #666; display: block; margin-top: 5px;">Format: JPG, JPEG, PNG, GIF. Maksimal 2MB.</small>
            @error('image')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
            
            <div id="imagePreview" style="margin-top: 10px;"></div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.produk.index') }}" class="btn btn-danger">Batal</a>
        </div>
    </form>
</div>

<script>
document.getElementById('imageInput').addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <img src="${e.target.result}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
            `;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection