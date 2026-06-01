@extends('layouts.app')
@section('title', $barang->nama_barang)
@section('breadcrumb') <a href="{{ route('inventaris.katalog') }}">Inventaris</a> <span class="separator">›</span> {{ $barang->nama_barang }} @endsection

@section('content')
<div class="grid grid-2 gap-6">
<x-card title="Detail Barang">
    <div class="flex justify-between items-center mb-6 p-4" style="background:var(--color-surface);border-radius:var(--radius-lg)">
        <div>
            <div class="font-bold" style="font-size:2.5rem;color:{{ $barang->stok_tersedia > 0 ? 'var(--color-success)' : 'var(--color-danger)' }}">
                {{ $barang->stok_tersedia }}
            </div>
            <div class="text-muted text-sm">dari {{ $barang->total_stok }} unit tersedia</div>
        </div>
        @php $kMap=['BAIK'=>'success','RUSAK_RINGAN'=>'warning','RUSAK_BERAT'=>'danger']; @endphp
        <x-badge variant="{{ $kMap[$barang->kondisi_fisik] ?? 'muted' }}" style="font-size:0.9rem;padding:0.5rem 1rem;">
            {{ str_replace('_',' ',$barang->kondisi_fisik) }}
        </x-badge>
    </div>

    @foreach([['Nama Barang', $barang->nama_barang], ['Kategori', $barang->kategori_barang], ['Total Stok', $barang->total_stok.' unit'], ['Stok Tersedia', $barang->stok_tersedia.' unit']] as [$label, $val])
    <div class="flex justify-between items-center py-3" style="border-bottom:1px solid var(--color-border)">
        <span class="text-muted text-sm">{{ $label }}</span>
        <span class="font-semibold">{{ $val }}</span>
    </div>
    @endforeach

    @if($barang->deskripsi_aset)
    <div class="mt-4">
        <div class="text-xs text-muted mb-2">Deskripsi Aset</div>
        <p class="text-sm" style="line-height:1.7">{{ $barang->deskripsi_aset }}</p>
    </div>
    @endif

    <div class="flex gap-3 mt-6">
        @if($barang->stok_tersedia > 0 && $barang->kondisi_fisik === 'BAIK')
            <a href="{{ route('peminjaman.create') }}?barang_id={{ $barang->id }}" class="btn btn-primary">Ajukan Peminjaman</a>
        @endif
        @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
            <a href="{{ route('inventaris.edit', $barang) }}" class="btn btn-outline">Edit Data</a>
        @endif
    </div>
</x-card>

<x-card title="Riwayat Peminjaman">
    @forelse($barang->peminjaman->take(10) as $p)
    <div class="flex justify-between items-center py-3" style="border-bottom:1px solid var(--color-border)">
        <div>
            <div class="text-sm font-semibold">{{ $p->warga->nama_lengkap }}</div>
            <div class="text-xs text-muted">{{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M Y') }} – {{ \Carbon\Carbon::parse($p->tanggal_kembali_rencana)->format('d M Y') }}</div>
        </div>
        @php $sMap=['MENUNGGU_PERSETUJUAN'=>'pending','ON_USE'=>'info','RETURNED'=>'success','REJECTED'=>'danger','APPROVED'=>'primary']; @endphp
        <x-badge variant="{{ $sMap[$p->status_peminjaman] ?? 'muted' }}">{{ str_replace('_',' ',$p->status_peminjaman) }}</x-badge>
    </div>
    @empty
    <p class="text-sm text-muted">Belum ada riwayat peminjaman.</p>
    @endforelse
</x-card>
</div>
@endsection
