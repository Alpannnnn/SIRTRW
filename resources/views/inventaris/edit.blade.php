@extends('layouts.app')
@section('title', 'Edit Barang')
@section('breadcrumb') <a href="{{ route('inventaris.katalog') }}" class="hover:text-teal-600 transition">Inventaris</a> @endsection

@section('content')
<div class="max-w-xl mx-auto">
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-extrabold text-slate-900">Edit Data Barang</h3>
    </div>
    <div class="p-6">
    <form method="POST" action="{{ route('inventaris.update', $barang) }}" class="space-y-5">
        @csrf @method('PUT')
        <x-input name="nama_barang" label="Nama Barang" required="true" :value="$barang->nama_barang" />
        <x-input name="kategori_barang" label="Kategori" required="true" :value="$barang->kategori_barang" />
        <x-select name="kondisi_fisik" label="Kondisi Fisik" required="true"
            :options="['BAIK'=>'Baik','RUSAK_RINGAN'=>'Rusak Ringan','RUSAK_BERAT'=>'Rusak Berat']"
            :selected="$barang->kondisi_fisik" />
        <x-textarea name="deskripsi_aset" label="Deskripsi Aset" rows="3" :value="$barang->deskripsi_aset" />
        <div class="flex gap-3 pt-2">
            <x-button type="submit" variant="primary">Update Barang</x-button>
            <x-button href="{{ route('inventaris.katalog') }}" variant="outline">Batal</x-button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
