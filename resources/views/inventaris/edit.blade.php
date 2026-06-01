@extends('layouts.app')
@section('title', 'Edit Barang')
@section('breadcrumb') <a href="{{ route('inventaris.katalog') }}">Inventaris</a> <span class="separator">›</span> Edit @endsection

@section('content')
<div style="max-width:600px;margin:0 auto">
<x-card title="Edit Data Barang">
    <form method="POST" action="{{ route('inventaris.update', $barang) }}">
        @csrf @method('PUT')
        <x-input name="nama_barang" label="Nama Barang" required="true" :value="$barang->nama_barang" />
        <x-input name="kategori_barang" label="Kategori" required="true" :value="$barang->kategori_barang" />
        <x-select name="kondisi_fisik" label="Kondisi Fisik" required="true"
            :options="['BAIK'=>'✅ Baik','RUSAK_RINGAN'=>'⚠️ Rusak Ringan','RUSAK_BERAT'=>'❌ Rusak Berat']"
            :selected="$barang->kondisi_fisik" />
        <x-textarea name="deskripsi_aset" label="Deskripsi Aset" rows="3" :value="$barang->deskripsi_aset" />
        <div class="flex gap-3 mt-4">
            <x-button type="submit" variant="primary">Update Barang</x-button>
            <a href="{{ route('inventaris.katalog') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</x-card>
</div>
@endsection
