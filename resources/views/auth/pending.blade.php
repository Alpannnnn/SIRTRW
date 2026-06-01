@extends('layouts.auth')

@section('title', 'Menunggu Verifikasi - SIRTRW')

@section('content')
    <div style="text-align: center; padding: var(--space-6) 0;">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" style="width:80px;height:80px;color:var(--color-warning);margin:0 auto var(--space-6);">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        
        <h2 style="margin-bottom: var(--space-4);">Akun Sedang Diverifikasi</h2>
        
        <p style="color: var(--color-text-secondary); margin-bottom: var(--space-8);">
            Terima kasih telah mendaftar di SIRTRW. Akun Anda dengan NIK <strong>{{ auth()->user()->nik }}</strong> saat ini sedang dalam status menunggu verifikasi dari Pengurus RT setempat.
        </p>
        
        <p style="font-size: var(--font-size-sm); color: var(--color-text-muted); margin-bottom: var(--space-8); padding: var(--space-4); background: var(--color-surface); border-radius: var(--radius-lg);">
            Verifikasi diperlukan untuk memastikan keamanan dan validitas data kependudukan lingkungan kita. Silakan hubungi Pengurus RT jika proses memakan waktu lebih dari 1x24 jam.
        </p>
        
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-button type="submit" variant="outline" class="btn-block">
                Keluar dan Kembali ke Halaman Login
            </x-button>
        </form>
    </div>
@endsection
