@extends('layouts.app')
@section('title', 'Inventaris Barang')

@section('actions')
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <a href="{{ route('inventaris.create') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded-lg shadow-xs transition text-sm cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Barang
        </a>
    @endif
@endsection

@section('content')
<div class="bg-white rounded-xl border border-slate-200 p-4 mb-6 shadow-xs">
    <form method="GET" class="flex flex-col sm:flex-row gap-3 items-center w-full">
        <div class="relative flex-1 w-full">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-450">
                <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
            </svg>
            <input type="text" name="search" class="w-full bg-slate-50 border border-slate-350 rounded-lg py-2 pl-10 pr-4 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-700 focus:bg-white transition" placeholder="Cari barang..." value="{{ request('search') }}">
        </div>
        <select name="kategori" class="w-full sm:w-48 bg-slate-50 border border-slate-350 rounded-lg py-2 pl-3 pr-10 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-700 focus:bg-white transition appearance-none bg-[url('data:image/svg+xml,%3Csvg_xmlns=%22http://www.w3.org/2000/svg%22_fill=%22none%22_viewBox=%220_0_24_24%22_stroke-width=%222%22_stroke=%22%2364748b%22%3E%3Cpath_stroke-linecap=%22round%22_stroke-linejoin=%22round%22_d=%22m19.5_8.25-7.5_7.5-7.5-7.5%22/%3E%3C/svg%3E')] bg-[length:14px] bg-[right_12px_center] bg-no-repeat" onchange="this.form.submit()">
            <option value="">Semua Kategori</option>
            @foreach($kategoris as $k)
                <option value="{{ $k }}" {{ request('kategori') === $k ? 'selected':'' }}>{{ $k }}</option>
            @endforeach
        </select>
        <button type="submit" class="w-full sm:w-auto bg-slate-100 hover:bg-slate-200 border border-slate-300 text-slate-700 font-bold py-2 px-4 rounded-lg text-sm transition">Filter</button>
    </form>
</div>

@if($barang->count() > 0)
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($barang as $b)
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden flex flex-col p-6">
        <div class="flex justify-between items-start mb-4">
            <div>
                <h4 class="text-base font-extrabold text-slate-900 leading-snug mb-1">{{ $b->nama_barang }}</h4>
                <x-badge variant="muted">{{ $b->kategori_barang }}</x-badge>
            </div>
            <div class="text-right">
                <div class="text-3xl font-black leading-none {{ $b->stok_tersedia > 0 ? 'text-teal-700' : 'text-rose-600' }}">
                    {{ $b->stok_tersedia }}
                </div>
                <div class="text-[10px] text-slate-400 font-semibold mt-1">/ {{ $b->total_stok }} total</div>
            </div>
        </div>

        <div class="flex justify-between items-center py-2.5 border-y border-slate-100 my-4 text-xs">
            <span class="text-slate-500 font-semibold">Kondisi Fisik</span>
            @php $kMap=['BAIK'=>'success','RUSAK_RINGAN'=>'warning','RUSAK_BERAT'=>'danger']; @endphp
            <x-badge variant="{{ $kMap[$b->kondisi_fisik] ?? 'muted' }}">{{ str_replace('_',' ',$b->kondisi_fisik) }}</x-badge>
        </div>

        @if($b->deskripsi_aset)
            <p class="text-xs text-slate-500 leading-relaxed font-semibold mb-5 flex-1">{{ Str::limit($b->deskripsi_aset, 90) }}</p>
        @else
            <div class="flex-1"></div>
        @endif

        <div class="flex gap-2.5 mt-auto w-full pt-2">
            <a href="{{ route('inventaris.show', $b) }}" class="inline-flex items-center justify-center border border-slate-300 hover:border-teal-700 hover:bg-teal-50 text-slate-700 hover:text-teal-800 font-bold py-2 px-4 rounded-lg text-xs transition flex-1 text-center">Detail</a>
            @if($b->stok_tersedia > 0 && $b->kondisi_fisik === 'BAIK')
                <a href="{{ route('peminjaman.create') }}?barang_id={{ $b->id }}" class="inline-flex items-center justify-center bg-teal-700 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded-lg text-xs shadow-xs transition flex-1 text-center">Pinjam</a>
            @endif
            @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                <a href="{{ route('inventaris.edit', $b) }}" class="inline-flex items-center justify-center bg-slate-100 hover:bg-slate-200 border border-slate-200 text-slate-700 font-bold py-2 px-3 rounded-lg text-xs transition" title="Edit Barang">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </a>
            @endif
        </div>
    </div>
    @endforeach
</div>

<div class="mt-6">{{ $barang->links() }}</div>
@else
<x-card>
    <x-empty-state title="Belum ada inventaris" message="Belum ada barang yang terdaftar di inventaris RT/RW." />
</x-card>
@endif
@endsection
