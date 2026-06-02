@extends('layouts.app')
@section('title', 'Beranda')

@section('content')

{{-- ═══════════════════════════ --}}
{{-- GREETING BANNER            --}}
{{-- ═══════════════════════════ --}}
<div class="greeting-banner">
    <div class="greeting-left">
        <div class="greeting-date">{{ now()->translatedFormat('l, d F Y') }}</div>
        <h2 class="greeting-title">
            Selamat datang,
            <span class="greeting-name">{{ explode(' ', $user->nama_lengkap)[0] }}</span>
        </h2>
        <div class="greeting-meta">
            NIK: {{ $user->nik }} &nbsp;·&nbsp; RT {{ $user->rt_id }}/RW {{ $user->rw_id }} &nbsp;·&nbsp; Blok {{ $user->blok_rumah }}
        </div>
    </div>
    <div class="greeting-actions">
        <a href="{{ route('surat.create') }}" class="btn-action btn-action-primary">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
            Ajukan Surat
        </a>
        <a href="{{ route('aduan.create') }}" class="btn-action btn-action-danger">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
            Buat Aduan
        </a>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- STAT CARDS (3 kolom)       --}}
{{-- ═══════════════════════════ --}}
<div class="stat-row">
    <div class="stat-card" style="--accent:#3b82f6;">
        <div class="stat-icon" style="background:rgba(59,130,246,0.15);color:#3b82f6;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $myStats['surat'] }}</div>
            <div class="stat-label">Surat Diajukan</div>
        </div>
    </div>

    <div class="stat-card" style="--accent:#ef4444;">
        <div class="stat-icon" style="background:rgba(239,68,68,0.15);color:#ef4444;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $myStats['aduan'] }}</div>
            <div class="stat-label">Aduan Dikirim</div>
        </div>
    </div>

    <div class="stat-card" style="--accent:#8b5cf6;">
        <div class="stat-icon" style="background:rgba(139,92,246,0.15);color:#8b5cf6;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
        </div>
        <div class="stat-info">
            <div class="stat-value">{{ $myStats['peminjaman'] }}</div>
            <div class="stat-label">Peminjaman Aktif</div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- LAYANAN CEPAT              --}}
{{-- ═══════════════════════════ --}}
<div class="section-title-row">
    <h3 class="section-title">Layanan Warga</h3>
</div>
<div class="service-grid">

    <a href="{{ route('surat.create') }}" class="service-card">
        <div class="service-icon" style="background:rgba(59,130,246,0.12);color:#3b82f6;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
        </div>
        <div class="service-label">Ajukan Surat</div>
        <div class="service-desc">Surat Domisili, KTP, SKTM</div>
    </a>

    <a href="{{ route('aduan.create') }}" class="service-card">
        <div class="service-icon" style="background:rgba(239,68,68,0.12);color:#ef4444;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
        </div>
        <div class="service-label">Buat Aduan</div>
        <div class="service-desc">Laporkan masalah lingkungan</div>
    </a>

    <a href="{{ route('peminjaman.create') }}" class="service-card">
        <div class="service-icon" style="background:rgba(139,92,246,0.12);color:#8b5cf6;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
        </div>
        <div class="service-label">Pinjam Barang</div>
        <div class="service-desc">Inventaris milik warga RT/RW</div>
    </a>

    <a href="{{ route('kas.dashboard') }}" class="service-card">
        <div class="service-icon" style="background:rgba(16,185,129,0.12);color:#10b981;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3"/></svg>
        </div>
        <div class="service-label">Info Kas</div>
        <div class="service-desc">Laporan keuangan RT/RW</div>
    </a>

    <a href="{{ route('pengumuman.index') }}" class="service-card">
        <div class="service-icon" style="background:rgba(245,158,11,0.12);color:#f59e0b;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/></svg>
        </div>
        <div class="service-label">Pengumuman</div>
        <div class="service-desc">Info dan pemberitahuan</div>
    </a>

    <a href="{{ route('event.index') }}" class="service-card">
        <div class="service-icon" style="background:rgba(6,182,212,0.12);color:#06b6d4;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
        </div>
        <div class="service-label">Agenda Kegiatan</div>
        <div class="service-desc">Jadwal acara lingkungan</div>
    </a>
</div>

{{-- ═══════════════════════════ --}}
{{-- KONTEN UTAMA: 2 KOLOM      --}}
{{-- ═══════════════════════════ --}}
<div class="content-grid-2">

    {{-- Pengumuman Terbaru --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#f59e0b;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/></svg>
            </div>
            <h3 class="panel-title">Pengumuman RT/RW</h3>
            <a href="{{ route('pengumuman.index') }}" class="panel-link">Lihat Semua</a>
        </div>
        <div class="panel-body">
            @forelse($recentPengumuman as $p)
            <div class="list-item">
                @if($p->is_urgent)
                    <span class="badge-urgent">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:12px;height:12px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                        PENTING
                    </span>
                @else
                    <span class="badge-info">Pengumuman</span>
                @endif
                <div class="list-item-title">{{ $p->judul }}</div>
                <div class="list-item-desc">{{ Str::limit($p->konten, 100) }}</div>
                <div class="list-item-time">{{ $p->created_at->diffForHumans() }}</div>
            </div>
            @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z"/></svg>
                <p>Belum ada pengumuman saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Agenda Mendatang --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#06b6d4;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
            </div>
            <h3 class="panel-title">Agenda Mendatang</h3>
            <a href="{{ route('event.index') }}" class="panel-link">Lihat Semua</a>
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
                            {{ Str::limit($e->lokasi, 25) }}
                        @endif
                    </div>
                </div>
            </div>
            @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                <p>Belum ada agenda mendatang.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- STATUS PENGAJUAN SAYA      --}}
{{-- ═══════════════════════════ --}}
<div class="content-grid-3">

    {{-- Surat Saya --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#3b82f6;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
            </div>
            <h3 class="panel-title">Surat Saya</h3>
            <a href="{{ route('surat.index') }}" class="panel-link">Semua</a>
        </div>
        <div class="panel-body">
            @forelse($mySurat as $s)
            @php
            $sColors = ['DIAJUKAN'=>['#f59e0b','rgba(245,158,11,0.15)'],'DISETUJUI_RT'=>['#06b6d4','rgba(6,182,212,0.15)'],'DISETUJUI_RW'=>['#3b82f6','rgba(59,130,246,0.15)'],'SELESAI'=>['#10b981','rgba(16,185,129,0.15)'],'DITOLAK'=>['#ef4444','rgba(239,68,68,0.15)']];
            $sc = $sColors[$s->status] ?? ['#64748b','rgba(100,116,139,0.15)'];
            @endphp
            <div class="status-item">
                <div class="status-item-left">
                    <div class="status-item-title">{{ str_replace('_',' ',$s->jenis_surat) }}</div>
                    <div class="status-item-date">{{ $s->created_at->format('d M Y') }}</div>
                </div>
                <span class="status-badge" style="background:{{ $sc[1] }};color:{{ $sc[0] }};">{{ str_replace('_',' ',$s->status) }}</span>
            </div>
            @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                <p>Belum ada surat.</p>
                <a href="{{ route('surat.create') }}" class="empty-action">Ajukan Surat</a>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Aduan Saya --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#ef4444;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
            </div>
            <h3 class="panel-title">Aduan Saya</h3>
            <a href="{{ route('aduan.index') }}" class="panel-link">Semua</a>
        </div>
        <div class="panel-body">
            @forelse($myAduan as $a)
            @php
            $aColors = ['DITERIMA'=>['#f59e0b','rgba(245,158,11,0.15)'],'DIPROSES'=>['#06b6d4','rgba(6,182,212,0.15)'],'SELESAI'=>['#10b981','rgba(16,185,129,0.15)']];
            $ac = $aColors[$a->status] ?? ['#64748b','rgba(100,116,139,0.15)'];
            @endphp
            <div class="status-item">
                <div class="status-item-left">
                    <div class="status-item-title">{{ Str::limit($a->judul, 32) }}</div>
                    <div class="status-item-date">{{ $a->created_at->diffForHumans() }}</div>
                </div>
                <span class="status-badge" style="background:{{ $ac[1] }};color:{{ $ac[0] }};">{{ $a->status }}</span>
            </div>
            @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5"/></svg>
                <p>Belum ada aduan.</p>
                <a href="{{ route('aduan.create') }}" class="empty-action">Buat Aduan</a>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Peminjaman Saya --}}
    <div class="info-panel">
        <div class="panel-header">
            <div class="panel-header-icon" style="color:#8b5cf6;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
            </div>
            <h3 class="panel-title">Peminjaman Saya</h3>
            <a href="{{ route('peminjaman.index') }}" class="panel-link">Semua</a>
        </div>
        <div class="panel-body">
            @forelse($myPeminjaman as $p)
            @php
            $pColors = ['MENUNGGU_PERSETUJUAN'=>['#f59e0b','rgba(245,158,11,0.15)'],'APPROVED'=>['#3b82f6','rgba(59,130,246,0.15)'],'ON_USE'=>['#10b981','rgba(16,185,129,0.15)'],'RETURNED'=>['#64748b','rgba(100,116,139,0.15)'],'REJECTED'=>['#ef4444','rgba(239,68,68,0.15)']];
            $pc = $pColors[$p->status_peminjaman] ?? ['#64748b','rgba(100,116,139,0.15)'];
            @endphp
            <div class="status-item">
                <div class="status-item-left">
                    <div class="status-item-title">{{ $p->barang->nama_barang }}</div>
                    <div class="status-item-date">{{ $p->jumlah_pinjam }} unit · s/d {{ \Carbon\Carbon::parse($p->tanggal_kembali_rencana)->format('d M') }}</div>
                </div>
                <span class="status-badge" style="background:{{ $pc[1] }};color:{{ $pc[0] }};">{{ str_replace('_',' ',$p->status_peminjaman) }}</span>
            </div>
            @empty
            <div class="empty-state">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
                <p>Tidak ada peminjaman aktif.</p>
                <a href="{{ route('peminjaman.create') }}" class="empty-action">Pinjam Barang</a>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
