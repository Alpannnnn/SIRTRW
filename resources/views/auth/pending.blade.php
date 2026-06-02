@extends('layouts.auth')
@section('title', 'Menunggu Verifikasi — SIRTRW')

@section('content')

<div class="text-center py-4">

    {{-- Icon --}}
    <div class="w-20 h-20 bg-amber-50 border-2 border-amber-200 rounded-full flex items-center justify-center mx-auto mb-6 text-amber-600 shadow-sm">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-10 h-10">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
        </svg>
    </div>

    <h2 class="auth-form-title mb-2">Akun Sedang Diverifikasi</h2>

    <p class="text-sm text-slate-600 leading-relaxed mb-6">
        Terima kasih telah mendaftar. Akun Anda dengan NIK
        <strong class="text-slate-900 font-bold">{{ auth()->user()->nik }}</strong>
        sedang menunggu verifikasi dari Pengurus RT setempat.
    </p>

    <div class="flex gap-3 text-left bg-amber-50 border border-amber-200 rounded-lg p-4 text-xs text-amber-800 leading-relaxed mb-6 font-semibold">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-amber-700 flex-shrink-0 mt-0.5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/>
        </svg>
        <div>
            Verifikasi diperlukan untuk memastikan keamanan dan validitas data kependudukan lingkungan. Hubungi Pengurus RT jika proses memakan waktu lebih dari <strong>1×24 jam</strong>.
        </div>
    </div>

    {{-- Kontak pengurus --}}
    <div class="bg-slate-50 border border-slate-200 rounded-xl p-4 mb-6 text-left space-y-3">
        <div class="text-xs font-bold text-slate-700 flex items-center gap-1.5">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-700">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z"/>
            </svg>
            Kontak Pengurus RT/RW Bugel
        </div>
        <div class="text-xs text-slate-600 space-y-1.5 font-semibold">
            <div class="flex justify-between items-center">
                <span>Ketua RT 001</span>
                <span class="text-teal-700 font-bold">0813-xxxx-xxxx</span>
            </div>
            <div class="flex justify-between items-center border-t border-slate-100 pt-1.5">
                <span>Ketua RT 002</span>
                <span class="text-teal-700 font-bold">0814-xxxx-xxxx</span>
            </div>
        </div>
    </div>

    {{-- Logout button --}}
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="w-full bg-slate-100 hover:bg-slate-200 text-slate-600 font-bold py-2.5 px-4 rounded-lg border border-slate-200 flex items-center justify-center gap-2 cursor-pointer text-xs transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"/>
            </svg>
            Keluar &amp; Kembali ke Halaman Masuk
        </button>
    </form>
</div>

@endsection
