<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Digital RT/RW Jalan Nikel — SIRTRW</title>
    <meta name="description" content="Portal Digital Resmi RT/RW Jalan Nikel, Kelurahan Bugel, Kota Tangerang. Layanan pengumuman, surat, aduan, kas, dan agenda warga secara online.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        @keyframes marquee {
            0% { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }
        .animate-marquee {
            display: flex;
            width: max-content;
            animation: marquee 25s linear infinite;
        }
        .animate-marquee:hover {
            animation-play-state: paused;
        }
    </style>
</head>
<body class="font-sans antialiased text-slate-800 bg-slate-50 flex flex-col min-h-screen" x-data="{ mobileMenuOpen: false }">

    {{-- ══ TOP INFO BAR ══ --}}
    <div class="bg-teal-800 text-teal-100 text-xs py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-2">
            <div class="flex items-center gap-2 text-center sm:text-left">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-300 inline-block">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z"/>
                </svg>
                <span>Portal Resmi RT 001 & RT 002 / RW 001 · Kelurahan Bugel, Kota Tangerang</span>
            </div>
            <div class="hidden md:flex items-center gap-4 text-teal-200">
                <span class="flex items-center gap-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                    Pelayanan: Senin–Jumat, 08:00–16:00 WIB
                </span>
            </div>
        </div>
    </div>

    {{-- ══ NAVBAR ══ --}}
    <header class="bg-white border-b border-slate-200 sticky top-0 z-50 shadow-xs">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                {{-- Brand Logo & Text --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3">
                    <div class="w-10 h-10 bg-teal-700 text-white rounded-lg flex items-center justify-center font-bold text-lg shadow-sm">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm font-extrabold text-slate-900 tracking-tight leading-none">SIRTRW JALAN NIKEL</div>
                        <div class="text-[10px] text-slate-500 font-medium tracking-wide mt-0.5">Portal Digital Kelurahan Bugel</div>
                    </div>
                </a>

                {{-- Desktop Navigation --}}
                <nav class="hidden md:flex items-center gap-6">
                    <a href="#pengumuman" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition">Pengumuman</a>
                    <a href="#agenda" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition">Agenda</a>
                    <a href="#layanan" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition">Layanan</a>
                    <a href="#kontak" class="text-sm font-semibold text-slate-600 hover:text-teal-700 transition">Kontak</a>
                </nav>

                {{-- Desktop Auth Buttons --}}
                <div class="hidden md:flex items-center gap-3">
                    @auth
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-semibold text-sm py-2 px-4 rounded-lg shadow-sm transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                            </svg>
                            Dashboard Saya
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-700 hover:text-teal-700 transition py-2 px-3">Masuk</a>
                        <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-semibold text-sm py-2 px-4 rounded-lg shadow-sm transition">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/>
                            </svg>
                            Daftar Warga
                        </a>
                    @endauth
                </div>

                {{-- Mobile Menu Button --}}
                <div class="flex items-center md:hidden">
                    <button @click="mobileMenuOpen = !mobileMenuOpen" class="text-slate-600 hover:text-teal-700 focus:outline-none p-2 rounded-lg hover:bg-slate-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6" x-show="!mobileMenuOpen">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6" x-show="mobileMenuOpen" style="display: none;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        {{-- Mobile Dropdown Menu --}}
        <div x-show="mobileMenuOpen" x-transition class="md:hidden border-t border-slate-100 bg-white" style="display: none;">
            <div class="px-4 py-3 space-y-1">
                <a href="#pengumuman" @click="mobileMenuOpen = false" class="block py-2 px-3 text-base font-semibold text-slate-700 hover:bg-slate-50 hover:text-teal-700 rounded-lg">Pengumuman</a>
                <a href="#agenda" @click="mobileMenuOpen = false" class="block py-2 px-3 text-base font-semibold text-slate-700 hover:bg-slate-50 hover:text-teal-700 rounded-lg">Agenda</a>
                <a href="#layanan" @click="mobileMenuOpen = false" class="block py-2 px-3 text-base font-semibold text-slate-700 hover:bg-slate-50 hover:text-teal-700 rounded-lg">Layanan</a>
                <a href="#kontak" @click="mobileMenuOpen = false" class="block py-2 px-3 text-base font-semibold text-slate-700 hover:bg-slate-50 hover:text-teal-700 rounded-lg">Kontak</a>
                <hr class="border-slate-100 my-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="flex items-center justify-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-semibold py-2.5 px-4 rounded-lg shadow-sm text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                        </svg>
                        Dashboard Saya
                    </a>
                @else
                    <div class="grid grid-cols-2 gap-2 pt-1">
                        <a href="{{ route('login') }}" class="block text-center py-2.5 px-4 border border-slate-300 text-slate-700 font-semibold rounded-lg hover:bg-slate-50">Masuk</a>
                        <a href="{{ route('register') }}" class="block text-center py-2.5 px-4 bg-teal-700 hover:bg-teal-800 text-white font-semibold rounded-lg shadow-sm">Daftar</a>
                    </div>
                @endauth
            </div>
        </div>
    </header>

    {{-- ══ URGENT TICKER ══ --}}
    @php $urgents = $pengumuman->where('is_urgent', true); @endphp
    @if($urgents->count() > 0)
        <div class="bg-red-50 border-y border-red-200 py-3 overflow-hidden">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center gap-3">
                <span class="flex-shrink-0 flex items-center gap-1 bg-red-600 text-white font-extrabold text-xs px-2.5 py-1 rounded-md tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                    </svg>
                    PENTING
                </span>
                    <div class="animate-marquee whitespace-nowrap text-sm text-red-800 font-semibold gap-12">
                        @for ($i = 0; $i < 3; $i++)
                            @foreach($urgents as $u)
                                <span class="mr-8 inline-flex items-center gap-1.5">
                                    <svg class="w-4 h-4 text-red-700 inline flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                                    {{ $u->judul }} — <span class="font-normal opacity-90 text-xs">{{ $u->created_at->format('d M Y') }}</span>
                                </span>
                            @endforeach
                        @endfor
                    </div>
            </div>
        </div>
    @endif

    {{-- ══ HERO SECTION ══ --}}
    <section class="bg-gradient-to-b from-teal-50/70 to-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 md:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                {{-- Hero Text Panel --}}
                <div class="lg:col-span-7 space-y-6">
                    <div class="inline-flex items-center gap-1.5 bg-teal-100 text-teal-800 font-semibold text-xs px-3 py-1.5 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
                        </svg>
                        Portal Resmi Layanan Mandiri
                    </div>
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-slate-900 tracking-tight leading-tight">
                        Selamat Datang di <br>
                        <span class="text-teal-700">Portal Digital RT/RW</span> <br>
                        Jalan Nikel Kel. Bugel
                    </h1>
                    <p class="text-base sm:text-lg text-slate-600 leading-relaxed max-w-2xl">
                        Akses pelayanan rukun warga kini lebih <strong>praktis, cepat, dan transparan</strong>. Buat surat keterangan, kirim laporan aduan warga, pantau kas bulanan, dan lihat agenda kegiatan secara online 24 jam.
                    </p>

                    <div class="flex flex-col sm:flex-row gap-3 pt-2">
                        @auth
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center justify-center gap-2 bg-teal-700 hover:bg-teal-800 text-white font-bold py-3.5 px-6 rounded-lg shadow-sm transition text-center text-base">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                                </svg>
                                Buka Dashboard Saya
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 bg-teal-700 hover:bg-teal-800 text-white font-bold py-3.5 px-6 rounded-lg shadow-sm transition text-center text-base">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/>
                                </svg>
                                Daftar Sebagai Warga
                            </a>
                            <a href="{{ route('login') }}" class="inline-flex items-center justify-center border border-slate-300 hover:border-teal-700 hover:bg-teal-50 text-slate-700 font-bold py-3.5 px-6 rounded-lg transition text-center text-base">
                                Sudah Terdaftar? Masuk
                            </a>
                        @endauth
                    </div>

                    {{-- Trust features --}}
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 pt-4 border-t border-slate-200/80">
                        <div class="flex items-center gap-2 text-sm text-slate-600 font-semibold">
                            <span class="w-5 h-5 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                            </span>
                            Gratis & Resmi
                        </div>
                        <div class="flex items-center gap-2 text-sm text-slate-600 font-semibold">
                            <span class="w-5 h-5 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                            </span>
                            Data Terenkripsi
                        </div>
                        <div class="flex items-center gap-2 text-sm text-slate-600 font-semibold">
                            <span class="w-5 h-5 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                            </span>
                            Mudah dari HP
                        </div>
                        <div class="flex items-center gap-2 text-sm text-slate-600 font-semibold">
                            <span class="w-5 h-5 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                            </span>
                            Proses Kilat
                        </div>
                    </div>
                </div>

                {{-- Hero Statistics Panel --}}
                <div class="lg:col-span-5 grid grid-cols-2 gap-4">
                    <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs flex flex-col justify-between min-h-[140px]">
                        <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                            </svg>
                        </div>
                        <div class="mt-4">
                            <div class="text-3xl font-extrabold text-slate-900">{{ $stats['total_warga'] }}</div>
                            <div class="text-xs font-bold text-slate-500 mt-1 uppercase tracking-wider">Warga Terdaftar</div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs flex flex-col justify-between min-h-[140px]">
                        <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                            </svg>
                        </div>
                        <div class="mt-4">
                            <div class="text-3xl font-extrabold text-slate-900">{{ $stats['total_surat'] }}</div>
                            <div class="text-xs font-bold text-slate-500 mt-1 uppercase tracking-wider">Surat Selesai</div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs flex flex-col justify-between min-h-[140px]">
                        <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5"/>
                            </svg>
                        </div>
                        <div class="mt-4">
                            <div class="text-3xl font-extrabold text-slate-900">{{ $stats['total_aduan'] }}</div>
                            <div class="text-xs font-bold text-slate-500 mt-1 uppercase tracking-wider">Aduan Ditangani</div>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs flex flex-col justify-between min-h-[140px]">
                        <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-lg flex items-center justify-center flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                            </svg>
                        </div>
                        <div class="mt-4">
                            <div class="text-3xl font-extrabold text-slate-900">{{ $stats['total_event'] }}</div>
                            <div class="text-xs font-bold text-slate-500 mt-1 uppercase tracking-wider">Event Lingkungan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══ PENGURUS BAR ══ --}}
    <div class="bg-white border-b border-slate-200 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                @foreach([
                    ['jabatan'=>'Ketua RW','wilayah'=>'RW 001 Kel. Bugel'],
                    ['jabatan'=>'Ketua RT 001','wilayah'=>'Blok A (Jalan Nikel)'],
                    ['jabatan'=>'Ketua RT 002','wilayah'=>'Blok B (Jalan Nikel)'],
                    ['jabatan'=>'Sekretaris','wilayah'=>'Administrasi Pelayanan'],
                ] as $p)
                <div class="flex flex-col items-center">
                    <div class="w-10 h-10 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                    </div>
                    <div class="text-sm font-bold text-slate-900">{{ $p['jabatan'] }}</div>
                    <div class="text-xs text-slate-500 font-semibold mt-0.5">{{ $p['wilayah'] }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    {{-- ══ PENGUMUMAN ══ --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 scroll-mt-6" id="pengumuman">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-end gap-4 mb-10">
            <div>
                <span class="text-xs font-bold text-teal-700 uppercase tracking-widest block mb-2">Informasi Terkini</span>
                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Pengumuman Resmi RT/RW</h2>
                <p class="text-slate-600 mt-1">Pengumuman dan selebaran resmi terbaru untuk seluruh warga lingkungan.</p>
            </div>
            <a href="{{ route('login') }}" class="text-sm font-bold text-teal-700 hover:text-teal-800 flex items-center gap-1 group py-1 border-b-2 border-transparent hover:border-teal-700 transition">
                Lihat Semua Pengumuman
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 group-hover:translate-x-0.5 transition">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/>
                </svg>
            </a>
        </div>

        @if($pengumuman->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($pengumuman as $p)
                    <div class="bg-white rounded-xl border {{ $p->is_urgent ? 'border-red-200 bg-red-50/20' : 'border-slate-200' }} p-6 shadow-xs flex flex-col justify-between relative">
                        <div>
                            <div class="flex items-center justify-between gap-2 mb-4">
                                @if($p->is_urgent)
                                    <span class="inline-flex items-center gap-1 bg-red-100 text-red-800 text-[10px] font-extrabold px-2.5 py-1 rounded-md tracking-wider">
                                        <svg class="w-3 h-3 text-red-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                                        PENTING
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 bg-teal-50 border border-teal-200 text-teal-800 text-[10px] font-extrabold px-2.5 py-1 rounded-md tracking-wider">
                                        <svg class="w-3 h-3 text-teal-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" /></svg>
                                        PENGUMUMAN
                                    </span>
                                @endif
                                <span class="text-xs text-slate-500 font-semibold">{{ $p->created_at->format('d M Y') }}</span>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-2 leading-snug">{{ $p->judul }}</h3>
                            <p class="text-sm text-slate-600 leading-relaxed mb-4">{{ Str::limit($p->konten, 140) }}</p>
                        </div>

                        <div>
                            @if($p->tampil_sampai)
                                <div class="flex items-center gap-1.5 text-xs text-amber-700 bg-amber-50 border border-amber-100 px-3 py-1.5 rounded-lg mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                    Berlaku s/d {{ \Carbon\Carbon::parse($p->tampil_sampai)->format('d M Y') }}
                                </div>
                            @endif
                            <div class="flex items-center gap-3 border-t border-slate-100 pt-4 mt-2">
                                <div class="w-8 h-8 bg-teal-700 text-white rounded-full flex items-center justify-center font-bold text-xs">
                                    {{ strtoupper(substr($p->pembuat->nama_lengkap,0,2)) }}
                                </div>
                                <div class="text-xs">
                                    <div class="font-bold text-slate-900 leading-none">{{ $p->pembuat->nama_lengkap }}</div>
                                    <div class="text-slate-500 font-semibold mt-0.5 leading-none uppercase tracking-wider text-[9px]">{{ str_replace('_',' ',$p->pembuat->role) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-white rounded-xl border border-slate-200 p-12 text-center max-w-xl mx-auto shadow-xs">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-slate-400 mx-auto mb-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l-6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z"/>
                </svg>
                <h3 class="text-base font-bold text-slate-900">Belum Ada Pengumuman</h3>
                <p class="text-sm text-slate-500 mt-1">Saat ini belum ada pengumuman resmi yang dibagikan pengurus.</p>
            </div>
        @endif
    </section>

    {{-- ══ AGENDA SECTION ══ --}}
    <section class="bg-slate-100/60 border-y border-slate-200 py-16 scroll-mt-6" id="agenda">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-xl mx-auto mb-10">
                <span class="text-xs font-bold text-teal-700 uppercase tracking-widest block mb-2">Jadwal Kegiatan</span>
                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Agenda Lingkungan Mendatang</h2>
                <p class="text-slate-600 mt-1">Ikuti dan ramaikan kegiatan warga untuk mempererat tali silaturahmi kita.</p>
            </div>

            @if($events->count() > 0)
                <div class="max-w-4xl mx-auto space-y-4">
                    @foreach($events as $e)
                        <div class="bg-white rounded-xl border border-slate-200 p-5 shadow-xs flex flex-col md:flex-row items-start md:items-center gap-5 justify-between">
                            <div class="flex items-start gap-4">
                                {{-- Calendar Date Stamp --}}
                                <div class="bg-teal-50 border border-teal-200 text-teal-800 rounded-lg p-3 text-center min-w-[70px] flex-shrink-0">
                                    <div class="text-2xl font-black leading-none">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                                    <div class="text-xs font-bold uppercase tracking-wider mt-1">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</div>
                                </div>
                                {{-- Event Details --}}
                                <div>
                                    <h3 class="text-lg font-bold text-slate-900 mb-1 leading-snug">{{ $e->judul }}</h3>
                                    @if($e->deskripsi)
                                        <p class="text-sm text-slate-600 mb-2.5 max-w-xl leading-relaxed">{{ Str::limit($e->deskripsi, 120) }}</p>
                                    @endif
                                    <div class="flex flex-wrap gap-x-4 gap-y-1.5 text-xs text-slate-500 font-semibold">
                                        <span class="flex items-center gap-1">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                            {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('l, d F Y · H:i') }} WIB
                                        </span>
                                        @if($e->lokasi)
                                            <span class="flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                                                {{ $e->lokasi }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="text-right flex-shrink-0">
                                <span class="inline-block bg-teal-50 border border-teal-100 text-teal-800 font-bold text-xs py-1.5 px-3 rounded-lg">
                                    {{ \Carbon\Carbon::parse($e->tanggal_mulai)->diffForHumans() }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-8">
                    <a href="{{ route('login') }}" class="text-sm font-bold text-teal-700 hover:text-teal-800 transition">
                        Masuk ke portal untuk melihat seluruh agenda bulanan &rarr;
                    </a>
                </div>
            @else
                <div class="bg-white rounded-xl border border-slate-200 p-12 text-center max-w-xl mx-auto shadow-xs">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-slate-400 mx-auto mb-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                    </svg>
                    <h3 class="text-base font-bold text-slate-900">Belum Ada Agenda</h3>
                    <p class="text-sm text-slate-500 mt-1">Saat ini belum ada jadwal kegiatan mendatang yang terdaftar.</p>
                </div>
            @endif
        </div>
    </section>

    {{-- ══ LAYANAN DIGITAL ══ --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 scroll-mt-6" id="layanan">
        <div class="text-center max-w-xl mx-auto mb-12">
            <span class="text-xs font-bold text-teal-700 uppercase tracking-widest block mb-2">Fitur Utama</span>
            <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Layanan Mandiri Warga</h2>
            <p class="text-slate-600 mt-1">Urus administrasi dan kebutuhan sosial lingkungan dalam satu portal mandiri.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            {{-- Card 1 --}}
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs space-y-4">
                <div class="w-12 h-12 bg-blue-50 text-blue-700 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Surat Pengantar RT/RW</h3>
                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Ajukan pembuatan surat domisili, permohonan KTP baru, atau SKTM online. Cukup isi form dan pantau status tanpa bolak-balik.</p>
                </div>
            </div>

            {{-- Card 2 --}}
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs space-y-4">
                <div class="w-12 h-12 bg-red-50 text-red-700 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Laporan Pengaduan</h3>
                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Kirim laporan masalah fasilitas rusak, kebersihan, ronda, atau perselisihan sosial langsung ke pengurus untuk penanganan cepat.</p>
                </div>
            </div>

            {{-- Card 3 --}}
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs space-y-4">
                <div class="w-12 h-12 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5M5.25 12h13.5m-10.5-6v10.5m7.5-10.5v10.5m-9-10.5h10.5"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Transparansi Uang Kas</h3>
                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Pantau secara langsung pembukuan kas bulanan, laporan pemasukan iuran, dan rincian pengeluaran untuk kegiatan warga.</p>
                </div>
            </div>

            {{-- Card 4 --}}
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs space-y-4">
                <div class="w-12 h-12 bg-amber-50 text-amber-700 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.656 48.656 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M3.75 12l-3 3m3-3 3-3"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Peminjaman Inventaris</h3>
                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Butuh sound system portable, tenda acara, kursi lipat, atau genset RT? Ajukan peminjaman aset dengan mudah secara online.</p>
                </div>
            </div>

            {{-- Card 5 --}}
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs space-y-4">
                <div class="w-12 h-12 bg-violet-50 text-violet-700 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Agenda & Jadwal Ronda</h3>
                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Cek pengumuman posyandu balita bulanan, rapat warga RT/RW, kerja bakti, maupun jadwal ronda malam lingkungan secara real-time.</p>
                </div>
            </div>

            {{-- Card 6 --}}
            <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs space-y-4">
                <div class="w-12 h-12 bg-cyan-50 text-cyan-700 rounded-lg flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="text-lg font-bold text-slate-900">Pendataan Kependudukan</h3>
                    <p class="text-sm text-slate-600 mt-1 leading-relaxed">Bantu pengurus memiliki data warga yang akurat untuk pembagian bantuan sosial, pendataan warga baru, atau laporan mutasi penduduk.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ══ CTA BOX SECTION ══ --}}
    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 pb-16">
        <div class="bg-teal-800 rounded-2xl text-white p-8 md:p-12 shadow-sm text-center space-y-6 relative overflow-hidden">
            {{-- Decorative pattern --}}
            <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:16px_16px] pointer-events-none"></div>

            <div class="w-16 h-16 bg-teal-900/50 rounded-full flex items-center justify-center mx-auto text-teal-300">
                <svg class="w-8 h-8 fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/>
                </svg>
            </div>
            <div class="max-w-xl mx-auto space-y-2">
                <h2 class="text-2xl md:text-3xl font-extrabold tracking-tight">Daftarkan Akun Warga Anda Sekarang</h2>
                <p class="text-teal-200 text-sm md:text-base leading-relaxed">
                    Bergabunglah dengan ratusan warga Jalan Nikel lainnya yang sudah terdaftar di sistem. Nikmati seluruh kemudahan birokrasi RT/RW digital.
                </p>
            </div>

            <div class="flex flex-col sm:flex-row gap-3 justify-center items-center pt-2 relative z-10">
                @auth
                    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-1.5 bg-white hover:bg-slate-100 text-teal-900 font-bold py-3.5 px-6 rounded-lg shadow-sm transition text-base">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                        </svg>
                        Buka Dashboard Saya
                    </a>
                @else
                    <a href="{{ route('register') }}" class="inline-flex items-center gap-1.5 bg-white hover:bg-slate-100 text-teal-900 font-bold py-3.5 px-6 rounded-lg shadow-sm transition text-base w-full sm:w-auto justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/>
                        </svg>
                        Daftar Akun Baru (Gratis)
                    </a>
                    <a href="{{ route('login') }}" class="inline-flex items-center justify-center border border-teal-600 bg-teal-900/40 hover:bg-teal-900/60 text-white font-bold py-3.5 px-6 rounded-lg transition text-base w-full sm:w-auto">
                        Sudah Punya Akun? Masuk
                    </a>
                @endauth
            </div>
        </div>
    </section>

    {{-- ══ KONTAK & ALAMAT SECTION ══ --}}
    <section class="bg-slate-100/60 border-t border-slate-200 py-16 scroll-mt-6" id="kontak">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-xl mx-auto mb-12">
                <h2 class="text-2xl md:text-3xl font-extrabold text-slate-900 tracking-tight">Hubungi Pengurus &amp; Sekretariat</h2>
                <p class="text-slate-600 mt-1">Butuh bantuan langsung? Silakan hubungi nomor pengurus atau kunjungi sekretariat kami.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Alamat --}}
                <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs flex flex-col justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4 flex items-center gap-2">
                            <span class="w-6 h-6 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center">
                                <svg class="w-3.5 h-3.5 text-teal-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                            </span>
                            Alamat Sekretariat
                        </h3>
                        <p class="text-sm text-slate-600 leading-relaxed font-medium">
                            Sekretariat RT/RW Jalan Nikel <br>
                            Jl. Nikel, RT 001 / RW 001 <br>
                            Kelurahan Bugel, Kecamatan Karawaci <br>
                            Kota Tangerang, Banten 15116
                        </p>
                    </div>
                </div>

                {{-- Kontak Pengurus --}}
                <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs flex flex-col justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4 flex items-center gap-2">
                            <span class="w-6 h-6 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center">
                                <svg class="w-3.5 h-3.5 text-teal-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-2.824-1.502-5.118-3.796-6.62-6.62l1.293-.97c.362-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H3.6A2.25 2.25 0 0 0 1.35 4.5v2.25Z" /></svg>
                            </span>
                            Kontak Telepon
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-500 font-semibold">Ketua RW</span>
                                <span class="font-bold text-slate-800">0812-xxxx-xxxx</span>
                            </div>
                            <div class="flex justify-between items-center text-sm border-t border-slate-100 pt-2.5">
                                <span class="text-slate-500 font-semibold">Ketua RT 001</span>
                                <span class="font-bold text-slate-800">0813-xxxx-xxxx</span>
                            </div>
                            <div class="flex justify-between items-center text-sm border-t border-slate-100 pt-2.5">
                                <span class="text-slate-500 font-semibold">Sekretaris</span>
                                <span class="font-bold text-slate-800">0814-xxxx-xxxx</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Jam Layanan --}}
                <div class="bg-white rounded-xl border border-slate-200 p-6 shadow-xs flex flex-col justify-between">
                    <div>
                        <h3 class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-4 flex items-center gap-2">
                            <span class="w-6 h-6 bg-teal-50 text-teal-700 rounded-full flex items-center justify-center">
                                <svg class="w-3.5 h-3.5 text-teal-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>
                            </span>
                            Jam Operasional
                        </h3>
                        <div class="space-y-3">
                            <div class="flex justify-between items-center text-sm">
                                <span class="text-slate-500 font-semibold">Senin – Jumat</span>
                                <span class="font-bold text-slate-800">08.00 – 16.00 WIB</span>
                            </div>
                            <div class="flex justify-between items-center text-sm border-t border-slate-100 pt-2.5">
                                <span class="text-slate-500 font-semibold">Sabtu</span>
                                <span class="font-bold text-slate-800">08.00 – 12.00 WIB</span>
                            </div>
                            <div class="flex justify-between items-center text-sm border-t border-slate-100 pt-2.5">
                                <span class="text-slate-500 font-semibold">Minggu &amp; Libur</span>
                                <span class="font-bold text-red-600 bg-red-50 border border-red-100 px-2 py-0.5 rounded text-xs">Tutup</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ══ FOOTER ══ --}}
    <footer class="bg-slate-900 text-slate-400 border-t border-slate-800 py-12 mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 mb-8 pb-8 border-b border-slate-800">
                {{-- Col 1: Brand info --}}
                <div class="md:col-span-6 space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 bg-teal-700 text-white rounded flex items-center justify-center font-extrabold text-sm shadow-sm">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/>
                            </svg>
                        </div>
                        <span class="text-white font-extrabold text-base tracking-tight">SIRTRW Jalan Nikel</span>
                    </div>
                    <p class="text-xs leading-relaxed max-w-sm">
                        Portal digital resmi tata kelola administrasi Rukun Tetangga &amp; Rukun Warga Jalan Nikel, Kelurahan Bugel, Kecamatan Karawaci. Melayani warga secara jujur, transparan, dan inovatif.
                    </p>
                    <div class="inline-flex items-center gap-1.5 bg-emerald-950/60 border border-emerald-800/80 rounded-lg px-2.5 py-1 text-[10px] text-emerald-400 font-semibold">
                        <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full animate-pulse"></span>
                        Sistem Aktif &amp; Terverifikasi
                    </div>
                </div>

                {{-- Col 2: Services --}}
                <div class="md:col-span-3">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4">Layanan Digital</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Surat Pengantar RT/RW</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Aduan &amp; Keluhan Warga</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Laporan Keuangan Kas</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Peminjaman Inventaris</a></li>
                        <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Agenda Lingkungan</a></li>
                    </ul>
                </div>

                {{-- Col 3: Quick Links --}}
                <div class="md:col-span-3">
                    <h4 class="text-xs font-bold text-white uppercase tracking-wider mb-4">Akses Cepat</h4>
                    <ul class="space-y-2.5 text-xs">
                        <li><a href="{{ route('login') }}" class="hover:text-teal-400 transition">Masuk ke Portal</a></li>
                        <li><a href="{{ route('register') }}" class="hover:text-teal-400 transition">Daftar Akun Warga</a></li>
                        <li><a href="#pengumuman" class="hover:text-teal-400 transition">Pengumuman Terbaru</a></li>
                        <li><a href="#agenda" class="hover:text-teal-400 transition">Jadwal Ronda &amp; Kerja Bakti</a></li>
                        <li><a href="#kontak" class="hover:text-teal-400 transition">Alamat &amp; Kontak Sekretariat</a></li>
                    </ul>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-center gap-4 text-[10px] text-slate-500 font-semibold uppercase tracking-wider">
                <span>&copy; {{ date('Y') }} SIRTRW Jalan Nikel · Semua hak cipta dilindungi.</span>
                <div class="flex items-center gap-1.5 text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253M3 12c0 .778.099 1.533.284 2.253"/>
                    </svg>
                    <span>Pelayanan Terpadu Warga Bugel</span>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
