@extends('layouts.app')
@section('title', 'Detail Warga')
@section('breadcrumb')
    <a href="{{ route('kependudukan.index') }}" class="hover:text-teal-600 transition">Kependudukan</a>
@endsection

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- Informasi Pribadi --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
            <h3 class="text-sm font-extrabold text-slate-900">Informasi Pribadi</h3>
        </div>
        <div class="p-5 divide-y divide-slate-100">
            <div class="flex justify-between items-center py-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Nama Lengkap</span>
                <span class="text-sm font-bold text-slate-900">{{ $warga->nama_lengkap }}</span>
            </div>
            <div class="flex justify-between items-center py-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">NIK</span>
                <code class="text-[11px] bg-slate-100 text-slate-700 font-mono px-2 py-0.5 rounded">{{ $warga->nik }}</code>
            </div>
            <div class="flex justify-between items-center py-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">No. Telepon</span>
                <span class="text-sm font-semibold text-slate-800">{{ $warga->no_telepon }}</span>
            </div>
            <div class="flex justify-between items-center py-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Blok Rumah</span>
                <span class="text-sm font-semibold text-slate-800">{{ $warga->blok_rumah }}</span>
            </div>
            <div class="flex justify-between items-center py-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">RT / RW</span>
                <span class="text-sm font-semibold text-slate-800">RT {{ $warga->rt_id }} / RW {{ $warga->rw_id }}</span>
            </div>
            <div class="flex justify-between items-center py-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Role</span>
                <x-badge variant="primary">{{ str_replace('_', ' ', $warga->role) }}</x-badge>
            </div>
            <div class="flex justify-between items-center py-3">
                <span class="text-xs font-bold text-slate-500 uppercase tracking-wider">Status Akun</span>
                @if($warga->status_akun === 'ACTIVE')
                    <x-badge variant="active">Aktif</x-badge>
                @elseif($warga->status_akun === 'PENDING_VERIFICATION')
                    <x-badge variant="pending">Menunggu Verifikasi</x-badge>
                @else
                    <x-badge variant="danger">Ditangguhkan</x-badge>
                @endif
            </div>
        </div>

        <div class="px-5 pb-5 flex gap-3">
            @if($warga->status_akun === 'SUSPENDED')
                <form method="POST" action="{{ route('verifikasi.restore', $warga) }}">
                    @csrf
                    <button class="inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold py-2 px-4 rounded-lg shadow-xs transition text-xs cursor-pointer">Pulihkan Akun</button>
                </form>
            @elseif($warga->status_akun === 'ACTIVE')
                <form method="POST" action="{{ route('verifikasi.suspend', $warga) }}" onsubmit="return confirm('Tangguhkan akun ini?')">
                    @csrf
                    <button class="inline-flex items-center gap-1.5 bg-rose-600 hover:bg-rose-700 text-white font-bold py-2 px-4 rounded-lg shadow-xs transition text-xs cursor-pointer">Tangguhkan</button>
                </form>
            @endif
        </div>
    </div>

    {{-- Riwayat --}}
    <div class="space-y-6">
        <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
                <h3 class="text-sm font-extrabold text-slate-900">Riwayat Surat ({{ $warga->surat->count() }})</h3>
            </div>
            <div class="p-5 divide-y divide-slate-100">
                @forelse($warga->surat->take(5) as $s)
                    <div class="flex justify-between items-center py-2.5">
                        <span class="text-sm font-semibold text-slate-800">{{ str_replace('_', ' ', $s->jenis_surat) }}</span>
                        <x-badge variant="{{ $s->status === 'SELESAI' ? 'success' : ($s->status === 'DITOLAK' ? 'danger' : 'pending') }}">
                            {{ str_replace('_', ' ', $s->status) }}
                        </x-badge>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 font-semibold py-4 text-center">Belum ada pengajuan surat.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
            <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
                <h3 class="text-sm font-extrabold text-slate-900">Riwayat Aduan ({{ $warga->aduan->count() }})</h3>
            </div>
            <div class="p-5 divide-y divide-slate-100">
                @forelse($warga->aduan->take(5) as $a)
                    <div class="flex justify-between items-center py-2.5">
                        <span class="text-sm font-semibold text-slate-800">{{ Str::limit($a->judul, 35) }}</span>
                        <x-badge variant="{{ $a->status === 'SELESAI' ? 'success' : ($a->status === 'DIPROSES' ? 'info' : 'pending') }}">
                            {{ $a->status }}
                        </x-badge>
                    </div>
                @empty
                    <p class="text-xs text-slate-400 font-semibold py-4 text-center">Belum ada aduan.</p>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection
