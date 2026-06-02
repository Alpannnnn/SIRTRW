@extends('layouts.app')
@section('title', 'Ajukan Peminjaman')
@section('breadcrumb') <a href="{{ route('peminjaman.index') }}" class="hover:text-teal-600 transition">Peminjaman</a> @endsection

@section('content')
<div class="max-w-2xl mx-auto">
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-extrabold text-slate-900">Form Permohonan Peminjaman Barang</h3>
    </div>
    <div class="p-6">
    <form method="POST" action="{{ route('peminjaman.store') }}" class="space-y-5">
        @csrf

        <div>
            <label class="block text-sm font-bold text-slate-700 mb-1.5">Pilih Barang <span class="text-rose-500">*</span></label>
            <select name="barang_id" class="w-full border border-slate-300 rounded-lg px-3 py-2 text-sm text-slate-800 bg-white focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-transparent @error('barang_id') border-rose-400 @enderror" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barang as $b)
                    <option value="{{ $b->id }}" {{ request('barang_id') == $b->id || old('barang_id') == $b->id ? 'selected':'' }}>
                        {{ $b->nama_barang }} ({{ $b->kategori_barang }}) — {{ $b->stok_tersedia }} unit tersedia
                    </option>
                @endforeach
            </select>
            @error('barang_id')<p class="text-xs text-rose-600 font-semibold mt-1">{{ $message }}</p>@enderror
        </div>

        <x-input name="jumlah_pinjam" label="Jumlah yang Dipinjam" type="number" min="1" value="1" required="true" />

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input name="tanggal_mulai" label="Tanggal Mulai Pinjam" type="date" required="true" value="{{ date('Y-m-d') }}" />
            <x-input name="tanggal_kembali_rencana" label="Rencana Tanggal Kembali" type="date" required="true" />
        </div>

        <x-textarea name="alasan_peminjaman" label="Keperluan / Alasan Peminjaman" placeholder="Jelaskan untuk keperluan apa barang ini akan digunakan..." rows="4" required="true" />

        <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 flex items-start gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-amber-600 flex-shrink-0 mt-0.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
            <span class="text-xs font-semibold text-amber-800">Barang wajib dikembalikan dalam kondisi baik sesuai tanggal yang telah disepakati.</span>
        </div>

        <div class="flex gap-3 pt-2">
            <x-button type="submit" variant="primary">Ajukan Permohonan</x-button>
            <x-button href="{{ route('peminjaman.index') }}" variant="outline">Batal</x-button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
