@extends('layouts.admin')
@section('title', 'edit detail web')
@section('breadcrumb', 'Admin / Social')

@section('content')
<div class="container-fluid">
    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <!-- Store Contact Details Section -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0"><i class="fas fa-store"></i> Kontak Store</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.social.store.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fab fa-whatsapp text-success"></i> WhatsApp
                            </label>
                            <input type="text" 
                                   class="form-control @error('whatsapp') is-invalid @enderror" 
                                   name="whatsapp" 
                                   value="{{ old('whatsapp', $store->whatsapp) }}"
                                   placeholder="+6285942001720">
                            @error('whatsapp')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fab fa-instagram text-danger"></i> Instagram
                            </label>
                            <input type="text" 
                                   class="form-control @error('instagram') is-invalid @enderror" 
                                   name="instagram" 
                                   value="{{ old('instagram', $store->instagram) }}"
                                   placeholder="authorized_servicecenter.tegal">
                            @error('instagram')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">
                                <i class="fab fa-youtube text-danger"></i> YouTube
                            </label>
                            <input type="text" 
                                   class="form-control @error('youtube') is-invalid @enderror" 
                                   name="youtube" 
                                   value="{{ old('youtube', $store->youtube) }}"
                                   placeholder="@authorizedmultibrandservic9761">
                            @error('youtube')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update Kontak
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Batch Magang Image Section -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            <h5 class="mb-0"><i class="fas fa-image"></i> Batch Magang/Internship</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h6>Current Batch Image:</h6>
                    @if($batchImage)
                        <img src="{{ $batchImage->image_url }}" 
                             alt="Batch Magang" 
                             class="img-thumbnail mb-3" 
                             style="max-width: 100%; max-height: 300px;">
                    @else
                        <img src="{{ asset('images/intern1.png') }}" 
                             alt="Default Batch" 
                             class="img-thumbnail mb-3" 
                             style="max-width: 100%; max-height: 300px;">
                        <p class="text-muted">Default image (intern1.png)</p>
                    @endif
                </div>

                <div class="col-md-6">
                    <form action="{{ route('admin.social.batch.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label">Upload New Batch Image</label>
                            <input type="file" 
                                   class="form-control @error('batch_image') is-invalid @enderror" 
                                   name="batch_image" 
                                   accept="image/*"
                                   required>
                            @error('batch_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Max size: 2MB. Format: JPG, PNG, GIF<br>
                                Note: Will replace current image (except default intern1.png)
                            </small>
                        </div>

                        <button type="submit" class="btn btn-info">
                            <i class="fas fa-upload"></i> Update Batch Image
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Brosur Magang Section -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-folder-open"></i> Brosur Magang/Internship</h5>
            <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addBrochureModal">
                <i class="fas fa-plus"></i> Add Brosur
            </button>
        </div>
        <div class="card-body">
            @if($brochures->count() > 0)
            <div class="row">
                @foreach($brochures as $brochure)
                <div class="col-md-3 mb-3">
                    <div class="card">
                        <img src="@if(strpos($brochure->image_url, 'images/') === 0 && strpos($brochure->image_url, '.png') !== false){{ asset($brochure->image_url) }}@else{{ $brochure->image_url }}@endif" 
                             class="card-img-top" 
                             alt="{{ $brochure->title }}"
                             style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h6 class="card-title">{{ $brochure->title ?? 'Brosur #' . $brochure->id }}</h6>
                            <form action="{{ route('admin.social.brochure.delete', $brochure->id) }}" 
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this brochure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm w-100">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center text-muted py-4">
                <i class="fas fa-folder-open fa-3x mb-3"></i>
                <p>No brochures added yet. Click "Add Brosur" to upload.</p>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Add Brochure Modal -->
<div class="modal fade" id="addBrochureModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('admin.social.brochure.add') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Add New Brosur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Title (Optional)</label>
                        <input type="text" 
                               class="form-control" 
                               name="brochure_title"
                               placeholder="e.g., Content & Marketing">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Brochure Image <span class="text-danger">*</span></label>
                        <input type="file" 
                               class="form-control @error('brochure_image') is-invalid @enderror" 
                               name="brochure_image" 
                               accept="image/*"
                               required>
                        @error('brochure_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Max size: 2MB. Format: JPG, PNG, GIF</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-upload"></i> Upload Brosur
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection