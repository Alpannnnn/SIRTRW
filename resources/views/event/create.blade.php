@extends('layouts.app')
@section('title', 'Tambah Event')
@section('breadcrumb') <a href="{{ route('event.index') }}" class="hover:text-teal-600 transition">Event</a> @endsection

@section('content')
<div class="max-w-2xl mx-auto">
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-extrabold text-slate-900">Form Event Baru</h3>
    </div>
    <div class="p-6">
    <form method="POST" action="{{ route('event.store') }}" class="space-y-5">
        @csrf
        <x-input name="judul" label="Nama Event" placeholder="Contoh: Kerja Bakti RT 001" required="true" />
        <x-textarea name="deskripsi" label="Deskripsi (opsional)" placeholder="Detail kegiatan, persiapan, dll..." rows="4" />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input name="tanggal_mulai" label="Tanggal &amp; Waktu Mulai" type="datetime-local" required="true" />
            <x-input name="tanggal_selesai" label="Tanggal &amp; Waktu Selesai (opsional)" type="datetime-local" />
        </div>
        <x-input name="lokasi" label="Lokasi (opsional)" placeholder="Contoh: Balai Warga RW 001" />
        <div class="flex gap-3 pt-2">
            <x-button type="submit" variant="primary">Simpan Event</x-button>
            <x-button href="{{ route('event.index') }}" variant="outline">Batal</x-button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
