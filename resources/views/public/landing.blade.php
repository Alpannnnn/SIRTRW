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
<body class="font-sans antialiased bg-stone-50 text-stone-800 min-h-screen flex flex-col" x-data="{ nav: false }">

{{-- NAVBAR --}}
<header class="bg-white/90 backdrop-blur border-b border-stone-200 sticky top-0 z-50">
    <div class="max-w-5xl mx-auto px-5">
        <div class="flex items-center justify-between h-16">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-700 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg class="w-5 h-5 fill-white" viewBox="0 0 40 40"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
                </div>
                <div>
                    <div class="text-[15px] font-extrabold text-stone-900 leading-tight">Portal RT/RW</div>
                    <div class="text-[11px] text-stone-500 leading-tight">Jl. Nikel · Kel. Bugel, Tangerang</div>
                </div>
            </a>

            <nav class="hidden md:flex items-center gap-1">
                <a href="#pengumuman" class="px-3 py-2 text-sm font-medium text-stone-600 hover:text-emerald-700 hover:bg-emerald-50 rounded-lg transition">Pengumuman</a>
                <a href="#agenda" class="px-3 py-2 text-sm font-medium text-stone-600 hover:text-emerald-700 hover:bg-emerald-50 rounded-lg transition">Agenda</a>
                <a href="#layanan" class="px-3 py-2 text-sm font-medium text-stone-600 hover:text-emerald-700 hover:bg-emerald-50 rounded-lg transition">Layanan</a>
                <a href="#kontak" class="px-3 py-2 text-sm font-medium text-stone-600 hover:text-emerald-700 hover:bg-emerald-50 rounded-lg transition">Kontak</a>
            </nav>

            <div class="hidden md:flex items-center gap-2">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">Dashboard Saya</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-stone-600 hover:text-emerald-700 px-3 py-2 rounded-lg transition">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white text-sm font-semibold px-4 py-2 rounded-lg transition">Daftar Warga</a>
                @endauth
            </div>

            <button @click="nav=!nav" class="md:hidden p-2 rounded-lg hover:bg-stone-100 text-stone-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6" x-show="!nav"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/></svg>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6" x-show="nav" style="display:none"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    </div>
    <div x-show="nav" x-transition class="md:hidden border-t border-stone-100 bg-white" style="display:none">
        <div class="px-5 py-3 space-y-1">
            <a href="#pengumuman" @click="nav=false" class="block py-2.5 px-3 text-sm font-medium text-stone-700 hover:bg-stone-50 rounded-lg">Pengumuman</a>
            <a href="#agenda" @click="nav=false" class="block py-2.5 px-3 text-sm font-medium text-stone-700 hover:bg-stone-50 rounded-lg">Agenda</a>
            <a href="#layanan" @click="nav=false" class="block py-2.5 px-3 text-sm font-medium text-stone-700 hover:bg-stone-50 rounded-lg">Layanan</a>
            <a href="#kontak" @click="nav=false" class="block py-2.5 px-3 text-sm font-medium text-stone-700 hover:bg-stone-50 rounded-lg">Kontak</a>
            <hr class="border-stone-100 my-2">
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
</header>

{{-- ALERT PENTING --}}
@php $urgents = $pengumuman->where('is_urgent', true); @endphp
@if($urgents->count() > 0)
<div class="bg-amber-50 border-b-2 border-amber-300">
    <div class="max-w-5xl mx-auto px-5 py-5">
        @foreach($urgents as $u)
        <div class="flex items-start gap-4">
            <div class="w-12 h-12 bg-amber-400 rounded-xl flex items-center justify-center flex-shrink-0 shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6 text-amber-900">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
                </svg>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-1">
                    <span class="bg-amber-500 text-white text-[11px] font-bold px-2 py-0.5 rounded uppercase tracking-wide">Penting</span>
                    <span class="text-xs text-amber-700">{{ $u->created_at->format('d M Y') }}</span>
                </div>
                <h3 class="text-base font-bold text-amber-900 leading-snug">{{ $u->judul }}</h3>
                <p class="text-sm text-amber-800/80 mt-1 leading-relaxed">{{ Str::limit($u->konten, 180) }}</p>
            </div>
        </div>
        @if(!$loop->last)<hr class="border-amber-200 my-4">@endif
        @endforeach
    </div>
</div>
@endif

{{-- HERO --}}
<section class="bg-white border-b border-stone-200">
    <div class="max-w-5xl mx-auto px-5 py-16 md:py-20">
        <div class="max-w-2xl">
            <p class="text-emerald-700 text-sm font-semibold mb-3">Portal Resmi Pelayanan Warga</p>
            <h1 class="text-4xl md:text-5xl font-black text-stone-900 leading-[1.15] tracking-tight mb-5">
                Portal Digital RT/RW<br>
                Jalan Nikel
            </h1>
            <p class="text-lg text-stone-500 leading-relaxed mb-8 max-w-xl">
                Kelurahan Bugel, Kota Tangerang. Urus surat, lapor aduan, pantau kas, dan ikuti kegiatan warga — semuanya dari rumah.
            </p>
            <div class="flex flex-wrap gap-3 mb-10">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-sm py-3 px-6 rounded-xl transition shadow-sm">Buka Dashboard Saya</a>
                @else
                    <a href="{{ route('register') }}" class="bg-emerald-700 hover:bg-emerald-800 text-white font-bold text-sm py-3 px-6 rounded-xl transition shadow-sm">Daftar Sebagai Warga</a>
                    <a href="{{ route('login') }}" class="bg-white border border-stone-300 hover:border-emerald-600 hover:text-emerald-700 text-stone-700 font-semibold text-sm py-3 px-6 rounded-xl transition">Sudah Punya Akun? Masuk</a>
                @endauth
            </div>
        </div>

        {{-- Statistik --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @foreach([
                ['value'=>$stats['total_warga'],'label'=>'Warga Terdaftar','color'=>'bg-emerald-50 text-emerald-700 border-emerald-200'],
                ['value'=>$stats['total_surat'],'label'=>'Surat Selesai','color'=>'bg-sky-50 text-sky-700 border-sky-200'],
                ['value'=>$stats['total_aduan'],'label'=>'Aduan Ditangani','color'=>'bg-rose-50 text-rose-700 border-rose-200'],
                ['value'=>$stats['total_event'],'label'=>'Agenda Kegiatan','color'=>'bg-amber-50 text-amber-700 border-amber-200'],
            ] as $s)
            <div class="border rounded-xl px-5 py-4 {{ $s['color'] }}">
                <div class="text-3xl font-black">{{ $s['value'] }}</div>
                <div class="text-sm font-medium mt-1 opacity-80">{{ $s['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- PENGURUS --}}
<div class="bg-stone-50 border-b border-stone-200 py-6">
    <div class="max-w-5xl mx-auto px-5">
        <p class="text-xs text-stone-400 font-semibold uppercase tracking-widest mb-4">Pengurus Lingkungan</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-5">
            @foreach([
                ['jabatan'=>'Ketua RW 001','wilayah'=>'Kelurahan Bugel'],
                ['jabatan'=>'Ketua RT 001','wilayah'=>'Blok A – Jalan Nikel'],
                ['jabatan'=>'Ketua RT 002','wilayah'=>'Blok B – Jalan Nikel'],
                ['jabatan'=>'Sekretaris','wilayah'=>'Administrasi'],
            ] as $p)
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-emerald-100 text-emerald-700 rounded-full flex items-center justify-center flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
                </div>
                <div>
                    <div class="text-sm font-bold text-stone-900">{{ $p['jabatan'] }}</div>
                    <div class="text-xs text-stone-500">{{ $p['wilayah'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- PENGUMUMAN --}}
<section class="py-14 scroll-mt-20" id="pengumuman">
    <div class="max-w-5xl mx-auto px-5">
        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-3 mb-8">
            <div>
                <h2 class="text-2xl font-extrabold text-stone-900 mb-1">Pengumuman</h2>
                <p class="text-stone-500 text-sm">Informasi terbaru untuk warga lingkungan Jalan Nikel.</p>
            </div>
            <a href="{{ route('login') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800 flex items-center gap-1 transition whitespace-nowrap">
                Lihat semua
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

        @if($pengumuman->count() > 0)
        <div class="space-y-4">
            @foreach($pengumuman as $p)
            <article class="bg-white border border-stone-200 rounded-2xl p-6 hover:shadow-sm transition {{ $p->is_urgent ? 'ring-2 ring-amber-300 border-amber-200' : '' }}">
                <div class="flex items-start gap-4">
                    {{-- Left icon --}}
                    <div class="w-11 h-11 rounded-xl flex items-center justify-center flex-shrink-0 mt-0.5 {{ $p->is_urgent ? 'bg-amber-100 text-amber-600' : 'bg-emerald-100 text-emerald-600' }}">
                        @if($p->is_urgent)
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                        @else
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/></svg>
                        @endif
                    </div>

                    {{-- Content --}}
                    <div class="flex-1 min-w-0">
                        <div class="flex flex-wrap items-center gap-2 mb-1.5">
                            @if($p->is_urgent)
                                <span class="bg-amber-500 text-white text-[10px] font-bold px-2 py-0.5 rounded uppercase">Penting</span>
                            @endif
                            <span class="text-xs text-stone-400">{{ $p->created_at->format('d M Y') }}</span>
                        </div>
                        <h3 class="text-base font-bold text-stone-900 leading-snug mb-1">{{ $p->judul }}</h3>
                        <p class="text-sm text-stone-500 leading-relaxed">{{ Str::limit($p->konten, 160) }}</p>

                        @if($p->tampil_sampai)
                        <div class="inline-flex items-center gap-1.5 text-xs text-amber-700 bg-amber-50 border border-amber-100 px-3 py-1.5 rounded-lg mt-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            Berlaku hingga {{ \Carbon\Carbon::parse($p->tampil_sampai)->format('d M Y') }}
                        </div>
                        @endif

                        <div class="flex items-center gap-2 mt-4 pt-3 border-t border-stone-100">
                            <div class="w-6 h-6 bg-emerald-700 text-white rounded-full flex items-center justify-center text-[10px] font-bold flex-shrink-0">
                                {{ strtoupper(substr($p->pembuat->nama_lengkap, 0, 1)) }}
                            </div>
                            <span class="text-xs text-stone-500">{{ $p->pembuat->nama_lengkap }} · <span class="text-stone-400">{{ str_replace('_', ' ', $p->pembuat->role) }}</span></span>
                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <div class="bg-white border border-stone-200 rounded-2xl p-12 text-center">
            <p class="text-stone-400 text-sm">Belum ada pengumuman resmi saat ini.</p>
        </div>
        @endif
    </div>
</section>

{{-- AGENDA --}}
<section class="py-14 bg-white border-t border-stone-200 scroll-mt-20" id="agenda">
    <div class="max-w-5xl mx-auto px-5">
        <h2 class="text-2xl font-extrabold text-stone-900 mb-1">Agenda Kegiatan</h2>
        <p class="text-stone-500 text-sm mb-8">Kegiatan warga yang akan datang di lingkungan kita.</p>

        @if($events->count() > 0)
        <div class="space-y-3">
            @foreach($events as $e)
            <div class="bg-stone-50 border border-stone-200 rounded-2xl p-5 flex items-start gap-5 hover:bg-white hover:shadow-xs transition">
                <div class="bg-white border border-stone-200 text-emerald-700 rounded-xl text-center px-4 py-3 min-w-[68px] flex-shrink-0 shadow-xs">
                    <div class="text-2xl font-black leading-none">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                    <div class="text-[11px] font-bold uppercase mt-0.5 text-stone-500">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM YY') }}</div>
                </div>
                <div class="flex-1 min-w-0">
                    <h3 class="text-base font-bold text-stone-900 mb-0.5">{{ $e->judul }}</h3>
                    @if($e->deskripsi)
                    <p class="text-sm text-stone-500 leading-relaxed mb-2">{{ Str::limit($e->deskripsi, 120) }}</p>
                    @endif
                    <div class="flex flex-wrap gap-x-5 gap-y-1 text-xs text-stone-400">
                        <span class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('l, d F Y · H:i') }} WIB
                        </span>
                        @if($e->lokasi)
                        <span class="flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                            {{ $e->lokasi }}
                        </span>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <p class="mt-6">
            <a href="{{ route('login') }}" class="text-sm font-semibold text-emerald-700 hover:text-emerald-800 transition">Masuk untuk melihat seluruh agenda &rarr;</a>
        </p>
        @else
        <div class="bg-stone-50 border border-stone-200 rounded-2xl p-12 text-center">
            <p class="text-stone-400 text-sm">Belum ada agenda yang terjadwal saat ini.</p>
        </div>
        @endif
    </div>
</section>

{{-- LAYANAN --}}
<section class="py-14 border-t border-stone-200 scroll-mt-20" id="layanan">
    <div class="max-w-5xl mx-auto px-5">
        <h2 class="text-2xl font-extrabold text-stone-900 mb-1">Layanan Warga</h2>
        <p class="text-stone-500 text-sm mb-8">Fitur yang bisa kamu gunakan setelah terdaftar di portal ini.</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach([
                ['color'=>'bg-sky-100 text-sky-700','icon'=>'M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z','title'=>'Surat Pengantar','desc'=>'Ajukan surat domisili, KTP, atau SKTM secara online dan pantau prosesnya.'],
                ['color'=>'bg-rose-100 text-rose-700','icon'=>'M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5','title'=>'Pengaduan Warga','desc'=>'Laporkan masalah di lingkungan langsung ke pengurus untuk ditindaklanjuti.'],
                ['color'=>'bg-emerald-100 text-emerald-700','icon'=>'M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3','title'=>'Transparansi Kas','desc'=>'Pantau pembukuan keuangan RT/RW secara terbuka dan transparan.'],
                ['color'=>'bg-amber-100 text-amber-700','icon'=>'M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 0 0-3.7-3.7 48.656 48.656 0 0 0-7.324 0 4.006 4.006 0 0 0-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 0 0 3.7 3.7 48.656 48.656 0 0 0 7.324 0 4.006 4.006 0 0 0 3.7-3.7c.017-.22.032-.441.046-.662M3.75 12l-3 3m3-3 3-3','title'=>'Peminjaman Barang','desc'=>'Pinjam tenda, kursi lipat, sound system, dan aset RT/RW lainnya.'],
                ['color'=>'bg-violet-100 text-violet-700','icon'=>'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5','title'=>'Agenda & Ronda','desc'=>'Lihat jadwal posyandu, kerja bakti, rapat warga, dan ronda malam.'],
                ['color'=>'bg-cyan-100 text-cyan-700','icon'=>'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z','title'=>'Data Kependudukan','desc'=>'Data warga yang akurat untuk bantuan sosial dan pendataan.'],
            ] as $card)
            <div class="bg-white border border-stone-200 rounded-2xl p-5 hover:shadow-sm transition">
                <div class="w-10 h-10 {{ $card['color'] }} rounded-xl flex items-center justify-center mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $card['icon'] }}"/></svg>
                </div>
                <h3 class="text-sm font-bold text-stone-900 mb-1">{{ $card['title'] }}</h3>
                <p class="text-sm text-stone-500 leading-relaxed">{{ $card['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CTA --}}
<section class="bg-emerald-700 py-14">
    <div class="max-w-5xl mx-auto px-5 text-center">
        <h2 class="text-2xl md:text-3xl font-extrabold text-white mb-3">Bergabung sekarang, gratis.</h2>
        <p class="text-emerald-100 text-base max-w-lg mx-auto mb-7 leading-relaxed">
            Daftar sebagai warga dan akses semua layanan digital RT/RW dari mana saja. Proses pendaftaran hanya butuh beberapa menit.
        </p>
        @auth
            <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 bg-white text-emerald-800 font-bold text-sm py-3 px-7 rounded-xl hover:bg-emerald-50 transition shadow-sm">Buka Dashboard</a>
        @else
            <div class="flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('register') }}" class="inline-flex items-center justify-center gap-2 bg-white text-emerald-800 font-bold text-sm py-3 px-7 rounded-xl hover:bg-emerald-50 transition shadow-sm">Daftar Sebagai Warga</a>
                <a href="{{ route('login') }}" class="inline-flex items-center justify-center border border-emerald-400/50 text-emerald-100 font-semibold text-sm py-3 px-7 rounded-xl hover:bg-emerald-600 transition">Sudah Punya Akun?</a>
            </div>
        @endauth
    </div>
</section>

{{-- FOOTER --}}
<footer class="bg-stone-900 text-stone-400 py-10 scroll-mt-20" id="kontak">
    <div class="max-w-5xl mx-auto px-5">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-8">
            <div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-9 h-9 bg-emerald-700 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 fill-white" viewBox="0 0 40 40"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
                    </div>
                    <div>
                        <div class="text-sm font-bold text-white">Portal RT/RW Jalan Nikel</div>
                        <div class="text-[11px] text-stone-500">Kel. Bugel, Kota Tangerang</div>
                    </div>
                </div>
                <p class="text-sm text-stone-500 leading-relaxed">Sistem informasi untuk pelayanan warga yang lebih mudah, cepat, dan transparan.</p>
            </div>
            <div>
                <h4 class="text-xs font-bold text-stone-300 uppercase tracking-widest mb-4">Navigasi</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#pengumuman" class="hover:text-emerald-400 transition">Pengumuman</a></li>
                    <li><a href="#agenda" class="hover:text-emerald-400 transition">Agenda</a></li>
                    <li><a href="#layanan" class="hover:text-emerald-400 transition">Layanan</a></li>
                    <li><a href="{{ route('login') }}" class="hover:text-emerald-400 transition">Masuk</a></li>
                    <li><a href="{{ route('register') }}" class="hover:text-emerald-400 transition">Daftar Baru</a></li>
                </ul>
            </div>
            <div>
                <h4 class="text-xs font-bold text-stone-300 uppercase tracking-widest mb-4">Kontak</h4>
                <ul class="space-y-3 text-sm text-stone-500">
                    <li class="flex items-start gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-emerald-600 flex-shrink-0 mt-0.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                        Jalan Nikel, Kel. Bugel,<br>Kota Tangerang, Banten
                    </li>
                    <li class="flex items-center gap-2.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-emerald-600 flex-shrink-0"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                        Senin–Jumat · 08.00–16.00 WIB
                    </li>
                </ul>
            </div>
        </div>
        <div class="border-t border-stone-800 pt-6 flex flex-col sm:flex-row justify-between items-center gap-2">
            <p class="text-xs text-stone-600">&copy; {{ date('Y') }} Portal RT/RW Jalan Nikel · Kelurahan Bugel</p>
            <p class="text-xs text-stone-700">SIRTRW v1.0</p>
        </div>
    </div>
</footer>

</body>
</html>
