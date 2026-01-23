@extends('layouts.admin')
@section('title', 'Edit Blog')
@section('breadcrumb', 'Admin / Blog / Edit')

@section('content')

<div class="container-fluid py-4">
    <div class="row mb-4">
        <div class="col-md-8">
            <h1 class="mb-0">
                <i class="bi bi-pencil-square"></i> Edit Blog
            </h1>
            <p class="text-muted mt-2">{{ $blog->title }}</p>
        </div>
        <div class="col-md-4 text-end">
            <a href="{{ route('admin.blog.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('admin.blog.update', $blog) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div class="mb-3">
                            <label for="title" class="form-label">
                                <i class="bi bi-input-cursor"></i> Judul Blog
                            </label>
                            <input 
                                type="text" 
                                class="form-control @error('title') is-invalid @enderror" 
                                id="title" 
                                name="title"
                                value="{{ old('title', $blog->title) }}"
                                placeholder="Masukkan judul blog"
                                required
                            >
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Date -->
                        <div class="mb-3">
                            <label for="date" class="form-label">
                                <i class="bi bi-calendar"></i> Tanggal
                            </label>
                            <input 
                                type="date" 
                                class="form-control @error('date') is-invalid @enderror" 
                                id="date" 
                                name="date"
                                value="{{ old('date', $blog->date ? $blog->date->format('Y-m-d') : date('Y-m-d')) }}"
                            >
                            @error('date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Body/Content -->
                        <div class="mb-3">
                            <label for="body" class="form-label">
                                <i class="bi bi-file-text"></i> Isi Blog
                            </label>
                            <textarea 
                                class="form-control @error('body') is-invalid @enderror" 
                                id="body" 
                                name="body"
                                rows="10"
                                placeholder="Tulis isi blog di sini..."
                                required
                            >{{ old('body', $blog->body) }}</textarea>
                            @error('body')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle"></i> Perbarui Blog
                            </button>
                            <a href="{{ route('admin.blog.index') }}" class="btn btn-light">
                                <i class="bi bi-x-circle"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
