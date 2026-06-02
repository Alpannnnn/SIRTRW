<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Digital RT/RW — Kelurahan Bugel, Kota Tangerang</title>
    <meta name="description" content="Portal Digital Resmi RT/RW Jalan Nikel, Kelurahan Bugel, Kota Tangerang. Layanan pengumuman, surat, aduan, kas, dan agenda warga secara online.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes marquee {
            0%   { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 30s linear infinite;
        }
        .animate-marquee:hover { animation-play-state: paused; }
    </style>
</head>
<body class="font-sans antialiased text-slate-800 bg-white flex flex-col min-h-screen" x-data="{ mobileMenuOpen: false }">

    {{-- ═══ TOP INFO BAR ═══ --}}
    <div class="bg-teal-800 text-teal-100 text-xs py-2 hidden sm:block">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 flex justify-between items-center">
            <span class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 text-teal-300 flex-shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z"/>
                </svg>
                Portal Resmi RT 001 &amp; RT 002 / RW 001 · Kelurahan Bugel, Kota Tangerang
            </span>
            <span class="flex items-center gap-1.5 text-teal-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                </svg>
                Pelayanan: Senin–Jumat · 08.00–16.00 WIB
            </span>
        </div>
    </div>

    {{-- ═══ NAVBAR ═══ --}}
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-xs">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-16">

                {{-- Brand --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-teal-700 text-white rounded-lg flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm font-extrabold text-slate-900 leading-none">Portal RT/RW Jalan Nikel</div>
                        <div class="text-[10px] text-slate-500 font-medium mt-0.5">Kelurahan Bugel, Kota Tangerang</div>
                    </div>
                </a>

                {{-- Desktop Nav --}}
                <nav class="hidden md:flex items-center gap-6">
                    <a href="#pengumuman" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition">Pengumuman</a>
                    <a href="#agenda" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition">Agenda</a>
                    <a href="#layanan" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition">Layanan</a>
                    <a href="#kontak" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition">Kontak</a>
                </nav>

                {{-- Auth Buttons --}}
                <div class="hidden md:flex items-center gap-2">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-semibold text-sm py-2 px-4 rounded-lg transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                            Dashboard Saya
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-teal-700 border border-slate-300 hover:border-teal-700 py-2 px-4 rounded-lg transition">Masuk</a>
                        <a href="{{ route('register') }}" class="text-sm font-semibold bg-teal-700 hover:bg-teal-800 text-white py-2 px-4 rounded-lg transition">Daftar Warga</a>
                    @endauth
                </div>

                {{-- Mobile burger --}}
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden p-2 rounded-lg text-slate-600 hover:bg-slate-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6" x-show="!mobileMenuOpen"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6" x-show="mobileMenuOpen" style="display:none"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div x-show="mobileMenuOpen" x-transition class="md:hidden border-t border-slate-100 bg-white" style="display:none">
            <div class="px-4 py-3 space-y-1">
                <a href="#pengumuman" @click="mobileMenuOpen=false" class="block py-2 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Pengumuman</a>
                <a href="#agenda" @click="mobileMenuOpen=false" class="block py-2 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Agenda</a>
                <a href="#layanan" @click="mobileMenuOpen=false" class="block py-2 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Layanan</a>
                <a href="#kontak" @click="mobileMenuOpen=false" class="block py-2 px-3 text-sm font-semibold text-slate-700 hover:bg-slate-50 rounded-lg">Kontak</a>
                <hr class="border-slate-100 my-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="flex items-center justify-center gap-1.5 bg-teal-700 text-white font-semibold py-2.5 px-4 rounded-lg text-sm">Buka Dashboard</a>
                @else
                    <div class="grid grid-cols-2 gap-2">
                        <a href="{{ route('login') }}" class="text-center py-2.5 border border-slate-300 text-slate-700 font-semibold rounded-lg text-sm">Masuk</a>
                        <a href="{{ route('register') }}" class="text-center py-2.5 bg-teal-700 text-white font-semibold rounded-lg text-sm">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    {{-- ═══ URGENT TICKER ═══ --}}
    @php $urgents = $pengumuman->where('is_urgent', true); @endphp
    @if($urgents->count() > 0)
    <div class="bg-red-50 border-b border-red-200 py-2.5 overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 flex items-center gap-3">
            <span class="flex-shrink-0 bg-red-600 text-white font-extrabold text-[10px] px-2.5 py-1 rounded tracking-widest uppercase flex items-center gap-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3 h-3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                PENTING
            </span>
            <div class="overflow-hidden flex-1">
                <div class="animate-marquee whitespace-nowrap text-sm text-red-800 font-semibold">
                    @for($i = 0; $i < 3; $i++)
                        @foreach($urgents as $u)
                            <span class="mr-10">{{ $u->judul }}</span>
                        @endforeach
                    @endfor
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- ═══ HERO ═══ --}}
    <section class="bg-teal-800 text-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 py-14 md:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

                {{-- Text --}}
                <div class="space-y-5">
                    <div class="inline-flex items-center gap-1.5 bg-teal-700/60 border border-teal-600 text-teal-100 text-xs font-semibold px-3 py-1.5 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        Portal Resmi Pelayanan Warga
                    </div>
                    <h1 class="text-3xl sm:text-4xl font-extrabold leading-tight tracking-tight">
                        Selamat Datang di<br>
                        Portal Digital RT/RW<br>
                        <span class="text-teal-300">Jalan Nikel, Kel. Bugel</span>
                    </h1>
                    <p class="text-teal-100 text-base leading-relaxed max-w-lg">
                        Urus administrasi warga, pantau pengumuman, lapor aduan, dan lihat agenda lingkungan — semuanya bisa dilakukan secara online, kapan saja dan di mana saja.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 pt-1">
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center gap-2 bg-white text-teal-800 font-bold py-3 px-6 rounded-lg hover:bg-teal-50 transition text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                                Buka Dashboard Saya
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 bg-white text-teal-800 font-bold py-3 px-6 rounded-lg hover:bg-teal-50 transition text-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/></svg>
                                Daftar Sebagai Warga
                            </a>
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center gap-2 border border-teal-500 text-teal-100 font-semibold py-3 px-6 rounded-lg hover:bg-teal-700/60 transition text-sm">
                                Sudah Terdaftar? Masuk
                            </a>
                        @endauth
                    </div>
                </div>

                {{-- Stats Grid --}}
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-teal-700/50 border border-teal-600 rounded-xl p-5">
                        <div class="text-3xl font-extrabold text-white">{{ $stats['total_warga'] }}</div>
                        <div class="text-teal-200 text-xs font-semibold mt-1 uppercase tracking-wider">Warga Terdaftar</div>
                    </div>
                    <div class="bg-teal-700/50 border border-teal-600 rounded-xl p-5">
                        <div class="text-3xl font-extrabold text-white">{{ $stats['total_surat'] }}</div>
                        <div class="text-teal-200 text-xs font-semibold mt-1 uppercase tracking-wider">Surat Selesai</div>
                    </div>
                    <div class="bg-teal-700/50 border border-teal-600 rounded-xl p-5">
                        <div class="text-3xl font-extrabold text-white">{{ $stats['total_aduan'] }}</div>
                        <div class="text-teal-200 text-xs font-semibold mt-1 uppercase tracking-wider">Aduan Ditangani</div>
                    </div>
                    <div class="bg-teal-700/50 border border-teal-600 rounded-xl p-5">
                        <div class="text-3xl font-extrabold text-white">{{ $stats['total_event'] }}</div>
                        <div class="text-teal-200 text-xs font-semibold mt-1 uppercase tracking-wider">Agenda Kegiatan</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ═══ PENGURUS BAR ═══ --}}
    <div class="bg-white border-b border-slate-200 py-5">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                @foreach([
                    ['jabatan'=>'Ketua RW 001','wilayah'=>'Kelurahan Bugel'],
                    ['jabatan'=>'Ketua RT 001','wilayah'=>'Blok A – Jalan Nikel'],
                    ['jabatan'=>'Ketua RT 002','wilayah'=>'Blok B – Jalan Nikel'],
                    ['jabatan'=>'Sekretaris','wilayah'=>'Administrasi Pelayanan'],
                ] as $p)
                <div class="flex flex-col items-center gap-2">
                    <div class="w-9 h-9 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4.5 h-4.5 w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                    </div>
                    <div>
                        <div class="text-sm font-bold text-slate-900">{{ $p['jabatan'] }}</div>
                        <div class="text-xs text-slate-500 font-medium">{{ $p['wilayah'] }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ═══ PENGUMUMAN ═══ --}}
    <section class="py-14 scroll-mt-16 bg-slate-50" id="pengumuman">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-8">
                <div>
                    <p class="text-xs font-bold text-teal-700 uppercase tracking-widest mb-1">Informasi Terkini</p>
                    <h2 class="text-2xl font-extrabold text-slate-900">Pengumuman Resmi RT/RW</h2>
                    <p class="text-slate-500 text-sm mt-1">Pengumuman terbaru untuk seluruh warga lingkungan Jalan Nikel.</p>
                </div>
                <a href="{{ route('login') }}" class="text-sm font-bold text-teal-700 hover:text-teal-800 flex items-center gap-1 transition whitespace-nowrap">
                    Lihat Semua
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                </a>
            </div>

            @if($pengumuman->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                    @foreach($pengumuman as $p)
                    <div class="bg-white rounded-xl border {{ $p->is_urgent ? 'border-red-200' : 'border-slate-200' }} p-5 shadow-xs flex flex-col gap-3">
                        <div class="flex items-center justify-between gap-2">
                            @if($p->is_urgent)
                                <span class="inline-flex items-center gap-1 bg-red-100 text-red-700 text-[10px] font-extrabold px-2 py-0.5 rounded tracking-widest uppercase">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                                    Penting
                                </span>
                            @else
                                <span class="inline-flex items-center gap-1 bg-teal-50 border border-teal-200 text-teal-700 text-[10px] font-extrabold px-2 py-0.5 rounded tracking-widest uppercase">
                                    <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="m11.25 11.25.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/></svg>
                                    Info
                                </span>
                            @endif
                            <span class="text-xs text-slate-400 font-semibold">{{ $p->created_at->format('d M Y') }}</span>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-slate-900 leading-snug mb-1">{{ $p->judul }}</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">{{ Str::limit($p->konten, 130) }}</p>
                        </div>
                        @if($p->tampil_sampai)
                        <div class="flex items-center gap-1.5 text-xs text-amber-700 bg-amber-50 border border-amber-100 px-2.5 py-1.5 rounded-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Berlaku hingga {{ \Carbon\Carbon::parse($p->tampil_sampai)->format('d M Y') }}
                        </div>
                        @endif
                        <div class="flex items-center gap-2 pt-2 border-t border-slate-100">
                            <div class="w-7 h-7 bg-teal-700 text-white rounded-full flex items-center justify-center font-bold text-xs flex-shrink-0">
                                {{ strtoupper(substr($p->pembuat->nama_lengkap, 0, 2)) }}
                            </div>
                            <div>
                                <div class="text-xs font-bold text-slate-800 leading-none">{{ $p->pembuat->nama_lengkap }}</div>
                                <div class="text-[10px] text-slate-400 font-semibold mt-0.5 uppercase tracking-wider leading-none">{{ str_replace('_', ' ', $p->pembuat->role) }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white border border-slate-200 rounded-xl p-12 text-center max-w-md mx-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-300 mx-auto mb-3"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z"/></svg>
                    <p class="text-sm font-bold text-slate-500">Belum ada pengumuman resmi saat ini.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- ═══ AGENDA ═══ --}}
    <section class="py-14 scroll-mt-16 bg-white border-t border-slate-200" id="agenda">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="mb-8">
                <p class="text-xs font-bold text-teal-700 uppercase tracking-widest mb-1">Jadwal Kegiatan</p>
                <h2 class="text-2xl font-extrabold text-slate-900">Agenda Lingkungan Mendatang</h2>
                <p class="text-slate-500 text-sm mt-1">Ikuti kegiatan warga untuk mempererat silaturahmi kita bersama.</p>
            </div>

            @if($events->count() > 0)
                <div class="space-y-3 max-w-3xl">
                    @foreach($events as $e)
                    <div class="bg-white border border-slate-200 rounded-xl p-4 flex items-start gap-4 shadow-xs hover:border-teal-200 transition">
                        {{-- Date stamp --}}
                        <div class="bg-teal-50 border border-teal-200 text-teal-800 rounded-lg px-3 py-2 text-center min-w-[58px] flex-shrink-0">
                            <div class="text-xl font-black leading-none">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                            <div class="text-[10px] font-bold uppercase tracking-wide mt-0.5">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</div>
                        </div>
                        {{-- Detail --}}
                        <div class="flex-1 min-w-0">
                            <h3 class="text-base font-bold text-slate-900 leading-snug">{{ $e->judul }}</h3>
                            @if($e->deskripsi)
                                <p class="text-sm text-slate-500 mt-0.5 leading-relaxed">{{ Str::limit($e->deskripsi, 100) }}</p>
                            @endif
                            <div class="flex flex-wrap gap-x-4 gap-y-1 mt-2 text-xs text-slate-500 font-semibold">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                    {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('l, d F Y · H:i') }} WIB
                                </span>
                                @if($e->lokasi)
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                                    {{ $e->lokasi }}
                                </span>
                                @endif
                            </div>
                        </div>
                        <span class="hidden sm:inline-flex text-xs font-bold text-teal-700 bg-teal-50 border border-teal-100 px-2.5 py-1 rounded-lg flex-shrink-0">
                            {{ \Carbon\Carbon::parse($e->tanggal_mulai)->diffForHumans() }}
                        </span>
                    </div>
                    @endforeach
                </div>
                <div class="mt-6">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-teal-700 hover:text-teal-800 flex items-center gap-1 transition">
                        Masuk untuk melihat seluruh agenda
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
                    </a>
                </div>
            @else
                <div class="bg-white border border-slate-200 rounded-xl p-12 text-center max-w-md">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-slate-300 mx-auto mb-3"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                    <p class="text-sm font-bold text-slate-500">Belum ada agenda mendatang yang terdaftar.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- ═══ LAYANAN DIGITAL ═══ --}}
    <section class="py-14 scroll-mt-16 bg-slate-50 border-t border-slate-200" id="layanan">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="mb-10">
                <p class="text-xs font-bold text-teal-700 uppercase tracking-widest mb-1">Fitur Sistem</p>
                <h2 class="text-2xl font-extrabold text-slate-900">Layanan Mandiri Warga</h2>
                <p class="text-slate-500 text-sm mt-1">Urus administrasi dan kebutuhan sosial lingkungan dalam satu portal terpadu.</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                @foreach([
                    ['icon'=>'M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z','color'=>'bg-blue-50 text-blue-700','title'=>'Surat Pengantar RT/RW','desc'=>'Ajukan surat domisili, pengantar KTP, atau SKTM secara online. Pantau status persetujuan tanpa perlu datang ke kantor.'],
                    ['icon'=>'M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5','color'=>'bg-red-50 text-red-700','title'=>'Laporan Pengaduan','desc'=>'Kirim laporan masalah fasilitas rusak, kebersihan lingkungan, atau perselisihan warga langsung ke pengurus RT/RW.'],
                    ['icon'=>'M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3','color'=>'bg-emerald-50 text-emerald-700','title'=>'Transparansi Uang Kas','desc'=>'Pantau pembukuan kas bulanan RT/RW, laporan pemasukan iuran, dan rincian pengeluaran kegiatan warga secara terbuka.'],
                    ['icon'=>'M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.656 48.656 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M3.75 12l-3 3m3-3 3-3','color'=>'bg-amber-50 text-amber-700','title'=>'Peminjaman Inventaris','desc'=>'Butuh sound system, tenda, kursi lipat, atau genset untuk acara? Ajukan peminjaman aset RT/RW secara mudah dan terorganisir.'],
                    ['icon'=>'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5','color'=>'bg-violet-50 text-violet-700','title'=>'Agenda &amp; Jadwal Ronda','desc'=>'Cek jadwal posyandu, rapat warga, kerja bakti, dan jadwal ronda malam lingkungan secara real-time.'],
                    ['icon'=>'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z','color'=>'bg-cyan-50 text-cyan-700','title'=>'Pendataan Kependudukan','desc'=>'Bantu pengurus memiliki data warga yang akurat untuk bantuan sosial, pendataan warga baru, dan laporan mutasi penduduk.'],
                ] as $card)
                <div class="bg-white border border-slate-200 rounded-xl p-5 shadow-xs">
                    <div class="w-11 h-11 {{ $card['color'] }} rounded-lg flex items-center justify-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}"/>
                        </svg>
                    </div>
                    <h3 class="text-base font-bold text-slate-900 mb-1.5">{!! $card['title'] !!}</h3>
                    <p class="text-sm text-slate-500 leading-relaxed">{{ $card['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ═══ CTA ═══ --}}
    <section class="bg-teal-800 py-14 border-t border-teal-900">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 text-center">
            <div class="max-w-xl mx-auto space-y-4">
                <div class="w-12 h-12 bg-teal-700 rounded-full flex items-center justify-center mx-auto text-teal-200">
                    <svg class="w-6 h-6 fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/>
                    </svg>
                </div>
                <h2 class="text-2xl md:text-3xl font-extrabold text-white tracking-tight">Belum punya akun? Daftar sekarang.</h2>
                <p class="text-teal-200 text-sm leading-relaxed">
                    Bergabunglah dengan warga Jalan Nikel yang sudah terdaftar. Nikmati seluruh kemudahan layanan birokrasi RT/RW secara digital.
                </p>
                @auth
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 bg-white text-teal-800 font-bold py-3 px-6 rounded-lg hover:bg-teal-50 transition text-sm">
                        Buka Dashboard Saya
                    </a>
                @else
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 bg-white text-teal-800 font-bold py-3 px-6 rounded-lg hover:bg-teal-50 transition text-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/></svg>
                            Daftar Sebagai Warga
                        </a>
                        <a href="{{ route('login') }}" class="inline-flex items-center justify-center border border-teal-500 text-teal-100 font-semibold py-3 px-6 rounded-lg hover:bg-teal-700/50 transition text-sm">
                            Sudah Terdaftar? Masuk
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </section>

    {{-- ═══ FOOTER / KONTAK ═══ --}}
    <footer class="bg-slate-900 text-slate-300 py-10 scroll-mt-16" id="kontak">
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">

                {{-- Brand --}}
                <div>
                    <div class="flex items-center gap-3 mb-3">
                        <div class="w-9 h-9 bg-teal-700 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg class="w-5 h-5 fill-white" viewBox="0 0 40 40"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
                        </div>
                        <div>
                            <div class="text-sm font-extrabold text-white leading-none">Portal RT/RW Jalan Nikel</div>
                            <div class="text-[10px] text-slate-400 mt-0.5">Kelurahan Bugel, Kota Tangerang</div>
                        </div>
                    </div>
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Sistem Informasi Rukun Tetangga/Rukun Warga untuk pelayanan warga yang lebih mudah dan transparan.
                    </p>
                </div>

                {{-- Navigasi --}}
                <div>
                    <h4 class="text-xs font-extrabold text-slate-200 uppercase tracking-widest mb-4">Navigasi</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#pengumuman" class="hover:text-teal-400 transition">Pengumuman</a></li>
                        <li><a href="#agenda" class="hover:text-teal-400 transition">Agenda Kegiatan</a></li>
                        <li><a href="#layanan" class="hover:text-teal-400 transition">Layanan Warga</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Masuk ke Portal</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-teal-400 transition">Daftar Warga Baru</a></li>
                    </ul>
                </div>

                {{-- Kontak --}}
                <div>
                    <h4 class="text-xs font-extrabold text-slate-200 uppercase tracking-widest mb-4">Informasi Kontak</h4>
                    <ul class="space-y-3 text-sm text-slate-400">
                        <li class="flex items-start gap-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-500 flex-shrink-0 mt-0.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                            Jalan Nikel, Kelurahan Bugel,<br>Kota Tangerang, Banten
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-500 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Senin–Jumat · 08.00–16.00 WIB
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-500 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                            Hubungi pengurus RT/RW setempat
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-6 flex flex-col md:flex-row justify-between items-center gap-3">
                <p class="text-xs text-slate-500">&copy; {{ date('Y') }} Portal RT/RW Jalan Nikel · Kelurahan Bugel, Kota Tangerang</p>
                <p class="text-xs text-slate-600">Sistem Informasi RT/RW · v1.0</p>
            </div>
        </div>
    </footer>

</body>
</html>
