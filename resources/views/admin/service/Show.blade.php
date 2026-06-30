@extends('layouts.admin')
@section('title', 'Detail Tiket')

@section('content')
<div class="mb-4 d-flex align-items-center gap-2 flex-wrap">
    <a href="{{ route('admin.service.index') }}" class="btn btn-outline-secondary btn-sm">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
    <h4 class="fw-bold mb-0">Detail Tiket</h4>
    <code class="ms-1 fs-6 text-primary">{{ $service->nomor_tiket }}</code>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="row g-4">

    {{-- Info Customer & Device --}}
    <div class="col-md-7">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header fw-bold bg-white">Data Customer</div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-4">Nama</dt>
                    <dd class="col-sm-8">{{ $service->nama }}</dd>

                    <dt class="col-sm-4">WhatsApp</dt>
                    <dd class="col-sm-8">
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $service->whatsapp) }}"
                            target="_blank" class="text-success text-decoration-none fw-semibold">
                            <i class="bi bi-whatsapp me-1"></i>{{ $service->whatsapp }}
                        </a>
                    </dd>

                    <dt class="col-sm-4">Cabang</dt>
                    <dd class="col-sm-8"><span class="badge bg-primary">{{ $service->cabang }}</span></dd>
                </dl>
            </div>
        </div>

        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header fw-bold bg-white">Data Perangkat</div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-4">Jenis</dt>
                    <dd class="col-sm-8">{{ $service->jenis_device }}</dd>

                    <dt class="col-sm-4">Merk</dt>
                    <dd class="col-sm-8">{{ $service->merk }}</dd>

                    <dt class="col-sm-4">Keluhan</dt>
                    <dd class="col-sm-8">{{ $service->keluhan }}</dd>
                </dl>
            </div>
        </div>

        {{-- Foto --}}
        @if($service->foto)
        <div class="card border-0 shadow-sm">
            <div class="card-header fw-bold bg-white">Foto Perangkat</div>
            <div class="card-body">
                <img src="{{ asset('storage/' . $service->foto) }}"
                    alt="Foto perangkat" class="img-fluid rounded" style="max-height:320px;">
            </div>
        </div>
        @endif
    </div>

    {{-- Status & Meta --}}
    <div class="col-md-5">
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header fw-bold bg-white">Status Tiket</div>
            <div class="card-body">
                @php
                    $colors = [
                        'Menunggu' => 'warning',
                        'Diproses' => 'info',
                        'Selesai'  => 'success',
                        'Ditolak'  => 'danger',
                    ];
                @endphp
                <span class="badge bg-{{ $colors[$service->status_tiket] ?? 'secondary' }} fs-6 mb-3">
                    {{ $service->status_tiket }}
                </span>

                <form action="{{ route('admin.service.updateStatus', $service) }}" method="POST">
                    @csrf @method('PATCH')
                    <label class="form-label fw-semibold">Ubah Status</label>
                    <select name="status_tiket" class="form-select mb-3">
                        @foreach(['Menunggu', 'Diproses', 'Selesai', 'Ditolak'] as $st)
                            <option value="{{ $st }}" {{ $service->status_tiket == $st ? 'selected' : '' }}>
                                {{ $st }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-save me-1"></i> Simpan Status
                    </button>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header fw-bold bg-white">Informasi Tiket</div>
            <div class="card-body">
                <dl class="row mb-0">
                    <dt class="col-sm-5">No. Tiket</dt>
                    <dd class="col-sm-7"><code>{{ $service->nomor_tiket }}</code></dd>

                    <dt class="col-sm-5">Masuk</dt>
                    <dd class="col-sm-7">{{ $service->created_at->format('d/m/Y H:i') }}</dd>

                    <dt class="col-sm-5">Diperbarui</dt>
                    <dd class="col-sm-7">{{ $service->updated_at->format('d/m/Y H:i') }}</dd>
                </dl>

                {{-- Tombol WA langsung --}}
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $service->whatsapp) }}?text={{ urlencode('Halo ' . $service->nama . ', kami dari Azzahra Computer mengenai tiket service Anda (' . $service->nomor_tiket . '). ') }}"
                    target="_blank" class="btn btn-success w-100 mt-3">
                    <i class="bi bi-whatsapp me-2"></i>Hubungi via WhatsApp
                </a>
            </div>
        </div>
    </div>

</div>
@endsection