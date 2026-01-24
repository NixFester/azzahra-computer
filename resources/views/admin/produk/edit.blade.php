@extends('layouts.admin')
@section('title', 'Edit Produk')
@section('breadcrumb', 'Dashboards / Produk / Edit')
@section('content')
<div class="content">
    <h2 style="margin-bottom: 20px;">Edit Produk</h2>
    
    <form action="{{ route('admin.produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Nama Produk <span style="color: #ff3b3b;">*</span></label>
            <input type="text" name="product_name" value="{{ old('product_name', $produk->product_name) }}" required>
            @error('product_name')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Kategori <span style="color: #ff3b3b;">*</span></label>
            <input type="text" name="category" value="{{ old('category', $produk->category) }}" required>
            @error('category')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Brand</label>
            <input type="text" name="brand" value="{{ old('brand', $produk->brand) }}">
            @error('brand')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Spesifikasi</label>
            <textarea name="specs" rows="4">{{ old('specs', $produk->specs) }}</textarea>
            @error('specs')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Harga <span style="color: #ff3b3b;">*</span></label>
            <input type="text" name="price" value="{{ old('price', $produk->price) }}" required placeholder="contoh: Rp 100.000">
            @error('price')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label>Gambar Saat Ini</label>
            <div style="margin-bottom: 10px;">
                @if($produk->image_array)
                    @php
                        $images = json_decode($produk->image_array, true);
                        $firstImage = !empty($images) ? $images[0] : null;
                    @endphp
                    @if($firstImage)
                        <img src="{{ Storage::url($firstImage) }}" alt="Product Image" style="width: 150px; height: 150px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                    @else
                        <p style="color: #999;">Tidak ada gambar</p>
                    @endif
                @else
                    <p style="color: #999;">Tidak ada gambar</p>
                @endif
            </div>
            
            <label>Ganti Gambar (Opsional)</label>
            <input type="file" name="image" accept="image/*" id="imageInput">
            <small style="color: #666; display: block; margin-top: 5px;">Jika diisi, gambar lama akan diganti. Format: JPG, JPEG, PNG, GIF. Maksimal 2MB.</small>
            @error('image')
                <small style="color: #ff3b3b;">{{ $message }}</small>
            @enderror
            
            <div id="imagePreview" style="margin-top: 10px;"></div>
        </div>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Update</button>
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
                <div>
                    <p style="color: #666; margin-bottom: 5px; font-weight: bold;">Preview Gambar Baru:</p>
                    <img src="${e.target.result}" style="width: 150px; height: 150px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;">
                </div>
            `;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection