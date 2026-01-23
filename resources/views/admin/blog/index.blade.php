@extends('layouts.admin')
@section('title', 'Manajemen Blog')
@section('breadcrumb', 'Admin / Blog')

@section('content')

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="mb-0">
                <i class="bi bi-pencil-square"></i> Manajemen Blog
            </h1>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Buat Blog Baru
            </a>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($blogs->count() > 0)
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text text-muted small">
                                <i class="bi bi-calendar"></i>
                                {{ $blog->date ? $blog->date->format('d M Y') : 'Tidak ada tanggal' }}
                            </p>
                            <p class="card-text">{{ Str::limit($blog->body, 100, '...') }}</p>
                        </div>
                        <div class="card-footer bg-light">
                            <div class="btn-group w-100" role="group">
                                <a href="{{ route('admin.blog.edit', $blog) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.blog.destroy', $blog) }}" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus blog ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="row mt-4">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    {{ $blogs->links('pagination::bootstrap-5') }}
                </nav>
            </div>
        </div>
    @else
        <div class="alert alert-info text-center" role="alert">
            <i class="bi bi-info-circle"></i> Belum ada blog yang dibuat. <a href="{{ route('admin.blog.create') }}">Buat sekarang</a>
        </div>
    @endif
</div>

@endsection