@extends('layouts.app')
@section('title', 'Detail Aduan')
@section('breadcrumb') <a href="{{ route('aduan.index') }}">Aduan</a> <span class="separator">›</span> Detail @endsection

@section('content')
<div class="grid" style="grid-template-columns:1fr 350px;gap:var(--space-6)">

<div class="flex-col gap-6">
    <x-card>
        <x-slot name="header">
            <div>
                <h3>{{ $aduan->judul }}</h3>
                <div class="flex gap-2 mt-2">
                    @php $kMap=['KEAMANAN'=>'danger','FASILITAS'=>'warning','KEBERSIHAN'=>'info','PERSELISIHAN'=>'muted']; @endphp
                    <x-badge variant="{{ $kMap[$aduan->kategori] ?? 'muted' }}">{{ $aduan->kategori }}</x-badge>
                    @php $sMap=['DITERIMA'=>'pending','DIPROSES'=>'processing','SELESAI'=>'success']; @endphp
                    <x-badge variant="{{ $sMap[$aduan->status] ?? 'muted' }}">{{ $aduan->status }}</x-badge>
                </div>
            </div>
        </x-slot>

        <div style="background:var(--color-surface);padding:var(--space-5);border-radius:var(--radius-lg);line-height:1.8;color:var(--color-text-secondary)">
            {{ $aduan->deskripsi }}
        </div>

        <div class="flex gap-4 mt-4 text-xs text-muted">
            <span>Pelapor: <strong>{{ $aduan->pelapor->nama_lengkap }}</strong></span>
            <span>Blok {{ $aduan->pelapor->blok_rumah }} · RT {{ $aduan->pelapor->rt_id }}</span>
            <span>{{ $aduan->created_at->format('d M Y, H:i') }}</span>
        </div>
    </x-card>

    {{-- Komentar --}}
    <x-card title="Diskusi & Tindak Lanjut ({{ $aduan->komentar->count() }})">
        @forelse($aduan->komentar as $k)
        <div class="flex gap-3 mb-4">
            <div style="width:36px;height:36px;border-radius:50%;background:linear-gradient(135deg,var(--color-primary),#818cf8);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.75rem;color:white;flex-shrink:0;">
                {{ strtoupper(substr($k->penulis->nama_lengkap,0,2)) }}
            </div>
            <div class="flex-1">
                <div class="flex gap-2 items-center mb-1">
                    <span class="font-semibold text-sm" style="color:var(--color-text-primary)">{{ $k->penulis->nama_lengkap }}</span>
                    @if(!$k->penulis->isWarga())
                        <x-badge variant="primary" style="font-size:0.65rem;">{{ str_replace('_',' ',$k->penulis->role) }}</x-badge>
                    @endif
                    <span class="text-xs text-muted">{{ $k->created_at->diffForHumans() }}</span>
                </div>
                <div style="background:var(--color-surface);padding:var(--space-3) var(--space-4);border-radius:var(--radius-lg);font-size:0.875rem;color:var(--color-text-secondary);">
                    {{ $k->isi_komentar }}
                </div>
            </div>
        </div>
        @empty
        <p class="text-sm text-muted">Belum ada komentar. Jadilah yang pertama memberikan tanggapan.</p>
        @endforelse

        <div style="border-top:1px solid var(--color-border);padding-top:var(--space-5);margin-top:var(--space-4)">
            <form method="POST" action="{{ route('aduan.komentar', $aduan) }}">
                @csrf
                <x-textarea name="isi_komentar" label="Tulis Komentar" placeholder="Berikan tanggapan atau update tindak lanjut..." rows="3" required="true" />
                <x-button type="submit" variant="primary" size="sm">Kirim Komentar</x-button>
            </form>
        </div>
    </x-card>
</div>

{{-- Sidebar Aksi --}}
<div class="flex-col gap-4">
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
    <x-card title="Update Status">
        <form method="POST" action="{{ route('aduan.status', $aduan) }}">
            @csrf @method('PATCH')
            <x-select name="status" label="Status Aduan" :options="['DITERIMA'=>'Diterima','DIPROSES'=>'Sedang Diproses','SELESAI'=>'Selesai']" :selected="$aduan->status" />
            <x-button type="submit" variant="primary" class="btn-block">Update Status</x-button>
        </form>
    </x-card>
    @endif

    <x-card title="Informasi Pelapor">
        <div class="flex-col gap-3">
            <div><div class="text-xs text-muted">Nama</div><div class="font-semibold text-sm">{{ $aduan->pelapor->nama_lengkap }}</div></div>
            <div><div class="text-xs text-muted">Blok Rumah</div><div class="text-sm">{{ $aduan->pelapor->blok_rumah }}</div></div>
            <div><div class="text-xs text-muted">RT / RW</div><div class="text-sm">RT {{ $aduan->pelapor->rt_id }} / RW {{ $aduan->pelapor->rw_id }}</div></div>
            <div><div class="text-xs text-muted">Dilaporkan</div><div class="text-sm">{{ $aduan->created_at->format('d M Y') }}</div></div>
        </div>
    </x-card>
</div>

</div>
@endsection
