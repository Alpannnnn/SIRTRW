<!DOCTYPE html>
<html lang="id" class="h-full bg-stone-50">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Masuk') — SIRTRW</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <meta name="description" content="Portal Digital RT/RW Jalan Nikel — Sistem Informasi Terpadu untuk Tata Kelola Lingkungan">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full font-sans antialiased text-stone-800 bg-stone-50 flex flex-col">

    {{-- Top Navbar --}}
    <header class="bg-white border-b border-stone-200 h-16 flex items-center justify-between px-6 flex-shrink-0 z-10">
        <a href="{{ route('home') }}" class="flex items-center gap-2.5">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SIRTRW" class="w-9 h-9 object-contain rounded-lg">
            <div>
                <div class="text-sm font-extrabold text-stone-900 tracking-tight leading-none">Portal RT/RW</div>
                <div class="text-[10px] text-stone-500 font-medium tracking-wide mt-1">Jl. Nikel · Kel. Bugel, Tangerang</div>
            </div>
        </a>
        <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-xs font-bold text-stone-600 hover:text-emerald-700 border border-stone-200 hover:border-emerald-600 bg-white py-2 px-3.5 rounded-xl transition shadow-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/>
            </svg>
            Kembali ke Portal
        </a>
    </header>

    {{-- Main Container --}}
    <main class="flex-1 flex flex-col lg:flex-row min-h-0">
        
        {{-- Left Panel (Information) - Hidden on Mobile --}}
        <div class="hidden lg:flex lg:w-1/2 bg-stone-100/50 border-r border-stone-200 flex-col justify-center px-12 xl:px-16 py-12 relative overflow-hidden">
            {{-- Background decorative shapes --}}
            <div class="absolute -top-20 -right-20 w-72 h-72 bg-emerald-50 rounded-full pointer-events-none"></div>
            <div class="absolute -bottom-20 -left-20 w-64 h-64 bg-emerald-50/50 rounded-full pointer-events-none"></div>

            <div class="max-w-md relative z-10 space-y-6">
                <div class="inline-flex items-center gap-1.5 bg-emerald-50 text-emerald-800 font-extrabold text-[10px] px-3 py-1.5 rounded-lg tracking-wider uppercase border border-emerald-100">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/>
                    </svg>
                    Portal Warga Mandiri
                </div>

                <h2 class="text-3xl font-extrabold text-stone-900 tracking-tight leading-tight">
                    Layanan Mandiri Warga <br>
                    Jalan Nikel Kel. Bugel <br>
                    Kini Serba Digital
                </h2>

                <p class="text-sm text-stone-500 leading-relaxed font-medium">
                    Kami hadir untuk memberikan kemudahan pelayanan birokrasi dan administrasi rukun warga secara digital, cepat, aman, dan transparan.
                </p>

                <div class="space-y-4 pt-4 border-t border-stone-200">
                    <div class="flex items-center gap-3.5 text-sm font-bold text-stone-700">
                        <div class="w-8 h-8 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center flex-shrink-0 border border-emerald-100">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" /></svg>
                        </div>
                        Ajukan surat pengantar RT/RW secara online
                    </div>
                    <div class="flex items-center gap-3.5 text-sm font-bold text-stone-700">
                        <div class="w-8 h-8 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center flex-shrink-0 border border-emerald-100">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73" /></svg>
                        </div>
                        Kirim laporan aduan langsung ke pengurus
                    </div>
                    <div class="flex items-center gap-3.5 text-sm font-bold text-stone-700">
                        <div class="w-8 h-8 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center flex-shrink-0 border border-emerald-100">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5h16.5a1.5 1.5 0 0 1 1.5 1.5v12a1.5 1.5 0 0 1-1.5 1.5H3.75a1.5 1.5 0 0 1-1.5-1.5V6a1.5 1.5 0 0 1 1.5-1.5Zm13.5 3.75a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Z" /></svg>
                        </div>
                        Pantau transparansi pencatatan kas bulanan
                    </div>
                    <div class="flex items-center gap-3.5 text-sm font-bold text-stone-700">
                        <div class="w-8 h-8 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center flex-shrink-0 border border-emerald-100">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" /></svg>
                        </div>
                        Dapatkan informasi pengumuman &amp; agenda RT/RW
                    </div>
                </div>
            </div>
        </div>

        {{-- Right Panel (Form) --}}
        <div class="flex-1 bg-white flex flex-col justify-center items-center px-6 py-10 lg:py-12 overflow-y-auto">
            <div class="w-full max-w-[440px] flex flex-col justify-between h-full min-h-0">
                <div class="py-4">
                    @yield('content')
                </div>
                <div class="text-center text-[10px] text-stone-400 font-bold uppercase tracking-wider border-t border-stone-150 pt-6 mt-8">
                    &copy; {{ date('Y') }} SIRTRW Jalan Nikel · Portal Digital RT/RW
                </div>
            </div>
        </div>

    </main>

</body>
</html>
