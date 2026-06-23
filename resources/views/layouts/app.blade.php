<!DOCTYPE html>
<html lang="id" class="h-full bg-slate-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard') — SIRTRW</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="description" content="Portal Digital RT/RW - Sistem Informasi Terpadu untuk Tata Kelola Lingkungan">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js"></script>
    @stack('styles')
</head>
<body class="font-sans antialiased text-slate-900 bg-slate-50" x-data="{ sidebarOpen: false }">

    {{-- Mobile Overlay --}}
    <div class="fixed inset-0 bg-slate-900/40 backdrop-blur-xs z-40 lg:hidden" 
         x-show="sidebarOpen" 
         x-transition.opacity 
         @click="sidebarOpen = false" 
         style="display:none;"></div>

    {{-- Sidebar --}}
    <aside class="fixed inset-y-0 left-0 w-64 bg-white border-r border-slate-200 flex flex-col z-50 transform transition-transform duration-200 lg:translate-x-0"
           :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
        
        <div class="p-6 border-b border-slate-100 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SIRTRW" class="w-10 h-10 object-contain rounded-lg">
                <div class="leading-tight">
                    <h1 class="text-lg font-extrabold text-teal-700 tracking-wide m-0">SIRTRW</h1>
                    <p class="text-[9px] text-slate-500 font-semibold m-0 mt-0.5 uppercase tracking-wider">Portal Digital RT/RW</p>
                </div>
            </div>
            <button class="lg:hidden text-slate-500 hover:text-slate-700" @click="sidebarOpen = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>

        <nav class="flex-1 p-4 space-y-6 overflow-y-auto">
            <div>
                <div class="space-y-1">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('dashboard') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                        Dashboard
                    </a>

                    <a href="{{ route('pengumuman.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('pengumuman.*') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/></svg>
                        Pengumuman
                    </a>

                    <a href="{{ route('surat.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('surat.*') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                        Surat & Birokrasi
                    </a>

                    <a href="{{ route('aduan.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('aduan.*') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5"/></svg>
                        Pengaduan
                    </a>

                    <a href="{{ route('kas.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('kas.*') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z"/></svg>
                        Keuangan Kas
                    </a>

                    <a href="{{ route('event.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('event.*') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                        Agenda & Event
                    </a>

                    <a href="{{ route('inventaris.katalog') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('inventaris.*') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
                        Inventaris Barang
                    </a>

                    <a href="{{ route('peminjaman.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('peminjaman.*') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21L3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"/></svg>
                        Peminjaman
                    </a>
                </div>
            </div>

            @auth
                @if(auth()->user()->role === 'pengurus_rt' || auth()->user()->role === 'pengurus_rw')
                    <div class="space-y-1">
                        <div class="text-[10px] font-bold text-slate-400 uppercase tracking-wider px-3 mb-2">Manajemen</div>
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('dashboard') && request()->is('admin') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25"/></svg>
                            Panel Admin
                        </a>

                        <a href="{{ route('verifikasi.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('verifikasi.*') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/></svg>
                            Verifikasi Warga
                        </a>

                        <a href="{{ route('kependudukan.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-semibold transition duration-150 {{ request()->routeIs('kependudukan.*') ? 'bg-teal-50 text-teal-700 border-l-4 border-teal-700' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 opacity-80"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                            Kependudukan
                        </a>
                    </div>
                @endif
            @endauth
        </nav>

        <div class="p-4 border-t border-slate-100 bg-slate-50/50 shrink-0">
            @auth
                <div class="flex items-center gap-3 mb-3 p-1">
                    <div class="w-9 h-9 shrink-0 rounded-full bg-teal-100 text-teal-800 font-extrabold flex items-center justify-center text-sm shadow-inner">
                        {{ strtoupper(substr(auth()->user()->nama_lengkap, 0, 2)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="text-xs font-bold text-slate-800 truncate">{{ auth()->user()->nama_lengkap }}</div>
                        <div class="text-[10px] font-bold text-teal-700 uppercase mt-0.5 tracking-wider">{{ str_replace('_', ' ', auth()->user()->role) }}</div>
                    </div>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 bg-slate-100 hover:bg-rose-50 text-slate-700 hover:text-rose-600 rounded-lg text-xs font-bold transition duration-150">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/></svg>
                        Keluar
                    </button>
                </form>
            @endauth
        </div>
    </aside>

    {{-- Main Content Area --}}
    <div class="lg:ml-64 flex flex-col min-h-screen">
        <header class="bg-white border-b border-slate-200 h-16 flex items-center justify-between px-6 sticky top-0 z-40">
            <div class="flex items-center gap-4">
                <button class="lg:hidden text-slate-500 hover:text-slate-700 focus:outline-none" @click="sidebarOpen = !sidebarOpen">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                </button>
                <div>
                    <h2 class="text-base md:text-lg font-bold text-slate-900 m-0">@yield('title', 'Dashboard')</h2>
                    @hasSection('breadcrumb')
                        <div class="hidden sm:flex items-center gap-1.5 text-xs text-slate-400 font-medium mt-0.5">
                            <a href="{{ route('dashboard') }}" class="hover:text-teal-600 transition">Beranda</a>
                            <span class="text-[10px]">&#9656;</span>
                            @yield('breadcrumb')
                        </div>
                    @endif
                </div>
            </div>
            <div class="flex items-center gap-3">
                @yield('actions')
            </div>
        </header>

        <main class="flex-1 p-6 bg-slate-50/50">
            {{-- Flash Messages --}}
            @if(session('success'))
                <div class="mb-5 flex items-center justify-between gap-3 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl px-5 py-4 text-sm font-semibold shadow-sm" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-emerald-600 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button class="text-emerald-500 hover:text-emerald-700 text-lg font-bold" @click="show = false">&times;</button>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-5 flex items-center justify-between gap-3 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl px-5 py-4 text-sm font-semibold shadow-sm" x-data="{ show: true }" x-show="show" x-transition>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-rose-600 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                        <span>{{ session('error') }}</span>
                    </div>
                    <button class="text-rose-500 hover:text-rose-700 text-lg font-bold" @click="show = false">&times;</button>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>

@stack('scripts')
</body>
</html>
