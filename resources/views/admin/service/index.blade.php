@extends('layouts.admin')
@section('title', 'Tiket Service')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-0">Tiket Service</h4>
        <small class="text-muted">Semua pengajuan service dari customer</small>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

<div class="card border-0 shadow-sm">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>No. Tiket</th>
                        <th>Nama</th>
                        <th>WhatsApp</th>
                        <th>Cabang</th>
                        <th>Perangkat</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $s)
                    <tr>
                        <td><code class="fw-bold text-primary">{{ $s->nomor_tiket }}</code></td>
                        <td class="fw-semibold">{{ $s->nama }}</td>
                        <td>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $s->whatsapp) }}"
                                target="_blank" class="text-success text-decoration-none">
                                <i class="bi bi-whatsapp me-1"></i>{{ $s->whatsapp }}
                            </a>
                        </td>
                        <td><span class="badge bg-primary">{{ $s->cabang }}</span></td>
                        <td>{{ $s->jenis_device }} - {{ $s->merk }}</td>
                        <td>
                            @php
                                $colors = [
                                    'Menunggu' => 'warning',
                                    'Diproses' => 'info',
                                    'Selesai'  => 'success',
                                    'Ditolak'  => 'danger',
                                ];
                            @endphp
                            <span class="badge bg-{{ $colors[$s->status_tiket] ?? 'secondary' }}">
                                {{ $s->status_tiket }}
                            </span>
                        </td>
                        <td>{{ $s->created_at->format('d/m/Y H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.service.show', $s) }}"
                                class="btn btn-sm btn-outline-primary me-1" title="Detail">
                                <i class="bi bi-eye"></i>
                            </a>
                            <form action="{{ route('admin.service.destroy', $s) }}" method="POST"
                                class="d-inline" onsubmit="return confirm('Hapus tiket ini?')">
                                @csrf @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2"></i>
                            Belum ada tiket service masuk
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    @if($services->hasPages())
        <div class="card-footer">{{ $services->links() }}</div>
    @endif
</div>
@endsection