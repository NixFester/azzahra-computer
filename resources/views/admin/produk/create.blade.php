@extends('layouts.admin')
@section('title', 'Tambah Produk')
@section('breadcrumb', 'Dashboards / Produk / Tambah')
@section('content')
<div class="content">
    <div class="d-flex align-items-center mb-4">
        <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-secondary btn-sm me-3">
            <i class="bi bi-arrow-left"></i>
        </a>
        <h4 class="mb-0 fw-bold">Tambah Produk Baru</h4>
    </div>
    
    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="row">
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h6 class="card-title fw-bold mb-3">Informasi Produk</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">
                                Nama Produk <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="product_name" 
                                   class="form-control @error('product_name') is-invalid @enderror" 
                                   value="{{ old('product_name') }}" 
                                   required
                                   placeholder="Masukkan nama produk">
                            @error('product_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">
                                    Kategori <span class="text-danger">*</span>
                                </label>
                                <input type="text" 
                                       name="category" 
                                       class="form-control @error('category') is-invalid @enderror" 
                                       value="{{ old('category') }}" 
                                       required
                                       placeholder="Contoh: Elektronik">
                                @error('category')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Brand</label>
                                <input type="text" 
                                       name="brand" 
                                       class="form-control @error('brand') is-invalid @enderror" 
                                       value="{{ old('brand') }}"
                                       placeholder="Contoh: Samsung">
                                @error('brand')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Spesifikasi</label>
                            <textarea name="specs" 
                                      rows="4" 
                                      class="form-control @error('specs') is-invalid @enderror"
                                      placeholder="Masukkan spesifikasi produk">{{ old('specs') }}</textarea>
                            @error('specs')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Harga <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="price" 
                                   class="form-control @error('price') is-invalid @enderror" 
                                   value="{{ old('price') }}" 
                                   required 
                                   placeholder="Contoh: Rp 100.000">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h6 class="card-title fw-bold mb-3">Gambar Produk</h6>
                        
                        <div class="mb-3">
                            <label class="form-label">Upload Gambar</label>
                            <input type="file" 
                                   name="image" 
                                   accept="image/*" 
                                   id="imageInput"
                                   class="form-control @error('image') is-invalid @enderror">
                            <small class="form-text text-muted d-block mt-1">
                                Format: JPG, JPEG, PNG, GIF. Maksimal 2MB
                            </small>
                            @error('image')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div id="imagePreview"></div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-check-circle me-2"></i>Simpan Produk
                    </button>
                    <a href="{{ route('admin.produk.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-x-circle me-2"></i>Batal
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

@push('scripts')
<script>
document.getElementById('imageInput').addEventListener('change', function(e) {
    const preview = document.getElementById('imagePreview');
    preview.innerHTML = '';
    
    const file = e.target.files[0];
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <div class="border rounded p-2 bg-light">
                    <p class="text-muted small mb-2 fw-semibold">Preview:</p>
                    <img src="${e.target.result}" class="img-fluid rounded" style="max-height: 200px; width: 100%; object-fit: cover;">
                </div>
            `;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endpush
@endsection