@extends('layouts.auth')
@section('title', 'Menunggu Verifikasi — SIRTRW')

@section('content')

<div style="text-align:center;padding:16px 0;">

    {{-- Icon --}}
    <div style="width:80px;height:80px;background:#fffbeb;border:2px solid #fde68a;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#d97706" style="width:40px;height:40px;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
        </svg>
    </div>

    <div class="auth-form-title" style="margin-bottom:8px;">Akun Sedang Diverifikasi</div>

    <p style="font-size:0.9rem;color:#5a6a7a;line-height:1.7;margin-bottom:20px;">
        Terima kasih telah mendaftar. Akun Anda dengan NIK
        <strong style="color:#1a1a2e;">{{ auth()->user()->nik }}</strong>
        sedang menunggu verifikasi dari Pengurus RT setempat.
    </p>

    <div class="af-info-box" style="text-align:left;background:#fffbeb;border-color:#fde68a;color:#92400e;">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" style="width:18px;height:18px;flex-shrink:0;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/>
        </svg>
        <div>
            Verifikasi diperlukan untuk memastikan keamanan dan validitas data kependudukan lingkungan. Hubungi Pengurus RT jika proses memakan waktu lebih dari <strong>1×24 jam</strong>.
        </div>
    </div>

    {{-- Kontak pengurus --}}
    <div style="background:#f9fafb;border:1.5px solid #dde3ec;border-radius:10px;padding:16px;margin-bottom:24px;text-align:left;">
        <div style="font-size:0.8rem;font-weight:700;color:#374151;margin-bottom:10px;display:flex;align-items:center;gap:7px;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="#c0392b" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/></svg>
            Kontak Pengurus RT
        </div>
        <div style="font-size:0.83rem;color:#5a6a7a;line-height:1.8;">
            Ketua RT 001 &nbsp;·&nbsp; <span style="color:#1d4ed8;font-weight:600;">0813-xxxx-xxxx</span><br>
            Ketua RT 002 &nbsp;·&nbsp; <span style="color:#1d4ed8;font-weight:600;">0814-xxxx-xxxx</span>
        </div>
    </div>

    {{-- Logout button --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="af-submit" style="background:#f4f6f9;color:#5a6a7a;border:1.5px solid #dde3ec;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:18px;height:18px;"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/></svg>
            Keluar &amp; Kembali ke Halaman Masuk
        </button>
    </form>
</div>

@endsection
