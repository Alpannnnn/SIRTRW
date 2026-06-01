@extends('layouts.auth')

@section('title', 'Masuk - SIRTRW')

@section('content')
    <h2>Selamat Datang Kembali</h2>
    
    @if(session('status'))
        <div class="alert alert-success" style="margin-bottom: var(--space-4);">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
            <span class="alert-content">{{ session('status') }}</span>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        
        <x-input 
            name="nik" 
            label="Nomor Induk Kependudukan (NIK)" 
            type="text" 
            placeholder="Masukkan 16 digit NIK" 
            required="true"
            maxlength="16"
            pattern="[0-9]{16}"
            title="NIK harus 16 digit angka"
        />
        
        <x-input 
            name="password" 
            label="Kata Sandi" 
            type="password" 
            placeholder="Masukkan kata sandi" 
            required="true"
        />
        
        <div class="form-group flex justify-between items-center">
            <div class="form-check">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Ingat Saya</label>
            </div>
            
            <a href="#" class="text-sm text-primary">Lupa Sandi?</a>
        </div>
        
        <x-button type="submit" variant="primary" size="lg" class="btn-block mt-4">
            Masuk
        </x-button>
    </form>
    
    <div class="auth-footer">
        Belum punya akun warga? <a href="{{ route('register') }}" class="text-primary">Daftar Sekarang</a>
    </div>
@endsection
