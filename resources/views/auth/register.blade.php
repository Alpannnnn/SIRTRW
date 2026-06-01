@extends('layouts.auth')

@section('title', 'Daftar Akun - SIRTRW')

@section('content')
    <h2>Daftar Akun Warga Baru</h2>
    
    <div class="alert alert-info">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/></svg>
        <div class="alert-content">
            Akun Anda akan diverifikasi oleh Pengurus RT sebelum dapat digunakan.
        </div>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        <x-input 
            name="nik" 
            label="Nomor Induk Kependudukan (NIK)" 
            type="text" 
            placeholder="16 digit angka KTP" 
            required="true"
            maxlength="16"
            pattern="[0-9]{16}"
        />
        
        <x-input 
            name="nama_lengkap" 
            label="Nama Lengkap (sesuai KTP)" 
            type="text" 
            placeholder="Contoh: Budi Santoso" 
            required="true"
        />
        
        <div class="grid grid-2" style="gap: var(--space-4)">
            <x-input 
                name="no_telepon" 
                label="No. WhatsApp" 
                type="tel" 
                placeholder="0812..." 
                required="true"
            />
            
            <x-input 
                name="blok_rumah" 
                label="Blok / No. Rumah" 
                type="text" 
                placeholder="A1 / 12" 
                required="true"
            />
        </div>
        
        <div class="grid grid-2" style="gap: var(--space-4)">
            <x-select 
                name="rt_id" 
                label="Pilih RT" 
                required="true"
                :options="['001' => 'RT 001', '002' => 'RT 002', '003' => 'RT 003', '004' => 'RT 004', '005' => 'RT 005', '006' => 'RT 006', '007' => 'RT 007', '008' => 'RT 008', '009' => 'RT 009', '010' => 'RT 010']"
            />
            
            <x-select 
                name="rw_id" 
                label="Pilih RW" 
                required="true"
                :options="['001' => 'RW 001', '002' => 'RW 002', '003' => 'RW 003', '004' => 'RW 004', '005' => 'RW 005']"
            />
        </div>
        
        <x-input 
            name="password" 
            label="Kata Sandi" 
            type="password" 
            placeholder="Minimal 8 karakter" 
            required="true"
            minlength="8"
        />
        
        <x-input 
            name="password_confirmation" 
            label="Konfirmasi Kata Sandi" 
            type="password" 
            placeholder="Ulangi kata sandi" 
            required="true"
            minlength="8"
        />
        
        <x-button type="submit" variant="primary" size="lg" class="btn-block mt-4">
            Daftar Akun
        </x-button>
    </form>
    
    <div class="auth-footer">
        Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Masuk di sini</a>
    </div>
@endsection
