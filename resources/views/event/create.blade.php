@extends('layouts.app')
@section('title', 'Tambah Event')
@section('breadcrumb') <a href="{{ route('event.index') }}">Event</a> <span class="separator">›</span> Tambah Baru @endsection

@section('content')
<div style="max-width:700px;margin:0 auto">
<x-card title="Form Event Baru">
    <form method="POST" action="{{ route('event.store') }}">
        @csrf
        <x-input name="judul" label="Nama Event" placeholder="Contoh: Kerja Bakti RT 001" required="true" />
        <x-textarea name="deskripsi" label="Deskripsi (opsional)" placeholder="Detail kegiatan, persiapan, dll..." rows="4" />
        <div class="grid grid-2 gap-4">
            <x-input name="tanggal_mulai" label="Tanggal & Waktu Mulai" type="datetime-local" required="true" />
            <x-input name="tanggal_selesai" label="Tanggal & Waktu Selesai (opsional)" type="datetime-local" />
        </div>
        <x-input name="lokasi" label="Lokasi (opsional)" placeholder="Contoh: Balai Warga RW 001" />
        <div class="flex gap-3 mt-4">
            <x-button type="submit" variant="primary">Simpan Event</x-button>
            <a href="{{ route('event.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</x-card>
</div>
@endsection
