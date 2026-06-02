@extends('layouts.app')
@section('title', 'Panel Admin')

@section('content')

{{-- ═══════════════════════════ --}}
{{-- ALERT NOTIFIKASI URGENT    --}}
{{-- ═══════════════════════════ --}}
@if($stats['pending_verifikasi'] > 0 || $stats['surat_menunggu'] > 0 || $stats['peminjaman_pending'] > 0)
<div class="bg-rose-50 border border-rose-200 rounded-xl p-5 mb-8 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 shadow-xs">
    <div class="flex items-start gap-3">
        <div class="w-10 h-10 bg-rose-100 text-rose-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
        </div>
        <div>
            <h4 class="text-sm font-extrabold text-rose-950">Ada item yang membutuhkan tindakan Anda</h4>
            <div class="flex flex-wrap gap-x-4 gap-y-1.5 mt-2">
                @if($stats['pending_verifikasi'] > 0)
                <span class="flex items-center gap-1.5 text-xs text-rose-800 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                    <strong>{{ $stats['pending_verifikasi'] }}</strong> warga menunggu verifikasi
                </span>
                @endif
                @if($stats['surat_menunggu'] > 0)
                <span class="flex items-center gap-1.5 text-xs text-rose-800 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                    <strong>{{ $stats['surat_menunggu'] }}</strong> surat menunggu persetujuan
                </span>
                @endif
                @if($stats['peminjaman_pending'] > 0)
                <span class="flex items-center gap-1.5 text-xs text-rose-800 font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
                    <strong>{{ $stats['peminjaman_pending'] }}</strong> peminjaman menunggu
                </span>
                @endif
            </div>
        </div>
    </div>
    <a href="{{ route('verifikasi.index') }}" class="bg-rose-600 hover:bg-rose-700 text-white font-bold py-2.5 px-4 rounded-lg shadow-xs transition text-xs flex-shrink-0 cursor-pointer text-center w-full sm:w-auto">
        Tindak Lanjut &rarr;
    </a>
</div>
@endif

{{-- ═══════════════════════════ --}}
{{-- STAT CARDS ROW 1           --}}
{{-- ═══════════════════════════ --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-xl border border-slate-200 p-6 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-blue-50 text-blue-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
        </div>
        <div class="flex-1">
            <div class="text-2xl font-extrabold text-slate-900">{{ $stats['total_warga'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Warga Aktif</div>
            @if($stats['pending_verifikasi'] > 0)
            <a href="{{ route('verifikasi.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 mt-1 block">+{{ $stats['pending_verifikasi'] }} menunggu verifikasi</a>
            @endif
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-6 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
        </div>
        <div class="flex-1">
            <div class="text-2xl font-extrabold text-slate-900">{{ $stats['surat_menunggu'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Surat Perlu Disetujui</div>
            <a href="{{ route('surat.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 mt-1 block">Lihat semua surat</a>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-6 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-red-50 text-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
        </div>
        <div class="flex-1">
            <div class="text-2xl font-extrabold text-slate-900">{{ $stats['aduan_aktif'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Aduan Warga Aktif</div>
            <a href="{{ route('aduan.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 mt-1 block">Lihat semua aduan</a>
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- STAT CARDS ROW 2           --}}
{{-- ═══════════════════════════ --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl border border-slate-200 p-6 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3"/></svg>
        </div>
        <div class="flex-1">
            <div class="text-xl sm:text-2xl font-extrabold text-slate-900 leading-tight">Rp {{ number_format($keuangan['saldo'],0,',','.') }}</div>
            <div class="text-xs font-bold text-slate-500 mt-1 uppercase tracking-wider">Saldo Uang Kas</div>
            <div class="flex gap-2 mt-2">
                <span class="text-[10px] font-bold text-teal-700 bg-teal-50 border border-teal-100 px-1.5 py-0.5 rounded flex items-center gap-1">
                    <svg class="w-3 h-3 text-teal-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" /></svg>
                    Rp {{ number_format($keuangan['pemasukan'],0,',','.') }}
                </span>
                <span class="text-[10px] font-bold text-red-700 bg-red-50 border border-red-100 px-1.5 py-0.5 rounded flex items-center gap-1">
                    <svg class="w-3 h-3 text-red-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                    Rp {{ number_format($keuangan['pengeluaran'],0,',','.') }}
                </span>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-6 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-violet-50 text-violet-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/></svg>
        </div>
        <div class="flex-1">
            <div class="text-2xl font-extrabold text-slate-900">{{ $stats['peminjaman_pending'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Peminjaman Menunggu</div>
            <a href="{{ route('peminjaman.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 mt-1 block">Kelola Peminjaman</a>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-6 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-cyan-50 text-cyan-600 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
        </div>
        <div class="flex-1">
            <div class="text-2xl font-extrabold text-slate-900">{{ $stats['barang_tersedia'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Inventaris Tersedia</div>
            <a href="{{ route('inventaris.katalog') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 mt-1 block">Katalog Barang</a>
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- GRAFIK                     --}}
{{-- ═══════════════════════════ --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center gap-2.5">
            <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v5.25c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 0 1 3 18.375v-5.25ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125v-9.75ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v14.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" /></svg>
            <h3 class="text-sm font-extrabold text-slate-900">Grafik Kas 6 Bulan Terakhir</h3>
        </div>
        <div class="p-5 flex-1 min-h-[260px]">
            <canvas id="adminKasChart" height="220"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center gap-2.5">
            <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" /></svg>
            <h3 class="text-sm font-extrabold text-slate-900">Distribusi Kategori Aduan</h3>
        </div>
        <div class="p-5 flex-1 min-h-[260px]">
            <canvas id="aduanChart" height="220"></canvas>
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- TINDAKAN & DATA            --}}
{{-- ═══════════════════════════ --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

    {{-- Warga Pending Verifikasi --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-.996.43-1.563A6 6 0 1 1 21.75 8.25Z" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Verifikasi Warga</h3>
            </div>
            <a href="{{ route('verifikasi.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">Kelola Semua</a>
        </div>
        <div class="p-5 space-y-4">
            @forelse($pendingWarga as $w)
            <div class="flex items-center justify-between gap-4 py-3 border-b border-slate-100 last:border-0 last:pb-0">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-teal-700 text-white rounded-full flex items-center justify-center font-bold text-xs flex-shrink-0">
                        {{ strtoupper(substr($w->nama_lengkap,0,2)) }}
                    </div>
                    <div>
                        <div class="text-sm font-bold text-slate-900 leading-tight">{{ $w->nama_lengkap }}</div>
                        <div class="text-[10px] text-slate-500 font-semibold mt-0.5">NIK: {{ $w->nik }} · RT {{ $w->rt_id }}</div>
                    </div>
                </div>
                <div class="flex items-center gap-2">
                    <form method="POST" action="{{ route('verifikasi.approve', $w) }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-1.5 bg-teal-50 hover:bg-teal-100 text-teal-700 border border-teal-200 font-bold py-1.5 px-3 rounded-lg transition text-xs cursor-pointer">
                            Setujui
                        </button>
                    </form>
                    <form method="POST" action="{{ route('verifikasi.suspend', $w) }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 font-bold py-1.5 px-3 rounded-lg transition text-xs cursor-pointer">
                            Tolak
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-slate-400">
                <p class="text-xs font-semibold">Semua registrasi warga baru telah diverifikasi.</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Surat Terbaru --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Surat Perlu Ditindak</h3>
            </div>
            <a href="{{ route('surat.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">Lihat Semua</a>
        </div>
        <div class="p-5 space-y-4">
            @forelse($suratTerbaru as $s)
            <div class="flex items-center justify-between gap-4 py-3 border-b border-slate-100 last:border-0 last:pb-0">
                <div>
                    <div class="text-sm font-bold text-slate-900 leading-tight">{{ $s->pemohon->nama_lengkap }}</div>
                    <div class="flex items-center gap-2 mt-1">
                        <x-badge variant="info">{{ str_replace('_',' ',$s->jenis_surat) }}</x-badge>
                        <span class="text-[10px] text-slate-400 font-semibold">{{ $s->created_at->diffForHumans() }}</span>
                    </div>
                </div>
                <div class="flex items-center gap-3">
                    <span class="text-[11px] font-bold text-amber-700 bg-amber-50 border border-amber-100 px-2.5 py-0.5 rounded-full">
                        {{ str_replace('_',' ',$s->status) }}
                    </span>
                    <a href="{{ route('surat.show', $s) }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 bg-teal-50 border border-teal-100 px-3 py-1.5 rounded-lg transition">Tinjau</a>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-slate-400">
                <p class="text-xs font-semibold">Tidak ada pengajuan surat yang menunggu tindakan.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

    {{-- Aduan Warga --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Aduan Aktif Warga</h3>
            </div>
            <a href="{{ route('aduan.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">Lihat Semua</a>
        </div>
        <div class="p-5 space-y-4">
            @forelse($aduanTerbaru as $a)
            @php
                $aVariant = [
                    'KEAMANAN' => 'danger',
                    'FASILITAS' => 'warning',
                    'KEBERSIHAN' => 'info',
                    'PERSELISIHAN' => 'primary'
                ][$a->kategori] ?? 'muted';
            @endphp
            <div class="flex items-center justify-between gap-4 py-3 border-b border-slate-100 last:border-0 last:pb-0">
                <div>
                    <div class="text-sm font-bold text-slate-900 leading-tight">{{ Str::limit($a->judul, 36) }}</div>
                    <div class="text-[10px] text-slate-500 font-semibold mt-1">Oleh: {{ $a->pelapor->nama_lengkap }} · {{ $a->created_at->diffForHumans() }}</div>
                </div>
                <div class="flex items-center gap-3">
                    <x-badge :variant="$aVariant">{{ $a->kategori }}</x-badge>
                    <a href="{{ route('aduan.show', $a) }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 bg-teal-50 border border-teal-100 px-3 py-1.5 rounded-lg transition">Detail</a>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-slate-400">
                <p class="text-xs font-semibold">Tidak ada aduan warga aktif saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>

    {{-- Peminjaman Aset --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Peminjaman Menunggu</h3>
            </div>
            <a href="{{ route('peminjaman.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">Kelola Semua</a>
        </div>
        <div class="p-5 space-y-4">
            @forelse($peminjamanPending as $p)
            <div class="flex items-center justify-between gap-4 py-3 border-b border-slate-100 last:border-0 last:pb-0">
                <div>
                    <div class="text-sm font-bold text-slate-900 leading-tight">{{ $p->barang->nama_barang }}</div>
                    <div class="text-[10px] text-slate-500 font-semibold mt-1">Peminjam: {{ $p->warga->nama_lengkap }} · {{ $p->jumlah_pinjam }} unit · s/d {{ \Carbon\Carbon::parse($p->tanggal_kembali_rencana)->format('d M') }}</div>
                </div>
                <div class="flex items-center gap-2">
                    <form method="POST" action="{{ route('peminjaman.approve', $p) }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-1.5 bg-teal-50 hover:bg-teal-100 text-teal-700 border border-teal-200 font-bold py-1.5 px-3 rounded-lg transition text-xs cursor-pointer">
                            Setuju
                        </button>
                    </form>
                    <form method="POST" action="{{ route('peminjaman.reject', $p) }}">
                        @csrf
                        <button type="submit" class="inline-flex items-center gap-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 font-bold py-1.5 px-3 rounded-lg transition text-xs cursor-pointer">
                            Tolak
                        </button>
                    </form>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-slate-400">
                <p class="text-xs font-semibold">Tidak ada peminjaman menunggu persetujuan.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- AKSI CEPAT + EVENT         --}}
{{-- ═══════════════════════════ --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

    {{-- Quick Actions --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center gap-2.5">
            <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" /></svg>
            <h3 class="text-sm font-extrabold text-slate-900">Aksi Cepat</h3>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-4">
                <a href="{{ route('pengumuman.create') }}" class="bg-slate-50 hover:bg-teal-50 hover:border-teal-300 border border-slate-200 p-4 rounded-xl flex flex-col items-center text-center transition">
                    <div class="w-10 h-10 bg-rose-50 text-rose-600 rounded-lg flex items-center justify-center mb-2.5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73" /></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-900 leading-tight">Buat Pengumuman</span>
                </a>
                <a href="{{ route('kas.create') }}" class="bg-slate-50 hover:bg-teal-50 hover:border-teal-300 border border-slate-200 p-4 rounded-xl flex flex-col items-center text-center transition">
                    <div class="w-10 h-10 bg-emerald-50 text-emerald-600 rounded-lg flex items-center justify-center mb-2.5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H3.75a1.5 1.5 0 0 1-1.5-1.5V6a1.5 1.5 0 0 1 1.5-1.5Zm13.5 3.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Z" /></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-900 leading-tight">Catat Kas Masuk/Keluar</span>
                </a>
                <a href="{{ route('event.create') }}" class="bg-slate-50 hover:bg-teal-50 hover:border-teal-300 border border-slate-200 p-4 rounded-xl flex flex-col items-center text-center transition">
                    <div class="w-10 h-10 bg-violet-50 text-violet-600 rounded-lg flex items-center justify-center mb-2.5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" /></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-900 leading-tight">Tambah Event Baru</span>
                </a>
                <a href="{{ route('inventaris.create') }}" class="bg-slate-50 hover:bg-teal-50 hover:border-teal-300 border border-slate-200 p-4 rounded-xl flex flex-col items-center text-center transition">
                    <div class="w-10 h-10 bg-cyan-50 text-cyan-600 rounded-lg flex items-center justify-center mb-2.5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" /></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-900 leading-tight">Tambah Inventaris</span>
                </a>
                <a href="{{ route('verifikasi.index') }}" class="bg-slate-50 hover:bg-teal-50 hover:border-teal-300 border border-slate-200 p-4 rounded-xl flex flex-col items-center text-center transition">
                    <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center mb-2.5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-.996.43-1.563A6 6 0 1 1 21.75 8.25Z" /></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-900 leading-tight">Verifikasi Warga Baru</span>
                </a>
                <a href="{{ route('kependudukan.index') }}" class="bg-slate-50 hover:bg-teal-50 hover:border-teal-300 border border-slate-200 p-4 rounded-xl flex flex-col items-center text-center transition">
                    <div class="w-10 h-10 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mb-2.5">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" /></svg>
                    </div>
                    <span class="text-xs font-bold text-slate-900 leading-tight">Database Kependudukan</span>
                </a>
            </div>
        </div>
    </div>

    {{-- Event Mendatang --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Agenda Terjadwal</h3>
            </div>
            <a href="{{ route('event.create') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">+ Tambah Agenda</a>
        </div>
        <div class="p-5 space-y-4">
            @forelse($eventMendatang as $e)
            <div class="flex items-center gap-4 border-b border-slate-100 last:border-0 pb-4 last:pb-0">
                <div class="bg-teal-50 border border-teal-100 text-teal-800 rounded-lg p-2.5 text-center min-w-[56px] flex-shrink-0">
                    <div class="text-lg font-black leading-none">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                    <div class="text-[9px] font-bold uppercase tracking-wider mt-0.5">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</div>
                </div>
                <div class="space-y-0.5">
                    <div class="text-sm font-bold text-slate-900 leading-snug">{{ $e->judul }}</div>
                    <div class="flex items-center gap-3 text-[10px] text-slate-500 font-semibold">
                        <span class="flex items-center gap-1">
                            <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                            {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('H:i') }} WIB
                        </span>
                        @if($e->lokasi)
                            <span class="flex items-center gap-1">
                                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                                {{ Str::limit($e->lokasi, 22) }}
                            </span>
                        @endif
                    </div>
                    <div class="text-[10px] font-bold text-teal-700 mt-1 uppercase tracking-wider">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->diffForHumans() }}</div>
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-slate-400">
                <p class="text-xs font-semibold">Belum ada agenda terjadwal.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
// Kas Chart
new Chart(document.getElementById('adminKasChart').getContext('2d'), {
    type: 'bar',
    data: {
        labels: @json(collect($chartKas)->pluck('label')),
        datasets: [
            { label: 'Pemasukan', data: @json(collect($chartKas)->pluck('pemasukan')), backgroundColor: '#0f766e', hoverBackgroundColor: '#0d9488', borderRadius: 4 },
            { label: 'Pengeluaran', data: @json(collect($chartKas)->pluck('pengeluaran')), backgroundColor: '#f43f5e', hoverBackgroundColor: '#e11d48', borderRadius: 4 }
        ]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        plugins: { 
            legend: { 
                labels: { color: '#334155', font: { family: 'Inter', size: 11, weight: 'bold' } } 
            } 
        },
        scales: {
            x: { ticks: { color: '#475569', font: { family: 'Inter', size: 11, weight: 'bold' } }, grid: { color: 'rgba(148,163,184,0.06)' } },
            y: { ticks: { color: '#475569', font: { family: 'Inter', size: 11, weight: 'bold' }, callback: v => 'Rp '+(v/1000)+'k' }, grid: { color: 'rgba(148,163,184,0.06)' } }
        }
    }
});

// Aduan Doughnut
const aduanData = @json($aduanByKategori);
new Chart(document.getElementById('aduanChart').getContext('2d'), {
    type: 'doughnut',
    data: {
        labels: Object.keys(aduanData),
        datasets: [{
            data: Object.values(aduanData),
            backgroundColor: ['#f43f5e','#f59e0b','#0ea5e9','#8b5cf6'],
            borderColor: '#ffffff', borderWidth: 2
        }]
    },
    options: {
        responsive: true, maintainAspectRatio: false, cutout: '65%',
        plugins: {
            legend: { 
                position: 'right', 
                labels: { color: '#334155', font: { family: 'Inter', size: 11, weight: 'bold' }, padding: 12 } 
            }
        }
    }
});
</script>
@endpush
