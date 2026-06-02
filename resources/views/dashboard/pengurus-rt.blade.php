@extends('layouts.app')

@section('title', 'Dashboard Pengurus RT')

@section('content')

{{-- Stat Cards --}}
<div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-amber-50 text-amber-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
        </div>
        <div>
            <div class="text-2xl font-extrabold text-slate-900">0</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Menunggu Verifikasi</div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-teal-50 text-teal-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>
        </div>
        <div>
            <div class="text-2xl font-extrabold text-slate-900">0</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Surat Masuk</div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-rose-50 text-rose-600 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5"/></svg>
        </div>
        <div>
            <div class="text-2xl font-extrabold text-slate-900">0</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Aduan Belum Diproses</div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
        </div>
        <div>
            <div class="text-2xl font-extrabold text-slate-900">0</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Total Warga Aktif</div>
        </div>
    </div>
</div>

<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
            <h3 class="text-sm font-extrabold text-slate-900">Tugas Perlu Tindakan</h3>
        </div>
        <div class="p-8 flex flex-col items-center justify-center text-center flex-1">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-300 mb-3"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
            <p class="text-sm font-bold text-slate-500">Semua tugas selesai</p>
            <p class="text-xs text-slate-400 font-semibold mt-1">Tidak ada tugas tertunda saat ini. Anda dapat bersantai.</p>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
            <h3 class="text-sm font-extrabold text-slate-900">Pengumuman Terbaru</h3>
        </div>
        <div class="p-5 space-y-3 flex-1">
            @if($recentPengumuman->count() > 0)
                @foreach($recentPengumuman as $pengumuman)
                    <div class="bg-slate-50 rounded-lg p-4 border border-slate-100">
                        <div class="flex justify-between items-center mb-1.5">
                            <h4 class="text-sm font-bold {{ $pengumuman->is_urgent ? 'text-rose-700' : 'text-slate-900' }} leading-tight">{{ $pengumuman->judul }}</h4>
                            <span class="text-[10px] text-slate-400 font-semibold ml-2 flex-shrink-0">{{ $pengumuman->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-xs text-slate-500 font-semibold leading-relaxed">{{ Str::limit($pengumuman->konten, 100) }}</p>
                    </div>
                @endforeach
            @else
                <div class="flex flex-col items-center justify-center text-center py-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-300 mb-3"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/></svg>
                    <p class="text-sm font-bold text-slate-500">Belum ada pengumuman</p>
                    <p class="text-xs text-slate-400 font-semibold mt-1">Pengumuman terbaru akan muncul di sini.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
