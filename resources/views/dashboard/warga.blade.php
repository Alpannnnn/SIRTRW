@extends('layouts.app')
@section('title', 'Beranda')

@section('content')

{{-- ═══════════════════════════ --}}
{{-- GREETING BANNER            --}}
{{-- ═══════════════════════════ --}}
<div class="bg-teal-50 border border-teal-200 rounded-2xl p-6 sm:p-8 flex flex-col md:flex-row justify-between items-start md:items-center gap-6 mb-8 shadow-xs">
    <div>
        <span class="text-xs font-bold text-teal-800 uppercase tracking-wider mb-1 block">{{ now()->translatedFormat('l, d F Y') }}</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-slate-900 tracking-tight">
            Selamat datang, <span class="text-teal-700">{{ explode(' ', $user->nama_lengkap)[0] }}</span>
        </h2>
        <div class="text-sm text-slate-500 font-semibold mt-1 flex flex-wrap items-center gap-x-2 gap-y-1">
            <span>NIK: {{ $user->nik }}</span>
            <span>·</span>
            <span>RT {{ $user->rt_id }}/RW {{ $user->rw_id }}</span>
            <span>·</span>
            <span>Blok {{ $user->blok_rumah }}</span>
        </div>
    </div>
    <div class="flex flex-wrap gap-3 w-full md:w-auto">
        <a href="{{ route('surat.create') }}" class="inline-flex items-center justify-center gap-2 bg-teal-700 hover:bg-teal-800 text-white font-bold py-3 px-5 rounded-lg shadow-xs transition text-sm cursor-pointer w-full sm:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
            Ajukan Surat
        </a>
        <a href="{{ route('aduan.create') }}" class="inline-flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-5 rounded-lg shadow-xs transition text-sm cursor-pointer w-full sm:w-auto">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
            Buat Aduan
        </a>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- STAT CARDS (3 kolom)       --}}
{{-- ═══════════════════════════ --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
    <div class="bg-white rounded-xl border border-slate-200 p-6 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-blue-50 text-blue-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
        </div>
        <div>
            <div class="text-2xl font-extrabold text-slate-900">{{ $myStats['surat'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Surat Diajukan</div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-6 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-red-50 text-red-600 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
        </div>
        <div>
            <div class="text-2xl font-extrabold text-slate-900">{{ $myStats['aduan'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Aduan Dikirim</div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-6 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-violet-50 text-violet-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
        </div>
        <div>
            <div class="text-2xl font-extrabold text-slate-900">{{ $myStats['peminjaman'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Peminjaman Aktif</div>
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- LAYANAN CEPAT              --}}
{{-- ═══════════════════════════ --}}
<div class="flex justify-between items-center mb-5">
    <h3 class="text-lg font-extrabold text-slate-900 tracking-tight">Layanan Warga</h3>
</div>
<div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4 mb-8">
    <a href="{{ route('surat.create') }}" class="bg-white rounded-xl border border-slate-200 p-5 flex flex-col items-center text-center hover:border-teal-700 hover:shadow-xs transition">
        <div class="w-10 h-10 bg-blue-50 text-blue-700 rounded-lg flex items-center justify-center mb-3">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
        </div>
        <div class="text-sm font-bold text-slate-900 leading-tight">Ajukan Surat</div>
        <div class="text-[10px] text-slate-500 mt-1 font-semibold leading-normal">Domisili, KTP, SKTM</div>
    </a>

    <a href="{{ route('aduan.create') }}" class="bg-white rounded-xl border border-slate-200 p-5 flex flex-col items-center text-center hover:border-teal-700 hover:shadow-xs transition">
        <div class="w-10 h-10 bg-red-50 text-red-600 rounded-lg flex items-center justify-center mb-3">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
        </div>
        <div class="text-sm font-bold text-slate-900 leading-tight">Buat Aduan</div>
        <div class="text-[10px] text-slate-500 mt-1 font-semibold leading-normal">Laporkan masalah</div>
    </a>

    <a href="{{ route('peminjaman.create') }}" class="bg-white rounded-xl border border-slate-200 p-5 flex flex-col items-center text-center hover:border-teal-700 hover:shadow-xs transition">
        <div class="w-10 h-10 bg-violet-50 text-violet-700 rounded-lg flex items-center justify-center mb-3">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
        </div>
        <div class="text-sm font-bold text-slate-900 leading-tight">Pinjam Barang</div>
        <div class="text-[10px] text-slate-500 mt-1 font-semibold leading-normal">Aset RT/RW</div>
    </a>

    <a href="{{ route('kas.dashboard') }}" class="bg-white rounded-xl border border-slate-200 p-5 flex flex-col items-center text-center hover:border-teal-700 hover:shadow-xs transition">
        <div class="w-10 h-10 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center mb-3">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3"/></svg>
        </div>
        <div class="text-sm font-bold text-slate-900 leading-tight">Info Kas</div>
        <div class="text-[10px] text-slate-500 mt-1 font-semibold leading-normal">Keuangan transparan</div>
    </a>

    <a href="{{ route('pengumuman.index') }}" class="bg-white rounded-xl border border-slate-200 p-5 flex flex-col items-center text-center hover:border-teal-700 hover:shadow-xs transition">
        <div class="w-10 h-10 bg-amber-50 text-amber-600 rounded-lg flex items-center justify-center mb-3">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/></svg>
        </div>
        <div class="text-sm font-bold text-slate-900 leading-tight">Pengumuman</div>
        <div class="text-[10px] text-slate-500 mt-1 font-semibold leading-normal">Pemberitahuan resmi</div>
    </a>

    <a href="{{ route('event.index') }}" class="bg-white rounded-xl border border-slate-200 p-5 flex flex-col items-center text-center hover:border-teal-700 hover:shadow-xs transition">
        <div class="w-10 h-10 bg-cyan-50 text-cyan-600 rounded-lg flex items-center justify-center mb-3">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
        </div>
        <div class="text-sm font-bold text-slate-900 leading-tight">Agenda</div>
        <div class="text-[10px] text-slate-500 mt-1 font-semibold leading-normal">Jadwal lingkungan</div>
    </a>
</div>

{{-- ═══════════════════════════ --}}
{{-- KONTEN UTAMA: 2 KOLOM      --}}
{{-- ═══════════════════════════ --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">

    {{-- Pengumuman Terbaru --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Pengumuman RT/RW</h3>
            </div>
            <a href="{{ route('pengumuman.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">Lihat Semua</a>
        </div>
        <div class="p-5 space-y-4 flex-1">
            @forelse($recentPengumuman as $p)
                <div class="border-b border-slate-100 last:border-0 pb-4 last:pb-0 space-y-1">
                    <div class="flex items-center gap-2 mb-1.5">
                        @if($p->is_urgent)
                            <x-badge variant="danger">PENTING</x-badge>
                        @else
                            <x-badge variant="info">INFO</x-badge>
                        @endif
                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-wider">{{ $p->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="text-sm font-bold text-slate-950 leading-snug">{{ $p->judul }}</div>
                    <div class="text-xs text-slate-500 leading-relaxed font-semibold">{{ Str::limit($p->konten, 100) }}</div>
                </div>
            @empty
                <div class="text-center py-8 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto mb-2 text-slate-300"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l-6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z"/></svg>
                    <p class="text-xs font-semibold">Belum ada pengumuman.</p>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Agenda Mendatang --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Agenda Mendatang</h3>
            </div>
            <a href="{{ route('event.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">Lihat Semua</a>
        </div>
        <div class="p-5 space-y-4 flex-1">
            @forelse($eventMendatang as $e)
                <div class="flex items-center gap-4 border-b border-slate-100 last:border-0 pb-4 last:pb-0">
                    <div class="bg-teal-50 border border-teal-100 text-teal-800 rounded-lg p-2 text-center min-w-[52px] flex-shrink-0">
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
                                    {{ Str::limit($e->lokasi, 25) }}
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center py-8 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mx-auto mb-2 text-slate-300"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                    <p class="text-xs font-semibold">Belum ada agenda mendatang.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>

{{-- ═══════════════════════════ --}}
{{-- STATUS PENGAJUAN SAYA      --}}
{{-- ═══════════════════════════ --}}
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">

    {{-- Surat Saya --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Surat Saya</h3>
            </div>
            <a href="{{ route('surat.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">Semua</a>
        </div>
        <div class="p-5 space-y-3">
            @forelse($mySurat as $s)
                @php
                    $sVariant = [
                        'DIAJUKAN' => 'warning',
                        'DISETUJUI_RT' => 'info',
                        'DISETUJUI_RW' => 'primary',
                        'SELESAI' => 'success',
                        'DITOLAK' => 'danger'
                    ][$s->status] ?? 'muted';
                @endphp
                <div class="flex justify-between items-center py-2.5 border-b border-slate-100 last:border-0 last:pb-0">
                    <div>
                        <div class="text-sm font-bold text-slate-900 leading-tight">{{ str_replace('_',' ',$s->jenis_surat) }}</div>
                        <div class="text-[10px] text-slate-400 font-semibold mt-0.5">{{ $s->created_at->format('d M Y') }}</div>
                    </div>
                    <x-badge :variant="$sVariant">{{ str_replace('_',' ',$s->status) }}</x-badge>
                </div>
            @empty
                <div class="text-center py-6 text-slate-400">
                    <p class="text-xs font-semibold mb-3">Belum ada pengajuan surat.</p>
                    <a href="{{ route('surat.create') }}" class="inline-flex items-center gap-1 text-xs font-bold text-teal-700 hover:text-teal-800 bg-teal-50 hover:bg-teal-100 border border-teal-100 px-3 py-1.5 rounded-lg transition">
                        Ajukan Surat Baru
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Aduan Saya --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-red-600 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Aduan Saya</h3>
            </div>
            <a href="{{ route('aduan.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">Semua</a>
        </div>
        <div class="p-5 space-y-3">
            @forelse($myAduan as $a)
                @php
                    $aVariant = [
                        'DITERIMA' => 'warning',
                        'DIPROSES' => 'info',
                        'SELESAI' => 'success'
                    ][$a->status] ?? 'muted';
                @endphp
                <div class="flex justify-between items-center py-2.5 border-b border-slate-100 last:border-0 last:pb-0">
                    <div>
                        <div class="text-sm font-bold text-slate-900 leading-tight">{{ Str::limit($a->judul, 28) }}</div>
                        <div class="text-[10px] text-slate-400 font-semibold mt-0.5">{{ $a->created_at->diffForHumans() }}</div>
                    </div>
                    <x-badge :variant="$aVariant">{{ $a->status }}</x-badge>
                </div>
            @empty
                <div class="text-center py-6 text-slate-400">
                    <p class="text-xs font-semibold mb-3">Belum ada aduan warga.</p>
                    <a href="{{ route('aduan.create') }}" class="inline-flex items-center gap-1 text-xs font-bold text-red-700 hover:text-red-800 bg-red-50 hover:bg-red-100 border border-red-100 px-3 py-1.5 rounded-lg transition">
                        Buat Aduan Baru
                    </a>
                </div>
            @endforelse
        </div>
    </div>

    {{-- Peminjaman Saya --}}
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Peminjaman Saya</h3>
            </div>
            <a href="{{ route('peminjaman.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">Semua</a>
        </div>
        <div class="p-5 space-y-3">
            @forelse($myPeminjaman as $p)
                @php
                    $pVariant = [
                        'MENUNGGU_PERSETUJUAN' => 'warning',
                        'APPROVED' => 'info',
                        'ON_USE' => 'primary',
                        'RETURNED' => 'muted',
                        'REJECTED' => 'danger'
                    ][$p->status_peminjaman] ?? 'muted';
                @endphp
                <div class="flex justify-between items-center py-2.5 border-b border-slate-100 last:border-0 last:pb-0">
                    <div>
                        <div class="text-sm font-bold text-slate-900 leading-tight">{{ $p->barang->nama_barang }}</div>
                        <div class="text-[10px] text-slate-400 font-semibold mt-0.5">{{ $p->jumlah_pinjam }} unit · s/d {{ \Carbon\Carbon::parse($p->tanggal_kembali_rencana)->format('d M') }}</div>
                    </div>
                    <x-badge :variant="$pVariant">{{ str_replace('_',' ',$p->status_peminjaman) }}</x-badge>
                </div>
            @empty
                <div class="text-center py-6 text-slate-400">
                    <p class="text-xs font-semibold mb-3">Belum ada peminjaman aktif.</p>
                    <a href="{{ route('peminjaman.create') }}" class="inline-flex items-center gap-1 text-xs font-bold text-violet-700 hover:text-violet-800 bg-violet-50 hover:bg-violet-100 border border-violet-100 px-3 py-1.5 rounded-lg transition">
                        Pinjam Barang RT
                    </a>
                </div>
            @endforelse
        </div>
    </div>
</div>

@endsection
