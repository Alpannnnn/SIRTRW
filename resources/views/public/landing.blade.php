<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Digital RT/RW — Kelurahan Bugel, Kota Tangerang</title>
    <meta name="description" content="Portal Digital Resmi RT/RW Jalan Nikel, Kelurahan Bugel, Kota Tangerang. Layanan pengumuman, surat, aduan, kas, dan agenda warga secara online.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes ticker {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .ticker-wrap { overflow: hidden; }
        .ticker-inner {
            display: flex;
            width: max-content;
            animation: ticker 28s linear infinite;
        }
        .ticker-inner:hover { animation-play-state: paused; }
    </style>
</head>
<body class="font-sans antialiased bg-white text-slate-800" x-data="{ nav: false }">

{{-- ╔══════════════════════════╗ --}}
{{-- ║      TOP INFO STRIP      ║ --}}
{{-- ╚══════════════════════════╝ --}}
<div class="bg-teal-900 text-teal-200 text-xs py-2 hidden sm:block">
    <div class="max-w-6xl mx-auto px-5 flex justify-between items-center">
        <span class="flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5 text-teal-400 flex-shrink-0">
                <path d="M11.47 3.84a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.06l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 0 0 1.061 1.06l8.69-8.69Z"/>
                <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a.075.075 0 0 0 .018.023"/>
            </svg>
            Portal Resmi RT 001 &amp; RT 002 / RW 001 · Kelurahan Bugel, Kota Tangerang
        </span>
        <span class="flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>
            Pelayanan: Senin–Jumat · 08.00–16.00 WIB
        </span>
    </div>
</div>

{{-- ╔══════════════════════════╗ --}}
{{-- ║         NAVBAR           ║ --}}
{{-- ╚══════════════════════════╝ --}}
<header class="bg-white border-b border-slate-200 sticky top-0 z-50">
    <div class="max-w-6xl mx-auto px-5">
        <div class="flex items-center justify-between h-[60px]">

            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-9 h-9 bg-teal-700 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg class="w-5 h-5 fill-white" viewBox="0 0 40 40"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
                </div>
                <div class="leading-tight">
                    <div class="text-sm font-extrabold text-slate-900">Portal RT/RW Jalan Nikel</div>
                    <div class="text-[10px] text-slate-500">Kelurahan Bugel, Kota Tangerang</div>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-7">
                <a href="#pengumuman" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition-colors">Pengumuman</a>
                <a href="#agenda" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition-colors">Agenda</a>
                <a href="#layanan" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition-colors">Layanan</a>
                <a href="#kontak" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition-colors">Kontak</a>
            </nav>

            <div class="hidden md:flex items-center gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white text-sm font-semibold px-4 py-2 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-teal-700 px-4 py-2 border border-slate-300 hover:border-teal-600 rounded-lg transition-colors">Masuk</a>
                    <a href="{{ route('register') }}" class="text-sm font-semibold bg-teal-700 hover:bg-teal-800 text-white px-4 py-2 rounded-lg transition-colors">Daftar Warga</a>
                @endauth
            </div>

            <button @click="nav=!nav" class="md:hidden p-2 rounded-lg hover:bg-slate-100 text-slate-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6" x-show="!nav"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6" x-show="nav" style="display:none"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>

    <div x-show="nav" x-transition class="md:hidden border-t border-slate-100" style="display:none">
        <div class="px-5 py-3 space-y-1">
            <a href="#pengumuman" @click="nav=false" class="block py-2 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Pengumuman</a>
            <a href="#agenda" @click="nav=false" class="block py-2 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Agenda</a>
            <a href="#layanan" @click="nav=false" class="block py-2 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Layanan</a>
            <a href="#kontak" @click="nav=false" class="block py-2 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Kontak</a>
            <hr class="border-slate-100 my-2">
            @auth
                <a href="{{ route('dashboard') }}" class="flex items-center justify-center gap-1.5 bg-teal-700 text-white text-sm font-semibold py-2.5 rounded-lg">Buka Dashboard</a>
            @else
                <div class="grid grid-cols-2 gap-2 pt-1">
                    <a href="{{ route('login') }}" class="text-center py-2.5 border border-slate-300 text-slate-700 text-sm font-semibold rounded-lg">Masuk</a>
                    <a href="{{ route('register') }}" class="text-center py-2.5 bg-teal-700 text-white text-sm font-semibold rounded-lg">Daftar</a>
                </div>
            @endauth
        </div>
    </div>
</header>

{{-- ╔══════════════════════════╗ --}}
{{-- ║    ALERT PENGUMUMAN      ║ --}}
{{-- ║    PENTING (BIG!)        ║ --}}
{{-- ╚══════════════════════════╝ --}}
@php $urgents = $pengumuman->where('is_urgent', true); @endphp
@if($urgents->count() > 0)
<div class="bg-red-600 text-white">
    <div class="max-w-6xl mx-auto px-5 py-4">
        <div class="flex items-start gap-4">
            {{-- Icon & Label --}}
            <div class="flex items-center gap-2 flex-shrink-0 pt-0.5">
                <div class="w-9 h-9 bg-white/20 rounded-lg flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                    </svg>
                </div>
                <span class="text-xs font-extrabold tracking-widest uppercase whitespace-nowrap bg-white/20 px-2.5 py-1 rounded">
                    Penting!
                </span>
            </div>

            {{-- Scrolling content --}}
            <div class="ticker-wrap flex-1 overflow-hidden">
                <div class="ticker-inner gap-0">
                    @for($i = 0; $i < 4; $i++)
                        @foreach($urgents as $u)
                            <span class="inline-flex items-center text-sm font-semibold mr-14">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-3.5 h-3.5 mr-2 opacity-70 flex-shrink-0"><path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 0 1-.383-.218 25.18 25.18 0 0 1-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0 1 12 5.052 5.5 5.5 0 0 1 16.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 0 1-4.244 3.17 15.247 15.247 0 0 1-.383.219l-.022.012-.007.004-.003.001a.752.752 0 0 1-.704 0l-.003-.001Z"/></svg>
                                {{ $u->judul }}
                            </span>
                        @endforeach
                    @endfor
                </div>
            </div>
        </div>

        {{-- Card list of urgent announcements --}}
        @if($urgents->count() === 1)
        <div class="mt-3 pt-3 border-t border-white/20">
            @foreach($urgents as $u)
            <p class="text-sm text-white/90 leading-relaxed">{{ Str::limit($u->konten, 200) }}</p>
            @endforeach
        </div>
        @endif
    </div>
</div>
@endif

{{-- ╔══════════════════════════╗ --}}
{{-- ║          HERO            ║ --}}
{{-- ╚══════════════════════════╝ --}}
<section class="bg-teal-800">
    <div class="max-w-6xl mx-auto px-5 py-14 md:py-20">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-10 items-center">

            {{-- Left: Text --}}
            <div class="lg:col-span-3 space-y-5">
                <p class="text-teal-300 text-sm font-semibold uppercase tracking-widest">Portal Resmi Pelayanan Warga</p>
                <h1 class="text-3xl sm:text-4xl md:text-[42px] font-extrabold text-white leading-tight tracking-tight">
                    Selamat Datang di<br>
                    <span class="text-teal-300">Portal Digital RT/RW</span><br>
                    Jalan Nikel, Kel. Bugel
                </h1>
                <p class="text-teal-100/80 text-base leading-relaxed max-w-lg">
                    Urus surat keterangan, lapor pengaduan, pantau kas RT/RW, dan lihat agenda lingkungan — semuanya bisa dilakukan dari rumah, kapan saja.
                </p>
                <div class="flex flex-wrap gap-3 pt-2">
                    @auth
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-2 bg-white text-teal-800 font-bold text-sm py-3 px-5 rounded-lg hover:bg-teal-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                            Buka Dashboard Saya
                        </a>
                    @else
                        <a href="{{ route('register') }}" class="flex items-center gap-2 bg-white text-teal-800 font-bold text-sm py-3 px-5 rounded-lg hover:bg-teal-50 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/></svg>
                            Daftar Sebagai Warga
                        </a>
                        <a href="{{ route('login') }}" class="flex items-center gap-2 border border-teal-500/60 text-teal-100 font-semibold text-sm py-3 px-5 rounded-lg hover:bg-teal-700/60 transition-colors">
                            Sudah Punya Akun? Masuk
                        </a>
                    @endauth
                </div>

                {{-- Trust badges --}}
                <div class="flex flex-wrap gap-x-5 gap-y-2 pt-3 border-t border-teal-700/60">
                    @foreach(['Gratis & Resmi','Mudah dari HP','Proses Cepat','Data Aman'] as $t)
                    <span class="flex items-center gap-1.5 text-teal-300 text-xs font-semibold">
                        <svg class="w-3.5 h-3.5 text-teal-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                        {{ $t }}
                    </span>
                    @endforeach
                </div>
            </div>

            {{-- Right: Stats --}}
            <div class="lg:col-span-2 grid grid-cols-2 gap-3">
                @foreach([
                    ['label'=>'Warga Terdaftar','value'=>$stats['total_warga'],'icon'=>'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z'],
                    ['label'=>'Surat Selesai','value'=>$stats['total_surat'],'icon'=>'M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z'],
                    ['label'=>'Aduan Ditangani','value'=>$stats['total_aduan'],'icon'=>'M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5'],
                    ['label'=>'Agenda Kegiatan','value'=>$stats['total_event'],'icon'=>'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5'],
                ] as $s)
                <div class="bg-teal-700/50 border border-teal-600/60 rounded-xl p-5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-6 h-6 text-teal-300 mb-3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}"/>
                    </svg>
                    <div class="text-3xl font-extrabold text-white">{{ $s['value'] }}</div>
                    <div class="text-teal-300 text-xs font-semibold mt-1 uppercase tracking-wider leading-snug">{{ $s['label'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ╔══════════════════════════╗ --}}
{{-- ║     PENGURUS STRIP       ║ --}}
{{-- ╚══════════════════════════╝ --}}
<div class="border-b border-slate-200 bg-white">
    <div class="max-w-6xl mx-auto px-5 py-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @foreach([
                ['jabatan'=>'Ketua RW 001','wilayah'=>'Kelurahan Bugel'],
                ['jabatan'=>'Ketua RT 001','wilayah'=>'Blok A – Jalan Nikel'],
                ['jabatan'=>'Ketua RT 002','wilayah'=>'Blok B – Jalan Nikel'],
                ['jabatan'=>'Sekretaris','wilayah'=>'Administrasi Pelayanan'],
            ] as $p)
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-teal-50 border border-teal-100 text-teal-700 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                </div>
                <div>
                    <div class="text-sm font-bold text-slate-900 leading-none">{{ $p['jabatan'] }}</div>
                    <div class="text-xs text-slate-500 font-medium mt-0.5">{{ $p['wilayah'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ╔══════════════════════════╗ --}}
{{-- ║      PENGUMUMAN          ║ --}}
{{-- ╚══════════════════════════╝ --}}
<section class="py-14 bg-slate-50 scroll-mt-16" id="pengumuman">
    <div class="max-w-6xl mx-auto px-5">

        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mb-8">
            <div>
                <p class="text-xs font-extrabold text-teal-700 uppercase tracking-widest mb-1.5">Informasi Terkini</p>
                <h2 class="text-2xl font-extrabold text-slate-900">Pengumuman Resmi RT/RW</h2>
                <p class="text-slate-500 text-sm mt-1">Informasi terbaru untuk seluruh warga lingkungan Jalan Nikel.</p>
            </div>
            <a href="{{ route('login') }}" class="text-sm font-bold text-teal-700 hover:text-teal-800 flex items-center gap-1 transition-colors whitespace-nowrap">
                Lihat Semua
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

        @if($pengumuman->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach($pengumuman as $p)
            <article class="bg-white border {{ $p->is_urgent ? 'border-l-4 border-l-red-500 border-slate-200' : 'border-slate-200' }} rounded-xl p-5 shadow-xs flex flex-col gap-3 hover:shadow-sm transition-shadow">
                <div class="flex items-center justify-between gap-2">
                    @if($p->is_urgent)
                        <span class="flex items-center gap-1.5 bg-red-100 text-red-700 text-[10px] font-extrabold uppercase tracking-widest px-2.5 py-1 rounded-md">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                            Penting
                        </span>
                    @else
                        <span class="flex items-center gap-1.5 bg-teal-50 border border-teal-200 text-teal-700 text-[10px] font-extrabold uppercase tracking-widest px-2.5 py-1 rounded-md">
                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/></svg>
                            Info
                        </span>
                    @endif
                    <time class="text-xs text-slate-400 font-semibold">{{ $p->created_at->format('d M Y') }}</time>
                </div>

                <div>
                    <h3 class="text-[15px] font-bold text-slate-900 leading-snug mb-1.5">{{ $p->judul }}</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">{{ Str::limit($p->konten, 130) }}</p>
                </div>

                @if($p->tampil_sampai)
                <div class="flex items-center gap-1.5 text-xs text-amber-700 bg-amber-50 border border-amber-100 px-3 py-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    Berlaku hingga {{ \Carbon\Carbon::parse($p->tampil_sampai)->format('d M Y') }}
                </div>
                @endif

                <div class="flex items-center gap-2.5 pt-3 mt-auto border-t border-slate-100">
                    <div class="w-7 h-7 bg-teal-700 text-white rounded-full flex items-center justify-center text-[11px] font-extrabold flex-shrink-0">
                        {{ strtoupper(substr($p->pembuat->nama_lengkap, 0, 2)) }}
                    </div>
                    <div class="min-w-0">
                        <div class="text-xs font-bold text-slate-800 truncate">{{ $p->pembuat->nama_lengkap }}</div>
                        <div class="text-[10px] text-slate-400 font-semibold uppercase tracking-wider">{{ str_replace('_', ' ', $p->pembuat->role) }}</div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="bg-white border border-slate-200 rounded-xl p-12 text-center max-w-sm mx-auto">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-300 mx-auto mb-3"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155"/></svg>
            <p class="text-sm font-semibold text-slate-500">Belum ada pengumuman resmi saat ini.</p>
        </div>
        @endif
    </div>
</section>

{{-- ╔══════════════════════════╗ --}}
{{-- ║         AGENDA           ║ --}}
{{-- ╚══════════════════════════╝ --}}
<section class="py-14 bg-white border-t border-slate-200 scroll-mt-16" id="agenda">
    <div class="max-w-6xl mx-auto px-5">
        <div class="mb-8">
            <p class="text-xs font-extrabold text-teal-700 uppercase tracking-widest mb-1.5">Jadwal Kegiatan</p>
            <h2 class="text-2xl font-extrabold text-slate-900">Agenda Lingkungan Mendatang</h2>
            <p class="text-slate-500 text-sm mt-1">Ikuti kegiatan warga untuk mempererat silaturahmi kita bersama.</p>
        </div>

        @if($events->count() > 0)
        <div class="space-y-3 max-w-3xl">
            @foreach($events as $e)
            <div class="border border-slate-200 rounded-xl p-4 flex items-start gap-4 bg-white hover:border-teal-200 hover:shadow-xs transition-all">
                <div class="bg-teal-50 border border-teal-200 text-teal-800 rounded-xl text-center px-3 py-2.5 min-w-[58px] flex-shrink-0">
                    <div class="text-2xl font-black leading-none">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                    <div class="text-[10px] font-bold uppercase tracking-wider mt-0.5 opacity-80">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</div>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-[15px] font-bold text-slate-900">{{ $e->judul }}</h3>
                    @if($e->deskripsi)
                        <p class="text-sm text-slate-500 mt-0.5 leading-relaxed">{{ Str::limit($e->deskripsi, 100) }}</p>
                    @endif
                    <div class="flex flex-wrap gap-x-4 gap-y-1 mt-2">
                        <span class="flex items-center gap-1 text-xs text-slate-400 font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('l, d F Y · H:i') }} WIB
                        </span>
                        @if($e->lokasi)
                        <span class="flex items-center gap-1 text-xs text-slate-400 font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                            {{ $e->lokasi }}
                        </span>
                        @endif
                    </div>
                </div>
                <span class="hidden sm:block text-[11px] font-bold text-teal-700 bg-teal-50 border border-teal-100 px-2.5 py-1 rounded-lg flex-shrink-0 whitespace-nowrap">
                    {{ \Carbon\Carbon::parse($e->tanggal_mulai)->diffForHumans() }}
                </span>
            </div>
            @endforeach
        </div>
        <div class="mt-6">
            <a href="{{ route('login') }}" class="text-sm font-bold text-teal-700 hover:text-teal-800 flex items-center gap-1 w-fit transition-colors">
                Masuk untuk melihat seluruh agenda
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>
        @else
        <div class="border border-slate-200 rounded-xl p-12 text-center max-w-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-300 mx-auto mb-3"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
            <p class="text-sm font-semibold text-slate-500">Belum ada agenda mendatang saat ini.</p>
        </div>
        @endif
    </div>
</section>

{{-- ╔══════════════════════════╗ --}}
{{-- ║        LAYANAN           ║ --}}
{{-- ╚══════════════════════════╝ --}}
<section class="py-14 bg-slate-50 border-t border-slate-200 scroll-mt-16" id="layanan">
    <div class="max-w-6xl mx-auto px-5">
        <div class="mb-10">
            <p class="text-xs font-extrabold text-teal-700 uppercase tracking-widest mb-1.5">Fitur Sistem</p>
            <h2 class="text-2xl font-extrabold text-slate-900">Layanan Mandiri Warga</h2>
            <p class="text-slate-500 text-sm mt-1">Urus administrasi dan kebutuhan sosial lingkungan dalam satu portal terpadu.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach([
                ['color'=>'bg-blue-50 text-blue-700','icon'=>'M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z','title'=>'Surat Pengantar RT/RW','desc'=>'Ajukan surat domisili, pengantar KTP baru, atau SKTM secara online. Pantau progres persetujuan tanpa perlu datang langsung.'],
                ['color'=>'bg-red-50 text-red-700','icon'=>'M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5','title'=>'Laporan Pengaduan','desc'=>'Laporkan masalah fasilitas rusak, kebersihan, keamanan, atau perselisihan warga langsung ke pengurus RT/RW untuk penanganan cepat.'],
                ['color'=>'bg-emerald-50 text-emerald-700','icon'=>'M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3','title'=>'Transparansi Kas RT/RW','desc'=>'Pantau pembukuan kas bulanan secara terbuka. Laporan pemasukan iuran dan rincian pengeluaran bisa diakses kapan saja.'],
                ['color'=>'bg-amber-50 text-amber-700','icon'=>'M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.656 48.656 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M3.75 12l-3 3m3-3 3-3','title'=>'Peminjaman Inventaris','desc'=>'Butuh sound system, tenda, kursi lipat, atau genset untuk acara? Ajukan peminjaman aset RT/RW secara mudah dan terorganisir.'],
                ['color'=>'bg-violet-50 text-violet-700','icon'=>'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5','title'=>'Agenda & Jadwal Ronda','desc'=>'Cek jadwal posyandu, rapat RT/RW, kerja bakti, dan jadwal ronda malam lingkungan secara real-time dari mana saja.'],
                ['color'=>'bg-cyan-50 text-cyan-700','icon'=>'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z','title'=>'Pendataan Kependudukan','desc'=>'Data warga yang akurat untuk keperluan bantuan sosial, pendataan warga baru, dan laporan mutasi penduduk.'],
            ] as $card)
            <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-xs hover:shadow-sm hover:border-slate-300 transition-all">
                <div class="w-11 h-11 {{ $card['color'] }} rounded-xl flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}"/>
                    </svg>
                </div>
                <h3 class="text-[15px] font-bold text-slate-900 mb-1.5">{{ $card['title'] }}</h3>
                <p class="text-sm text-slate-500 leading-relaxed">{{ $card['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ╔══════════════════════════╗ --}}
{{-- ║      CTA / DAFTAR        ║ --}}
{{-- ╚══════════════════════════╝ --}}
<section class="bg-teal-800 border-t border-teal-900 py-14">
    <div class="max-w-6xl mx-auto px-5">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
            <div class="space-y-3">
                <p class="text-teal-300 text-xs font-extrabold uppercase tracking-widest">Mulai Sekarang</p>
                <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">
                    Bergabunglah dan nikmati kemudahan layanan digital RT/RW.
                </h2>
                <p class="text-teal-200/80 text-sm leading-relaxed">
                    Daftarkan diri sebagai warga dan akses semua fitur secara gratis — pengajuan surat, laporan aduan, pantau kas, dan lebih banyak lagi.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row lg:justify-end gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="flex items-center justify-center gap-2 bg-white text-teal-800 font-bold text-sm py-3 px-6 rounded-lg hover:bg-teal-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                        Buka Dashboard Saya
                    </a>
                @else
                    <a href="{{ route('register') }}" class="flex items-center justify-center gap-2 bg-white text-teal-800 font-bold text-sm py-3 px-6 rounded-lg hover:bg-teal-50 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/></svg>
                        Daftar Sebagai Warga
                    </a>
                    <a href="{{ route('login') }}" class="flex items-center justify-center border border-teal-500/60 text-teal-100 font-semibold text-sm py-3 px-6 rounded-lg hover:bg-teal-700/60 transition-colors">
                        Sudah Punya Akun?
                    </a>
                @endauth
            </div>
        </div>
    </div>
</section>

{{-- ╔══════════════════════════╗ --}}
{{-- ║         FOOTER           ║ --}}
{{-- ╚══════════════════════════╝ --}}
<footer class="bg-slate-900 text-slate-400 scroll-mt-16" id="kontak">
    <div class="max-w-6xl mx-auto px-5 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">

            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 bg-teal-700 rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 fill-white" viewBox="0 0 40 40"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
                    </div>
                    <div>
                        <div class="text-sm font-extrabold text-white">Portal RT/RW Jalan Nikel</div>
                        <div class="text-[10px] text-slate-500 mt-0.5">Kelurahan Bugel, Kota Tangerang</div>
                    </div>
                </div>
                <p class="text-sm text-slate-500 leading-relaxed">
                    Sistem Informasi Rukun Tetangga/Rukun Warga untuk pelayanan warga yang lebih mudah dan transparan.
                </p>
            </div>

            <div>
                <h4 class="text-[11px] font-extrabold text-slate-300 uppercase tracking-widest mb-4">Navigasi</h4>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="#pengumuman" class="hover:text-teal-400 transition-colors">Pengumuman</a></li>
                    <li><a href="#agenda" class="hover:text-teal-400 transition-colors">Agenda Kegiatan</a></li>
                    <li><a href="#layanan" class="hover:text-teal-400 transition-colors">Layanan Warga</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition-colors">Masuk ke Portal</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-teal-400 transition-colors">Daftar Warga Baru</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-[11px] font-extrabold text-slate-300 uppercase tracking-widest mb-4">Kontak & Alamat</h4>
                <ul class="space-y-3 text-sm text-slate-500">
                    <li class="flex items-start gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-600 flex-shrink-0 mt-0.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                        Jalan Nikel, Kelurahan Bugel,<br>Kota Tangerang, Banten
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-600 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        Senin–Jumat · 08.00–16.00 WIB
                    </li>
                    <li class="flex items-start gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-600 flex-shrink-0 mt-0.5"><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/></svg>
                        Hubungi langsung pengurus RT/RW setempat untuk bantuan lebih lanjut.
                    </li>
                </ul>
            </div>
        </div>

        <div class="border-t border-slate-800 pt-6 flex flex-col sm:flex-row justify-between items-center gap-2">
            <p class="text-xs text-slate-600">&copy; {{ date('Y') }} Portal RT/RW Jalan Nikel · Kelurahan Bugel, Kota Tangerang</p>
            <p class="text-xs text-slate-700">SIRTRW v1.0</p>
        </div>
    </div>
</footer>

</body>
</html>
