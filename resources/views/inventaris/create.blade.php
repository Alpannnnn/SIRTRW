@extends('layouts.app')
@section('title', 'Tambah Barang')
@section('breadcrumb') <a href="{{ route('inventaris.katalog') }}" class="hover:text-teal-600 transition">Inventaris</a> @endsection

@section('content')
<div class="max-w-xl mx-auto">
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-extrabold text-slate-900">Form Barang Inventaris Baru</h3>
    </div>
    <div class="p-6">
    <form method="POST" action="{{ route('inventaris.store') }}" class="space-y-5">
        @csrf
        <x-input name="nama_barang" label="Nama Barang" placeholder="Contoh: Sound System Portable" required="true" />
        <x-input name="kategori_barang" label="Kategori" placeholder="Contoh: Elektronik, Furnitur, Perkakas" required="true" />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input name="total_stok" label="Jumlah Unit" type="number" min="1" value="1" required="true" />
            <x-select name="kondisi_fisik" label="Kondisi Fisik" required="true"
                :options="['BAIK'=>'Baik','RUSAK_RINGAN'=>'Rusak Ringan','RUSAK_BERAT'=>'Rusak Berat']" />
        </div>
        <x-textarea name="deskripsi_aset" label="Deskripsi Aset (opsional)" placeholder="Detail, spesifikasi, atau catatan aset..." rows="3" />
        <div class="flex gap-3 pt-2">
            <x-button type="submit" variant="primary">Tambah Barang</x-button>
            <x-button href="{{ route('inventaris.katalog') }}" variant="outline">Batal</x-button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
