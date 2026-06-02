@extends('layouts.app')
@section('title', 'Catat Transaksi Kas')
@section('breadcrumb') <a href="{{ route('kas.dashboard') }}" class="hover:text-teal-600 transition">Keuangan</a> @endsection

@section('content')
<div class="max-w-xl mx-auto">
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-extrabold text-slate-900">Form Pencatatan Transaksi Kas</h3>
    </div>
    <div class="p-6">
    <form method="POST" action="{{ route('kas.store') }}" class="space-y-5">
        @csrf

        <x-select name="jenis" label="Jenis Transaksi" required="true"
            :options="['PEMASUKAN'=>'Pemasukan','PENGELUARAN'=>'Pengeluaran']" />

        <x-select name="rt_rw_scope" label="Lingkup" required="true"
            :options="['RT'=>'Kas RT','RW'=>'Kas RW']" />

        <x-input name="jumlah" label="Jumlah (Rp)" type="number" placeholder="Contoh: 500000" required="true" min="1" />

        <x-input name="tanggal_transaksi" label="Tanggal Transaksi" type="date" required="true" value="{{ date('Y-m-d') }}" />

        <x-textarea name="keterangan" label="Keterangan" placeholder="Deskripsi singkat transaksi ini..." rows="3" required="true" />

        <div class="flex gap-3 pt-2">
            <x-button type="submit" variant="primary">Simpan Transaksi</x-button>
            <x-button href="{{ route('kas.dashboard') }}" variant="outline">Batal</x-button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
