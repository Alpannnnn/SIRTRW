@extends('layouts.app')
@section('title', 'Inventaris Barang')

@section('actions')
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <a href="{{ route('inventaris.create') }}" class="btn btn-primary btn-sm">+ Tambah Barang</a>
    @endif
@endsection

@section('content')
<div class="search-bar">
    <form method="GET" class="flex gap-3 flex-1 flex-wrap">
        <div class="search-input-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
            <input type="text" name="search" class="form-control" placeholder="Cari barang..." value="{{ request('search') }}">
        </div>
        <select name="kategori" class="form-control" style="width:auto" onchange="this.form.submit()">
            <option value="">Semua Kategori</option>
            @foreach($kategoris as $k)
                <option value="{{ $k }}" {{ request('kategori') === $k ? 'selected':'' }}>{{ $k }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-outline">Filter</button>
    </form>
</div>

@if($barang->count() > 0)
<div class="grid grid-3">
    @foreach($barang as $b)
    <div class="card">
        <div class="card-body">
            <div class="flex justify-between items-start mb-3">
                <div>
                    <h4 style="font-size:0.95rem;margin-bottom:4px;">{{ $b->nama_barang }}</h4>
                    <x-badge variant="muted">{{ $b->kategori_barang }}</x-badge>
                </div>
                <div style="text-align:right">
                    <div class="font-bold" style="font-size:1.5rem;color:{{ $b->stok_tersedia > 0 ? 'var(--color-success)' : 'var(--color-danger)' }}">
                        {{ $b->stok_tersedia }}
                    </div>
                    <div class="text-xs text-muted">/ {{ $b->total_stok }} total</div>
                </div>
            </div>

            <div class="flex justify-between items-center mb-3">
                <span class="text-xs text-muted">Kondisi</span>
                @php $kMap=['BAIK'=>'success','RUSAK_RINGAN'=>'warning','RUSAK_BERAT'=>'danger']; @endphp
                <x-badge variant="{{ $kMap[$b->kondisi_fisik] ?? 'muted' }}">{{ str_replace('_',' ',$b->kondisi_fisik) }}</x-badge>
            </div>

            @if($b->deskripsi_aset)
                <p class="text-xs text-muted mb-3">{{ Str::limit($b->deskripsi_aset, 80) }}</p>
            @endif

            <div class="flex gap-2 mt-auto">
                <a href="{{ route('inventaris.show', $b) }}" class="btn btn-outline btn-sm flex-1">Detail</a>
                @if($b->stok_tersedia > 0 && $b->kondisi_fisik === 'BAIK')
                    <a href="{{ route('peminjaman.create') }}?barang_id={{ $b->id }}" class="btn btn-primary btn-sm flex-1">Pinjam</a>
                @endif
                @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                    <a href="{{ route('inventaris.edit', $b) }}" class="btn btn-ghost btn-sm">Edit</a>
                @endif
            </div>
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
