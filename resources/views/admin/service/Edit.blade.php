@extends('layouts.admin')
@section('title', 'Edit Service')

@section('content')
<div class="mb-4 d-flex align-items-center gap-2">
    <a href="{{ route('admin.service.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <h4 class="fw-bold mb-0">Edit Data Service</h4>
</div>

@include('admin.service._form', [
    'service' => $service,
    'route'   => route('admin.service.update', $service),
    'method'  => 'PUT',
])
@endsection