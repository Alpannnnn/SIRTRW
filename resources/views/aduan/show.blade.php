@extends('layouts.app')
@section('title', 'Detail Aduan')
@section('breadcrumb') <a href="{{ route('aduan.index') }}">Aduan</a> <span class="mx-1.5 text-slate-300">/</span> <span class="text-slate-600 font-bold">Detail</span> @endsection

@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">

    {{-- Main Column --}}
    <div class="lg:col-span-8 space-y-6">
        <x-card>
            <x-slot name="header">
                <div>
                    <h3 class="text-base font-extrabold text-slate-900">{{ $aduan->judul }}</h3>
                    <div class="flex gap-2 mt-2">
                        @php $kMap=['KEAMANAN'=>'danger','FASILITAS'=>'warning','KEBERSIHAN'=>'info','PERSELISIHAN'=>'muted']; @endphp
                        <x-badge variant="{{ $kMap[$aduan->kategori] ?? 'muted' }}">{{ $aduan->kategori }}</x-badge>
                        @php $sMap=['DITERIMA'=>'warning','DIPROSES'=>'info','SELESAI'=>'success']; @endphp
                        <x-badge variant="{{ $sMap[$aduan->status] ?? 'muted' }}">{{ $aduan->status }}</x-badge>
                    </div>
                </div>
            </x-slot>

            <div class="bg-slate-50 border border-slate-200 p-5 rounded-xl text-sm leading-relaxed text-slate-700 font-semibold mb-4">
                {{ $aduan->deskripsi }}
            </div>

            <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-slate-400 font-semibold">
                <span>Pelapor: <strong class="text-slate-700 font-bold">{{ $aduan->pelapor->nama_lengkap }}</strong></span>
                <span>·</span>
                <span>Blok {{ $aduan->pelapor->blok_rumah }} · RT {{ $aduan->pelapor->rt_id }}</span>
                <span>·</span>
                <span>{{ $aduan->created_at->format('d M Y, H:i') }} WIB</span>
            </div>
        </x-card>

        {{-- Komentar --}}
        <x-card title="Diskusi & Tindak Lanjut ({{ $aduan->komentar->count() }})">
            <div class="space-y-5">
                @forelse($aduan->komentar as $k)
                <div class="flex gap-3">
                    <div class="w-9 h-9 bg-teal-700 text-white rounded-full flex items-center justify-center font-bold text-xs flex-shrink-0">
                        {{ strtoupper(substr($k->penulis->nama_lengkap,0,2)) }}
                    </div>
                    <div class="flex-1 space-y-1.5">
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="font-extrabold text-slate-900 text-sm leading-none">{{ $k->penulis->nama_lengkap }}</span>
                            @if(!$k->penulis->isWarga())
                                <x-badge variant="primary" class="text-[9px] py-0.5 px-2 leading-none uppercase">{{ str_replace('_',' ',$k->penulis->role) }}</x-badge>
                            @endif
                            <span class="text-[10px] text-slate-450 font-bold uppercase tracking-wider leading-none">{{ $k->created_at->diffForHumans() }}</span>
                        </div>
                        <div class="bg-slate-50 border border-slate-200 p-3.5 rounded-xl text-sm text-slate-650 font-semibold">
                            {{ $k->isi_komentar }}
                        </div>
                    </div>
                </div>
                @empty
                <p class="text-sm text-slate-400 font-semibold text-center py-4">Belum ada komentar atau tanggapan terkait aduan ini.</p>
                @endforelse
            </div>

            <div class="border-t border-slate-100 pt-5 mt-5">
                <form method="POST" action="{{ route('aduan.komentar', $aduan) }}">
                    @csrf
                    <x-textarea name="isi_komentar" label="Tulis Komentar" placeholder="Berikan tanggapan atau update tindak lanjut..." rows="3" required="true" />
                    <div class="flex justify-end mt-3">
                        <x-button type="submit" variant="primary" size="sm">Kirim Komentar</x-button>
                    </div>
                </form>
            </div>
        </x-card>
    </div>

    {{-- Sidebar Column --}}
    <div class="lg:col-span-4 space-y-6">
        @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <x-card title="Update Status">
            <form method="POST" action="{{ route('aduan.status', $aduan) }}">
                @csrf @method('PATCH')
                <x-select name="status" label="Status Aduan" :options="['DITERIMA'=>'Diterima','DIPROSES'=>'Sedang Diproses','SELESAI'=>'Selesai']" :selected="$aduan->status" />
                <x-button type="submit" variant="primary" class="w-full justify-center">Update Status</x-button>
            </form>
        </x-card>
        @endif

        <x-card title="Informasi Pelapor">
            <div class="divide-y divide-slate-100 text-sm font-semibold">
                <div class="py-2.5 first:pt-0 flex justify-between items-center">
                    <span class="text-slate-500">Nama</span>
                    <span class="font-extrabold text-slate-800">{{ $aduan->pelapor->nama_lengkap }}</span>
                </div>
                <div class="py-2.5 flex justify-between items-center">
                    <span class="text-slate-500">Blok Rumah</span>
                    <span class="font-extrabold text-slate-800">Blok {{ $aduan->pelapor->blok_rumah }}</span>
                </div>
                <div class="py-2.5 flex justify-between items-center">
                    <span class="text-slate-500">RT / RW</span>
                    <span class="font-extrabold text-slate-800">RT {{ $aduan->pelapor->rt_id }} / RW {{ $aduan->pelapor->rw_id }}</span>
                </div>
                <div class="py-2.5 last:pb-0 flex justify-between items-center">
                    <span class="text-slate-500">Dilaporkan</span>
                    <span class="font-extrabold text-slate-800">{{ $aduan->created_at->format('d M Y') }}</span>
                </div>
            </div>
        </x-card>
    </div>

</div>
@endsection
