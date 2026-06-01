@extends('layouts.app')
@section('title', 'Ajukan Peminjaman')
@section('breadcrumb') <a href="{{ route('peminjaman.index') }}">Peminjaman</a> <span class="separator">›</span> Ajukan Baru @endsection

@section('content')
<div style="max-width:700px;margin:0 auto">
<x-card title="Form Permohonan Peminjaman Barang">
    <form method="POST" action="{{ route('peminjaman.store') }}">
        @csrf

        <div class="form-group">
            <label class="form-label">Pilih Barang <span class="text-danger">*</span></label>
            <select name="barang_id" class="form-control @error('barang_id') is-invalid @enderror" required>
                <option value="">-- Pilih Barang --</option>
                @foreach($barang as $b)
                    <option value="{{ $b->id }}" {{ request('barang_id') == $b->id || old('barang_id') == $b->id ? 'selected':'' }}>
                        {{ $b->nama_barang }} ({{ $b->kategori_barang }}) — {{ $b->stok_tersedia }} unit tersedia
                    </option>
                @endforeach
            </select>
            @error('barang_id')<span class="form-error">{{ $message }}</span>@enderror
        </div>

        <x-input name="jumlah_pinjam" label="Jumlah yang Dipinjam" type="number" min="1" value="1" required="true" />

        <div class="grid grid-2 gap-4">
            <x-input name="tanggal_mulai" label="Tanggal Mulai Pinjam" type="date" required="true" value="{{ date('Y-m-d') }}" />
            <x-input name="tanggal_kembali_rencana" label="Rencana Tanggal Kembali" type="date" required="true" />
        </div>

        <x-textarea name="alasan_peminjaman" label="Keperluan / Alasan Peminjaman" placeholder="Jelaskan untuk keperluan apa barang ini akan digunakan..." rows="4" required="true" />

        <div class="alert alert-warning">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
            <span>Barang wajib dikembalikan dalam kondisi baik sesuai tanggal yang telah disepakati.</span>
        </div>

        <div class="flex gap-3 mt-4">
            <x-button type="submit" variant="primary">Ajukan Permohonan</x-button>
            <a href="{{ route('peminjaman.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</x-card>
</div>
@endsection
