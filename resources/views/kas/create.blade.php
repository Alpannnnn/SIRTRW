@extends('layouts.app')
@section('title', 'Catat Transaksi Kas')
@section('breadcrumb') <a href="{{ route('kas.dashboard') }}">Keuangan</a> <span class="separator">›</span> Catat Transaksi @endsection

@section('content')
<div style="max-width:600px;margin:0 auto">
<x-card title="Form Pencatatan Transaksi Kas">
    <form method="POST" action="{{ route('kas.store') }}">
        @csrf

        <x-select name="jenis" label="Jenis Transaksi" required="true"
            :options="['PEMASUKAN'=>'Pemasukan','PENGELUARAN'=>'Pengeluaran']" />

        <x-select name="rt_rw_scope" label="Lingkup" required="true"
            :options="['RT'=>'Kas RT','RW'=>'Kas RW']" />

        <x-input name="jumlah" label="Jumlah (Rp)" type="number" placeholder="Contoh: 500000" required="true" min="1" />

        <x-input name="tanggal_transaksi" label="Tanggal Transaksi" type="date" required="true" value="{{ date('Y-m-d') }}" />

        <x-textarea name="keterangan" label="Keterangan" placeholder="Deskripsi singkat transaksi ini..." rows="3" required="true" />

        <div class="flex gap-3 mt-4">
            <x-button type="submit" variant="primary">Simpan Transaksi</x-button>
            <a href="{{ route('kas.dashboard') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</x-card>
</div>
@endsection
