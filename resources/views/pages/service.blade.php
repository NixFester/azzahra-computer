@extends('layouts.app')
@section('title', 'Service - Azzahra Computer')

@section('content')
    @include('partials.header-mobile')

    <section class="service-page">

        {{-- Hero --}}
        <div class="service-hero">
            <div class="container text-center">
                <h1 class="service-hero-title">Ajukan Service Perangkat Anda</h1>
                <p class="service-hero-sub">Isi form di bawah &mdash; tim kami akan menghubungi via WhatsApp maksimal 1&times;24 jam</p>
            </div>
        </div>

        {{-- Form --}}
        <div class="container service-form-wrap">
            <div class="service-card">

                @if($errors->any())
                    <div class="alert alert-danger mb-4">
                        <ul class="mb-0">
                            @foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('service.store') }}" method="POST" enctype="multipart/form-data" id="serviceForm">
                    @csrf

                    {{-- Nama & WhatsApp --}}
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Nama Lengkap <span class="req">*</span></label>
                            <input type="text" name="nama"
                                class="form-input @error('nama') is-invalid @enderror"
                                placeholder="Contoh: Budi Santoso"
                                value="{{ old('nama') }}">
                            @error('nama')<p class="err-msg">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nomor WhatsApp <span class="req">*</span></label>
                            <input type="text" name="whatsapp"
                                class="form-input @error('whatsapp') is-invalid @enderror"
                                placeholder="Contoh: 08123456789"
                                value="{{ old('whatsapp') }}">
                            @error('whatsapp')<p class="err-msg">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Cabang --}}
                    <div class="form-group">
                        <label class="form-label">Cabang <span class="req">*</span></label>
                        <div class="radio-grid">
                            @foreach(['Tegal', 'Cibubur', 'Kampus Saintek', 'Kampus PKTJ'] as $cab)
                                <label class="radio-card {{ old('cabang') == $cab ? 'selected' : '' }}">
                                    <input type="radio" name="cabang" value="{{ $cab }}"
                                        {{ old('cabang') == $cab ? 'checked' : '' }}>
                                    <span>{{ $cab }}</span>
                                </label>
                            @endforeach
                        </div>
                        @error('cabang')<p class="err-msg">{{ $message }}</p>@enderror
                    </div>

                    {{-- Jenis Device & Merk --}}
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Jenis Perangkat <span class="req">*</span></label>
                            <select name="jenis_device" class="form-input @error('jenis_device') is-invalid @enderror">
                                <option value="">-- Pilih Perangkat --</option>
                                @foreach(['Laptop', 'PC', 'Printer', 'Vacuum Robot', 'Smartphone', 'Lainnya'] as $d)
                                    <option value="{{ $d }}" {{ old('jenis_device') == $d ? 'selected' : '' }}>{{ $d }}</option>
                                @endforeach
                            </select>
                            @error('jenis_device')<p class="err-msg">{{ $message }}</p>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Merk <span class="req">*</span></label>
                            <select name="merk" class="form-input @error('merk') is-invalid @enderror">
                                <option value="">-- Pilih Merk --</option>
                                @foreach(['ASUS', 'Lenovo', 'Acer', 'HP', 'Dell', 'Dreame', 'Sanex', 'Lainnya'] as $m)
                                    <option value="{{ $m }}" {{ old('merk') == $m ? 'selected' : '' }}>{{ $m }}</option>
                                @endforeach
                            </select>
                            @error('merk')<p class="err-msg">{{ $message }}</p>@enderror
                        </div>
                    </div>

                    {{-- Keluhan --}}
                    <div class="form-group">
                        <label class="form-label">Keluhan / Kendala <span class="req">*</span></label>
                        <textarea name="keluhan"
                            class="form-input @error('keluhan') is-invalid @enderror"
                            rows="4"
                            placeholder="Contoh: Laptop mati total, Keyboard tidak berfungsi, Vacuum robot tidak bisa charging...">{{ old('keluhan') }}</textarea>
                        @error('keluhan')<p class="err-msg">{{ $message }}</p>@enderror
                    </div>

                    {{-- Upload Foto --}}
                    <div class="form-group">
                        <label class="form-label">Foto Perangkat <span class="opt">(opsional)</span></label>
                        <label class="upload-area" id="uploadArea">
                            <input type="file" name="foto" accept="image/*" id="fotoInput" class="d-none">
                            <div id="uploadPlaceholder">
                                <i class="bi bi-cloud-arrow-up fs-2 text-muted"></i>
                                <p class="mb-0 mt-1 text-muted small">Klik untuk upload foto (maks. 500 KB)</p>
                            </div>
                            <div id="uploadPreview" class="d-none">
                                <img id="previewImg" src="" alt="Preview" class="preview-img">
                                <p class="mb-0 mt-2 small text-muted" id="fotoName"></p>
                            </div>
                        </label>
                        @error('foto')<p class="err-msg">{{ $message }}</p>@enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn-submit" id="submitBtn">
                        <i class="bi bi-send-fill me-2"></i>Ajukan Service Sekarang
                    </button>

                </form>
            </div>
        </div>

    </section>

    @include('partials.footer-mobile')
@endsection

@push('styles')
<style>
.service-page { background: #f5f6fa; }

.service-hero {
    background: linear-gradient(135deg, #120263 0%, #2a0a8f 100%);
    padding: 56px 0 48px;
    clip-path: ellipse(120% 100% at 50% 0%);
}
.service-hero-title {
    color: #fff;
    font-size: clamp(1.5rem, 4vw, 2.2rem);
    font-weight: 700;
    margin-bottom: 10px;
}
.service-hero-sub {
    color: rgba(255,255,255,.75);
    font-size: .95rem;
    margin: 0;
}

.service-form-wrap {
    max-width: 720px;
    margin: -32px auto 60px;
}

.service-card {
    background: #fff;
    border-radius: 16px;
    box-shadow: 0 4px 32px rgba(18,2,99,.1);
    padding: 40px;
}
@media(max-width:576px){ .service-card { padding: 24px 18px; } }

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}
@media(max-width:576px){ .form-row { grid-template-columns: 1fr; } }

.form-group { margin-bottom: 20px; }

.form-label {
    display: block;
    font-weight: 600;
    font-size: .875rem;
    color: #1e1e2d;
    margin-bottom: 6px;
}
.req { color: #e03a3a; }
.opt { color: #9ca3af; font-weight: 400; font-size: .8rem; }

.form-input {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid #e2e5ef;
    border-radius: 8px;
    font-size: .9rem;
    color: #1e1e2d;
    background: #fafbff;
    outline: none;
    transition: border-color .2s;
    resize: vertical;
}
.form-input:focus { border-color: #120263; background: #fff; }
.form-input.is-invalid { border-color: #e03a3a; }

.err-msg { color: #e03a3a; font-size: .8rem; margin-top: 4px; margin-bottom: 0; }

.radio-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 10px;
}
@media(max-width:576px){ .radio-grid { grid-template-columns: repeat(2, 1fr); } }

.radio-card { position: relative; cursor: pointer; }
.radio-card input { position: absolute; opacity: 0; width: 0; height: 0; }
.radio-card span {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 10px 8px;
    border: 1.5px solid #e2e5ef;
    border-radius: 8px;
    font-size: .82rem;
    font-weight: 500;
    color: #555;
    background: #fafbff;
    transition: all .2s;
    line-height: 1.3;
    min-height: 48px;
}
.radio-card:hover span,
.radio-card.selected span {
    border-color: #120263;
    background: #eeeafa;
    color: #120263;
}
.radio-card input:checked + span {
    border-color: #120263;
    background: #120263;
    color: #fff;
}

.upload-area {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    border: 2px dashed #d1d5db;
    border-radius: 10px;
    padding: 28px;
    cursor: pointer;
    background: #fafbff;
    transition: border-color .2s;
    min-height: 120px;
}
.upload-area:hover { border-color: #120263; }
.preview-img { max-height: 160px; border-radius: 8px; object-fit: contain; }

.btn-submit {
    width: 100%;
    padding: 14px;
    background: #120263;
    color: #fff;
    border: none;
    border-radius: 10px;
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: background .2s, transform .1s;
    margin-top: 8px;
}
.btn-submit:hover { background: #1e0a99; }
.btn-submit:active { transform: scale(.98); }
.btn-submit:disabled { background: #9ca3af; cursor: not-allowed; }
</style>
@endpush

@push('scripts')
<script>
document.querySelectorAll('.radio-card input').forEach(input => {
    input.addEventListener('change', () => {
        document.querySelectorAll('.radio-card').forEach(c => c.classList.remove('selected'));
        input.closest('.radio-card').classList.add('selected');
    });
});

const fotoInput = document.getElementById('fotoInput');
fotoInput.addEventListener('change', function () {
    const file = this.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = e => {
        document.getElementById('previewImg').src = e.target.result;
        document.getElementById('fotoName').textContent = file.name;
        document.getElementById('uploadPlaceholder').classList.add('d-none');
        document.getElementById('uploadPreview').classList.remove('d-none');
    };
    reader.readAsDataURL(file);
});

document.getElementById('serviceForm').addEventListener('submit', function () {
    const btn = document.getElementById('submitBtn');
    btn.disabled = true;
    btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Mengirim...';
});
</script>
@endpush