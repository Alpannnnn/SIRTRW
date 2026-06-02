<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Masuk') — SIRTRW</title>
    <meta name="description" content="Portal Digital RT/RW Jalan Nikel — Sistem Informasi Terpadu untuk Tata Kelola Lingkungan">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: #0f172a;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ── TOP NAV ── */
        .auth-topnav {
            background: #1e293b;
            border-bottom: 3px solid #3b82f6;
            padding: 0 24px;
            height: 56px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-shrink: 0;
        }
        .auth-topnav-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
        }
        .auth-topnav-logo {
            width: 36px;
            height: 36px;
            background: #3b82f6;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-topnav-logo svg { width: 20px; height: 20px; fill: white; }
        .auth-topnav-name {
            font-size: 0.95rem;
            font-weight: 800;
            color: #f1f5f9;
            letter-spacing: 0.02em;
        }
        .auth-topnav-sub {
            font-size: 0.65rem;
            color: #8a9ab0;
            margin-top: 1px;
        }
        .auth-topnav-back {
            display: flex;
            align-items: center;
            gap: 5px;
            font-size: 0.82rem;
            color: #94a3b8;
            text-decoration: none;
            padding: 6px 12px;
            border: 1.5px solid rgba(148, 163, 184, 0.15);
            border-radius: 7px;
            transition: all 0.18s;
        }
        .auth-topnav-back:hover { border-color: #3b82f6; color: #3b82f6; }
        .auth-topnav-back svg { width: 14px; height: 14px; }

        /* ── MAIN WRAPPER ── */
        .auth-wrapper {
            flex: 1;
            display: grid;
            grid-template-columns: 1fr 1fr;
            min-height: calc(100vh - 56px);
        }

        /* ── LEFT PANEL (info) ── */
        .auth-panel-left {
            background: #1e293b;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 56px 48px;
            position: relative;
            overflow: hidden;
            border-right: 1px solid rgba(148, 163, 184, 0.1);
        }
        .auth-panel-left::before {
            content: '';
            position: absolute;
            top: -80px;
            right: -80px;
            width: 280px;
            height: 280px;
            background: rgba(255,255,255,0.06);
            border-radius: 50%;
        }
        .auth-panel-left::after {
            content: '';
            position: absolute;
            bottom: -60px;
            left: -60px;
            width: 220px;
            height: 220px;
            background: rgba(255,255,255,0.04);
            border-radius: 50%;
        }
        .auth-left-content { position: relative; z-index: 1; }
        .auth-left-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(255,255,255,0.15);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 6px;
            padding: 5px 12px;
            font-size: 0.72rem;
            font-weight: 700;
            color: rgba(255,255,255,0.9);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 28px;
        }
        .auth-left-badge svg { width: 12px; height: 12px; }
        .auth-left-title {
            font-size: 2rem;
            font-weight: 800;
            color: white;
            line-height: 1.25;
            margin-bottom: 16px;
            letter-spacing: -0.02em;
        }
        .auth-left-desc {
            font-size: 0.92rem;
            color: rgba(255,255,255,0.75);
            line-height: 1.75;
            margin-bottom: 36px;
            max-width: 340px;
        }
        .auth-left-features {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .auth-left-feature {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.875rem;
            color: rgba(255,255,255,0.85);
        }
        .auth-left-feature-icon {
            width: 36px;
            height: 36px;
            background: rgba(59, 130, 246, 0.15);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .auth-left-feature-icon svg { width: 18px; height: 18px; }

        /* ── RIGHT PANEL (form) ── */
        .auth-panel-right {
            background: #0f172a;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 48px 40px;
            overflow-y: auto;
        }
        .auth-form-wrap {
            width: 100%;
            max-width: 400px;
        }
        .auth-form-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #f1f5f9;
            margin-bottom: 6px;
            letter-spacing: -0.01em;
        }
        .auth-form-sub {
            font-size: 0.85rem;
            color: #94a3b8;
            margin-bottom: 28px;
        }

        /* ── FORM FIELDS (standalone, no x-component dependency) ── */
        .af-group {
            margin-bottom: 18px;
        }
        .af-label {
            display: block;
            font-size: 0.83rem;
            font-weight: 600;
            color: #cbd5e1;
            margin-bottom: 6px;
        }
        .af-label span.required {
            color: #f43f5e;
            margin-left: 2px;
        }
        .af-input {
            width: 100%;
            background: #1e293b;
            border: 1.5px solid rgba(148, 163, 184, 0.15);
            border-radius: 9px;
            padding: 11px 14px;
            font-size: 0.9rem;
            color: #f1f5f9;
            font-family: 'Inter', sans-serif;
            transition: all 0.18s;
            outline: none;
        }
        .af-input:focus {
            border-color: #3b82f6;
            background: #1e293b;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
        .af-input::placeholder { color: #64748b; }
        .af-input.is-error { border-color: #f43f5e; background: rgba(244, 63, 94, 0.05); }
        .af-error {
            font-size: 0.75rem;
            color: #f43f5e;
            margin-top: 4px;
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .af-error svg { width: 13px; height: 13px; flex-shrink: 0; }
        .af-hint {
            font-size: 0.73rem;
            color: #8a9ab0;
            margin-top: 4px;
        }
        .af-select {
            width: 100%;
            background: #1e293b;
            border: 1.5px solid rgba(148, 163, 184, 0.15);
            border-radius: 9px;
            padding: 11px 14px;
            font-size: 0.9rem;
            color: #f1f5f9;
            font-family: 'Inter', sans-serif;
            transition: all 0.18s;
            outline: none;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='%238a9ab0'%3E%3Cpath stroke-linecap='round' stroke-linejoin='round' d='m19.5 8.25-7.5 7.5-7.5-7.5'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            background-size: 16px;
        }
        .af-select:focus {
            border-color: #3b82f6;
            background-color: #1e293b;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
        .af-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        /* ── INFO ALERT ── */
        .af-info-box {
            display: flex;
            gap: 10px;
            background: rgba(59, 130, 246, 0.15);
            border: 1.5px solid rgba(59, 130, 246, 0.3);
            border-radius: 9px;
            padding: 12px 14px;
            font-size: 0.82rem;
            color: #60a5fa;
            margin-bottom: 22px;
            line-height: 1.5;
        }
        .af-info-box svg { width: 18px; height: 18px; flex-shrink: 0; margin-top: 1px; }

        /* ── CHECK ROW (ingat saya) ── */
        .af-check-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }
        .af-check {
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        .af-check input[type="checkbox"] {
            width: 17px;
            height: 17px;
            border: 1.5px solid rgba(148, 163, 184, 0.3);
            border-radius: 4px;
            accent-color: #3b82f6;
            cursor: pointer;
        }
        .af-check label {
            font-size: 0.83rem;
            color: #94a3b8;
            cursor: pointer;
        }
        .af-forgot {
            font-size: 0.82rem;
            color: #3b82f6;
            font-weight: 600;
            text-decoration: none;
        }
        .af-forgot:hover { text-decoration: underline; }

        /* ── SUBMIT BUTTON ── */
        .af-submit {
            width: 100%;
            background: #3b82f6;
            color: white;
            border: none;
            border-radius: 9px;
            padding: 13px;
            font-size: 0.95rem;
            font-weight: 700;
            font-family: 'Inter', sans-serif;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: all 0.18s;
        }
        .af-submit:hover { background: #2563eb; transform: translateY(-1px); }
        .af-submit svg { width: 18px; height: 18px; }

        /* ── FOOTER LINK ── */
        .af-footer-link {
            text-align: center;
            font-size: 0.85rem;
            color: #94a3b8;
            margin-top: 20px;
        }
        .af-footer-link a {
            color: #3b82f6;
            font-weight: 700;
            text-decoration: none;
        }
        .af-footer-link a:hover { text-decoration: underline; }

        /* ── DIVIDER ── */
        .af-divider {
            height: 1px;
            background: rgba(148, 163, 184, 0.15);
            margin: 20px 0;
        }

        /* ── COPYRIGHT ── */
        .auth-copyright {
            text-align: center;
            font-size: 0.72rem;
            color: #64748b;
            padding: 14px 0;
            border-top: 1px solid rgba(148, 163, 184, 0.15);
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 820px) {
            .auth-wrapper { grid-template-columns: 1fr; }
            .auth-panel-left { display: none; }
            .auth-panel-right { padding: 32px 24px; min-height: calc(100vh - 56px); justify-content: flex-start; padding-top: 40px; }
        }
    </style>
</head>
<body>

{{-- TOP NAV --}}
<header class="auth-topnav">
    <a href="{{ route('home') }}" class="auth-topnav-brand">
        <div class="auth-topnav-logo">
            <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
        </div>
        <div>
            <div class="auth-topnav-name">SIRTRW JALAN NIKEL</div>
            <div class="auth-topnav-sub">Portal Digital RT/RW Resmi</div>
        </div>
    </a>
    <a href="{{ route('home') }}" class="auth-topnav-back">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18"/></svg>
        Kembali ke Portal
    </a>
</header>

{{-- MAIN --}}
<div class="auth-wrapper">

    {{-- LEFT PANEL --}}
    <div class="auth-panel-left">
        <div class="auth-left-content">
            <div class="auth-left-badge">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/></svg>
                Portal Resmi Online 24 Jam
            </div>

            <h2 class="auth-left-title">
                Layanan Warga<br>RT/RW Jalan Nikel<br>Kini Serba Digital
            </h2>

            <p class="auth-left-desc">
                Urus keperluan administrasi RT/RW kapan saja, dari mana saja. Tidak perlu antri, tidak perlu datang ke sekretariat.
            </p>

            <div class="auth-left-features">
                <div class="auth-left-feature">
                    <div class="auth-left-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="white"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                    </div>
                    Ajukan surat keterangan online
                </div>
                <div class="auth-left-feature">
                    <div class="auth-left-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="white"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5"/></svg>
                    </div>
                    Laporkan pengaduan dengan mudah
                </div>
                <div class="auth-left-feature">
                    <div class="auth-left-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="white"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3"/></svg>
                    </div>
                    Lihat transparansi keuangan kas
                </div>
                <div class="auth-left-feature">
                    <div class="auth-left-feature-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="white"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/></svg>
                    </div>
                    Pantau pengumuman & agenda RT/RW
                </div>
            </div>
        </div>
    </div>

    {{-- RIGHT PANEL --}}
    <div class="auth-panel-right">
        <div class="auth-form-wrap">
            @yield('content')
            <div class="auth-copyright">
                &copy; {{ date('Y') }} SIRTRW Jalan Nikel &nbsp;·&nbsp; Portal Digital RT/RW Resmi
            </div>
        </div>
    </div>
</div>

</body>
</html>
