@extends('layouts.app')
@section('title', 'Detail Warga')
@section('breadcrumb')
    <a href="{{ route('kependudukan.index') }}">Kependudukan</a>
    <span class="separator">›</span> {{ $warga->nama_lengkap }}
@endsection

@section('content')
<div class="grid grid-2 gap-6">
    <x-card title="Informasi Pribadi">
        <div class="flex-col gap-4">
            <div class="flex justify-between items-center py-3" style="border-bottom:1px solid var(--color-border)">
                <span class="text-muted text-sm">Nama Lengkap</span>
                <span class="font-semibold">{{ $warga->nama_lengkap }}</span>
            </div>
            <div class="flex justify-between items-center py-3" style="border-bottom:1px solid var(--color-border)">
                <span class="text-muted text-sm">NIK</span>
                <code style="background:var(--color-surface);padding:3px 8px;border-radius:6px;font-size:0.85rem;">{{ $warga->nik }}</code>
            </div>
            <div class="flex justify-between items-center py-3" style="border-bottom:1px solid var(--color-border)">
                <span class="text-muted text-sm">No. Telepon</span>
                <span>{{ $warga->no_telepon }}</span>
            </div>
            <div class="flex justify-between items-center py-3" style="border-bottom:1px solid var(--color-border)">
                <span class="text-muted text-sm">Blok Rumah</span>
                <span>{{ $warga->blok_rumah }}</span>
            </div>
            <div class="flex justify-between items-center py-3" style="border-bottom:1px solid var(--color-border)">
                <span class="text-muted text-sm">RT / RW</span>
                <span>RT {{ $warga->rt_id }} / RW {{ $warga->rw_id }}</span>
            </div>
            <div class="flex justify-between items-center py-3" style="border-bottom:1px solid var(--color-border)">
                <span class="text-muted text-sm">Role</span>
                <x-badge variant="primary">{{ str_replace('_', ' ', $warga->role) }}</x-badge>
            </div>
            <div class="flex justify-between items-center py-3">
                <span class="text-muted text-sm">Status Akun</span>
                @if($warga->status_akun === 'ACTIVE')
                    <x-badge variant="active">Aktif</x-badge>
                @elseif($warga->status_akun === 'PENDING_VERIFICATION')
                    <x-badge variant="pending">Menunggu Verifikasi</x-badge>
                @else
                    <x-badge variant="danger">Ditangguhkan</x-badge>
                @endif
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            @if($warga->status_akun === 'SUSPENDED')
                <form method="POST" action="{{ route('verifikasi.restore', $warga) }}">
                    @csrf
                    <button class="btn btn-success btn-sm">Pulihkan Akun</button>
                </form>
            @elseif($warga->status_akun === 'ACTIVE')
                <form method="POST" action="{{ route('verifikasi.suspend', $warga) }}" onsubmit="return confirm('Tangguhkan akun ini?')">
                    @csrf
                    <button class="btn btn-danger btn-sm">Tangguhkan</button>
                </form>
            @endif
        </div>
    </x-card>

    <div class="flex-col gap-4">
        <x-card title="Riwayat Surat ({{ $warga->surat->count() }})">
            @forelse($warga->surat->take(5) as $s)
                <div class="flex justify-between items-center py-2" style="border-bottom:1px solid var(--color-border)">
                    <span class="text-sm">{{ str_replace('_', ' ', $s->jenis_surat) }}</span>
                    <x-badge variant="{{ $s->status === 'SELESAI' ? 'success' : ($s->status === 'DITOLAK' ? 'danger' : 'pending') }}">
                        {{ str_replace('_', ' ', $s->status) }}
                    </x-badge>
                </div>
            @empty
                <p class="text-sm text-muted">Belum ada pengajuan surat.</p>
            @endforelse
        </x-card>

        <x-card title="Riwayat Aduan ({{ $warga->aduan->count() }})">
            @forelse($warga->aduan->take(5) as $a)
                <div class="flex justify-between items-center py-2" style="border-bottom:1px solid var(--color-border)">
                    <span class="text-sm">{{ Str::limit($a->judul, 35) }}</span>
                    <x-badge variant="{{ $a->status === 'SELESAI' ? 'success' : ($a->status === 'DIPROSES' ? 'info' : 'pending') }}">
                        {{ $a->status }}
                    </x-badge>
                </div>
            @empty
                <p class="text-sm text-muted">Belum ada aduan.</p>
            @endforelse
        </x-card>
    </div>
</div>
@endsection
