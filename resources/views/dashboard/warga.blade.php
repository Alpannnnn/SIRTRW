@extends('layouts.app')
@section('title', 'Dashboard')

@section('actions')
<div style="display:flex;align-items:center;gap:10px;">
    <div style="text-align:right;">
        <div style="font-size:0.82rem;font-weight:600;color:#f1f5f9;">{{ $user->nama_lengkap }}</div>
        <div style="font-size:0.72rem;color:#64748b;">RT {{ $user->rt_id }} · Blok {{ $user->blok_rumah }}</div>
    </div>
    <div style="width:40px;height:40px;border-radius:50%;background:linear-gradient(135deg,#3b82f6,#8b5cf6);display:flex;align-items:center;justify-content:center;font-weight:800;font-size:0.85rem;color:white;">{{ strtoupper(substr($user->nama_lengkap,0,2)) }}</div>
</div>
@endsection

@section('content')

{{-- ═══════════════════════════════════ --}}
{{-- SELAMAT DATANG BANNER               --}}
{{-- ═══════════════════════════════════ --}}
<div style="background:linear-gradient(135deg,rgba(59,130,246,0.12),rgba(139,92,246,0.08));border:1px solid rgba(59,130,246,0.2);border-radius:20px;padding:28px 32px;margin-bottom:28px;display:flex;align-items:center;justify-content:space-between;gap:20px;flex-wrap:wrap;">
    <div>
        <div style="font-size:0.78rem;color:#64748b;margin-bottom:6px;">{{ now()->format('l, d F Y · H:i') }} WIB</div>
        <h2 style="font-size:1.5rem;font-weight:800;color:#f1f5f9;margin-bottom:6px;">
            Selamat datang, <span style="background:linear-gradient(135deg,#60a5fa,#818cf8);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">{{ explode(' ', $user->nama_lengkap)[0] }}</span>! 👋
        </h2>
        <div style="font-size:0.85rem;color:#64748b;">NIK: {{ $user->nik }} · RT {{ $user->rt_id }}/RW {{ $user->rw_id }} · Blok {{ $user->blok_rumah }}</div>
    </div>
    <div style="display:flex;gap:10px;flex-wrap:wrap;">
        <a href="{{ route('surat.create') }}" style="display:inline-flex;align-items:center;gap:8px;background:linear-gradient(135deg,#3b82f6,#2563eb);color:white;padding:10px 18px;border-radius:10px;font-size:0.85rem;font-weight:600;text-decoration:none;box-shadow:0 4px 12px rgba(59,130,246,0.3);">📄 Ajukan Surat</a>
        <a href="{{ route('aduan.create') }}" style="display:inline-flex;align-items:center;gap:8px;background:rgba(244,63,94,0.12);border:1px solid rgba(244,63,94,0.3);color:#f43f5e;padding:10px 18px;border-radius:10px;font-size:0.85rem;font-weight:600;text-decoration:none;">🚩 Buat Aduan</a>
    </div>
</div>

{{-- ═══════════════════════════════════ --}}
{{-- STAT CARDS                          --}}
{{-- ═══════════════════════════════════ --}}
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:24px;">
    <div style="background:var(--color-bg-elevated);border:var(--glass-border);border-top:3px solid #3b82f6;border-radius:16px;padding:22px;display:flex;align-items:center;gap:14px;">
        <div style="width:48px;height:48px;background:rgba(59,130,246,0.15);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;">📄</div>
        <div>
            <div style="font-size:1.8rem;font-weight:800;color:#f1f5f9;line-height:1;">{{ $myStats['surat'] }}</div>
            <div style="font-size:0.78rem;color:#64748b;margin-top:3px;">Total Surat Diajukan</div>
        </div>
    </div>
    <div style="background:var(--color-bg-elevated);border:var(--glass-border);border-top:3px solid #f43f5e;border-radius:16px;padding:22px;display:flex;align-items:center;gap:14px;">
        <div style="width:48px;height:48px;background:rgba(244,63,94,0.15);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;">🚩</div>
        <div>
            <div style="font-size:1.8rem;font-weight:800;color:#f1f5f9;line-height:1;">{{ $myStats['aduan'] }}</div>
            <div style="font-size:0.78rem;color:#64748b;margin-top:3px;">Total Aduan Dikirim</div>
        </div>
    </div>
    <div style="background:var(--color-bg-elevated);border:var(--glass-border);border-top:3px solid #8b5cf6;border-radius:16px;padding:22px;display:flex;align-items:center;gap:14px;">
        <div style="width:48px;height:48px;background:rgba(139,92,246,0.15);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.3rem;flex-shrink:0;">📦</div>
        <div>
            <div style="font-size:1.8rem;font-weight:800;color:#f1f5f9;line-height:1;">{{ $myStats['peminjaman'] }}</div>
            <div style="font-size:0.78rem;color:#64748b;margin-top:3px;">Peminjaman Aktif</div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════════════ --}}
{{-- MAIN GRID                           --}}
{{-- ═══════════════════════════════════ --}}
<div style="display:grid;grid-template-columns:2fr 1fr;gap:20px;margin-bottom:20px;">

    {{-- Pengumuman Terbaru --}}
    <x-card>
        <x-slot name="header">
            <h3>📢 Pengumuman RT/RW</h3>
            <a href="{{ route('pengumuman.index') }}" class="btn btn-sm btn-outline">Lihat Semua</a>
        </x-slot>
        @forelse($recentPengumuman as $p)
        <div style="padding:14px 0;border-bottom:1px solid var(--color-border);{{ $loop->last ? 'border-bottom:none;' : '' }}">
            <div style="display:flex;align-items:flex-start;justify-content:space-between;gap:12px;">
                <div style="flex:1;">
                    <div style="display:flex;align-items:center;gap:8px;margin-bottom:6px;">
                        @if($p->is_urgent)
                            <span style="background:rgba(244,63,94,0.15);color:#f43f5e;font-size:0.68rem;font-weight:700;padding:2px 8px;border-radius:999px;">🚨 URGENT</span>
                        @else
                            <span style="background:rgba(59,130,246,0.12);color:#3b82f6;font-size:0.68rem;font-weight:700;padding:2px 8px;border-radius:999px;">📋 Pengumuman</span>
                        @endif
                        <span style="font-size:0.72rem;color:#475569;">{{ $p->created_at->diffForHumans() }}</span>
                    </div>
                    <div style="font-size:0.9rem;font-weight:600;color:#f1f5f9;margin-bottom:4px;">{{ $p->judul }}</div>
                    <div style="font-size:0.8rem;color:#64748b;line-height:1.6;">{{ Str::limit($p->konten, 120) }}</div>
                </div>
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:32px;color:#475569;">
            <div style="font-size:2.5rem;margin-bottom:10px;">📭</div>
            <p style="font-size:0.85rem;">Belum ada pengumuman.</p>
        </div>
        @endforelse
    </x-card>

    {{-- Agenda Mendatang --}}
    <x-card>
        <x-slot name="header">
            <h3>📅 Agenda Mendatang</h3>
            <a href="{{ route('event.index') }}" class="btn btn-sm btn-outline">Lihat</a>
        </x-slot>
        @forelse($eventMendatang as $e)
        <div style="display:flex;gap:12px;align-items:flex-start;padding:12px 0;border-bottom:1px solid var(--color-border);{{ $loop->last ? 'border-bottom:none;' : '' }}">
            <div style="background:rgba(59,130,246,0.12);border-radius:10px;padding:8px;text-align:center;min-width:46px;flex-shrink:0;">
                <div style="font-weight:800;font-size:1.2rem;color:#3b82f6;line-height:1;">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                <div style="font-size:0.6rem;color:#3b82f6;font-weight:700;text-transform:uppercase;">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</div>
            </div>
            <div>
                <div style="font-size:0.85rem;font-weight:600;color:#f1f5f9;">{{ $e->judul }}</div>
                <div style="font-size:0.72rem;color:#64748b;margin-top:2px;">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('H:i') }} WIB</div>
                @if($e->lokasi)<div style="font-size:0.72rem;color:#64748b;">📍 {{ Str::limit($e->lokasi, 25) }}</div>@endif
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:24px;color:#475569;font-size:0.82rem;">Belum ada agenda mendatang.</div>
        @endforelse
    </x-card>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:20px;">

    {{-- Surat Terbaru --}}
    <x-card>
        <x-slot name="header">
            <h3 style="font-size:0.9rem;">📄 Surat Saya</h3>
            <a href="{{ route('surat.index') }}" class="btn btn-sm btn-outline">Semua</a>
        </x-slot>
        @forelse($mySurat as $s)
        <div style="padding:12px 0;border-bottom:1px solid var(--color-border);{{ $loop->last ? 'border-bottom:none;' : '' }}">
            <div style="display:flex;justify-content:space-between;align-items:flex-start;gap:8px;">
                <div>
                    <div style="font-size:0.82rem;font-weight:600;color:#f1f5f9;">{{ str_replace('_',' ',$s->jenis_surat) }}</div>
                    <div style="font-size:0.72rem;color:#64748b;margin-top:2px;">{{ $s->created_at->format('d M Y') }}</div>
                </div>
                @php
                $sColors = ['DIAJUKAN'=>['#f59e0b','rgba(245,158,11,0.15)'],'DISETUJUI_RT'=>['#06b6d4','rgba(6,182,212,0.15)'],'DISETUJUI_RW'=>['#3b82f6','rgba(59,130,246,0.15)'],'SELESAI'=>['#10b981','rgba(16,185,129,0.15)'],'DITOLAK'=>['#f43f5e','rgba(244,63,94,0.15)']];
                $sc = $sColors[$s->status] ?? ['#64748b','rgba(100,116,139,0.15)'];
                @endphp
                <span style="background:{{ $sc[1] }};color:{{ $sc[0] }};font-size:0.65rem;font-weight:700;padding:2px 8px;border-radius:999px;white-space:nowrap;">{{ str_replace('_',' ',$s->status) }}</span>
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:24px;color:#475569;">
            <p style="font-size:0.8rem;margin-bottom:10px;">Belum ada surat.</p>
            <a href="{{ route('surat.create') }}" style="font-size:0.8rem;color:#3b82f6;">+ Ajukan Surat</a>
        </div>
        @endforelse
    </x-card>

    {{-- Aduan Terbaru --}}
    <x-card>
        <x-slot name="header">
            <h3 style="font-size:0.9rem;">🚩 Aduan Saya</h3>
            <a href="{{ route('aduan.index') }}" class="btn btn-sm btn-outline">Semua</a>
        </x-slot>
        @forelse($myAduan as $a)
        <div style="padding:12px 0;border-bottom:1px solid var(--color-border);{{ $loop->last ? 'border-bottom:none;' : '' }}">
            <div style="font-size:0.82rem;font-weight:600;color:#f1f5f9;margin-bottom:4px;">{{ Str::limit($a->judul, 35) }}</div>
            <div style="display:flex;justify-content:space-between;align-items:center;">
                <span style="font-size:0.7rem;color:#64748b;">{{ $a->created_at->diffForHumans() }}</span>
                @php
                $aColors = ['DITERIMA'=>['#f59e0b','rgba(245,158,11,0.15)'],'DIPROSES'=>['#06b6d4','rgba(6,182,212,0.15)'],'SELESAI'=>['#10b981','rgba(16,185,129,0.15)']];
                $ac = $aColors[$a->status] ?? ['#64748b','rgba(100,116,139,0.15)'];
                @endphp
                <span style="background:{{ $ac[1] }};color:{{ $ac[0] }};font-size:0.65rem;font-weight:700;padding:2px 8px;border-radius:999px;">{{ $a->status }}</span>
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:24px;color:#475569;">
            <p style="font-size:0.8rem;margin-bottom:10px;">Belum ada aduan.</p>
            <a href="{{ route('aduan.create') }}" style="font-size:0.8rem;color:#3b82f6;">+ Buat Aduan</a>
        </div>
        @endforelse
    </x-card>

    {{-- Peminjaman Aktif --}}
    <x-card>
        <x-slot name="header">
            <h3 style="font-size:0.9rem;">📦 Peminjaman Saya</h3>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-sm btn-outline">Semua</a>
        </x-slot>
        @forelse($myPeminjaman as $p)
        <div style="padding:12px 0;border-bottom:1px solid var(--color-border);{{ $loop->last ? 'border-bottom:none;' : '' }}">
            <div style="font-size:0.82rem;font-weight:600;color:#f1f5f9;margin-bottom:4px;">{{ $p->barang->nama_barang }}</div>
            <div style="font-size:0.72rem;color:#64748b;margin-bottom:4px;">{{ $p->jumlah_pinjam }} unit · s/d {{ \Carbon\Carbon::parse($p->tanggal_kembali_rencana)->format('d M') }}</div>
            @php
            $pColors = ['MENUNGGU_PERSETUJUAN'=>['#f59e0b','rgba(245,158,11,0.15)'],'APPROVED'=>['#3b82f6','rgba(59,130,246,0.15)'],'ON_USE'=>['#10b981','rgba(16,185,129,0.15)'],'RETURNED'=>['#64748b','rgba(100,116,139,0.15)'],'REJECTED'=>['#f43f5e','rgba(244,63,94,0.15)']];
            $pc = $pColors[$p->status_peminjaman] ?? ['#64748b','rgba(100,116,139,0.15)'];
            @endphp
            <span style="background:{{ $pc[1] }};color:{{ $pc[0] }};font-size:0.65rem;font-weight:700;padding:2px 8px;border-radius:999px;">{{ str_replace('_',' ',$p->status_peminjaman) }}</span>
        </div>
        @empty
        <div style="text-align:center;padding:24px;color:#475569;">
            <p style="font-size:0.8rem;margin-bottom:10px;">Tidak ada peminjaman aktif.</p>
            <a href="{{ route('peminjaman.create') }}" style="font-size:0.8rem;color:#3b82f6;">+ Pinjam Barang</a>
        </div>
        @endforelse
    </x-card>
</div>

{{-- ═══════════════════════════════════ --}}
{{-- QUICK ACCESS LAYANAN                --}}
{{-- ═══════════════════════════════════ --}}
<div style="margin-top:20px;">
<x-card title="⚡ Akses Layanan">
    <div style="display:grid;grid-template-columns:repeat(6,1fr);gap:12px;">
        @php
        $quickLinks = [
            ['📄','Ajukan Surat',route('surat.create'),'#3b82f6','rgba(59,130,246,0.1)'],
            ['🚩','Buat Aduan',route('aduan.create'),'#f43f5e','rgba(244,63,94,0.1)'],
            ['📦','Pinjam Barang',route('peminjaman.create'),'#8b5cf6','rgba(139,92,246,0.1)'],
            ['💰','Info Kas',route('kas.dashboard'),'#10b981','rgba(16,185,129,0.1)'],
            ['📢','Pengumuman',route('pengumuman.index'),'#f59e0b','rgba(245,158,11,0.1)'],
            ['📋','Inventaris',route('inventaris.katalog'),'#06b6d4','rgba(6,182,212,0.1)'],
        ];
        @endphp
        @foreach($quickLinks as $ql)
        <a href="{{ $ql[2] }}" style="display:flex;flex-direction:column;align-items:center;gap:8px;background:{{ $ql[4] }};border:1px solid {{ $ql[3] }}22;border-radius:14px;padding:18px 10px;text-decoration:none;transition:all 0.25s;text-align:center;" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 10px 25px rgba(0,0,0,0.2)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
            <span style="font-size:1.6rem;">{{ $ql[0] }}</span>
            <span style="font-size:0.75rem;font-weight:600;color:#94a3b8;line-height:1.3;">{{ $ql[1] }}</span>
        </a>
        @endforeach
    </div>
</x-card>
</div>

@endsection
