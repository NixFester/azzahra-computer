@extends('layouts.admin')
@section('title', 'Edit Detail Web')
@section('breadcrumb', 'Admin / Social')

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-12">
            <h2>Edit Social Media Detail</h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.social.update', $store) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   id="name" 
                                   name="name" 
                                   value="{{ old('name', $store->name) }}" 
                                   required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="categories" class="form-label">Categories <span class="text-danger">*</span></label>
                            <select class="form-select @error('categories') is-invalid @enderror" 
                                    id="categories" 
                                    name="categories" 
                                    required>
                                <option value="">Select Category</option>
                                <option value="Content & Marketing" {{ old('categories', $store->categories) == 'Content & Marketing' ? 'selected' : '' }}>Content & Marketing</option>
                                <option value="Programmer IT Support" {{ old('categories', $store->categories) == 'Programmer IT Support' ? 'selected' : '' }}>Programmer IT Support</option>
                                <option value="Digital Marketing" {{ old('categories', $store->categories) == 'Digital Marketing' ? 'selected' : '' }}>Digital Marketing</option>
                                <option value="Admin / Customer Service" {{ old('categories', $store->categories) == 'Admin / Customer Service' ? 'selected' : '' }}>Admin / Customer Service</option>
                                <option value="Social Media Spesialist" {{ old('categories', $store->categories) == 'Social Media Spesialist' ? 'selected' : '' }}>Social Media Spesialist</option>
                                <option value="Human Resource" {{ old('categories', $store->categories) == 'Human Resource' ? 'selected' : '' }}>Human Resource</option>
                            </select>
                            @error('categories')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" 
                                   class="form-control @error('contact') is-invalid @enderror" 
                                   id="contact" 
                                   name="contact" 
                                   value="{{ old('contact', $store->contact) }}"
                                   placeholder="e.g., +6285942001720">
                            @error('contact')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" 
                                   class="form-control @error('image') is-invalid @enderror" 
                                   id="image" 
                                   name="image"
                                   accept="image/*">
                            @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Max size: 2MB. Format: JPG, PNG, GIF</small>
                        </div>

                        @if($store->image_url)
                        <div class="mb-3">
                            <label class="form-label">Current Image</label>
                            <div>
                                <img src="{{ $store->image_url }}" 
                                     alt="{{ $store->name }}" 
                                     class="img-thumbnail" 
                                     style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" 
                              id="description" 
                              name="description" 
                              rows="4">{{ old('description', $store->description) }}</textarea>
                    @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.social.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection