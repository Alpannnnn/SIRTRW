<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Resmi RT/RW Murni — SIRTRW</title>
    <meta name="description" content="Portal Digital Resmi RT/RW Murni. Layanan pengumuman, surat, aduan, kas, dan agenda warga secara online.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/public.css') }}">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        :root {
            --rt-red: #dc2626;
            --rt-red-dark: #b91c1c;
            --rt-gold: #d97706;
            --rt-green: #16a34a;
            --rt-blue: #1d4ed8;
        }
    </style>
</head>
<body style="background:#0a0f1e;">

{{-- ════════════════════════════════════════ --}}
{{-- TOP INFO BAR (merah putih, gaya resmi)  --}}
{{-- ════════════════════════════════════════ --}}
<div style="background:linear-gradient(90deg,#dc2626,#b91c1c);padding:8px 0;font-size:0.72rem;color:white;">
    <div style="max-width:1200px;margin:0 auto;padding:0 2rem;display:flex;justify-content:space-between;align-items:center;flex-wrap:wrap;gap:8px;">
        <span>🏛️ Portal Resmi · Rukun Tetangga & Rukun Warga Murni · Kelurahan Murni, Kecamatan Cilincing, Jakarta Utara</span>
        <div style="display:flex;gap:16px;align-items:center;">
            <span>📞 Pengurus RT: 0812-xxxx-xxxx</span>
            <span>|</span>
            <span>🕐 Senin–Jumat, 08.00–16.00 WIB</span>
        </div>
    </div>
</div>

{{-- ════════════════════════════════════════ --}}
{{-- MAIN NAVBAR                             --}}
{{-- ════════════════════════════════════════ --}}
<nav style="background:rgba(10,15,30,0.97);backdrop-filter:blur(20px);border-bottom:3px solid #dc2626;position:sticky;top:0;z-index:200;" id="main-navbar">
    <div style="max-width:1200px;margin:0 auto;padding:0 2rem;display:flex;align-items:center;justify-content:space-between;height:68px;">

        {{-- Logo & Brand --}}
        <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:14px;text-decoration:none;">
            {{-- Lambang RT --}}
            <div style="width:50px;height:50px;background:linear-gradient(135deg,#dc2626,#b91c1c);border-radius:50%;display:flex;align-items:center;justify-content:center;border:2px solid rgba(255,255,255,0.2);flex-shrink:0;">
                <svg viewBox="0 0 40 40" style="width:28px;height:28px;fill:white;" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/>
                </svg>
            </div>
            <div>
                <div style="font-family:'Plus Jakarta Sans',sans-serif;font-weight:800;font-size:1.1rem;color:white;letter-spacing:0.05em;">SIRTRW MURNI</div>
                <div style="font-size:0.68rem;color:#94a3b8;letter-spacing:0.03em;">Sistem Informasi Portal Digital RT/RW</div>
            </div>
        </a>

        {{-- Nav Menu --}}
        <ul style="display:flex;list-style:none;gap:4px;align-items:center;" class="desktop-nav">
            <li><a href="#pengumuman" style="display:flex;align-items:center;gap:6px;padding:8px 14px;border-radius:8px;color:#94a3b8;font-size:0.85rem;font-weight:500;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.background='rgba(220,38,38,0.15)';this.style.color='#fca5a5'" onmouseout="this.style.background='transparent';this.style.color='#94a3b8'">📢 Pengumuman</a></li>
            <li><a href="#agenda" style="display:flex;align-items:center;gap:6px;padding:8px 14px;border-radius:8px;color:#94a3b8;font-size:0.85rem;font-weight:500;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.background='rgba(220,38,38,0.15)';this.style.color='#fca5a5'" onmouseout="this.style.background='transparent';this.style.color='#94a3b8'">📅 Agenda</a></li>
            <li><a href="#layanan" style="display:flex;align-items:center;gap:6px;padding:8px 14px;border-radius:8px;color:#94a3b8;font-size:0.85rem;font-weight:500;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.background='rgba(220,38,38,0.15)';this.style.color='#fca5a5'" onmouseout="this.style.background='transparent';this.style.color='#94a3b8'">🛠 Layanan</a></li>
            <li><a href="#kontak" style="display:flex;align-items:center;gap:6px;padding:8px 14px;border-radius:8px;color:#94a3b8;font-size:0.85rem;font-weight:500;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.background='rgba(220,38,38,0.15)';this.style.color='#fca5a5'" onmouseout="this.style.background='transparent';this.style.color='#94a3b8'">📞 Kontak</a></li>
        </ul>

        {{-- Actions --}}
        <div style="display:flex;gap:10px;align-items:center;">
            @auth
                <a href="{{ route('dashboard') }}" style="display:inline-flex;align-items:center;gap:6px;background:linear-gradient(135deg,#dc2626,#b91c1c);color:white;padding:9px 18px;border-radius:8px;font-size:0.85rem;font-weight:600;text-decoration:none;box-shadow:0 4px 12px rgba(220,38,38,0.3);transition:all 0.2s;" onmouseover="this.style.transform='translateY(-1px)'" onmouseout="this.style.transform='none'">
                    🏠 Dashboard Saya
                </a>
            @else
                <a href="{{ route('login') }}" style="padding:9px 16px;border:1px solid rgba(148,163,184,0.3);border-radius:8px;color:#94a3b8;font-size:0.85rem;font-weight:500;text-decoration:none;transition:all 0.2s;" onmouseover="this.style.borderColor='#dc2626';this.style.color='#fca5a5'" onmouseout="this.style.borderColor='rgba(148,163,184,0.3)';this.style.color='#94a3b8'">Masuk</a>
                <a href="{{ route('register') }}" style="display:inline-flex;align-items:center;gap:6px;background:linear-gradient(135deg,#dc2626,#b91c1c);color:white;padding:9px 18px;border-radius:8px;font-size:0.85rem;font-weight:600;text-decoration:none;box-shadow:0 4px 12px rgba(220,38,38,0.3);">
                    Daftar Warga
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- ════════════════════════════════════════ --}}
{{-- URGENT TICKER                           --}}
{{-- ════════════════════════════════════════ --}}
@php $urgents = $pengumuman->where('is_urgent', true); @endphp
@if($urgents->count() > 0)
<div style="background:linear-gradient(90deg,rgba(220,38,38,0.12),rgba(220,38,38,0.06));border-bottom:1px solid rgba(220,38,38,0.25);overflow:hidden;">
    <div style="display:flex;align-items:center;padding:10px 2rem;gap:16px;">
        <div style="background:#dc2626;color:white;font-size:0.7rem;font-weight:700;padding:3px 10px;border-radius:999px;white-space:nowrap;flex-shrink:0;animation:pulse 2s infinite;">🚨 PENGUMUMAN PENTING</div>
        <div style="overflow:hidden;flex:1;mask-image:linear-gradient(90deg,transparent,black 4%,black 96%,transparent);">
            <div style="display:flex;gap:0;animation:marquee 25s linear infinite;white-space:nowrap;">
                @for ($i = 0; $i < 2; $i++)
                    @foreach($urgents as $u)
                        <span style="padding:0 40px;font-size:0.82rem;color:#fca5a5;border-right:1px solid rgba(220,38,38,0.2);">{{ $u->judul }}</span>
                    @endforeach
                @endfor
            </div>
        </div>
    </div>
</div>
@endif

{{-- ════════════════════════════════════════ --}}
{{-- HERO — gaya portal pemerintah modern    --}}
{{-- ════════════════════════════════════════ --}}
<section style="min-height:92vh;display:flex;align-items:center;position:relative;overflow:hidden;padding:80px 2rem 60px;">

    {{-- Background --}}
    <div style="position:absolute;inset:0;background:linear-gradient(135deg,#0a0f1e 0%,#0f172a 50%,#0a0a1a 100%);z-index:0;"></div>

    {{-- Red accent glow kiri --}}
    <div style="position:absolute;top:-100px;left:-150px;width:500px;height:500px;background:radial-gradient(circle,rgba(220,38,38,0.15),transparent 70%);border-radius:50%;z-index:1;animation:blobFloat 10s ease-in-out infinite;"></div>
    {{-- Blue accent kanan --}}
    <div style="position:absolute;bottom:-50px;right:-100px;width:400px;height:400px;background:radial-gradient(circle,rgba(29,78,216,0.12),transparent 70%);border-radius:50%;z-index:1;animation:blobFloat 12s ease-in-out infinite reverse;"></div>
    {{-- Gold accent tengah --}}
    <div style="position:absolute;top:40%;left:40%;width:300px;height:300px;background:radial-gradient(circle,rgba(217,119,6,0.08),transparent 70%);border-radius:50%;z-index:1;"></div>

    {{-- Grid overlay --}}
    <div style="position:absolute;inset:0;background-image:linear-gradient(rgba(220,38,38,0.03) 1px,transparent 1px),linear-gradient(90deg,rgba(220,38,38,0.03) 1px,transparent 1px);background-size:60px 60px;z-index:1;"></div>

    <div style="position:relative;z-index:2;max-width:1200px;margin:0 auto;width:100%;display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;">

        {{-- LEFT: Text --}}
        <div>
            {{-- Badge resmi --}}
            <div style="display:inline-flex;align-items:center;gap:8px;background:rgba(220,38,38,0.12);border:1px solid rgba(220,38,38,0.3);border-radius:999px;padding:6px 16px;font-size:0.75rem;font-weight:600;color:#fca5a5;margin-bottom:24px;animation:fadeSlideDown 0.6s ease;">
                <span style="width:8px;height:8px;border-radius:50%;background:#dc2626;animation:pulse 2s infinite;display:block;"></span>
                🏛️ Portal Resmi · Online 24 Jam
            </div>

            <h1 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:3.2rem;font-weight:800;line-height:1.15;letter-spacing:-0.03em;margin-bottom:20px;animation:fadeSlideUp 0.7s ease 0.1s both;">
                Selamat Datang di<br>
                <span style="background:linear-gradient(135deg,#dc2626,#f87171,#fca5a5);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;">Portal Digital</span><br>
                RT/RW Murni
            </h1>

            <p style="font-size:1.05rem;color:#94a3b8;line-height:1.75;margin-bottom:32px;max-width:500px;animation:fadeSlideUp 0.7s ease 0.2s both;">
                Akses layanan RT/RW secara <strong style="color:#f1f5f9;">digital, cepat, dan transparan</strong>. Pengajuan surat, laporan aduan warga, informasi kas, dan agenda kegiatan — semuanya dalam satu platform resmi.
            </p>

            <div style="display:flex;gap:14px;flex-wrap:wrap;animation:fadeSlideUp 0.7s ease 0.3s both;">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-lg" style="background:linear-gradient(135deg,#dc2626,#b91c1c);color:white;box-shadow:0 6px 20px rgba(220,38,38,0.35);">🏠 Buka Dashboard Saya</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-lg" style="background:linear-gradient(135deg,#dc2626,#b91c1c);color:white;box-shadow:0 6px 20px rgba(220,38,38,0.35);">📋 Daftar Sebagai Warga</a>
                    <a href="{{ route('login') }}" class="btn btn-outline btn-lg">Sudah Terdaftar? Masuk →</a>
                @endauth
            </div>

            {{-- Trust badges --}}
            <div style="display:flex;gap:20px;margin-top:32px;flex-wrap:wrap;animation:fadeSlideUp 0.7s ease 0.4s both;">
                @foreach(['✅ Gratis & Resmi','🔒 Data Aman','⚡ Proses Cepat','📱 Akses Mobile'] as $t)
                <span style="font-size:0.78rem;color:#64748b;display:flex;align-items:center;gap:4px;">{{ $t }}</span>
                @endforeach
            </div>
        </div>

        {{-- RIGHT: Stats + Card visual --}}
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;animation:fadeSlideUp 0.8s ease 0.2s both;">
            @php
            $statCards = [
                ['val' => $stats['total_warga'], 'label' => 'Warga Terdaftar', 'icon' => '👥', 'color' => '#3b82f6', 'bg' => 'rgba(59,130,246,0.1)'],
                ['val' => $stats['total_surat'], 'label' => 'Surat Diselesaikan', 'icon' => '📄', 'color' => '#10b981', 'bg' => 'rgba(16,185,129,0.1)'],
                ['val' => $stats['total_aduan'], 'label' => 'Aduan Ditangani', 'icon' => '🚩', 'color' => '#f59e0b', 'bg' => 'rgba(245,158,11,0.1)'],
                ['val' => $stats['total_event'], 'label' => 'Event Terlaksana', 'icon' => '🎉', 'color' => '#8b5cf6', 'bg' => 'rgba(139,92,246,0.1)'],
            ];
            @endphp
            @foreach($statCards as $i => $s)
            <div style="background:rgba(30,41,59,0.65);backdrop-filter:blur(20px);border:1px solid rgba(148,163,184,0.1);border-radius:16px;padding:24px;text-align:center;transition:all 0.3s;{{ $i%2==1 ? 'margin-top:24px;' : '' }}" onmouseover="this.style.transform='translateY(-5px)';this.style.borderColor='rgba(220,38,38,0.3)'" onmouseout="this.style.transform='none';this.style.borderColor='rgba(148,163,184,0.1)'">
                <div style="font-size:2rem;margin-bottom:8px;">{{ $s['icon'] }}</div>
                <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:2.2rem;font-weight:800;color:{{ $s['color'] }};line-height:1;">{{ $s['val'] }}</div>
                <div style="font-size:0.78rem;color:#64748b;margin-top:6px;">{{ $s['label'] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ════════════════════════════════════════ --}}
{{-- STRUKTUR PENGURUS BANNER                --}}
{{-- ════════════════════════════════════════ --}}
<div style="background:linear-gradient(90deg,rgba(220,38,38,0.08),rgba(29,78,216,0.08));border-top:1px solid rgba(220,38,38,0.15);border-bottom:1px solid rgba(220,38,38,0.15);padding:20px 0;">
    <div style="max-width:1200px;margin:0 auto;padding:0 2rem;display:flex;justify-content:center;gap:60px;flex-wrap:wrap;">
        @foreach([['🏠','Ketua RW','RW 001 Murni'],['👤','Ketua RT 001','Wilayah Blok A'],['👤','Ketua RT 002','Wilayah Blok B'],['📞','Sekretaris','Administrasi RT/RW']] as $p)
        <div style="text-align:center;">
            <div style="font-size:1.5rem;margin-bottom:4px;">{{ $p[0] }}</div>
            <div style="font-size:0.82rem;font-weight:700;color:#f1f5f9;">{{ $p[1] }}</div>
            <div style="font-size:0.72rem;color:#64748b;">{{ $p[2] }}</div>
        </div>
        @endforeach
    </div>
</div>

{{-- ════════════════════════════════════════ --}}
{{-- PENGUMUMAN SECTION                      --}}
{{-- ════════════════════════════════════════ --}}
<section style="padding:72px 2rem;" id="pengumuman">
<div style="max-width:1200px;margin:0 auto;">

    {{-- Section header merah --}}
    <div style="display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:40px;flex-wrap:wrap;gap:16px;">
        <div>
            <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(220,38,38,0.1);border:1px solid rgba(220,38,38,0.25);border-radius:999px;padding:4px 14px;font-size:0.72rem;font-weight:700;color:#fca5a5;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:12px;">📢 Informasi Terkini</div>
            <h2 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:2rem;font-weight:800;letter-spacing:-0.02em;margin-bottom:4px;">Pengumuman Resmi RT/RW</h2>
            <p style="color:#64748b;font-size:0.9rem;margin-bottom:0;">Informasi terbaru dari Pengurus RT/RW untuk seluruh warga Murni.</p>
        </div>
        <a href="{{ route('login') }}" style="font-size:0.85rem;color:#fca5a5;text-decoration:none;border-bottom:1px solid rgba(220,38,38,0.3);">Lihat semua setelah login →</a>
    </div>

    @if($pengumuman->count() > 0)
    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
        @foreach($pengumuman as $p)
        <div style="background:rgba(30,41,59,0.6);backdrop-filter:blur(12px);border:1px solid {{ $p->is_urgent ? 'rgba(220,38,38,0.35)' : 'rgba(148,163,184,0.1)' }};border-top:3px solid {{ $p->is_urgent ? '#dc2626' : '#1d4ed8' }};border-radius:16px;padding:24px;transition:all 0.3s;display:flex;flex-direction:column;{{ $p->is_urgent ? 'background:rgba(220,38,38,0.06);' : '' }}" onmouseover="this.style.transform='translateY(-4px)';this.style.boxShadow='0 20px 40px rgba(0,0,0,0.3)'" onmouseout="this.style.transform='none';this.style.boxShadow='none'">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px;">
                <span style="background:{{ $p->is_urgent ? 'rgba(220,38,38,0.2)' : 'rgba(29,78,216,0.15)' }};color:{{ $p->is_urgent ? '#fca5a5' : '#93c5fd' }};font-size:0.7rem;font-weight:700;padding:3px 10px;border-radius:999px;">{{ $p->is_urgent ? '🚨 URGENT' : '📋 Pengumuman' }}</span>
                <span style="font-size:0.72rem;color:#475569;">{{ $p->created_at->format('d M Y') }}</span>
            </div>
            <h3 style="font-size:0.95rem;font-weight:700;color:#f1f5f9;margin-bottom:10px;line-height:1.4;flex:1;">{{ $p->judul }}</h3>
            <p style="font-size:0.83rem;color:#64748b;line-height:1.65;margin-bottom:14px;">{{ Str::limit($p->konten, 130) }}</p>
            @if($p->tampil_sampai)
            <div style="font-size:0.72rem;color:#f59e0b;margin-bottom:10px;">⏳ Berlaku s/d {{ \Carbon\Carbon::parse($p->tampil_sampai)->format('d M Y') }}</div>
            @endif
            <div style="border-top:1px solid rgba(148,163,184,0.1);padding-top:12px;display:flex;align-items:center;gap:8px;font-size:0.72rem;color:#475569;">
                <div style="width:24px;height:24px;border-radius:50%;background:linear-gradient(135deg,#dc2626,#1d4ed8);display:flex;align-items:center;justify-content:center;font-weight:700;font-size:0.6rem;color:white;flex-shrink:0;">{{ strtoupper(substr($p->pembuat->nama_lengkap,0,2)) }}</div>
                <span>{{ $p->pembuat->nama_lengkap }}</span>
                <span style="margin-left:auto;">{{ str_replace('_',' ',$p->pembuat->role) }}</span>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div style="text-align:center;padding:60px;background:rgba(30,41,59,0.4);border:1px solid rgba(148,163,184,0.08);border-radius:16px;color:#475569;">
        <div style="font-size:3rem;margin-bottom:12px;">📭</div>
        <p>Belum ada pengumuman yang dipublikasikan.</p>
    </div>
    @endif
</div>
</section>

{{-- ════════════════════════════════════════ --}}
{{-- AGENDA KEGIATAN                         --}}
{{-- ════════════════════════════════════════ --}}
<section style="padding:72px 2rem;background:rgba(15,23,42,0.6);border-top:1px solid rgba(148,163,184,0.06);border-bottom:1px solid rgba(148,163,184,0.06);" id="agenda">
<div style="max-width:1200px;margin:0 auto;">
    <div style="text-align:center;margin-bottom:48px;">
        <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(29,78,216,0.1);border:1px solid rgba(29,78,216,0.25);border-radius:999px;padding:4px 14px;font-size:0.72rem;font-weight:700;color:#93c5fd;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:12px;">📅 Jadwal Kegiatan</div>
        <h2 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:2rem;font-weight:800;letter-spacing:-0.02em;margin-bottom:8px;">Agenda RT/RW Mendatang</h2>
        <p style="color:#64748b;max-width:520px;margin:0 auto;font-size:0.9rem;">Jadwal kegiatan dan acara lingkungan yang telah direncanakan pengurus. Catat dan ikuti bersama!</p>
    </div>

    @if($events->count() > 0)
    <div style="max-width:760px;margin:0 auto;display:flex;flex-direction:column;gap:16px;">
        @foreach($events as $e)
        <div style="display:flex;gap:20px;align-items:flex-start;background:rgba(30,41,59,0.65);backdrop-filter:blur(12px);border:1px solid rgba(148,163,184,0.1);border-left:4px solid #1d4ed8;border-radius:14px;padding:20px;transition:all 0.3s;" onmouseover="this.style.borderLeftColor='#dc2626';this.style.transform='translateX(4px)'" onmouseout="this.style.borderLeftColor='#1d4ed8';this.style.transform='none'">
            <div style="background:rgba(29,78,216,0.12);border:1px solid rgba(29,78,216,0.2);border-radius:12px;padding:12px 16px;text-align:center;min-width:60px;flex-shrink:0;">
                <div style="font-family:'Plus Jakarta Sans',sans-serif;font-size:1.7rem;font-weight:800;color:#3b82f6;line-height:1;">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                <div style="font-size:0.7rem;font-weight:700;color:#3b82f6;text-transform:uppercase;margin-top:2px;">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</div>
            </div>
            <div style="flex:1;">
                <h3 style="font-size:0.95rem;font-weight:700;color:#f1f5f9;margin-bottom:8px;">{{ $e->judul }}</h3>
                @if($e->deskripsi)<p style="font-size:0.82rem;color:#64748b;margin-bottom:8px;line-height:1.6;">{{ Str::limit($e->deskripsi, 100) }}</p>@endif
                <div style="display:flex;flex-direction:column;gap:4px;">
                    <div style="display:flex;align-items:center;gap:6px;font-size:0.78rem;color:#64748b;">
                        🕐 {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('l, d F Y · H:i') }} WIB
                    </div>
                    @if($e->lokasi)<div style="display:flex;align-items:center;gap:6px;font-size:0.78rem;color:#64748b;">📍 {{ $e->lokasi }}</div>@endif
                </div>
            </div>
            <div style="flex-shrink:0;background:rgba(29,78,216,0.1);color:#93c5fd;font-size:0.72rem;font-weight:600;padding:4px 12px;border-radius:999px;border:1px solid rgba(29,78,216,0.2);">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->diffForHumans() }}</div>
        </div>
        @endforeach
    </div>
    <div style="text-align:center;margin-top:28px;">
        <a href="{{ route('login') }}" style="font-size:0.85rem;color:#93c5fd;text-decoration:none;border-bottom:1px solid rgba(29,78,216,0.3);">Masuk untuk lihat semua agenda →</a>
    </div>
    @else
    <div style="text-align:center;padding:60px;background:rgba(30,41,59,0.4);border:1px solid rgba(148,163,184,0.08);border-radius:16px;color:#475569;max-width:600px;margin:0 auto;">
        <div style="font-size:3rem;margin-bottom:12px;">📭</div>
        <p>Belum ada agenda yang dijadwalkan.</p>
    </div>
    @endif
</div>
</section>

{{-- ════════════════════════════════════════ --}}
{{-- LAYANAN WARGA                           --}}
{{-- ════════════════════════════════════════ --}}
<section style="padding:72px 2rem;" id="layanan">
<div style="max-width:1200px;margin:0 auto;">
    <div style="text-align:center;margin-bottom:48px;">
        <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(22,163,74,0.1);border:1px solid rgba(22,163,74,0.25);border-radius:999px;padding:4px 14px;font-size:0.72rem;font-weight:700;color:#86efac;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:12px;">🛠 Layanan Digital</div>
        <h2 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:2rem;font-weight:800;letter-spacing:-0.02em;margin-bottom:8px;">Semua Layanan RT/RW Online</h2>
        <p style="color:#64748b;max-width:520px;margin:0 auto;font-size:0.9rem;">Layanan tata kelola RT/RW kini bisa diakses kapan saja dan di mana saja melalui portal resmi ini.</p>
    </div>

    <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
        @php
        $svcs = [
            ['📄','Surat Keterangan Online','Ajukan surat domisili, KTP, dan SKTM secara digital. Tidak perlu antri, pantau status real-time.','#3b82f6','rgba(59,130,246,0.1)'],
            ['🚩','Laporan Pengaduan','Laporkan masalah keamanan, fasilitas rusak, kebersihan, atau perselisihan warga secara terbuka.','#dc2626','rgba(220,38,38,0.1)'],
            ['💰','Transparansi Keuangan Kas','Lihat laporan keuangan RT/RW secara terbuka. Setiap rupiah pemasukan & pengeluaran tercatat.','#10b981','rgba(16,185,129,0.1)'],
            ['📦','Peminjaman Aset RT/RW','Pinjam sound system, tenda, kursi lipat, genset, dan peralatan RT/RW dengan mudah secara online.','#f59e0b','rgba(245,158,11,0.1)'],
            ['📅','Agenda & Jadwal Kegiatan','Pantau jadwal kerja bakti, posyandu, rapat pleno, ronda, dan acara lingkungan lainnya.','#8b5cf6','rgba(139,92,246,0.1)'],
            ['👥','Data Kependudukan Digital','Data warga tercatat akurat dan selalu diperbarui. Pengurus dapat mengelola data dengan mudah.','#06b6d4','rgba(6,182,212,0.1)'],
        ];
        @endphp
        @foreach($svcs as $i => $s)
        <div style="background:rgba(15,23,42,0.7);border:1px solid rgba(148,163,184,0.08);border-radius:16px;padding:28px;transition:all 0.3s;border-bottom:3px solid {{ $s[3] }};" onmouseover="this.style.transform='translateY(-6px)';this.style.borderColor='{{ $s[3] }}';this.style.boxShadow='0 20px 40px rgba(0,0,0,0.3)'" onmouseout="this.style.transform='none';this.style.borderColor='rgba(148,163,184,0.08)';this.style.boxShadow='none'">
            <div style="width:52px;height:52px;background:{{ $s[4] }};border-radius:14px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:18px;">{{ $s[0] }}</div>
            <h3 style="font-size:0.95rem;font-weight:700;color:#f1f5f9;margin-bottom:10px;">{{ $s[1] }}</h3>
            <p style="font-size:0.82rem;color:#64748b;line-height:1.7;margin-bottom:0;">{{ $s[2] }}</p>
        </div>
        @endforeach
    </div>
</div>
</section>

{{-- ════════════════════════════════════════ --}}
{{-- CTA DAFTAR                              --}}
{{-- ════════════════════════════════════════ --}}
<section style="padding:72px 2rem;background:rgba(15,23,42,0.5);border-top:1px solid rgba(148,163,184,0.06);">
<div style="max-width:800px;margin:0 auto;text-align:center;background:linear-gradient(135deg,rgba(220,38,38,0.1),rgba(29,78,216,0.08));border:1px solid rgba(220,38,38,0.2);border-radius:24px;padding:60px 40px;position:relative;overflow:hidden;">
    <div style="position:absolute;top:-60px;right:-60px;width:200px;height:200px;background:radial-gradient(circle,rgba(220,38,38,0.15),transparent);border-radius:50%;"></div>
    <div style="position:absolute;bottom:-60px;left:-60px;width:200px;height:200px;background:radial-gradient(circle,rgba(29,78,216,0.1),transparent);border-radius:50%;"></div>
    <div style="position:relative;z-index:1;">
        <div style="font-size:3rem;margin-bottom:16px;">🏠</div>
        <h2 style="font-family:'Plus Jakarta Sans',sans-serif;font-size:2rem;font-weight:800;letter-spacing:-0.02em;margin-bottom:12px;">Daftarkan Diri Anda Sekarang</h2>
        <p style="color:#64748b;font-size:1rem;margin-bottom:32px;max-width:480px;margin-left:auto;margin-right:auto;">Bergabunglah dengan warga Murni yang sudah terdaftar dan nikmati kemudahan layanan RT/RW digital.</p>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;margin-bottom:24px;">
            @auth
                <a href="{{ route('dashboard') }}" style="display:inline-flex;align-items:center;gap:8px;background:linear-gradient(135deg,#dc2626,#b91c1c);color:white;padding:14px 28px;border-radius:10px;font-weight:700;font-size:0.95rem;text-decoration:none;box-shadow:0 6px 20px rgba(220,38,38,0.3);">🏠 Buka Dashboard Saya</a>
            @else
                <a href="{{ route('register') }}" style="display:inline-flex;align-items:center;gap:8px;background:linear-gradient(135deg,#dc2626,#b91c1c);color:white;padding:14px 28px;border-radius:10px;font-weight:700;font-size:0.95rem;text-decoration:none;box-shadow:0 6px 20px rgba(220,38,38,0.3);">📋 Daftar Gratis Sekarang</a>
                <a href="{{ route('login') }}" style="display:inline-flex;align-items:center;gap:8px;background:transparent;border:1px solid rgba(148,163,184,0.3);color:#94a3b8;padding:14px 28px;border-radius:10px;font-weight:600;font-size:0.95rem;text-decoration:none;">Sudah Punya Akun</a>
            @endauth
        </div>
        <div style="display:flex;gap:24px;justify-content:center;font-size:0.78rem;color:#475569;flex-wrap:wrap;">
            <span>✅ Gratis & Resmi</span><span>🔒 Data Aman</span><span>⚡ Proses Cepat</span><span>📱 Akses dari HP</span>
        </div>
    </div>
</div>
</section>

{{-- ════════════════════════════════════════ --}}
{{-- KONTAK / INFO RT-RW                    --}}
{{-- ════════════════════════════════════════ --}}
<section style="padding:56px 2rem;" id="kontak">
<div style="max-width:1200px;margin:0 auto;">
    <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:24px;">
        <div style="background:rgba(30,41,59,0.6);border:1px solid rgba(148,163,184,0.1);border-radius:16px;padding:28px;">
            <h4 style="font-size:0.9rem;font-weight:700;color:#f1f5f9;margin-bottom:16px;display:flex;align-items:center;gap:8px;">📍 Alamat Sekretariat</h4>
            <p style="font-size:0.85rem;color:#64748b;line-height:1.7;margin-bottom:0;">Jl. Raya Murni No. XX, RT 001/RW 001<br>Kelurahan Murni, Kecamatan Cilincing<br>Jakarta Utara, DKI Jakarta 14120</p>
        </div>
        <div style="background:rgba(30,41,59,0.6);border:1px solid rgba(148,163,184,0.1);border-radius:16px;padding:28px;">
            <h4 style="font-size:0.9rem;font-weight:700;color:#f1f5f9;margin-bottom:16px;">📞 Kontak Pengurus</h4>
            <div style="display:flex;flex-direction:column;gap:8px;">
                @foreach(['Ketua RW'=>'0812-xxxx-xxxx','Ketua RT 001'=>'0813-xxxx-xxxx','Sekretaris'=>'0814-xxxx-xxxx'] as $pos => $tel)
                <div style="display:flex;justify-content:space-between;font-size:0.82rem;">
                    <span style="color:#64748b;">{{ $pos }}</span>
                    <span style="color:#93c5fd;">{{ $tel }}</span>
                </div>
                @endforeach
            </div>
        </div>
        <div style="background:rgba(30,41,59,0.6);border:1px solid rgba(148,163,184,0.1);border-radius:16px;padding:28px;">
            <h4 style="font-size:0.9rem;font-weight:700;color:#f1f5f9;margin-bottom:16px;">🕐 Jam Pelayanan</h4>
            <div style="display:flex;flex-direction:column;gap:8px;">
                @foreach(['Senin – Jumat'=>'08.00 – 16.00 WIB','Sabtu'=>'08.00 – 12.00 WIB','Minggu & Libur'=>'Tutup'] as $hari => $jam)
                <div style="display:flex;justify-content:space-between;font-size:0.82rem;">
                    <span style="color:#64748b;">{{ $hari }}</span>
                    <span style="color:{{ $jam === 'Tutup' ? '#f43f5e' : '#86efac' }};">{{ $jam }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</section>

{{-- ════════════════════════════════════════ --}}
{{-- FOOTER                                  --}}
{{-- ════════════════════════════════════════ --}}
<footer style="background:#050a14;border-top:1px solid rgba(148,163,184,0.08);padding:40px 2rem 20px;">
<div style="max-width:1200px;margin:0 auto;">
    <div style="display:grid;grid-template-columns:2fr 1fr 1fr;gap:48px;padding-bottom:32px;border-bottom:1px solid rgba(148,163,184,0.07);margin-bottom:24px;">
        <div>
            <div style="display:flex;align-items:center;gap:12px;margin-bottom:14px;">
                <div style="width:40px;height:40px;background:linear-gradient(135deg,#dc2626,#b91c1c);border-radius:50%;display:flex;align-items:center;justify-content:center;font-weight:800;color:white;font-size:0.85rem;">RT</div>
                <div>
                    <div style="font-weight:800;color:white;font-size:1rem;">SIRTRW Murni</div>
                    <div style="font-size:0.7rem;color:#475569;">Portal Digital RT/RW</div>
                </div>
            </div>
            <p style="font-size:0.82rem;color:#475569;line-height:1.7;max-width:280px;margin-bottom:12px;">Portal digital resmi Rukun Tetangga dan Rukun Warga Murni. Melayani warga dengan transparan dan profesional.</p>
            <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(22,163,74,0.1);border:1px solid rgba(22,163,74,0.2);border-radius:999px;padding:4px 12px;font-size:0.72rem;color:#86efac;">● Sistem Online</div>
        </div>
        <div>
            <h5 style="font-size:0.8rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:16px;">Layanan</h5>
            <ul style="list-style:none;display:flex;flex-direction:column;gap:10px;">
                @foreach(['Pengajuan Surat','Laporan Aduan','Info Keuangan','Peminjaman Aset','Agenda Kegiatan'] as $l)
                <li><a href="{{ route('login') }}" style="font-size:0.83rem;color:#475569;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#fca5a5'" onmouseout="this.style.color='#475569'">{{ $l }}</a></li>
                @endforeach
            </ul>
        </div>
        <div>
            <h5 style="font-size:0.8rem;font-weight:700;color:#94a3b8;text-transform:uppercase;letter-spacing:0.1em;margin-bottom:16px;">Akun Warga</h5>
            <ul style="list-style:none;display:flex;flex-direction:column;gap:10px;">
                @foreach(['Masuk Portal' => route('login'), 'Daftar Warga Baru' => route('register'), 'Cek Status Surat' => route('login'), 'Lihat Pengumuman' => '#pengumuman'] as $lbl => $href)
                <li><a href="{{ $href }}" style="font-size:0.83rem;color:#475569;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='#93c5fd'" onmouseout="this.style.color='#475569'">{{ $lbl }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div style="display:flex;justify-content:space-between;align-items:center;font-size:0.75rem;color:#334155;flex-wrap:wrap;gap:8px;">
        <span>&copy; {{ date('Y') }} SIRTRW Murni · Portal Digital RT/RW Resmi. Semua hak cipta dilindungi.</span>
        <span>🇮🇩 Dibuat untuk warga Indonesia</span>
    </div>
</div>
</footer>

<style>
@keyframes marquee { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }
@keyframes blobFloat { 0%,100%{transform:translate(0,0)} 33%{transform:translate(20px,-20px)} 66%{transform:translate(-15px,15px)} }
@keyframes pulse { 0%,100%{opacity:1} 50%{opacity:0.5} }
@keyframes fadeSlideDown { from{opacity:0;transform:translateY(-10px)} to{opacity:1;transform:translateY(0)} }
@keyframes fadeSlideUp { from{opacity:0;transform:translateY(20px)} to{opacity:1;transform:translateY(0)} }
.desktop-nav { display:flex; }
@media(max-width:768px){
    .desktop-nav{display:none!important}
    section>div[style*="grid-template-columns:1fr 1fr"] { grid-template-columns:1fr!important; }
    section>div[style*="grid-template-columns:repeat(3"] { grid-template-columns:1fr!important; }
    section>div[style*="grid-template-columns:2fr"] { grid-template-columns:1fr!important; }
    h1[style*="3.2rem"]{font-size:2rem!important}
}
</style>

<script>
// Sticky nav shadow on scroll
const nav = document.getElementById('main-navbar');
window.addEventListener('scroll', () => {
    nav.style.boxShadow = window.scrollY > 50 ? '0 4px 30px rgba(0,0,0,0.5)' : 'none';
});
// Smooth scroll
document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
        const t = document.querySelector(a.getAttribute('href'));
        if (t) { e.preventDefault(); t.scrollIntoView({ behavior: 'smooth' }); }
    });
});
</script>

</body>
</html>
