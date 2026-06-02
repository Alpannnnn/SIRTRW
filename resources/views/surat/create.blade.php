@extends('layouts.app')
@section('title', 'Ajukan Surat')
@section('breadcrumb') <a href="{{ route('surat.index') }}" class="hover:text-teal-600 transition">Surat</a> @endsection

@section('content')
<div class="max-w-2xl mx-auto">
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-extrabold text-slate-900">Form Pengajuan Surat</h3>
    </div>
    <div class="p-6">
    <form method="POST" action="{{ route('surat.store') }}" class="space-y-5">
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

        <div class="bg-cyan-50 border border-cyan-200 rounded-lg p-4 flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-cyan-600 flex-shrink-0 mt-0.5"><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/></svg>
            <span class="text-xs font-semibold text-cyan-800">Surat akan diproses oleh Pengurus RT terlebih dahulu, kemudian diteruskan ke Pengurus RW untuk tanda tangan akhir. Estimasi waktu: 1–3 hari kerja.</span>
        </div>

        <div class="flex gap-3 pt-2">
            <x-button type="submit" variant="primary">Ajukan Permohonan</x-button>
            <x-button href="{{ route('surat.index') }}" variant="outline">Batal</x-button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
