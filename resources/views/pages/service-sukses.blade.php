@extends('layouts.app')
@section('title', 'Service Berhasil Diajukan - Azzahra Computer')

@section('content')
    @include('partials.header-mobile')

    <section class="sukses-page">
        <div class="container">
            <div class="sukses-card">

                {{-- Icon --}}
                <div class="sukses-icon">
                    <i class="bi bi-check-circle-fill"></i>
                </div>

                {{-- Tiket --}}
                <p class="sukses-label">Nomor Tiket Anda</p>
                <div class="tiket-box">
                    <span class="tiket-number" id="tiketNumber">{{ $tiket }}</span>
                    <button class="copy-btn" onclick="copyTiket()" title="Salin nomor tiket">
                        <i class="bi bi-clipboard" id="copyIcon"></i>
                    </button>
                </div>

                {{-- Pesan --}}
                <h2 class="sukses-title">Permintaan Service Terkirim!</h2>
                <p class="sukses-msg">
                    Terima kasih telah mempercayakan perangkat Anda kepada <strong>Azzahra Computer</strong>.<br>
                    Tim kami akan menghubungi Anda melalui <strong>WhatsApp</strong> maksimal <strong>1×24 jam</strong>.
                </p>

                {{-- Tips --}}
                <div class="tips-box">
                    <p class="tips-title"><i class="bi bi-lightbulb-fill me-2"></i>Tips</p>
                    <ul class="tips-list">
                        <li>Simpan nomor tiket di atas sebagai referensi</li>
                        <li>Pastikan WhatsApp Anda aktif dan bisa dihubungi</li>
                        <li>Siapkan perangkat Anda saat teknisi menghubungi</li>
                    </ul>
                </div>

                {{-- Tombol --}}
                <div class="sukses-actions">
                    <a href="{{ route('service.create') }}" class="btn-secondary-act">
                        <i class="bi bi-plus-circle me-1"></i> Ajukan Service Lain
                    </a>
                    <a href="{{ url('/') }}" class="btn-primary-act">
                        <i class="bi bi-house me-1"></i> Kembali ke Beranda
                    </a>
                </div>

            </div>
        </div>
    </section>

    @include('partials.footer')
@endsection

@push('styles')
<style>
.sukses-page {
    background: #f5f6fa;
    min-height: 80vh;
    display: flex;
    align-items: center;
    padding: 60px 0;
}

.sukses-card {
    max-width: 560px;
    margin: 0 auto;
    background: #fff;
    border-radius: 20px;
    box-shadow: 0 4px 40px rgba(18,2,99,.12);
    padding: 48px 40px;
    text-align: center;
}
@media(max-width:576px){ .sukses-card { padding: 32px 20px; } }

.sukses-icon {
    font-size: 4rem;
    color: #22c55e;
    margin-bottom: 20px;
    animation: popIn .5s cubic-bezier(.175,.885,.32,1.275);
}
@keyframes popIn {
    from { transform: scale(0); opacity: 0; }
    to   { transform: scale(1); opacity: 1; }
}

.sukses-label {
    font-size: .8rem;
    text-transform: uppercase;
    letter-spacing: .1em;
    color: #9ca3af;
    margin-bottom: 8px;
    font-weight: 600;
}

.tiket-box {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #eeeafa;
    border: 2px solid #120263;
    border-radius: 10px;
    padding: 12px 20px;
    margin-bottom: 24px;
}

.tiket-number {
    font-size: 1.4rem;
    font-weight: 800;
    color: #120263;
    letter-spacing: .05em;
    font-family: monospace;
}

.copy-btn {
    background: none;
    border: none;
    color: #120263;
    font-size: 1.1rem;
    cursor: pointer;
    padding: 4px;
    border-radius: 4px;
    transition: background .2s;
}
.copy-btn:hover { background: rgba(18,2,99,.1); }

.sukses-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #1e1e2d;
    margin-bottom: 12px;
}

.sukses-msg {
    color: #6b7280;
    font-size: .93rem;
    line-height: 1.7;
    margin-bottom: 24px;
}

.tips-box {
    background: #fffbeb;
    border: 1px solid #fcd34d;
    border-radius: 10px;
    padding: 16px 20px;
    text-align: left;
    margin-bottom: 32px;
}
.tips-title {
    font-weight: 700;
    color: #92400e;
    font-size: .85rem;
    margin-bottom: 8px;
}
.tips-list {
    margin: 0;
    padding-left: 18px;
    font-size: .83rem;
    color: #78350f;
    line-height: 1.8;
}

.sukses-actions {
    display: flex;
    gap: 12px;
    justify-content: center;
    flex-wrap: wrap;
}

.btn-primary-act {
    display: inline-flex;
    align-items: center;
    padding: 11px 22px;
    background: #120263;
    color: #fff;
    border-radius: 8px;
    font-weight: 600;
    font-size: .88rem;
    text-decoration: none;
    transition: background .2s;
}
.btn-primary-act:hover { background: #1e0a99; color: #fff; }

.btn-secondary-act {
    display: inline-flex;
    align-items: center;
    padding: 11px 22px;
    background: #fff;
    color: #120263;
    border: 2px solid #120263;
    border-radius: 8px;
    font-weight: 600;
    font-size: .88rem;
    text-decoration: none;
    transition: all .2s;
}
.btn-secondary-act:hover { background: #eeeafa; color: #120263; }
</style>
@endpush

@push('scripts')
<script>
function copyTiket() {
    const tiket = document.getElementById('tiketNumber').textContent;
    navigator.clipboard.writeText(tiket).then(() => {
        const icon = document.getElementById('copyIcon');
        icon.className = 'bi bi-clipboard-check';
        setTimeout(() => { icon.className = 'bi bi-clipboard'; }, 2000);
    });
}
</script>
@endpush