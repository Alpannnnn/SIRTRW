@extends('layouts.app')
@section('title', 'Buat Pengumuman')
@section('breadcrumb') <a href="{{ route('pengumuman.index') }}" class="hover:text-teal-600 transition">Pengumuman</a> @endsection

@section('content')
<div class="max-w-2xl mx-auto">
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-extrabold text-slate-900">Form Pengumuman Baru</h3>
    </div>
    <div class="p-6">
    <form method="POST" action="{{ route('pengumuman.store') }}" class="space-y-5">
        @csrf

        <x-input name="judul" label="Judul Pengumuman" placeholder="Contoh: Jadwal Kerja Bakti Bulan Juni" required="true" />

        <x-textarea name="konten" label="Isi Pengumuman" placeholder="Tuliskan isi pengumuman secara lengkap dan jelas..." rows="6" required="true" />

        <x-input name="tampil_sampai" label="Tampilkan Hingga (opsional)" type="datetime-local" />

        <div class="flex items-start gap-3 bg-slate-50 border border-slate-200 rounded-lg p-4">
            <input id="is_urgent" name="is_urgent" type="checkbox" value="1" class="h-4 w-4 rounded border-slate-300 text-teal-700 focus:ring-teal-500 cursor-pointer mt-0.5 flex-shrink-0">
            <div>
                <label for="is_urgent" class="text-sm font-extrabold text-slate-900 flex items-center gap-1.5 cursor-pointer">
                    <svg class="w-4 h-4 text-red-600 inline flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                    Tandai sebagai URGENT
                </label>
                <p class="text-xs text-slate-500 font-semibold mt-0.5">Pengumuman urgent akan ditampilkan lebih menonjol di bagian atas.</p>
            </div>
        </div>

        <div class="flex gap-3 pt-2">
            <x-button type="submit" variant="primary">Publikasikan</x-button>
            <x-button href="{{ route('pengumuman.index') }}" variant="outline">Batal</x-button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
