@extends('layouts.app')
@section('title', $barang->nama_barang)
@section('breadcrumb') <a href="{{ route('inventaris.katalog') }}">Inventaris</a> <span class="mx-1.5 text-slate-300">/</span> <span class="text-slate-600 font-bold">{{ $barang->nama_barang }}</span> @endsection

@section('content')
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <x-card title="Detail Barang">
        <div class="flex justify-between items-center mb-6 p-5 bg-slate-50 border border-slate-200 rounded-xl shadow-xs">
            <div>
                <div class="text-4xl font-black leading-none {{ $barang->stok_tersedia > 0 ? 'text-teal-700' : 'text-rose-600' }}">
                    {{ $barang->stok_tersedia }}
                </div>
                <div class="text-xs text-slate-400 font-semibold mt-1">dari {{ $barang->total_stok }} unit tersedia</div>
            </div>
            @php $kMap=['BAIK'=>'success','RUSAK_RINGAN'=>'warning','RUSAK_BERAT'=>'danger']; @endphp
            <x-badge variant="{{ $kMap[$barang->kondisi_fisik] ?? 'muted' }}" class="text-xs py-1.5 px-3">
                {{ str_replace('_',' ',$barang->kondisi_fisik) }}
            </x-badge>
        </div>

        <div class="divide-y divide-slate-100">
            @foreach([['Nama Barang', $barang->nama_barang], ['Kategori', $barang->kategori_barang], ['Total Stok', $barang->total_stok.' unit'], ['Stok Tersedia', $barang->stok_tersedia.' unit']] as [$label, $val])
            <div class="flex justify-between items-center py-3.5">
                <span class="text-slate-500 font-semibold text-sm">{{ $label }}</span>
                <span class="font-extrabold text-slate-800 text-sm">{{ $val }}</span>
            </div>
            @endforeach
        </div>

        @if($barang->deskripsi_aset)
        <div class="mt-5 border-t border-slate-100 pt-4">
            <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-2">Deskripsi Aset</div>
            <p class="text-sm text-slate-650 leading-relaxed font-semibold">{{ $barang->deskripsi_aset }}</p>
        </div>
        @endif

        <div class="flex gap-3 mt-8 pt-4 border-t border-slate-100">
            @if($barang->stok_tersedia > 0 && $barang->kondisi_fisik === 'BAIK')
                <a href="{{ route('peminjaman.create') }}?barang_id={{ $barang->id }}" class="inline-flex items-center justify-center bg-teal-700 hover:bg-teal-800 text-white font-bold py-2.5 px-5 rounded-lg shadow-xs transition text-sm cursor-pointer">Ajukan Peminjaman</a>
            @endif
            @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                <a href="{{ route('inventaris.edit', $barang) }}" class="inline-flex items-center justify-center border border-slate-300 hover:border-teal-700 hover:bg-teal-50 text-slate-700 hover:text-teal-800 font-bold py-2.5 px-5 rounded-lg transition text-sm cursor-pointer">Edit Data</a>
            @endif
        </div>
    </x-card>

    <x-card title="Riwayat Peminjaman">
        <div class="divide-y divide-slate-100">
            @forelse($barang->peminjaman->take(10) as $p)
            <div class="flex justify-between items-center py-3.5 first:pt-0 last:pb-0">
                <div class="space-y-0.5">
                    <div class="text-sm font-bold text-slate-900">{{ $p->warga->nama_lengkap }}</div>
                    <div class="text-xs text-slate-400 font-semibold">{{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M Y') }} – {{ \Carbon\Carbon::parse($p->tanggal_kembali_rencana)->format('d M Y') }}</div>
                </div>
                @php $sMap=['MENUNGGU_PERSETUJUAN'=>'warning','ON_USE'=>'info','RETURNED'=>'success','REJECTED'=>'danger','APPROVED'=>'primary']; @endphp
                <x-badge variant="{{ $sMap[$p->status_peminjaman] ?? 'muted' }}">{{ str_replace('_',' ',$p->status_peminjaman) }}</x-badge>
            </div>
            @empty
            <p class="text-sm text-slate-400 font-semibold text-center py-6">Belum ada riwayat peminjaman.</p>
            @endforelse
        </div>
    </x-card>
</div>
@endsection
