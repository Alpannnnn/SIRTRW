@extends('layouts.app')
@section('title', 'Ajukan Surat')
@section('breadcrumb') <a href="{{ route('surat.index') }}">Surat</a> <span class="separator">›</span> Ajukan Baru @endsection

@section('content')
<div style="max-width:700px;margin:0 auto">
<x-card title="Form Pengajuan Surat">
    <form method="POST" action="{{ route('surat.store') }}">
        @csrf

        <x-select
            name="jenis_surat"
            label="Jenis Surat"
            required="true"
            :options="['DOMISILI' => 'Surat Keterangan Domisili', 'KTP' => 'Surat Pengantar KTP', 'SKTM' => 'Surat Keterangan Tidak Mampu (SKTM)']"
        />

        <x-textarea
            name="tujuan_pembuatan"
            label="Tujuan Pembuatan Surat"
            placeholder="Jelaskan tujuan pengajuan surat ini secara detail. Contoh: Untuk keperluan pembuatan KTP baru di Dinas Kependudukan..."
            rows="5"
            required="true"
        />

        <div class="alert alert-info">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/></svg>
            <span>Surat akan diproses oleh Pengurus RT terlebih dahulu, kemudian diteruskan ke Pengurus RW untuk tanda tangan akhir. Estimasi waktu: 1–3 hari kerja.</span>
        </div>

        <div class="flex gap-3">
            <x-button type="submit" variant="primary">Ajukan Permohonan</x-button>
            <a href="{{ route('surat.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</x-card>
</div>
@endsection
