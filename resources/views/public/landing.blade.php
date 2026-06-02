<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Digital RT/RW Jalan Nikel — SIRTRW</title>
    <meta name="description" content="Portal Digital Resmi RT/RW Jalan Nikel, Kelurahan Bugel, Kota Tangerang. Layanan pengumuman, surat, aduan, kas, dan agenda warga secara online.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        :root {
            --red:       #3b82f6;
            --red-light: #2563eb;
            --red-bg:    rgba(59, 130, 246, 0.1);
            --text:      #f1f5f9;
            --text-sub:  #94a3b8;
            --text-muted:#64748b;
            --border:    rgba(148, 163, 184, 0.15);
            --bg:        #0f172a;
            --white:     #1e293b;
            --blue:      #06b6d4;
            --green:     #10b981;
            --accent-urgent:        #f43f5e;
            --accent-urgent-bg:     rgba(244, 63, 94, 0.15);
            --accent-urgent-border: rgba(244, 63, 94, 0.3);
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
        }

        a { text-decoration: none; }

        /* ── TOP INFO BAR ── */
        .top-bar {
            background: var(--red);
            color: white;
            font-size: 0.78rem;
            padding: 7px 0;
        }
        .top-bar-inner {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
        }
        .top-bar-left {
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .top-bar-left svg { width: 14px; height: 14px; flex-shrink: 0; }
        .top-bar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .top-bar-right span {
            display: flex;
            align-items: center;
            gap: 5px;
            opacity: 0.9;
        }
        .top-bar-right svg { width: 13px; height: 13px; }

        /* ── NAVBAR ── */
        .navbar {
            background: var(--white);
            border-bottom: 3px solid var(--red);
            position: sticky;
            top: 0;
            z-index: 200;
            box-shadow: 0 1px 8px rgba(0,0,0,0.07);
        }
        .navbar-inner {
            max-width: 1160px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .brand-logo {
            width: 44px;
            height: 44px;
            background: var(--red);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .brand-logo svg { width: 24px; height: 24px; fill: white; }
        .brand-text-title {
            font-size: 1.05rem;
            font-weight: 800;
            color: var(--text);
            letter-spacing: 0.02em;
        }
        .brand-text-sub {
            font-size: 0.67rem;
            color: var(--text-sub);
            margin-top: 1px;
        }
        .navbar-nav {
            display: flex;
            list-style: none;
            gap: 2px;
            align-items: center;
        }
        .navbar-nav a {
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 8px;
            color: var(--text-sub);
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.18s;
        }
        .navbar-nav a svg { width: 15px; height: 15px; }
        .navbar-nav a:hover { background: var(--red-bg); color: var(--red); }
        .navbar-actions {
            display: flex;
            gap: 8px;
            align-items: center;
        }
        .btn-masuk {
            padding: 8px 16px;
            border: 1.5px solid var(--border);
            border-radius: 8px;
            color: var(--text-sub);
            font-size: 0.85rem;
            font-weight: 600;
            transition: all 0.18s;
        }
        .btn-masuk:hover { border-color: var(--red); color: var(--red); }
        .btn-daftar {
            display: flex;
            align-items: center;
            gap: 6px;
            background: var(--red);
            color: white;
            padding: 8px 18px;
            border-radius: 8px;
            font-size: 0.85rem;
            font-weight: 700;
            transition: all 0.18s;
        }
        .btn-daftar:hover { background: var(--red-light); }
        .btn-daftar svg { width: 15px; height: 15px; }

        /* ── TICKER ── */
        .ticker-bar {
            background: var(--accent-urgent-bg);
            border-bottom: 1px solid var(--accent-urgent-border);
            overflow: hidden;
        }
        .ticker-inner {
            display: flex;
            align-items: center;
            padding: 9px 24px;
            gap: 16px;
        }
        .ticker-label {
            background: var(--accent-urgent);
            color: white;
            font-size: 0.7rem;
            font-weight: 700;
            padding: 3px 12px;
            border-radius: 4px;
            white-space: nowrap;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .ticker-label svg { width: 12px; height: 12px; }
        .ticker-scroll {
            overflow: hidden;
            flex: 1;
        }
        .ticker-content {
            display: flex;
            gap: 0;
            animation: marquee 28s linear infinite;
            white-space: nowrap;
        }
        .ticker-content span {
            padding: 0 36px;
            font-size: 0.83rem;
            color: var(--accent-urgent);
            font-weight: 600;
            border-right: 1px solid var(--accent-urgent-border);
        }

        /* ── HERO ── */
        .hero {
            background: var(--white);
            border-bottom: 1px solid var(--border);
            padding: 72px 24px 60px;
        }
        .hero-inner {
            max-width: 1160px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: center;
        }
        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            background: var(--red-bg);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 6px;
            padding: 5px 14px;
            font-size: 0.75rem;
            font-weight: 700;
            color: var(--red);
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }
        .hero-badge svg { width: 13px; height: 13px; }
        .hero-title {
            font-size: 2.6rem;
            font-weight: 800;
            line-height: 1.2;
            letter-spacing: -0.02em;
            margin-bottom: 18px;
            color: var(--text);
        }
        .hero-title span {
            color: var(--red);
        }
        .hero-desc {
            font-size: 1rem;
            color: var(--text-sub);
            line-height: 1.75;
            margin-bottom: 30px;
            max-width: 460px;
        }
        .hero-desc strong { color: var(--text); }
        .hero-cta {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 28px;
        }
        .btn-hero-primary {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--red);
            color: white;
            padding: 13px 26px;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 700;
            transition: all 0.18s;
        }
        .btn-hero-primary:hover { background: var(--red-light); transform: translateY(-1px); }
        .btn-hero-primary svg { width: 18px; height: 18px; }
        .btn-hero-outline {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: transparent;
            border: 1.5px solid var(--border);
            color: var(--text-sub);
            padding: 13px 26px;
            border-radius: 8px;
            font-size: 0.95rem;
            font-weight: 600;
            transition: all 0.18s;
        }
        .btn-hero-outline:hover { border-color: var(--red); color: var(--red); }
        .hero-trust {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }
        .trust-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 0.8rem;
            color: var(--text-muted);
        }
        .trust-item svg { width: 15px; height: 15px; color: var(--green); }

        /* ── STAT CARDS (hero right) ── */
        .hero-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        .hero-stat-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            text-align: center;
            transition: all 0.22s;
        }
        .hero-stat-card:nth-child(even) { margin-top: 20px; }
        .hero-stat-card:hover { border-color: var(--red); transform: translateY(-3px); box-shadow: 0 8px 24px rgba(0,0,0,0.08); }
        .hero-stat-icon {
            width: 46px;
            height: 46px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
        }
        .hero-stat-icon svg { width: 24px; height: 24px; }
        .hero-stat-val {
            font-size: 2rem;
            font-weight: 800;
            line-height: 1;
            margin-bottom: 4px;
        }
        .hero-stat-label {
            font-size: 0.78rem;
            color: var(--text-muted);
        }

        /* ── STRUKTUR PENGURUS ── */
        .pengurus-bar {
            background: var(--white);
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            padding: 20px 24px;
        }
        .pengurus-bar-inner {
            max-width: 1160px;
            margin: 0 auto;
            display: flex;
            justify-content: center;
            gap: 56px;
            flex-wrap: wrap;
        }
        .pengurus-item {
            text-align: center;
        }
        .pengurus-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 6px;
        }
        .pengurus-icon svg { width: 20px; height: 20px; }
        .pengurus-name { font-size: 0.83rem; font-weight: 700; color: var(--text); }
        .pengurus-sub  { font-size: 0.72rem; color: var(--text-muted); margin-top: 2px; }

        /* ── SECTION COMMONS ── */
        .section { padding: 64px 24px; }
        .section-alt { background: var(--white); }
        .container { max-width: 1160px; margin: 0 auto; }
        .section-label {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border: 1.5px solid var(--border);
            border-radius: 6px;
            padding: 4px 12px;
            font-size: 0.72rem;
            font-weight: 700;
            color: var(--text-sub);
            text-transform: uppercase;
            letter-spacing: 0.06em;
            margin-bottom: 12px;
        }
        .section-label svg { width: 13px; height: 13px; }
        .section-header-flex {
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            margin-bottom: 36px;
            flex-wrap: wrap;
            gap: 16px;
        }
        .section-title {
            font-size: 1.7rem;
            font-weight: 800;
            letter-spacing: -0.02em;
            color: var(--text);
            margin-bottom: 6px;
        }
        .section-desc {
            font-size: 0.9rem;
            color: var(--text-sub);
        }
        .section-header-center {
            text-align: center;
            margin-bottom: 40px;
        }
        .see-all-link {
            font-size: 0.84rem;
            font-weight: 600;
            color: var(--red);
            display: flex;
            align-items: center;
            gap: 4px;
            white-space: nowrap;
        }
        .see-all-link svg { width: 15px; height: 15px; }

        /* ── PENGUMUMAN CARDS ── */
        .peng-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .peng-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            transition: all 0.22s;
        }
        .peng-card.urgent {
            border-color: var(--accent-urgent-border);
            border-top: 3px solid var(--accent-urgent);
        }
        .peng-card:not(.urgent) {
            border-top: 3px solid var(--red);
        }
        .peng-card:hover { box-shadow: 0 8px 28px rgba(0,0,0,0.09); transform: translateY(-3px); }
        .peng-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 12px;
        }
        .peng-badge-urgent {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: var(--red-bg);
            color: var(--red);
            font-size: 0.68rem;
            font-weight: 800;
            padding: 3px 10px;
            border-radius: 4px;
            text-transform: uppercase;
        }
        .peng-badge-urgent svg { width: 11px; height: 11px; }
        .peng-badge-normal {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            background: #eff6ff;
            color: var(--blue);
            font-size: 0.68rem;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 4px;
        }
        .peng-badge-normal svg { width: 11px; height: 11px; }
        .peng-date { font-size: 0.72rem; color: var(--text-muted); }
        .peng-title { font-size: 0.97rem; font-weight: 700; color: var(--text); margin-bottom: 8px; line-height: 1.45; flex: 1; }
        .peng-body { font-size: 0.83rem; color: var(--text-sub); line-height: 1.65; margin-bottom: 14px; }
        .peng-expire { font-size: 0.72rem; color: #ca8a04; margin-bottom: 10px; display: flex; align-items: center; gap: 5px; }
        .peng-expire svg { width: 13px; height: 13px; }
        .peng-footer {
            border-top: 1px solid var(--border);
            padding-top: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 0.72rem;
            color: var(--text-muted);
        }
        .peng-avatar {
            width: 24px; height: 24px;
            border-radius: 50%;
            background: var(--red);
            color: white;
            font-size: 0.6rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .peng-empty {
            text-align: center;
            padding: 56px;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            color: var(--text-muted);
        }
        .peng-empty svg { width: 44px; height: 44px; margin: 0 auto 12px; display: block; opacity: 0.35; }

        /* ── AGENDA LIST ── */
        .agenda-list {
            max-width: 720px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }
        .agenda-card {
            display: flex;
            gap: 18px;
            align-items: flex-start;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-left: 4px solid var(--blue);
            border-radius: 12px;
            padding: 18px 20px;
            transition: all 0.22s;
        }
        .agenda-card:hover { border-left-color: var(--red); box-shadow: 0 6px 20px rgba(0,0,0,0.07); transform: translateX(3px); }
        .agenda-date {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 10px;
            padding: 8px 14px;
            text-align: center;
            min-width: 58px;
            flex-shrink: 0;
        }
        .agenda-day { font-size: 1.5rem; font-weight: 800; color: var(--blue); line-height: 1; display: block; }
        .agenda-month { font-size: 0.65rem; font-weight: 700; color: var(--blue); text-transform: uppercase; margin-top: 2px; display: block; }
        .agenda-body { flex: 1; }
        .agenda-title { font-size: 0.95rem; font-weight: 700; color: var(--text); margin-bottom: 7px; }
        .agenda-desc { font-size: 0.82rem; color: var(--text-sub); margin-bottom: 8px; line-height: 1.6; }
        .agenda-meta { display: flex; flex-wrap: wrap; gap: 12px; }
        .agenda-meta-item { display: flex; align-items: center; gap: 5px; font-size: 0.78rem; color: var(--text-muted); }
        .agenda-meta-item svg { width: 14px; height: 14px; }
        .agenda-badge {
            flex-shrink: 0;
            background: #eff6ff;
            color: var(--blue);
            font-size: 0.72rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 6px;
            border: 1px solid #bfdbfe;
        }

        /* ── LAYANAN GRID ── */
        .layanan-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .layanan-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 28px 24px;
            transition: all 0.22s;
        }
        .layanan-card:hover { border-color: var(--red); box-shadow: 0 8px 24px rgba(0,0,0,0.08); transform: translateY(-4px); }
        .layanan-icon {
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 18px;
        }
        .layanan-icon svg { width: 26px; height: 26px; }
        .layanan-title { font-size: 0.97rem; font-weight: 700; color: var(--text); margin-bottom: 8px; }
        .layanan-desc { font-size: 0.83rem; color: var(--text-sub); line-height: 1.7; }

        /* ── CTA SECTION ── */
        .cta-section {
            background: var(--white);
            border-top: 1px solid var(--border);
            padding: 64px 24px;
        }
        .cta-box {
            max-width: 760px;
            margin: 0 auto;
            text-align: center;
            background: var(--red-bg);
            border: 1.5px solid rgba(59, 130, 246, 0.3);
            border-radius: 20px;
            padding: 56px 40px;
        }
        .cta-icon {
            width: 64px;
            height: 64px;
            background: var(--red);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .cta-icon svg { width: 32px; height: 32px; fill: white; }
        .cta-title { font-size: 1.7rem; font-weight: 800; letter-spacing: -0.02em; color: var(--text); margin-bottom: 10px; }
        .cta-desc { font-size: 0.95rem; color: var(--text-sub); margin-bottom: 28px; max-width: 440px; margin-left: auto; margin-right: auto; }
        .cta-buttons { display: flex; gap: 12px; justify-content: center; flex-wrap: wrap; margin-bottom: 20px; }
        .cta-trust { display: flex; gap: 20px; justify-content: center; font-size: 0.78rem; color: var(--text-muted); flex-wrap: wrap; }
        .cta-trust span { display: flex; align-items: center; gap: 5px; }
        .cta-trust svg { width: 14px; height: 14px; color: var(--green); }

        /* ── KONTAK SECTION ── */
        .kontak-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }
        .kontak-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 24px;
        }
        .kontak-card-title {
            font-size: 0.9rem;
            font-weight: 700;
            color: var(--text);
            margin-bottom: 14px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .kontak-card-title svg { width: 18px; height: 18px; color: var(--red); }
        .kontak-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.83rem;
            padding: 7px 0;
            border-bottom: 1px solid var(--border);
        }
        .kontak-row:last-child { border-bottom: none; }
        .kontak-row-label { color: var(--text-sub); }
        .kontak-row-val { color: var(--blue); font-weight: 600; }
        .kontak-row-val.closed { color: var(--red); }
        .kontak-row-val.open { color: var(--green); }
        .kontak-address { font-size: 0.85rem; color: var(--text-sub); line-height: 1.75; }

        /* ── FOOTER ── */
        .footer {
            background: #090d16;
            color: white;
            padding: 40px 24px 20px;
        }
        .footer-inner {
            max-width: 1160px;
            margin: 0 auto;
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr;
            gap: 48px;
            padding-bottom: 28px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            margin-bottom: 20px;
        }
        .footer-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 12px;
        }
        .footer-brand-icon {
            width: 38px;
            height: 38px;
            background: var(--red);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .footer-brand-icon svg { width: 20px; height: 20px; fill: white; }
        .footer-brand-name { font-weight: 800; font-size: 0.95rem; }
        .footer-brand-sub { font-size: 0.68rem; color: #64748b; margin-top: 1px; }
        .footer-desc { font-size: 0.82rem; color: #64748b; line-height: 1.7; max-width: 260px; margin-bottom: 12px; }
        .footer-online {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(22,163,74,0.12);
            border: 1px solid rgba(22,163,74,0.2);
            border-radius: 6px;
            padding: 4px 12px;
            font-size: 0.72rem;
            color: #86efac;
        }
        .footer-online-dot { width: 7px; height: 7px; border-radius: 50%; background: #22c55e; }
        .footer-col-title {
            font-size: 0.78rem;
            font-weight: 700;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 14px;
        }
        .footer-links {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        .footer-links a {
            font-size: 0.83rem;
            color: #64748b;
            transition: color 0.18s;
        }
        .footer-links a:hover { color: var(--red-light); }
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.75rem;
            color: #475569;
            flex-wrap: wrap;
            gap: 8px;
        }
        .footer-bottom-right {
            display: flex;
            align-items: center;
            gap: 6px;
        }
        .footer-bottom-right svg { width: 14px; height: 14px; }

        /* ── ANIMATIONS ── */
        @keyframes marquee { 0%{transform:translateX(0)} 100%{transform:translateX(-50%)} }

        /* ── RESPONSIVE ── */
        .desktop-nav { display: flex; }
        @media (max-width: 900px) {
            .desktop-nav { display: none !important; }
            .hero-inner { grid-template-columns: 1fr; gap: 40px; }
            .hero-stats { grid-template-columns: 1fr 1fr; }
            .hero-stat-card:nth-child(even) { margin-top: 0; }
            .peng-grid { grid-template-columns: 1fr; }
            .layanan-grid { grid-template-columns: 1fr 1fr; }
            .kontak-grid { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr; gap: 28px; }
            .hero-title { font-size: 2rem; }
        }
        @media (max-width: 600px) {
            .layanan-grid { grid-template-columns: 1fr; }
            .pengurus-bar-inner { gap: 24px; }
            .top-bar-right { display: none; }
            .cta-box { padding: 36px 20px; }
        }
    </style>
</head>
<body>

{{-- ══ TOP INFO BAR ══ --}}
<div class="top-bar">
    <div class="top-bar-inner">
        <div class="top-bar-left">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h12m-.75 4.5H21m-3.75 3.75h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Zm0 3h.008v.008h-.008v-.008Z"/></svg>
            Portal Resmi &nbsp;·&nbsp; Rukun Tetangga &amp; Rukun Warga Jalan Nikel &nbsp;·&nbsp; Kelurahan Bugel, Kota Tangerang
        </div>
        <div class="top-bar-right">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                Pengurus RT: 0812-xxxx-xxxx
            </span>
            <span>|</span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                Senin–Jumat, 08.00–16.00 WIB
            </span>
        </div>
    </div>
</div>

{{-- ══ NAVBAR ══ --}}
<nav class="navbar">
    <div class="navbar-inner">
        <a href="{{ route('home') }}" class="navbar-brand">
            <div class="brand-logo">
                <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
            </div>
            <div>
                <div class="brand-text-title">SIRTRW JALAN NIKEL</div>
                <div class="brand-text-sub">Sistem Informasi Portal Digital RT/RW</div>
            </div>
        </a>

        <ul class="navbar-nav desktop-nav">
            <li>
                <a href="#pengumuman">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/></svg>
                    Pengumuman
                </a>
            </li>
            <li>
                <a href="#agenda">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                    Agenda
                </a>
            </li>
            <li>
                <a href="#layanan">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                    Layanan
                </a>
            </li>
            <li>
                <a href="#kontak">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                    Kontak
                </a>
            </li>
        </ul>

        <div class="navbar-actions">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-daftar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                    Dashboard Saya
                </a>
            @else
                <a href="{{ route('login') }}" class="btn-masuk">Masuk</a>
                <a href="{{ route('register') }}" class="btn-daftar">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/></svg>
                    Daftar Warga
                </a>
            @endauth
        </div>
    </div>
</nav>

{{-- ══ URGENT TICKER ══ --}}
@php $urgents = $pengumuman->where('is_urgent', true); @endphp
@if($urgents->count() > 0)
<div class="ticker-bar">
    <div class="ticker-inner">
        <div class="ticker-label">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
            PENGUMUMAN PENTING
        </div>
        <div class="ticker-scroll">
            <div class="ticker-content">
                @for ($i = 0; $i < 2; $i++)
                    @foreach($urgents as $u)
                        <span>{{ $u->judul }}</span>
                    @endforeach
                @endfor
            </div>
        </div>
    </div>
</div>
@endif

{{-- ══ HERO ══ --}}
<section class="hero">
    <div class="hero-inner">
        <div>
            <div class="hero-badge">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"/></svg>
                Portal Resmi &nbsp;·&nbsp; Online 24 Jam
            </div>

            <h1 class="hero-title">
                Selamat Datang di<br>
                <span>Portal Digital</span><br>
                RT/RW Jalan Nikel
            </h1>

            <p class="hero-desc">
                Akses layanan RT/RW secara <strong>digital, cepat, dan transparan</strong>. Pengajuan surat, laporan aduan, informasi kas, dan agenda kegiatan — semuanya dalam satu portal resmi.
            </p>

            <div class="hero-cta">
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-hero-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                        Buka Dashboard Saya
                    </a>
                @else
                    <a href="{{ route('register') }}" class="btn-hero-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/></svg>
                        Daftar Sebagai Warga
                    </a>
                    <a href="{{ route('login') }}" class="btn-hero-outline">Sudah Terdaftar? Masuk</a>
                @endauth
            </div>

            <div class="hero-trust">
                <div class="trust-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    Gratis &amp; Resmi
                </div>
                <div class="trust-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                    Data Aman &amp; Terlindungi
                </div>
                <div class="trust-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 8.25h3m-3 3h3m-3 3H12"/></svg>
                    Bisa dari HP
                </div>
                <div class="trust-item">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    Proses Cepat
                </div>
            </div>
        </div>

        {{-- STAT CARDS --}}
        <div class="hero-stats">
            <div class="hero-stat-card">
                <div class="hero-stat-icon" style="background:rgba(59,130,246,0.15);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#3b82f6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                </div>
                <div class="hero-stat-val" style="color:#3b82f6;">{{ $stats['total_warga'] }}</div>
                <div class="hero-stat-label">Warga Terdaftar</div>
            </div>
            <div class="hero-stat-card">
                <div class="hero-stat-icon" style="background:rgba(16,185,129,0.15);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#10b981"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                </div>
                <div class="hero-stat-val" style="color:#10b981;">{{ $stats['total_surat'] }}</div>
                <div class="hero-stat-label">Surat Diselesaikan</div>
            </div>
            <div class="hero-stat-card">
                <div class="hero-stat-icon" style="background:rgba(245,158,11,0.15);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#f59e0b"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5"/></svg>
                </div>
                <div class="hero-stat-val" style="color:#f59e0b;">{{ $stats['total_aduan'] }}</div>
                <div class="hero-stat-label">Aduan Ditangani</div>
            </div>
            <div class="hero-stat-card">
                <div class="hero-stat-icon" style="background:rgba(139,92,246,0.15);">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#8b5cf6"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                </div>
                <div class="hero-stat-val" style="color:#8b5cf6;">{{ $stats['total_event'] }}</div>
                <div class="hero-stat-label">Event Terlaksana</div>
            </div>
        </div>
    </div>
</section>

{{-- ══ PENGURUS BAR ══ --}}
<div class="pengurus-bar">
    <div class="pengurus-bar-inner">
        @foreach([
            ['icon_color'=>'#3b82f6','bg'=>'rgba(59,130,246,0.15)','jabatan'=>'Ketua RW','wilayah'=>'RW 001 Bugel'],
            ['icon_color'=>'#06b6d4','bg'=>'rgba(6,182,212,0.15)','jabatan'=>'Ketua RT 001','wilayah'=>'Wilayah Blok A'],
            ['icon_color'=>'#06b6d4','bg'=>'rgba(6,182,212,0.15)','jabatan'=>'Ketua RT 002','wilayah'=>'Wilayah Blok B'],
            ['icon_color'=>'#10b981','bg'=>'rgba(16,185,129,0.15)','jabatan'=>'Sekretaris','wilayah'=>'Administrasi RT/RW'],
        ] as $p)
        <div class="pengurus-item">
            <div class="pengurus-icon" style="background:{{ $p['bg'] }};">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="{{ $p['icon_color'] }}"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/></svg>
            </div>
            <div class="pengurus-name">{{ $p['jabatan'] }}</div>
            <div class="pengurus-sub">{{ $p['wilayah'] }}</div>
        </div>
        @endforeach
    </div>
</div>

{{-- ══ PENGUMUMAN ══ --}}
<section class="section" id="pengumuman">
    <div class="container">
        <div class="section-header-flex">
            <div>
                <div class="section-label">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 0 1-1.44-4.282m3.102.069a18.03 18.03 0 0 1-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 0 1 8.835 2.535M10.34 6.66a23.847 23.847 0 0 0 8.835-2.535m0 0A23.74 23.74 0 0 0 18.795 3m.38 1.125a23.91 23.91 0 0 1 1.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 0 0 1.014-5.395m0-3.46c.495.413.811 1.035.811 1.73s-.316 1.317-.811 1.73"/></svg>
                    Informasi Terkini
                </div>
                <h2 class="section-title">Pengumuman Resmi RT/RW</h2>
                <p class="section-desc">Informasi terbaru dari Pengurus RT/RW untuk seluruh warga.</p>
            </div>
            <a href="{{ route('login') }}" class="see-all-link">
                Lihat semua setelah masuk
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>

        @if($pengumuman->count() > 0)
        <div class="peng-grid">
            @foreach($pengumuman as $p)
            <div class="peng-card {{ $p->is_urgent ? 'urgent' : '' }}">
                <div class="peng-meta">
                    @if($p->is_urgent)
                        <span class="peng-badge-urgent">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
                            PENTING
                        </span>
                    @else
                        <span class="peng-badge-normal">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/></svg>
                            Pengumuman
                        </span>
                    @endif
                    <span class="peng-date">{{ $p->created_at->format('d M Y') }}</span>
                </div>
                <h3 class="peng-title">{{ $p->judul }}</h3>
                <p class="peng-body">{{ Str::limit($p->konten, 130) }}</p>
                @if($p->tampil_sampai)
                <div class="peng-expire">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="#ca8a04"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    Berlaku s/d {{ \Carbon\Carbon::parse($p->tampil_sampai)->format('d M Y') }}
                </div>
                @endif
                <div class="peng-footer">
                    <div class="peng-avatar">{{ strtoupper(substr($p->pembuat->nama_lengkap,0,2)) }}</div>
                    <span>{{ $p->pembuat->nama_lengkap }}</span>
                    <span style="margin-left:auto;">{{ str_replace('_',' ',$p->pembuat->role) }}</span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="peng-empty">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 9v.906a2.25 2.25 0 0 1-1.183 1.981l-6.478 3.488M2.25 9v.906a2.25 2.25 0 0 0 1.183 1.981l6.478 3.488m8.839 2.51-4.66-2.51m0 0-1.023-.55a2.25 2.25 0 0 0-2.134 0l-1.022.55m0 0-4.661 2.51m16.5 1.615a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V8.844a2.25 2.25 0 0 1 1.183-1.981l7.5-4.039a2.25 2.25 0 0 1 2.134 0l7.5 4.039a2.25 2.25 0 0 1 1.183 1.98V19.5Z"/></svg>
            <p>Belum ada pengumuman yang dipublikasikan.</p>
        </div>
        @endif
    </div>
</section>

{{-- ══ AGENDA ══ --}}
<section class="section section-alt" id="agenda">
    <div class="container">
        <div class="section-header-center">
            <div class="section-label" style="margin: 0 auto 12px; display: inline-flex;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                Jadwal Kegiatan
            </div>
            <h2 class="section-title">Agenda RT/RW Mendatang</h2>
            <p class="section-desc" style="max-width:500px;margin:0 auto;">Jadwal kegiatan dan acara lingkungan yang telah direncanakan pengurus.</p>
        </div>

        @if($events->count() > 0)
        <div class="agenda-list">
            @foreach($events as $e)
            <div class="agenda-card">
                <div class="agenda-date">
                    <span class="agenda-day">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</span>
                    <span class="agenda-month">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</span>
                </div>
                <div class="agenda-body">
                    <div class="agenda-title">{{ $e->judul }}</div>
                    @if($e->deskripsi)
                    <div class="agenda-desc">{{ Str::limit($e->deskripsi, 100) }}</div>
                    @endif
                    <div class="agenda-meta">
                        <div class="agenda-meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                            {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('l, d F Y · H:i') }} WIB
                        </div>
                        @if($e->lokasi)
                        <div class="agenda-meta-item">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                            {{ $e->lokasi }}
                        </div>
                        @endif
                    </div>
                </div>
                <div class="agenda-badge">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->diffForHumans() }}</div>
            </div>
            @endforeach
        </div>
        <div style="text-align:center;margin-top:24px;">
            <a href="{{ route('login') }}" class="see-all-link" style="justify-content:center;">
                Masuk untuk lihat semua agenda
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3"/></svg>
            </a>
        </div>
        @else
        <div class="peng-empty">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
            <p>Belum ada agenda yang dijadwalkan.</p>
        </div>
        @endif
    </div>
</section>

{{-- ══ LAYANAN ══ --}}
<section class="section" id="layanan">
    <div class="container">
        <div class="section-header-center" style="margin-bottom:36px;">
            <div class="section-label" style="margin: 0 auto 12px; display: inline-flex;">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 0 1 6 3.75h2.25A2.25 2.25 0 0 1 10.5 6v2.25a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V6ZM3.75 15.75A2.25 2.25 0 0 1 6 13.5h2.25a2.25 2.25 0 0 1 2.25 2.25V18a2.25 2.25 0 0 1-2.25 2.25H6A2.25 2.25 0 0 1 3.75 18v-2.25ZM13.5 6a2.25 2.25 0 0 1 2.25-2.25H18A2.25 2.25 0 0 1 20.25 6v2.25A2.25 2.25 0 0 1 18 10.5h-2.25a2.25 2.25 0 0 1-2.25-2.25V6ZM13.5 15.75a2.25 2.25 0 0 1 2.25-2.25H18a2.25 2.25 0 0 1 2.25 2.25V18A2.25 2.25 0 0 1 18 20.25h-2.25A2.25 2.25 0 0 1 13.5 18v-2.25Z"/></svg>
                Layanan Digital
            </div>
            <h2 class="section-title">Semua Layanan RT/RW Online</h2>
            <p class="section-desc" style="max-width:500px;margin:0 auto;">Layanan tata kelola RT/RW kini bisa diakses kapan saja dan di mana saja.</p>
        </div>
        <div class="layanan-grid">

            <div class="layanan-card">
                <div class="layanan-icon" style="background:#eff6ff;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#1d4ed8"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"/></svg>
                </div>
                <div class="layanan-title">Surat Keterangan Online</div>
                <div class="layanan-desc">Ajukan surat domisili, KTP, dan SKTM secara digital. Tidak perlu antri, pantau status secara langsung.</div>
            </div>

            <div class="layanan-card">
                <div class="layanan-icon" style="background:#fef2f2;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#dc2626"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5"/></svg>
                </div>
                <div class="layanan-title">Laporan Pengaduan</div>
                <div class="layanan-desc">Laporkan masalah keamanan, fasilitas rusak, kebersihan, atau perselisihan warga secara terbuka dan terorganisir.</div>
            </div>

            <div class="layanan-card">
                <div class="layanan-icon" style="background:#f0fdf4;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#16a34a"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3"/></svg>
                </div>
                <div class="layanan-title">Transparansi Keuangan Kas</div>
                <div class="layanan-desc">Lihat laporan keuangan RT/RW secara terbuka. Setiap rupiah pemasukan &amp; pengeluaran tercatat dengan jelas.</div>
            </div>

            <div class="layanan-card">
                <div class="layanan-icon" style="background:#fffbeb;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#d97706"><path stroke-linecap="round" stroke-linejoin="round" d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z"/></svg>
                </div>
                <div class="layanan-title">Peminjaman Aset RT/RW</div>
                <div class="layanan-desc">Pinjam sound system, tenda, kursi lipat, genset, dan peralatan RT/RW dengan mudah secara online.</div>
            </div>

            <div class="layanan-card">
                <div class="layanan-icon" style="background:#faf5ff;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#7c3aed"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/></svg>
                </div>
                <div class="layanan-title">Agenda &amp; Jadwal Kegiatan</div>
                <div class="layanan-desc">Pantau jadwal kerja bakti, posyandu, rapat pleno, ronda, dan acara lingkungan lainnya dengan mudah.</div>
            </div>

            <div class="layanan-card">
                <div class="layanan-icon" style="background:#ecfeff;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#0891b2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>
                </div>
                <div class="layanan-title">Data Kependudukan Digital</div>
                <div class="layanan-desc">Data warga tercatat akurat dan selalu diperbarui. Pengurus dapat mengelola data dengan mudah dan efisien.</div>
            </div>
        </div>
    </div>
</section>

{{-- ══ CTA ══ --}}
<div class="cta-section">
    <div class="cta-box">
        <div class="cta-icon">
            <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
        </div>
        <h2 class="cta-title">Daftarkan Diri Anda Sekarang</h2>
        <p class="cta-desc">Bergabunglah dengan warga Jalan Nikel yang sudah terdaftar dan nikmati kemudahan layanan RT/RW digital.</p>
        <div class="cta-buttons">
            @auth
                <a href="{{ route('dashboard') }}" class="btn-hero-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955a1.126 1.126 0 0 1 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>
                    Buka Dashboard Saya
                </a>
            @else
                <a href="{{ route('register') }}" class="btn-hero-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/></svg>
                    Daftar Gratis Sekarang
                </a>
                <a href="{{ route('login') }}" class="btn-hero-outline">Sudah Punya Akun</a>
            @endauth
        </div>
        <div class="cta-trust">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                Gratis &amp; Resmi
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z"/></svg>
                Data Aman
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                Proses Cepat
            </span>
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 8.25h3m-3 3h3m-3 3H12"/></svg>
                Akses dari HP
            </span>
        </div>
    </div>
</div>

{{-- ══ KONTAK ══ --}}
<section class="section section-alt" id="kontak">
    <div class="container">
        <div class="section-header-center" style="margin-bottom:32px;">
            <h2 class="section-title">Informasi &amp; Kontak</h2>
            <p class="section-desc">Hubungi pengurus RT/RW atau kunjungi sekretariat kami.</p>
        </div>
        <div class="kontak-grid">
            <div class="kontak-card">
                <div class="kontak-card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/></svg>
                    Alamat Sekretariat
                </div>
                <p class="kontak-address">Jl. Nikel No. XX, RT 001/RW 001<br>Kelurahan Bugel, Kecamatan Karawaci<br>Kota Tangerang, Banten 15116</p>
            </div>
            <div class="kontak-card">
                <div class="kontak-card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
                    Kontak Pengurus
                </div>
                @foreach(['Ketua RW'=>'0812-xxxx-xxxx','Ketua RT 001'=>'0813-xxxx-xxxx','Sekretaris'=>'0814-xxxx-xxxx'] as $pos => $tel)
                <div class="kontak-row">
                    <span class="kontak-row-label">{{ $pos }}</span>
                    <span class="kontak-row-val">{{ $tel }}</span>
                </div>
                @endforeach
            </div>
            <div class="kontak-card">
                <div class="kontak-card-title">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                    Jam Pelayanan
                </div>
                @foreach(['Senin – Jumat'=>['08.00 – 16.00 WIB','open'],'Sabtu'=>['08.00 – 12.00 WIB','open'],'Minggu & Libur'=>['Tutup','closed']] as $hari => $info)
                <div class="kontak-row">
                    <span class="kontak-row-label">{{ $hari }}</span>
                    <span class="kontak-row-val {{ $info[1] }}">{{ $info[0] }}</span>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ══ FOOTER ══ --}}
<footer class="footer">
    <div class="footer-inner">
        <div class="footer-grid">
            <div>
                <div class="footer-brand">
                    <div class="footer-brand-icon">
                        <svg viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg"><path d="M20 4L4 16v20h10V24h12v12h10V16L20 4z"/></svg>
                    </div>
                    <div>
                        <div class="footer-brand-name">SIRTRW Jalan Nikel</div>
                        <div class="footer-brand-sub">Portal Digital RT/RW</div>
                    </div>
                </div>
                <p class="footer-desc">Portal digital resmi Rukun Tetangga dan Rukun Warga Jalan Nikel, Kelurahan Bugel. Melayani warga dengan transparan dan profesional.</p>
                <div class="footer-online">
                    <div class="footer-online-dot"></div>
                    Sistem Online
                </div>
            </div>
            <div>
                <div class="footer-col-title">Layanan</div>
                <ul class="footer-links">
                    @foreach(['Pengajuan Surat','Laporan Aduan','Info Keuangan','Peminjaman Aset','Agenda Kegiatan'] as $l)
                    <li><a href="{{ route('login') }}">{{ $l }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div>
                <div class="footer-col-title">Akun Warga</div>
                <ul class="footer-links">
                    @foreach(['Masuk Portal' => route('login'), 'Daftar Warga Baru' => route('register'), 'Cek Status Surat' => route('login'), 'Lihat Pengumuman' => '#pengumuman'] as $lbl => $href)
                    <li><a href="{{ $href }}">{{ $lbl }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>&copy; {{ date('Y') }} SIRTRW Jalan Nikel &nbsp;·&nbsp; Portal Digital RT/RW Resmi. Semua hak cipta dilindungi.</span>
            <div class="footer-bottom-right">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253M3 12c0 .778.099 1.533.284 2.253"/></svg>
                Dibuat untuk warga Indonesia
            </div>
        </div>
    </div>
</footer>

<script>
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
