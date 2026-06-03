<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Digital RT/RW Jalan Nikel — Kelurahan Bugel, Kota Tangerang</title>
    <meta name="description" content="Portal Digital Resmi RT/RW Jalan Nikel, Kelurahan Bugel, Kota Tangerang.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-stone-50 text-stone-800 min-h-screen flex flex-col"
      x-data="{ nav: false, scrolled: false }"
      @scroll.window="scrolled = window.scrollY > 10">

{{-- ═══════════════════════════════ --}}
{{--           NAVBAR               --}}
{{-- ═══════════════════════════════ --}}
<header class="sticky top-0 z-50 transition-all duration-200"
        :class="scrolled ? 'bg-white/85 backdrop-blur-lg shadow-sm border-b border-stone-200/60' : 'bg-white border-b border-stone-200'">
    <div class="max-w-5xl mx-auto px-6">
        <div class="flex items-center justify-between h-16">

            {{-- Logo --}}
            <a href="{{ route('home') }}" class="flex items-center gap-2.5 flex-shrink-0">
                <div class="w-9 h-9 bg-emerald-700 rounded-xl flex items-center justify-center shadow-sm">
                    <svg class="w-5 h-5 fill-white" viewBox="0 0 40 40"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
                </div>
                <div class="leading-tight">
                    <div class="text-sm font-extrabold text-stone-900">Portal RT/RW</div>
                    <div class="text-[10px] font-medium text-stone-500">Jl. Nikel · Kel. Bugel, Tangerang</div>
                </div>
            </a>

            {{-- Desktop Nav --}}
            <nav class="hidden md:flex items-center gap-0.5">
                <a href="#pengumuman" class="px-3 py-2 text-sm font-medium text-stone-600 hover:text-emerald-700 hover:bg-emerald-50 rounded-lg transition">Pengumuman</a>
                <a href="#agenda" class="px-3 py-2 text-sm font-medium text-stone-600 hover:text-emerald-700 hover:bg-emerald-50 rounded-lg transition">Agenda</a>
                <a href="#layanan" class="px-3 py-2 text-sm font-medium text-stone-600 hover:text-emerald-700 hover:bg-emerald-50 rounded-lg transition">Layanan</a>
                <a href="#kontak" class="px-3 py-2 text-sm font-medium text-stone-600 hover:text-emerald-700 hover:bg-emerald-50 rounded-lg transition">Kontak</a>
            </nav>

            {{-- Auth buttons --}}
            <div class="hidden md:flex items-center gap-2 flex-shrink-0">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">Dashboard Saya</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-stone-600 hover:text-emerald-700 px-3 py-2 transition">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">Daftar Warga</a>
                @endauth
            </div>

            {{-- Mobile burger --}}
            <button @click="nav=!nav" class="md:hidden p-2 rounded-lg hover:bg-stone-100 text-stone-500 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6" x-show="!nav">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6" x-show="nav" style="display:none">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile menu --}}
    <div x-show="nav" x-transition class="md:hidden border-t border-stone-100 bg-white" style="display:none">
        <div class="px-6 py-3 space-y-1">
            <a href="#pengumuman" @click="nav=false" class="block py-2.5 px-3 text-sm font-medium text-stone-700 hover:bg-stone-50 rounded-lg">Pengumuman</a>
            <a href="#agenda" @click="nav=false" class="block py-2.5 px-3 text-sm font-medium text-stone-700 hover:bg-stone-50 rounded-lg">Agenda</a>
            <a href="#layanan" @click="nav=false" class="block py-2.5 px-3 text-sm font-medium text-stone-700 hover:bg-stone-50 rounded-lg">Layanan</a>
            <a href="#kontak" @click="nav=false" class="block py-2.5 px-3 text-sm font-medium text-stone-700 hover:bg-stone-50 rounded-lg">Kontak</a>
            <div class="pt-2 pb-1 border-t border-stone-100 mt-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="block text-center bg-emerald-700 text-white text-sm font-semibold py-2.5 rounded-lg">Dashboard Saya</a>
                @else
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('login') }}" class="text-center py-2.5 border border-stone-300 text-stone-700 text-sm font-semibold rounded-lg">Masuk</a>
                        <a href="{{ route('register') }}" class="text-center py-2.5 bg-emerald-700 text-white text-sm font-semibold rounded-lg">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </div>
</header>

{{-- ═══════════════════════════════ --}}
{{--      ALERT PENTING             --}}
{{-- ═══════════════════════════════ --}}
@php $urgents = $pengumuman->where('is_urgent', true); @endphp
@if($urgents->count() > 0)
<div class="bg-amber-400 border-b border-amber-500">
    <div class="max-w-5xl mx-auto px-6 py-4">
        @foreach($urgents as $u)
        <div class="flex items-start gap-4">
            {{-- Icon box --}}
            <div class="flex-shrink-0 mt-0.5">
                <div class="w-10 h-10 bg-amber-900/15 rounded-xl flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-amber-900">
                        <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd"/>
                    </svg>
                </div>
            </div>
            {{-- Content --}}
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 mb-1">
                    <span class="bg-amber-900 text-amber-100 text-[11px] font-bold px-2.5 py-0.5 rounded-md uppercase tracking-wider">Pengumuman Penting</span>
                    <span class="text-amber-900/60 text-xs font-medium">{{ $u->created_at->format('d M Y') }}</span>
                </div>
                <h3 class="text-base font-bold text-amber-950 leading-snug">{{ $u->judul }}</h3>
                <p class="text-sm text-amber-900/75 mt-1 leading-relaxed">{{ Str::limit($u->konten, 200) }}</p>
            </div>
        </div>
        @if(!$loop->last)
            <hr class="border-amber-500/40 my-4">
        @endif
        @endforeach
    </div>
</div>
@endif

{{-- ═══════════════════════════════ --}}
{{--            HERO                --}}
{{-- ═══════════════════════════════ --}}
<section class="bg-white border-b border-stone-200">
    <div class="max-w-5xl mx-auto px-6 py-16 md:py-20">

        {{-- Tag line --}}
        <div class="flex items-center gap-2 mb-5">
            <div class="w-1.5 h-1.5 rounded-full bg-emerald-500"></div>
            <p class="text-sm font-semibold text-emerald-700">Portal Resmi Pelayanan Warga · Kelurahan Bugel</p>
        </div>

        {{-- Heading --}}
        <h1 class="text-4xl md:text-5xl font-black text-stone-900 leading-[1.1] tracking-tight mb-5">
            Portal Digital RT/RW<br>
            <span class="text-emerald-700">Jalan Nikel</span>
        </h1>

        <p class="text-lg text-stone-500 leading-relaxed mb-8 max-w-lg">
            Urus surat keterangan, laporan aduan, pantau kas RT/RW, dan ikuti agenda kegiatan — semua bisa dilakukan dari rumah, kapan saja.
        </p>

        {{-- CTA Buttons --}}
        <div class="flex flex-wrap items-center gap-3 mb-12">
            @auth
                <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-[15px] py-3 px-6 rounded-xl transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                    Buka Dashboard Saya
                </a>
            @else
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-[15px] py-3 px-6 rounded-xl transition shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/></svg>
                    Daftar Sebagai Warga
                </a>
                <a href="{{ route('login') }}" class="inline-flex items-center gap-2 bg-stone-100 hover:bg-stone-200 text-stone-800 font-semibold text-[15px] py-3 px-6 rounded-xl transition">
                    Sudah Punya Akun? Masuk
                </a>
            @endauth
        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="border border-emerald-200 bg-emerald-50 rounded-2xl px-5 py-4">
                <div class="text-3xl font-black text-emerald-700">{{ $stats['total_warga'] }}</div>
                <div class="text-sm text-emerald-600/80 font-medium mt-1">Warga Terdaftar</div>
            </div>
            <div class="border border-sky-200 bg-sky-50 rounded-2xl px-5 py-4">
                <div class="text-3xl font-black text-sky-700">{{ $stats['total_surat'] }}</div>
                <div class="text-sm text-sky-600/80 font-medium mt-1">Surat Selesai</div>
            </div>
            <div class="border border-rose-200 bg-rose-50 rounded-2xl px-5 py-4">
                <div class="text-3xl font-black text-rose-600">{{ $stats['total_aduan'] }}</div>
                <div class="text-sm text-rose-500/80 font-medium mt-1">Aduan Ditangani</div>
            </div>
            <div class="border border-amber-200 bg-amber-50 rounded-2xl px-5 py-4">
                <div class="text-3xl font-black text-amber-700">{{ $stats['total_event'] }}</div>
                <div class="text-sm text-amber-600/80 font-medium mt-1">Agenda Kegiatan</div>
            </div>
        </div>

    </div>
</section>

{{-- ═══════════════════════════════ --}}
{{--        PENGURUS STRIP          --}}
{{-- ═══════════════════════════════ --}}
<div class="bg-stone-50 border-b border-stone-200 py-5">
    <div class="max-w-5xl mx-auto px-6">
        <p class="text-[11px] font-bold text-stone-400 uppercase tracking-widest mb-4">Pengurus Lingkungan</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach([
                ['jabatan'=>'Ketua RW 001','wilayah'=>'Kelurahan Bugel'],
                ['jabatan'=>'Ketua RT 001','wilayah'=>'Blok A – Jalan Nikel'],
                ['jabatan'=>'Ketua RT 002','wilayah'=>'Blok B – Jalan Nikel'],
                ['jabatan'=>'Sekretaris','wilayah'=>'Administrasi'],
            ] as $p)
            <div class="flex items-center gap-3">
                <div class="w-9 h-9 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-4.5 h-4.5 w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                    </svg>
                </div>
                <div class="min-w-0">
                    <div class="text-sm font-bold text-stone-900 truncate">{{ $p['jabatan'] }}</div>
                    <div class="text-xs text-stone-500 truncate">{{ $p['wilayah'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ═══════════════════════════════ --}}
{{--         PENGUMUMAN             --}}
{{-- ═══════════════════════════════ --}}
<section class="py-14 scroll-mt-20" id="pengumuman">
    <div class="max-w-5xl mx-auto px-6">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3 mb-8">
            <div>
                <h2 class="text-2xl font-extrabold text-stone-900">Pengumuman</h2>
                <p class="text-stone-500 text-sm mt-1">Informasi resmi terbaru untuk warga lingkungan Jalan Nikel.</p>
            </div>
            <a href="{{ route('login') }}" class="flex items-center gap-1 text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition whitespace-nowrap">
                Lihat semua
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

        @if($pengumuman->count() > 0)
        <div class="space-y-3">
            @foreach($pengumuman as $p)
            <article class="bg-white border rounded-2xl p-5 hover:shadow-sm transition-shadow {{ $p->is_urgent ? 'border-amber-300 bg-amber-50/30' : 'border-stone-200' }}">
                <div class="flex items-start gap-4">
                    <div class="w-10 h-10 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5 {{ $p->is_urgent ? 'bg-amber-100 text-amber-600' : 'bg-stone-100 text-stone-500' }}">
                        @if($p->is_urgent)
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                <path fill-rule="evenodd" d="M9.401 3.003c1.155-2 4.043-2 5.197 0l7.355 12.748c1.154 2-.29 4.5-2.599 4.5H4.645c-2.309 0-3.752-2.5-2.598-4.5L9.4 3.003ZM12 8.25a.75.75 0 0 1 .75.75v3.75a.75.75 0 0 1-1.5 0V9a.75.75 0 0 1 .75-.75Zm0 8.25a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd"/>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/>
                            </svg>
                        @endif
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-center gap-2 mb-1.5">
                            @if($p->is_urgent)
                                <span class="bg-amber-500 text-white text-[10px] font-bold uppercase tracking-wide px-2 py-0.5 rounded-md">Penting</span>
                            @else
                                <span class="bg-stone-200 text-stone-600 text-[10px] font-bold uppercase tracking-wide px-2 py-0.5 rounded-md">Pengumuman</span>
                            @endif
                            <span class="text-xs text-stone-400">{{ $p->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="text-[15px] font-bold text-stone-900 leading-snug mb-1">{{ $p->judul }}</h3>
                        <p class="text-sm text-stone-500 leading-relaxed">{{ Str::limit($p->konten, 160) }}</p>
                        @if($p->tampil_sampai)
                        <div class="inline-flex items-center gap-1.5 text-xs text-amber-700 bg-amber-50 border border-amber-100 px-2.5 py-1.5 rounded-lg mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Berlaku hingga {{ \Carbon\Carbon::parse($p->tampil_sampai)->format('d M Y') }}
                        </div>
                        @endif
                        <div class="flex items-center gap-2 mt-3 pt-3 border-t border-stone-100">
                            <div class="w-6 h-6 bg-emerald-700 text-white rounded-full flex items-center justify-center text-[10px] font-bold flex-shrink-0">
                                {{ strtoupper(substr($p->pembuat->nama_lengkap, 0, 1)) }}
                            </div>
                            <span class="text-xs text-stone-400">{{ $p->pembuat->nama_lengkap }} &middot; {{ str_replace('_', ' ', $p->pembuat->role) }}</span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="bg-white border border-stone-200 rounded-2xl p-12 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-stone-300 mx-auto mb-3"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155"/></svg>
            <p class="text-sm font-semibold text-stone-400">Belum ada pengumuman resmi saat ini.</p>
        </div>
        @endif
    </div>
</section>

{{-- ═══════════════════════════════ --}}
{{--            AGENDA              --}}
{{-- ═══════════════════════════════ --}}
<section class="py-14 bg-white border-t border-stone-200 scroll-mt-20" id="agenda">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-2xl font-extrabold text-stone-900 mb-1">Agenda Kegiatan</h2>
        <p class="text-stone-500 text-sm mb-8">Kegiatan warga yang akan datang di lingkungan Jalan Nikel.</p>

        @if($events->count() > 0)
        <div class="space-y-3">
            @foreach($events as $e)
            <div class="border border-stone-200 rounded-2xl p-4 flex items-start gap-4 bg-white hover:border-emerald-200 hover:bg-emerald-50/30 transition">
                <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-center px-3 py-2.5 min-w-[58px] flex-shrink-0">
                    <div class="text-2xl font-black leading-none">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                    <div class="text-[10px] font-bold uppercase tracking-wide mt-0.5 opacity-70">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</div>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-[15px] font-bold text-stone-900 mb-0.5">{{ $e->judul }}</h3>
                    @if($e->deskripsi)
                        <p class="text-sm text-stone-500 leading-relaxed mb-2">{{ Str::limit($e->deskripsi, 120) }}</p>
                    @endif
                    <div class="flex flex-wrap gap-x-4 gap-y-1 text-xs text-stone-400">
                        <span class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('l, d F Y · H:i') }} WIB
                        </span>
                        @if($e->lokasi)
                        <span class="flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                            {{ $e->lokasi }}
                        </span>
                        @endif
                    </div>
                </div>
                <div class="hidden sm:block flex-shrink-0">
                    <span class="text-[11px] font-semibold text-emerald-700 bg-emerald-50 border border-emerald-200 px-2.5 py-1 rounded-lg">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->diffForHumans() }}</span>
                </div>
            </div>
            @endforeach
        </div>
        <p class="mt-5">
            <a href="{{ route('login') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition">Masuk untuk melihat seluruh agenda &rarr;</a>
        </p>
        @else
        <div class="bg-white border border-stone-200 rounded-2xl p-12 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-stone-300 mx-auto mb-3"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
            <p class="text-sm font-semibold text-stone-400">Belum ada agenda mendatang saat ini.</p>
        </div>
        @endif
    </div>
</section>

{{-- ═══════════════════════════════ --}}
{{--           LAYANAN              --}}
{{-- ═══════════════════════════════ --}}
<section class="py-14 border-t border-stone-200 scroll-mt-20" id="layanan">
    <div class="max-w-5xl mx-auto px-6">
        <h2 class="text-2xl font-extrabold text-stone-900 mb-1">Layanan Warga</h2>
        <p class="text-stone-500 text-sm mb-8">Fitur yang bisa kamu akses setelah terdaftar di portal ini.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach([
                ['bg'=>'bg-sky-100 text-sky-700','icon'=>'M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z','title'=>'Surat Pengantar RT/RW','desc'=>'Ajukan surat domisili, KTP, atau SKTM secara online. Pantau status persetujuan tanpa perlu datang langsung.'],
                ['bg'=>'bg-rose-100 text-rose-700','icon'=>'M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5','title'=>'Laporan Pengaduan','desc'=>'Laporkan masalah fasilitas, kebersihan, atau keamanan langsung ke pengurus RT/RW untuk ditindaklanjuti.'],
                ['bg'=>'bg-emerald-100 text-emerald-700','icon'=>'M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3','title'=>'Transparansi Kas RT/RW','desc'=>'Pantau pembukuan kas bulanan secara terbuka. Lihat pemasukan dan pengeluaran secara real-time.'],
                ['bg'=>'bg-amber-100 text-amber-700','icon'=>'M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.656 48.656 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M3.75 12l-3 3m3-3 3-3','title'=>'Peminjaman Barang','desc'=>'Pinjam tenda, kursi lipat, sound system, genset, dan aset RT/RW lainnya secara mudah dan terorganisir.'],
                ['bg'=>'bg-violet-100 text-violet-700','icon'=>'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5','title'=>'Agenda & Jadwal Ronda','desc'=>'Cek jadwal posyandu, kerja bakti, rapat warga, dan ronda malam lingkungan kapan saja.'],
                ['bg'=>'bg-cyan-100 text-cyan-700','icon'=>'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z','title'=>'Data Kependudukan','desc'=>'Data warga akurat untuk keperluan bantuan sosial, pendataan warga baru, dan laporan mutasi.'],
            ] as $c)
            <div class="bg-white border border-stone-200 rounded-2xl p-5 hover:shadow-sm hover:border-stone-300 transition">
                <div class="w-10 h-10 {{ $c['bg'] }} rounded-xl flex items-center justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $c['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-sm font-bold text-stone-900 mb-1.5">{{ $c['title'] }}</h3>
                <p class="text-sm text-stone-500 leading-relaxed">{{ $c['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════ --}}
{{--             CTA                --}}
{{-- ═══════════════════════════════ --}}
<section class="bg-emerald-700 py-14 border-t-0">
    <div class="max-w-5xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
            <div>
                <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-3">Bergabung sekarang, gratis.</h2>
                <p class="text-emerald-100 text-base leading-relaxed">
                    Daftar dan akses semua layanan digital RT/RW — pengajuan surat, laporan aduan, pantau kas, dan masih banyak lagi.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row lg:justify-end gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center gap-2 bg-white text-emerald-800 font-bold text-sm py-3 px-7 rounded-xl hover:bg-emerald-50 transition shadow-sm">
                        Buka Dashboard Saya
                    </a>
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 bg-white text-emerald-800 font-bold text-sm py-3 px-7 rounded-xl hover:bg-emerald-50 transition shadow-sm">
                        Daftar Sebagai Warga
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center border border-emerald-500/50 text-white font-semibold text-sm py-3 px-7 rounded-xl hover:bg-emerald-600 transition">
                        Sudah Punya Akun?
                    </a>
                @endauth
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════ --}}
{{--           FOOTER               --}}
{{-- ═══════════════════════════════ --}}
<footer class="bg-stone-900 scroll-mt-20" id="kontak">
    <div class="max-w-5xl mx-auto px-6 pt-12 pb-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            {{-- Brand --}}
            <div class="md:col-span-1">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 bg-emerald-700 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 fill-white" viewBox="0 0 40 40"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
                    </div>
                    <div>
                        <div class="text-sm font-extrabold text-white">Portal RT/RW</div>
                        <div class="text-xs text-stone-500">Jalan Nikel · Kel. Bugel</div>
                    </div>
                </div>
                <p class="text-sm text-stone-500 leading-relaxed mb-5">
                    Sistem informasi digital untuk warga RT 001 &amp; RT 002 / RW 001. Pelayanan lebih mudah, cepat, dan transparan.
                </p>
                <div class="flex items-center gap-2 text-xs text-stone-500 bg-stone-800 border border-stone-700 rounded-lg px-3 py-2 w-fit">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 text-emerald-500 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    Senin–Jumat &middot; 08.00–16.00 WIB
                </div>
            </div>

            {{-- Nav --}}
            <div>
                <h4 class="text-[11px] font-bold text-stone-400 uppercase tracking-widest mb-5">Halaman</h4>
                <ul class="space-y-3">
                    <li><a href="#pengumuman" class="text-sm text-stone-500 hover:text-emerald-400 transition">Pengumuman</a></li>
                    <li><a href="#agenda" class="text-sm text-stone-500 hover:text-emerald-400 transition">Agenda Kegiatan</a></li>
                    <li><a href="#layanan" class="text-sm text-stone-500 hover:text-emerald-400 transition">Layanan Warga</a></li>
                    <li><a href="{{ route('login') }}" class="text-sm text-stone-500 hover:text-emerald-400 transition">Masuk ke Portal</a></li>
                    <li><a href="{{ route('register') }}" class="text-sm text-stone-500 hover:text-emerald-400 transition">Daftar Warga Baru</a></li>
                </ul>
            </div>

            {{-- Kontak --}}
            <div>
                <h4 class="text-[11px] font-bold text-stone-400 uppercase tracking-widest mb-5">Kontak & Alamat</h4>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                        </svg>
                        <span class="text-sm text-stone-500 leading-relaxed">Jalan Nikel, Kelurahan Bugel,<br>Kota Tangerang, Banten</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
                        </svg>
                        <span class="text-sm text-stone-500">Hubungi pengurus RT/RW setempat</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Bottom bar --}}
    <div class="border-t border-stone-800">
        <div class="max-w-5xl mx-auto px-6 py-5 flex flex-col sm:flex-row justify-between items-center gap-2">
            <p class="text-xs text-stone-600">&copy; {{ date('Y') }} Portal RT/RW Jalan Nikel &middot; Kelurahan Bugel, Kota Tangerang</p>
            <div class="flex items-center gap-2">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 flex-shrink-0"></span>
                <p class="text-xs text-stone-600">SIRTRW v1.0 &mdash; Aktif</p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
