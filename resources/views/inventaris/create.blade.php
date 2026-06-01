@extends('layouts.app')
@section('title', 'Tambah Barang')
@section('breadcrumb') <a href="{{ route('inventaris.katalog') }}">Inventaris</a> <span class="separator">›</span> Tambah @endsection

@section('content')
<div style="max-width:600px;margin:0 auto">
<x-card title="Form Barang Inventaris Baru">
    <form method="POST" action="{{ route('inventaris.store') }}">
        @csrf
        <x-input name="nama_barang" label="Nama Barang" placeholder="Contoh: Sound System Portable" required="true" />
        <x-input name="kategori_barang" label="Kategori" placeholder="Contoh: Elektronik, Furnitur, Perkakas" required="true" />
        <div class="grid grid-2 gap-4">
            <x-input name="total_stok" label="Jumlah Unit" type="number" min="1" value="1" required="true" />
            <x-select name="kondisi_fisik" label="Kondisi Fisik" required="true"
                :options="['BAIK'=>'✅ Baik','RUSAK_RINGAN'=>'⚠️ Rusak Ringan','RUSAK_BERAT'=>'❌ Rusak Berat']" />
        </div>
        <x-textarea name="deskripsi_aset" label="Deskripsi Aset (opsional)" placeholder="Detail, spesifikasi, atau catatan aset..." rows="3" />
        <div class="flex gap-3 mt-4">
            <x-button type="submit" variant="primary">Tambah Barang</x-button>
            <a href="{{ route('inventaris.katalog') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</x-card>
</div>
@endsection
