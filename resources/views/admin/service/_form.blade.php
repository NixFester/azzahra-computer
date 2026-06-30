{{-- Dipanggil dari create.blade.php dan edit.blade.php --}}
{{-- Variabel yang dibutuhkan: $service (null saat create), $route, $method --}}

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
        </ul>
    </div>
@endif

<form action="{{ $route }}" method="POST">
    @csrf
    @if($method === 'PUT') @method('PUT') @endif

    {{-- Data Customer --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header fw-bold bg-white">Data Customer</div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        placeholder="Masukan nama customer"
                        value="{{ old('nama', $service->nama ?? '') }}">
                    @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">No Telepon <span class="text-danger">*</span></label>
                    <input type="text" name="no_telepon"
                        class="form-control @error('no_telepon') is-invalid @enderror"
                        placeholder="Masukan no tlep customer"
                        value="{{ old('no_telepon', $service->no_telepon ?? '') }}">
                    @error('no_telepon')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Alamat <span class="text-danger">*</span></label>
                    <textarea name="alamat"
                        class="form-control @error('alamat') is-invalid @enderror"
                        rows="3">{{ old('alamat', $service->alamat ?? '') }}</textarea>
                    @error('alamat')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Cabang <span class="text-danger">*</span></label>
                    <select name="cabang" class="form-select @error('cabang') is-invalid @enderror">
                        <option value="">-- Pilih Cabang --</option>
                        @foreach(['Tegal', 'Cibubur', 'Kampus Saintek', 'Kampus PKTJ'] as $cab)
                            <option value="{{ $cab }}"
                                {{ old('cabang', $service->cabang ?? '') == $cab ? 'selected' : '' }}>
                                {{ $cab }}
                            </option>
                        @endforeach
                    </select>
                    @error('cabang')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control"
                        value="{{ old('tanggal_lahir', isset($service->tanggal_lahir) ? $service->tanggal_lahir->format('Y-m-d') : '') }}">
                </div>
            </div>
        </div>
    </div>

    {{-- Data Unit --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header fw-bold bg-white">Data Unit</div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Status <span class="text-danger">*</span></label>
                    <select name="status" class="form-select @error('status') is-invalid @enderror">
                        <option value="">-</option>
                        @foreach(['CID', 'IW', 'OOW'] as $st)
                            <option value="{{ $st }}"
                                {{ old('status', $service->status ?? '') == $st ? 'selected' : '' }}>
                                {{ $st }}
                            </option>
                        @endforeach
                    </select>
                    @error('status')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Device</label>
                    <input type="text" name="device" class="form-control"
                        placeholder="Masukan device"
                        value="{{ old('device', $service->device ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Merk</label>
                    <input type="text" name="merk" class="form-control"
                        placeholder="Masukan type unit"
                        value="{{ old('merk', $service->merk ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Model</label>
                    <input type="text" name="model" class="form-control"
                        placeholder="Masukan model unit"
                        value="{{ old('model', $service->model ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">No Seri</label>
                    <input type="text" name="no_seri" class="form-control"
                        placeholder="Masukan no seri"
                        value="{{ old('no_seri', $service->no_seri ?? '') }}">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tipe Password <span class="text-danger">*</span></label>
                    <div class="d-flex gap-3 flex-wrap mt-1">
                        @foreach(['Text', 'Pola (Deskripsi)', 'Pola (Canvas)'] as $tp)
                            <div class="form-check">
                                <input class="form-check-input" type="radio"
                                    name="tipe_password" id="tp_{{ $loop->index }}"
                                    value="{{ $tp }}"
                                    {{ old('tipe_password', $service->tipe_password ?? 'Text') == $tp ? 'checked' : '' }}>
                                <label class="form-check-label" for="tp_{{ $loop->index }}">{{ $tp }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Password Text</label>
                    <input type="text" name="password_text" class="form-control"
                        placeholder="Masukan password text"
                        value="{{ old('password_text', $service->password_text ?? '') }}">
                </div>
                <div class="col-12">
                    <label class="form-label">Asesoris</label>
                    <textarea name="asesoris" class="form-control" rows="2"
                        >{{ old('asesoris', $service->asesoris ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    {{-- Keluhan & Keterangan --}}
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header fw-bold bg-white">Keluhan dan Keterangan</div>
        <div class="card-body">
            <div class="row g-3">
                <div class="col-12">
                    <label class="form-label">Keluhan</label>
                    <textarea name="keluhan" class="form-control" rows="4"
                        >{{ old('keluhan', $service->keluhan ?? '') }}</textarea>
                </div>
                <div class="col-12">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="4"
                        >{{ old('keterangan', $service->keterangan ?? '') }}</textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end gap-2">
        <a href="{{ route('admin.service.index') }}" class="btn btn-outline-secondary">Batal</a>
        <button type="submit" class="btn btn-primary">
            <i class="bi bi-save me-1"></i> Simpan
        </button>
    </div>
</form>