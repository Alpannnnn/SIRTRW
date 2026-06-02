@extends('layouts.app')
@section('title', 'Panel Admin')

@section('content')

{{-- ═══════════════════════════ --}}
{{-- ALERT NOTIFIKASI URGENT    --}}
{{-- ═══════════════════════════ --}}
@if($stats['pending_verifikasi'] > 0 || $stats['surat_menunggu'] > 0 || $stats['peminjaman_pending'] > 0)
<div class="alert-banner">
    <div class="alert-banner-icon">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
    </div>
    <div class="alert-banner-body">
        <div class="alert-banner-title">Ada item yang membutuhkan tindakan Anda</div>
        <div class="alert-banner-items">
            @if($stats['pending_verifikasi'] > 0)
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width:14px;height:14px;"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                <strong>{{ $stats['pending_verifikasi'] }}</strong> warga menunggu verifikasi
            </span>
            @endif
            @if($stats['surat_menunggu'] > 0)
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width:14px;height:14px;"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                <strong>{{ $stats['surat_menunggu'] }}</strong> surat menunggu persetujuan
            </span>
            @endif
            @if($stats['peminjaman_pending'] > 0)
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width:14px;height:14px;"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
                <strong>{{ $stats['peminjaman_pending'] }}</strong> peminjaman menunggu
            </span>
            @endif
        </div>
    </div>
    <a href="{{ route('verifikasi.index') }}" class="alert-banner-btn">Tindak Lanjut</a>
</div>
@endif

{{-- ═══════════════════════════ --}}
{{-- STAT CARDS ROW 1           --}}
{{-- ═══════════════════════════ --}}
<div class="stat-row">
    <div class="stat-card" style="--accent:#3b82f6;">
        <div class="stat-icon" style="background:rgba(59,130,246,0.15);color:#3b82f6;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $stats['total_warga'] }}</div>
            <div class="stat-label">Warga Aktif</div>
            @if($stats['pending_verifikasi'] > 0)
            <a href="{{ route('verifikasi.index') }}" class="stat-sub-link">+{{ $stats['pending_verifikasi'] }} menunggu verifikasi</a>
            @endif
        </div>
    </div>

    <div class="stat-card" style="--accent:#f59e0b;">
        <div class="stat-icon" style="background:rgba(245,158,11,0.15);color:#f59e0b;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $stats['surat_menunggu'] }}</div>
            <div class="stat-label">Surat Perlu Disetujui</div>
            <a href="{{ route('surat.index') }}" class="stat-sub-link">Lihat semua surat</a>
        </div>
    </div>

    <div class="stat-card" style="--accent:#ef4444;">
        <div class="stat-icon" style="background:rgba(239,68,68,0.15);color:#ef4444;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $stats['aduan_aktif'] }}</div>
            <div class="stat-label">Aduan Aktif</div>
            <a href="{{ route('aduan.index') }}" class="stat-sub-link">Lihat semua aduan</a>
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- STAT CARDS ROW 2           --}}
{{-- ═══════════════════════════ --}}
<div class="stat-row" style="margin-top:0;">
    <div class="stat-card" style="--accent:#10b981;">
        <div class="stat-icon" style="background:rgba(16,185,129,0.15);color:#10b981;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3"/></svg>
        </div>
        <div class="stat-info">
            <div class="stat-value" style="font-size:1.4rem;">Rp {{ number_format($keuangan['saldo'],0,',','.') }}</div>
            <div class="stat-label">Saldo Kas</div>
            <div style="display:flex;gap:12px;margin-top:6px;">
                <span style="font-size:0.75rem;color:#10b981;">&#x25B2; Rp {{ number_format($keuangan['pemasukan'],0,',','.') }}</span>
                <span style="font-size:0.75rem;color:#ef4444;">&#x25BC; Rp {{ number_format($keuangan['pengeluaran'],0,',','.') }}</span>
            </div>
        </div>
    </div>

    <div class="stat-card" style="--accent:#8b5cf6;">
        <div class="stat-icon" style="background:rgba(139,92,246,0.15);color:#8b5cf6;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/></svg>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $stats['peminjaman_pending'] }}</div>
            <div class="stat-label">Peminjaman Pending</div>
            <a href="{{ route('peminjaman.index') }}" class="stat-sub-link">Kelola peminjaman</a>
        </div>
    </div>

    <div class="stat-card" style="--accent:#06b6d4;">
        <div class="stat-icon" style="background:rgba(6,182,212,0.15);color:#06b6d4;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $stats['barang_tersedia'] }}</div>
            <div class="stat-label">Inventaris Tersedia</div>
            <a href="{{ route('inventaris.katalog') }}" class="stat-sub-link">Lihat katalog barang</a>
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- GRAFIK                     --}}
{{-- ═══════════════════════════ --}}
<div class="content-grid-2" style="margin-bottom:24px;">
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#10b981;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z"/></svg>
            </div>
            <h3 class="panel-title">Grafik Kas 6 Bulan Terakhir</h3>
        </div>
        <div class="panel-body" style="padding-top:8px;">
            <canvas id="adminKasChart" height="220"></canvas>
        </div>
    </div>

    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#8b5cf6;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z"/></svg>
            </div>
            <h3 class="panel-title">Distribusi Aduan per Kategori</h3>
        </div>
        <div class="panel-body" style="padding-top:8px;">
            <canvas id="aduanChart" height="220"></canvas>
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- TINDAKAN & DATA            --}}
{{-- ═══════════════════════════ --}}
<div class="content-grid-2" style="margin-bottom:24px;">

    {{-- Warga Pending Verifikasi --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#f59e0b;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/></svg>
            </div>
            <h3 class="panel-title">Verifikasi Warga</h3>
            <a href="{{ route('verifikasi.index') }}" class="panel-link">Kelola Semua</a>
        </div>
        <div class="panel-body">
            @forelse($pendingWarga as $w)
            <div class="admin-row">
                <div class="admin-avatar">{{ strtoupper(substr($w->nama_lengkap,0,2)) }}</div>
                <div class="admin-row-info">
                    <div class="admin-row-name">{{ $w->nama_lengkap }}</div>
                    <div class="admin-row-meta">NIK: {{ $w->nik }} · RT {{ $w->rt_id }}</div>
                </div>
                <div class="admin-row-actions">
                    <form method="POST" action="{{ route('verifikasi.approve', $w) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-approve" title="Setujui">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                            Setujui
                        </button>
                    </form>
                    <form method="POST" action="{{ route('verifikasi.suspend', $w) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-reject" title="Tolak">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
                            Tolak
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                <p>Semua warga sudah terverifikasi.</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Surat Terbaru --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#3b82f6;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
            </div>
            <h3 class="panel-title">Surat Perlu Ditindak</h3>
            <a href="{{ route('surat.index') }}" class="panel-link">Lihat Semua</a>
        </div>
        <div class="panel-body">
            @forelse($suratTerbaru as $s)
            <div class="admin-row">
                <div class="admin-row-info" style="flex:1;">
                    <div class="admin-row-name">{{ $s->pemohon->nama_lengkap }}</div>
                    <div class="admin-row-meta">
                        <span class="badge-type">{{ str_replace('_',' ',$s->jenis_surat) }}</span>
                        · {{ $s->created_at->diffForHumans() }}
                    </div>
                </div>
                <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
                    <span class="status-badge" style="background:{{ $s->status==='DIAJUKAN' ? 'rgba(245,158,11,0.15)' : 'rgba(6,182,212,0.15)' }};color:{{ $s->status==='DIAJUKAN' ? '#f59e0b' : '#06b6d4' }};">
                        {{ str_replace('_',' ',$s->status) }}
                    </span>
                    <a href="{{ route('surat.show', $s) }}" class="link-review">Review</a>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                <p>Tidak ada surat yang menunggu.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<div class="content-grid-2" style="margin-bottom:24px;">

    {{-- Aduan Aktif --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#ef4444;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
            </div>
            <h3 class="panel-title">Aduan Aktif Warga</h3>
            <a href="{{ route('aduan.index') }}" class="panel-link">Lihat Semua</a>
        </div>
        <div class="panel-body">
            @forelse($aduanTerbaru as $a)
            @php $kMap=['KEAMANAN'=>['#ef4444','rgba(239,68,68,0.15)'],'FASILITAS'=>['#f59e0b','rgba(245,158,11,0.15)'],'KEBERSIHAN'=>['#06b6d4','rgba(6,182,212,0.15)'],'PERSELISIHAN'=>['#8b5cf6','rgba(139,92,246,0.15)']]; $kc=$kMap[$a->kategori]??['#64748b','rgba(100,116,139,0.15)']; @endphp
            <div class="admin-row">
                <div class="admin-row-info" style="flex:1;">
                    <div class="admin-row-name">{{ Str::limit($a->judul, 40) }}</div>
                    <div class="admin-row-meta">{{ $a->pelapor->nama_lengkap }} · {{ $a->created_at->diffForHumans() }}</div>
                </div>
                <div style="display:flex;align-items:center;gap:10px;flex-shrink:0;">
                    <span class="status-badge" style="background:{{ $kc[1] }};color:{{ $kc[0] }};">{{ $a->kategori }}</span>
                    <a href="{{ route('aduan.show', $a) }}" class="link-review">Tinjau</a>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                <p>Tidak ada aduan aktif saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Peminjaman Pending --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#8b5cf6;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
            </div>
            <h3 class="panel-title">Peminjaman Menunggu</h3>
            <a href="{{ route('peminjaman.index') }}" class="panel-link">Kelola Semua</a>
        </div>
        <div class="panel-body">
            @forelse($peminjamanPending as $p)
            <div class="admin-row">
                <div class="admin-row-info" style="flex:1;">
                    <div class="admin-row-name">{{ $p->barang->nama_barang }}</div>
                    <div class="admin-row-meta">{{ $p->warga->nama_lengkap }} · {{ $p->jumlah_pinjam }} unit · {{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M') }}</div>
                </div>
                <div class="admin-row-actions">
                    <form method="POST" action="{{ route('peminjaman.approve', $p) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-approve" title="Setujui">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                            Setujui
                        </button>
                    </form>
                    <form method="POST" action="{{ route('peminjaman.reject', $p) }}" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn-reject" title="Tolak">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/></svg>
                            Tolak
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                <p>Tidak ada peminjaman yang menunggu.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- AKSI CEPAT + EVENT         --}}
{{-- ═══════════════════════════ --}}
<div class="content-grid-2">

    {{-- Quick Actions --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#dc2626;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 13.5l10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75z"/></svg>
            </div>
            <h3 class="panel-title">Aksi Cepat</h3>
        </div>
        <div class="panel-body">
            <div class="quick-actions-grid">
                <a href="{{ route('pengumuman.create') }}" class="quick-action-btn" style="--qa-color:#dc2626;--qa-bg:rgba(220,38,38,0.1);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/></svg>
                    <span>Buat Pengumuman</span>
                </a>
                <a href="{{ route('kas.create') }}" class="quick-action-btn" style="--qa-color:#10b981;--qa-bg:rgba(16,185,129,0.1);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3"/></svg>
                    <span>Catat Transaksi Kas</span>
                </a>
                <a href="{{ route('event.create') }}" class="quick-action-btn" style="--qa-color:#8b5cf6;--qa-bg:rgba(139,92,246,0.1);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                    <span>Tambah Event</span>
                </a>
                <a href="{{ route('inventaris.create') }}" class="quick-action-btn" style="--qa-color:#06b6d4;--qa-bg:rgba(6,182,212,0.1);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
                    <span>Tambah Barang</span>
                </a>
                <a href="{{ route('verifikasi.index') }}" class="quick-action-btn" style="--qa-color:#f59e0b;--qa-bg:rgba(245,158,11,0.1);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/></svg>
                    <span>Verifikasi Warga</span>
                </a>
                <a href="{{ route('kependudukan.index') }}" class="quick-action-btn" style="--qa-color:#3b82f6;--qa-bg:rgba(59,130,246,0.1);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                    <span>Data Kependudukan</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Event Mendatang --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#06b6d4;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
            </div>
            <h3 class="panel-title">Event Mendatang</h3>
            <a href="{{ route('event.create') }}" class="panel-link">+ Event</a>
        </div>
        <div class="panel-body">
            @forelse($eventMendatang as $e)
            <div class="event-item">
                <div class="event-date-badge">
                    <span class="event-day">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</span>
                    <span class="event-month">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</span>
                </div>
                <div class="event-info">
                    <div class="event-title">{{ $e->judul }}</div>
                    <div class="event-meta">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width:14px;height:14px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('H:i') }} WIB
                        @if($e->lokasi)
                            &nbsp;·&nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width:14px;height:14px;"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                            {{ Str::limit($e->lokasi, 22) }}
                        @endif
                    </div>
                    <div style="font-size:0.75rem;color:#f59e0b;margin-top:2px;">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->diffForHumans() }}</div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                <p>Belum ada event mendatang.</p>
                <a href="{{ route('event.create') }}" class="empty-action">Tambah Event</a>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Kas Chart
new Chart(document.getElementById('adminKasChart').getContext('2d'), {
    type: 'bar',
    data: {
        labels: @json(collect($chartKas)->pluck('label')),
        datasets: [
            { label: 'Pemasukan', data: @json(collect($chartKas)->pluck('pemasukan')), backgroundColor: 'rgba(16,185,129,0.65)', borderColor: '#10b981', borderWidth: 1, borderRadius: 6 },
            { label: 'Pengeluaran', data: @json(collect($chartKas)->pluck('pengeluaran')), backgroundColor: 'rgba(239,68,68,0.65)', borderColor: '#ef4444', borderWidth: 1, borderRadius: 6 }
        ]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        plugins: { legend: { labels: { color: '#94a3b8', font: { family: 'Inter', size: 12 } } } },
        scales: {
            x: { ticks: { color: '#64748b', font: { size: 12 } }, grid: { color: 'rgba(148,163,184,0.08)' } },
            y: { ticks: { color: '#64748b', font: { size: 12 }, callback: v => 'Rp '+(v/1000)+'k' }, grid: { color: 'rgba(148,163,184,0.08)' } }
        }
    }
});

// Aduan Doughnut
const aduanData = @json($aduanByKategori);
new Chart(document.getElementById('aduanChart').getContext('2d'), {
    type: 'doughnut',
    data: {
        labels: Object.keys(aduanData),
        datasets: [{
            data: Object.values(aduanData),
            backgroundColor: ['rgba(239,68,68,0.8)','rgba(245,158,11,0.8)','rgba(6,182,212,0.8)','rgba(139,92,246,0.8)'],
            borderColor: '#1e293b', borderWidth: 3, hoverOffset: 8
        }]
    },
    options: {
        responsive: true, maintainAspectRatio: false, cutout: '62%',
        plugins: {
            legend: { position: 'right', labels: { color: '#94a3b8', font: { family: 'Inter', size: 12 }, padding: 16 } }
        }
    }
});
</script>
@endpush
