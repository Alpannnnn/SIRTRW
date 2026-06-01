@extends('layouts.app')
@section('title', 'Panel Admin — Dashboard Pengurus')

@section('actions')
    <div style="display:flex;gap:8px;align-items:center;">
        <span style="font-size:0.75rem;background:rgba(16,185,129,0.15);color:#10b981;padding:4px 12px;border-radius:999px;border:1px solid rgba(16,185,129,0.3);">● Sistem Online</span>
        <span style="font-size:0.75rem;color:#64748b;">{{ now()->format('l, d F Y · H:i') }} WIB</span>
    </div>
@endsection

@section('content')

{{-- ═══════════════════════════════════ --}}
{{-- ALERT NOTIFIKASI URGENT             --}}
{{-- ═══════════════════════════════════ --}}
@if($stats['pending_verifikasi'] > 0 || $stats['surat_menunggu'] > 0 || $stats['peminjaman_pending'] > 0)
<div style="background:rgba(245,158,11,0.08);border:1px solid rgba(245,158,11,0.25);border-left:4px solid #f59e0b;border-radius:12px;padding:16px 20px;margin-bottom:28px;display:flex;align-items:center;gap:12px;flex-wrap:wrap;">
    <span style="font-size:1.2rem;">⚠️</span>
    <div style="flex:1;">
        <div style="font-weight:700;font-size:0.9rem;color:#fbbf24;margin-bottom:4px;">Ada item yang membutuhkan tindakan Anda</div>
        <div style="font-size:0.82rem;color:#64748b;display:flex;gap:16px;flex-wrap:wrap;">
            @if($stats['pending_verifikasi'] > 0)<span>👤 <strong style="color:#fbbf24;">{{ $stats['pending_verifikasi'] }}</strong> warga menunggu verifikasi</span>@endif
            @if($stats['surat_menunggu'] > 0)<span>📄 <strong style="color:#fbbf24;">{{ $stats['surat_menunggu'] }}</strong> surat menunggu persetujuan</span>@endif
            @if($stats['peminjaman_pending'] > 0)<span>📦 <strong style="color:#fbbf24;">{{ $stats['peminjaman_pending'] }}</strong> peminjaman menunggu</span>@endif
        </div>
    </div>
    <a href="{{ route('verifikasi.index') }}" class="btn btn-warning btn-sm">Tindak Lanjut</a>
</div>
@endif

{{-- ═══════════════════════════════════ --}}
{{-- STAT CARDS ROW 1                   --}}
{{-- ═══════════════════════════════════ --}}
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:20px;">

    <div style="background:var(--color-bg-elevated);border:var(--glass-border);border-top:3px solid #3b82f6;border-radius:16px;padding:24px;display:flex;align-items:flex-start;gap:16px;transition:all 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='none'">
        <div style="width:52px;height:52px;background:rgba(59,130,246,0.15);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;flex-shrink:0;">👥</div>
        <div>
            <div style="font-size:2rem;font-weight:800;color:#f1f5f9;line-height:1;">{{ $stats['total_warga'] }}</div>
            <div style="font-size:0.8rem;color:#64748b;margin-top:4px;">Warga Aktif</div>
            @if($stats['pending_verifikasi'] > 0)
            <a href="{{ route('verifikasi.index') }}" style="font-size:0.72rem;color:#f59e0b;text-decoration:none;margin-top:6px;display:block;">+{{ $stats['pending_verifikasi'] }} menunggu verifikasi →</a>
            @endif
        </div>
    </div>

    <div style="background:var(--color-bg-elevated);border:var(--glass-border);border-top:3px solid #f59e0b;border-radius:16px;padding:24px;display:flex;align-items:flex-start;gap:16px;transition:all 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='none'">
        <div style="width:52px;height:52px;background:rgba(245,158,11,0.15);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;flex-shrink:0;">📄</div>
        <div>
            <div style="font-size:2rem;font-weight:800;color:#f1f5f9;line-height:1;">{{ $stats['surat_menunggu'] }}</div>
            <div style="font-size:0.8rem;color:#64748b;margin-top:4px;">Surat Perlu Disetujui</div>
            <a href="{{ route('surat.index') }}" style="font-size:0.72rem;color:#3b82f6;text-decoration:none;margin-top:6px;display:block;">Lihat semua →</a>
        </div>
    </div>

    <div style="background:var(--color-bg-elevated);border:var(--glass-border);border-top:3px solid #f43f5e;border-radius:16px;padding:24px;display:flex;align-items:flex-start;gap:16px;transition:all 0.3s;" onmouseover="this.style.transform='translateY(-3px)'" onmouseout="this.style.transform='none'">
        <div style="width:52px;height:52px;background:rgba(244,63,94,0.15);border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.4rem;flex-shrink:0;">🚩</div>
        <div>
            <div style="font-size:2rem;font-weight:800;color:#f1f5f9;line-height:1;">{{ $stats['aduan_aktif'] }}</div>
            <div style="font-size:0.8rem;color:#64748b;margin-top:4px;">Aduan Aktif</div>
            <a href="{{ route('aduan.index') }}" style="font-size:0.72rem;color:#3b82f6;text-decoration:none;margin-top:6px;display:block;">Lihat semua →</a>
        </div>
    </div>
</div>

{{-- STAT CARDS ROW 2: Keuangan + Inventaris --}}
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;margin-bottom:28px;">
    <div style="background:var(--color-bg-elevated);border:var(--glass-border);border-top:3px solid #10b981;border-radius:16px;padding:24px;">
        <div style="font-size:0.75rem;color:#64748b;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">💰 Saldo Kas</div>
        <div style="font-size:1.6rem;font-weight:800;color:{{ $keuangan['saldo'] >= 0 ? '#10b981' : '#f43f5e' }};">Rp {{ number_format($keuangan['saldo'],0,',','.') }}</div>
        <div style="display:flex;gap:12px;margin-top:10px;font-size:0.75rem;">
            <span style="color:#10b981;">▲ Rp {{ number_format($keuangan['pemasukan'],0,',','.') }}</span>
            <span style="color:#f43f5e;">▼ Rp {{ number_format($keuangan['pengeluaran'],0,',','.') }}</span>
        </div>
        <a href="{{ route('kas.dashboard') }}" style="font-size:0.72rem;color:#3b82f6;text-decoration:none;margin-top:8px;display:block;">Detail kas →</a>
    </div>

    <div style="background:var(--color-bg-elevated);border:var(--glass-border);border-top:3px solid #8b5cf6;border-radius:16px;padding:24px;">
        <div style="font-size:0.75rem;color:#64748b;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">📦 Peminjaman Pending</div>
        <div style="font-size:2rem;font-weight:800;color:#f1f5f9;line-height:1;">{{ $stats['peminjaman_pending'] }}</div>
        <div style="font-size:0.8rem;color:#64748b;margin-top:4px;">menunggu persetujuan</div>
        <a href="{{ route('peminjaman.index') }}" style="font-size:0.72rem;color:#3b82f6;text-decoration:none;margin-top:8px;display:block;">Kelola peminjaman →</a>
    </div>

    <div style="background:var(--color-bg-elevated);border:var(--glass-border);border-top:3px solid #06b6d4;border-radius:16px;padding:24px;">
        <div style="font-size:0.75rem;color:#64748b;font-weight:600;text-transform:uppercase;letter-spacing:0.05em;margin-bottom:8px;">📋 Inventaris Tersedia</div>
        <div style="font-size:2rem;font-weight:800;color:#f1f5f9;line-height:1;">{{ $stats['barang_tersedia'] }}</div>
        <div style="font-size:0.8rem;color:#64748b;margin-top:4px;">jenis barang siap dipinjam</div>
        <a href="{{ route('inventaris.katalog') }}" style="font-size:0.72rem;color:#3b82f6;text-decoration:none;margin-top:8px;display:block;">Lihat katalog →</a>
    </div>
</div>

{{-- ═══════════════════════════════════ --}}
{{-- MAIN CONTENT GRID                  --}}
{{-- ═══════════════════════════════════ --}}
<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px;">

    {{-- Grafik Kas --}}
    <x-card title="📊 Grafik Kas 6 Bulan Terakhir">
        <canvas id="adminKasChart" height="200"></canvas>
    </x-card>

    {{-- Distribusi Aduan --}}
    <x-card title="📈 Distribusi Aduan per Kategori">
        <canvas id="aduanChart" height="200"></canvas>
    </x-card>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px;">

    {{-- Warga Pending Verifikasi --}}
    <x-card>
        <x-slot name="header">
            <h3 style="font-size:0.95rem;font-weight:700;">👤 Warga Menunggu Verifikasi</h3>
            <a href="{{ route('verifikasi.index') }}" class="btn btn-sm btn-outline">Kelola Semua</a>
        </x-slot>
        @forelse($pendingWarga as $w)
        <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--color-border);">
            <div style="display:flex;align-items:center;gap:10px;">
                <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,#f59e0b,#d97706);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.7rem;color:white;flex-shrink:0;">{{ strtoupper(substr($w->nama_lengkap,0,2)) }}</div>
                <div>
                    <div style="font-size:0.85rem;font-weight:600;color:#f1f5f9;">{{ $w->nama_lengkap }}</div>
                    <div style="font-size:0.72rem;color:#64748b;">NIK: {{ $w->nik }} · RT {{ $w->rt_id }}</div>
                </div>
            </div>
            <div style="display:flex;gap:6px;">
                <form method="POST" action="{{ route('verifikasi.approve', $w) }}">
                    @csrf<button type="submit" style="background:rgba(16,185,129,0.15);color:#10b981;border:1px solid rgba(16,185,129,0.3);border-radius:8px;padding:4px 10px;font-size:0.72rem;font-weight:600;cursor:pointer;">✓ Setujui</button>
                </form>
                <form method="POST" action="{{ route('verifikasi.suspend', $w) }}">
                    @csrf<button type="submit" style="background:rgba(244,63,94,0.12);color:#f43f5e;border:1px solid rgba(244,63,94,0.25);border-radius:8px;padding:4px 10px;font-size:0.72rem;font-weight:600;cursor:pointer;">✕ Tolak</button>
                </form>
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:32px;color:#475569;font-size:0.85rem;">
            ✅ Semua akun warga sudah terverifikasi
        </div>
        @endforelse
    </x-card>

    {{-- Surat Terbaru --}}
    <x-card>
        <x-slot name="header">
            <h3 style="font-size:0.95rem;font-weight:700;">📄 Surat Perlu Ditindak</h3>
            <a href="{{ route('surat.index') }}" class="btn btn-sm btn-outline">Lihat Semua</a>
        </x-slot>
        @forelse($suratTerbaru as $s)
        <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--color-border);">
            <div>
                <div style="font-size:0.85rem;font-weight:600;color:#f1f5f9;">{{ $s->pemohon->nama_lengkap }}</div>
                <div style="font-size:0.72rem;color:#64748b;margin-top:2px;">
                    <span style="background:rgba(59,130,246,0.15);color:#3b82f6;padding:1px 8px;border-radius:999px;font-weight:600;">{{ str_replace('_',' ',$s->jenis_surat) }}</span>
                    · {{ $s->created_at->diffForHumans() }}
                </div>
            </div>
            <div style="display:flex;align-items:center;gap:8px;">
                <span style="background:{{ $s->status==='DIAJUKAN' ? 'rgba(245,158,11,0.15)' : 'rgba(6,182,212,0.15)' }};color:{{ $s->status==='DIAJUKAN' ? '#f59e0b' : '#06b6d4' }};font-size:0.7rem;font-weight:600;padding:2px 10px;border-radius:999px;">{{ str_replace('_',' ',$s->status) }}</span>
                <a href="{{ route('surat.show', $s) }}" style="font-size:0.72rem;color:#3b82f6;text-decoration:none;">Review →</a>
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:32px;color:#475569;font-size:0.85rem;">✅ Tidak ada surat yang menunggu</div>
        @endforelse
    </x-card>
</div>

<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;margin-bottom:20px;">

    {{-- Aduan Aktif --}}
    <x-card>
        <x-slot name="header">
            <h3 style="font-size:0.95rem;font-weight:700;">🚩 Aduan Aktif Warga</h3>
            <a href="{{ route('aduan.index') }}" class="btn btn-sm btn-outline">Lihat Semua</a>
        </x-slot>
        @forelse($aduanTerbaru as $a)
        <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--color-border);">
            <div style="flex:1;">
                <div style="font-size:0.85rem;font-weight:600;color:#f1f5f9;">{{ Str::limit($a->judul, 40) }}</div>
                <div style="font-size:0.72rem;color:#64748b;margin-top:2px;">{{ $a->pelapor->nama_lengkap }} · {{ $a->created_at->diffForHumans() }}</div>
            </div>
            <div style="display:flex;align-items:center;gap:8px;flex-shrink:0;">
                @php $kMap=['KEAMANAN'=>['#f43f5e','rgba(244,63,94,0.15)'],'FASILITAS'=>['#f59e0b','rgba(245,158,11,0.15)'],'KEBERSIHAN'=>['#06b6d4','rgba(6,182,212,0.15)'],'PERSELISIHAN'=>['#8b5cf6','rgba(139,92,246,0.15)']]; $kc=$kMap[$a->kategori]??['#64748b','rgba(100,116,139,0.15)']; @endphp
                <span style="background:{{ $kc[1] }};color:{{ $kc[0] }};font-size:0.68rem;font-weight:600;padding:2px 8px;border-radius:999px;">{{ $a->kategori }}</span>
                <a href="{{ route('aduan.show', $a) }}" style="font-size:0.72rem;color:#3b82f6;text-decoration:none;">Tinjau →</a>
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:32px;color:#475569;font-size:0.85rem;">✅ Tidak ada aduan aktif</div>
        @endforelse
    </x-card>

    {{-- Peminjaman Pending --}}
    <x-card>
        <x-slot name="header">
            <h3 style="font-size:0.95rem;font-weight:700;">📦 Peminjaman Menunggu</h3>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-sm btn-outline">Kelola Semua</a>
        </x-slot>
        @forelse($peminjamanPending as $p)
        <div style="display:flex;align-items:center;justify-content:space-between;padding:12px 0;border-bottom:1px solid var(--color-border);">
            <div>
                <div style="font-size:0.85rem;font-weight:600;color:#f1f5f9;">{{ $p->barang->nama_barang }}</div>
                <div style="font-size:0.72rem;color:#64748b;margin-top:2px;">{{ $p->warga->nama_lengkap }} · {{ $p->jumlah_pinjam }} unit · {{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M') }}</div>
            </div>
            <div style="display:flex;gap:6px;">
                <form method="POST" action="{{ route('peminjaman.approve', $p) }}">
                    @csrf<button style="background:rgba(16,185,129,0.15);color:#10b981;border:1px solid rgba(16,185,129,0.3);border-radius:8px;padding:4px 10px;font-size:0.72rem;font-weight:600;cursor:pointer;">✓</button>
                </form>
                <form method="POST" action="{{ route('peminjaman.reject', $p) }}">
                    @csrf<button style="background:rgba(244,63,94,0.12);color:#f43f5e;border:1px solid rgba(244,63,94,0.25);border-radius:8px;padding:4px 10px;font-size:0.72rem;font-weight:600;cursor:pointer;">✕</button>
                </form>
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:32px;color:#475569;font-size:0.85rem;">✅ Tidak ada peminjaman yang menunggu</div>
        @endforelse
    </x-card>
</div>

{{-- ═══════════════════════════════════ --}}
{{-- QUICK ACTIONS + AGENDA             --}}
{{-- ═══════════════════════════════════ --}}
<div style="display:grid;grid-template-columns:1fr 1fr;gap:20px;">

    {{-- Quick Actions --}}
    <x-card title="⚡ Aksi Cepat">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:10px;">
            @php
            $actions = [
                ['href'=>route('pengumuman.create'),'icon'=>'📢','label'=>'Buat Pengumuman','color'=>'#dc2626','bg'=>'rgba(220,38,38,0.1)'],
                ['href'=>route('kas.create'),'icon'=>'💰','label'=>'Catat Transaksi Kas','color'=>'#10b981','bg'=>'rgba(16,185,129,0.1)'],
                ['href'=>route('event.create'),'icon'=>'📅','label'=>'Tambah Event','color'=>'#8b5cf6','bg'=>'rgba(139,92,246,0.1)'],
                ['href'=>route('inventaris.create'),'icon'=>'📦','label'=>'Tambah Barang','color'=>'#06b6d4','bg'=>'rgba(6,182,212,0.1)'],
                ['href'=>route('verifikasi.index'),'icon'=>'👤','label'=>'Verifikasi Warga','color'=>'#f59e0b','bg'=>'rgba(245,158,11,0.1)'],
                ['href'=>route('kependudukan.index'),'icon'=>'📋','label'=>'Data Kependudukan','color'=>'#3b82f6','bg'=>'rgba(59,130,246,0.1)'],
            ];
            @endphp
            @foreach($actions as $a)
            <a href="{{ $a['href'] }}" style="display:flex;align-items:center;gap:10px;background:{{ $a['bg'] }};border:1px solid {{ $a['color'] }}22;border-radius:12px;padding:14px;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.transform='scale(1.02)'" onmouseout="this.style.transform='none'">
                <span style="font-size:1.3rem;">{{ $a['icon'] }}</span>
                <span style="font-size:0.82rem;font-weight:600;color:#f1f5f9;line-height:1.3;">{{ $a['label'] }}</span>
            </a>
            @endforeach
        </div>
    </x-card>

    {{-- Event Mendatang --}}
    <x-card>
        <x-slot name="header">
            <h3 style="font-size:0.95rem;font-weight:700;">📅 Event Mendatang</h3>
            <a href="{{ route('event.create') }}" class="btn btn-sm btn-primary">+ Event</a>
        </x-slot>
        @forelse($eventMendatang as $e)
        <div style="display:flex;gap:14px;align-items:flex-start;padding:14px 0;border-bottom:1px solid var(--color-border);">
            <div style="background:rgba(59,130,246,0.12);border-radius:10px;padding:8px 12px;text-align:center;min-width:52px;flex-shrink:0;">
                <div style="font-weight:800;font-size:1.3rem;color:#3b82f6;line-height:1;">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                <div style="font-size:0.65rem;color:#3b82f6;font-weight:700;text-transform:uppercase;">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</div>
            </div>
            <div style="flex:1;">
                <div style="font-size:0.88rem;font-weight:600;color:#f1f5f9;margin-bottom:4px;">{{ $e->judul }}</div>
                <div style="font-size:0.75rem;color:#64748b;">🕐 {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('H:i') }} WIB
                @if($e->lokasi) · 📍 {{ Str::limit($e->lokasi,25) }}@endif</div>
                <div style="font-size:0.7rem;color:#f59e0b;margin-top:2px;">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->diffForHumans() }}</div>
            </div>
        </div>
        @empty
        <div style="text-align:center;padding:32px;color:#475569;font-size:0.85rem;">Belum ada event mendatang.<br><a href="{{ route('event.create') }}" style="color:#3b82f6;font-size:0.82rem;">+ Tambah Event</a></div>
        @endforelse
    </x-card>
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
            { label: 'Pemasukan', data: @json(collect($chartKas)->pluck('pemasukan')), backgroundColor: 'rgba(16,185,129,0.6)', borderColor: '#10b981', borderWidth: 1, borderRadius: 5 },
            { label: 'Pengeluaran', data: @json(collect($chartKas)->pluck('pengeluaran')), backgroundColor: 'rgba(244,63,94,0.6)', borderColor: '#f43f5e', borderWidth: 1, borderRadius: 5 }
        ]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        plugins: { legend: { labels: { color: '#94a3b8', font: { family: 'Inter', size: 11 } } } },
        scales: {
            x: { ticks: { color: '#64748b', font: { size: 11 } }, grid: { color: 'rgba(148,163,184,0.08)' } },
            y: { ticks: { color: '#64748b', font: { size: 11 }, callback: v => 'Rp '+(v/1000)+'k' }, grid: { color: 'rgba(148,163,184,0.08)' } }
        }
    }
});

// Aduan Doughnut Chart
const aduanData = @json($aduanByKategori);
new Chart(document.getElementById('aduanChart').getContext('2d'), {
    type: 'doughnut',
    data: {
        labels: Object.keys(aduanData),
        datasets: [{
            data: Object.values(aduanData),
            backgroundColor: ['rgba(244,63,94,0.8)','rgba(245,158,11,0.8)','rgba(6,182,212,0.8)','rgba(139,92,246,0.8)'],
            borderColor: '#1e293b',
            borderWidth: 3,
            hoverOffset: 8
        }]
    },
    options: {
        responsive: true, maintainAspectRatio: false, cutout: '65%',
        plugins: {
            legend: { position: 'right', labels: { color: '#94a3b8', font: { family: 'Inter', size: 11 }, padding: 14 } }
        }
    }
});
</script>
@endpush
