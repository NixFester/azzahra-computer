@extends('layouts.admin')
@section('title', 'Manajemen Iklan')
@section('breadcrumb', 'Admin / Iklan')

@section('content')
<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Banner Section -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Banner</h5>
        <button class="btn btn-link text-muted">
            <i class="bi bi-three-dots-vertical"></i>
        </button>
    </div>
    
    <div class="row g-3 mb-5">
        @foreach($banners as $banner)
        <div class="col-md-6">
            <div class="card border-0 shadow-sm h-100 position-relative">
                <img src="{{ $banner->image_url }}" class="card-img-top" alt="{{ $banner->title }}" style="height: 150px; object-fit: cover;">
                <div class="position-absolute top-0 end-0 p-2">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('admin.iklan.edit', $banner) }}"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                            <li>
                                <form action="{{ route('admin.iklan.destroy', $banner) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger"><i class="bi bi-trash me-2"></i>Hapus</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        @if($banners->count() < 4)
        <div class="col-md-6">
            <a href="{{ route('admin.iklan.create') }}?type=banner" class="text-decoration-none">
                <div class="card border-0 shadow-sm h-100 bg-light d-flex align-items-center justify-content-center" style="min-height: 150px; cursor: pointer;">
                    <div class="text-center text-secondary">
                        <i class="bi bi-plus-lg" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </a>
        </div>
        @endif
    </div>

    <!-- Promo Section -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="mb-0">Promo</h5>
        <button class="btn btn-link text-muted">
            <i class="bi bi-three-dots-vertical"></i>
        </button>
    </div>
    
    <div class="row g-3">
        @foreach($promos as $promo)
        <div class="col-3">
            <div class="card border-0 shadow-sm h-100 position-relative">
                <img src="{{ $promo->image_url }}" class="card-img-top h-100" alt="{{ $promo->title }}" style="height: 250px; object-fit: cover;">
                <div class="position-absolute top-0 end-0 p-2">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light rounded-circle" type="button" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('admin.iklan.edit', $promo) }}"><i class="bi bi-pencil me-2"></i>Edit</a></li>
                            <li>
                                <form action="{{ route('admin.iklan.destroy', $promo) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger"><i class="bi bi-trash me-2"></i>Hapus</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        
        @if($promos->count() < 4)
        <div class="col-3">
            <a href="{{ route('admin.iklan.create') }}?type=promo" class="text-decoration-none">
                <div class="card h-100 border-0 shadow-sm h-100 bg-light d-flex align-items-center justify-content-center" style="min-height: 250px; cursor: pointer;">
                    <div class="text-center text-secondary">
                        <i class="bi bi-plus-lg" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </a>
        </div>
        @endif
    </div>
</div>

<style>
.card img {
    transition: transform 0.2s;
}

.card:hover img {
    transform: scale(1.02);
}

.bg-light:hover {
    background-color: #e9ecef !important;
}
</style>
@endsection