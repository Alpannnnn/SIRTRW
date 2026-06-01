@extends('layouts.app')
@section('title', 'Buat Pengumuman')
@section('breadcrumb') <a href="{{ route('pengumuman.index') }}">Pengumuman</a> <span class="separator">›</span> Buat Baru @endsection

@section('content')
<div style="max-width:700px;margin:0 auto">
<x-card title="Form Pengumuman Baru">
    <form method="POST" action="{{ route('pengumuman.store') }}">
        @csrf

        <x-input name="judul" label="Judul Pengumuman" placeholder="Contoh: Jadwal Kerja Bakti Bulan Juni" required="true" />

        <x-textarea name="konten" label="Isi Pengumuman" placeholder="Tuliskan isi pengumuman secara lengkap dan jelas..." rows="6" required="true" />

        <x-input name="tampil_sampai" label="Tampilkan Hingga (opsional)" type="datetime-local" />

        <div class="form-group">
            <div class="form-check">
                <input type="checkbox" id="is_urgent" name="is_urgent" value="1">
                <label for="is_urgent" style="margin-bottom:0;">
                    <span style="color:var(--color-danger);font-weight:700;">🚨 Tandai sebagai URGENT</span>
                    <span class="text-xs text-muted" style="display:block;margin-top:2px;">Pengumuman urgent akan ditampilkan lebih menonjol di bagian atas.</span>
                </label>
            </div>
        </div>

        <div class="flex gap-3 mt-6">
            <x-button type="submit" variant="primary">Publikasikan</x-button>
            <a href="{{ route('pengumuman.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</x-card>
</div>
@endsection
