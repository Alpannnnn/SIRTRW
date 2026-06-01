@extends('layouts.app')
@section('title', 'Buat Aduan')
@section('breadcrumb') <a href="{{ route('aduan.index') }}">Aduan</a> <span class="separator">›</span> Buat Baru @endsection

@section('content')
<div style="max-width:700px;margin:0 auto">
<x-card title="Form Pengaduan Warga">
    <form method="POST" action="{{ route('aduan.store') }}">
        @csrf

        <x-input name="judul" label="Judul Aduan" placeholder="Ringkasan singkat masalah yang ingin dilaporkan" required="true" />

        <x-select
            name="kategori"
            label="Kategori Masalah"
            required="true"
            :options="['KEAMANAN'=>'🔒 Keamanan Lingkungan','FASILITAS'=>'🏗️ Fasilitas Umum','KEBERSIHAN'=>'🧹 Kebersihan','PERSELISIHAN'=>'⚖️ Perselisihan Warga']"
        />

        <x-textarea
            name="deskripsi"
            label="Deskripsi Lengkap"
            placeholder="Jelaskan masalah secara rinci: lokasi, waktu kejadian, dampak, dan harapan penyelesaian..."
            rows="6"
            required="true"
        />

        <div class="flex gap-3 mt-4">
            <x-button type="submit" variant="primary">Kirim Aduan</x-button>
            <a href="{{ route('aduan.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</x-card>
</div>
@endsection
