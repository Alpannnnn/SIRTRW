@extends('layouts.app')
@section('title', 'Buat Aduan')
@section('breadcrumb') <a href="{{ route('aduan.index') }}" class="hover:text-teal-600 transition">Aduan</a> @endsection

@section('content')
<div class="max-w-2xl mx-auto">
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-extrabold text-slate-900">Form Pengaduan Warga</h3>
    </div>
    <div class="p-6">
    <form method="POST" action="{{ route('aduan.store') }}" class="space-y-5">
        @csrf

        <x-input name="judul" label="Judul Aduan" placeholder="Ringkasan singkat masalah yang ingin dilaporkan" required="true" />

        <x-select
            name="kategori"
            label="Kategori Masalah"
            required="true"
            :options="['KEAMANAN'=>'Keamanan Lingkungan','FASILITAS'=>'Fasilitas Umum','KEBERSIHAN'=>'Kebersihan','PERSELISIHAN'=>'Perselisihan Warga']"
        />

        <x-textarea
            name="deskripsi"
            label="Deskripsi Lengkap"
            placeholder="Jelaskan masalah secara rinci: lokasi, waktu kejadian, dampak, dan harapan penyelesaian..."
            rows="6"
            required="true"
        />

        <div class="flex gap-3 pt-2">
            <x-button type="submit" variant="primary">Kirim Aduan</x-button>
            <x-button href="{{ route('aduan.index') }}" variant="outline">Batal</x-button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
