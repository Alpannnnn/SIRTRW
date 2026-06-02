@extends('layouts.auth')
@section('title', 'Masuk — SIRTRW')

@section('content')

<h2 class="auth-form-title">Selamat Datang Kembali</h2>
<p class="auth-form-sub">Masukkan NIK dan kata sandi Anda untuk masuk ke portal.</p>

{{-- Status Message --}}
@if(session('status'))
<div class="bg-teal-50 border border-teal-200 text-teal-800 rounded-xl p-4 text-sm leading-relaxed mb-6 flex gap-3 items-start">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-teal-600 flex-shrink-0 mt-0.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
    </svg>
    <div class="font-medium">{{ session('status') }}</div>
</div>
@endif

{{-- Error Global --}}
@if($errors->any())
<div class="bg-red-50 border border-red-200 text-red-800 rounded-xl p-4 text-sm leading-relaxed mb-6 flex gap-3 items-start">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="w-5 h-5 text-red-600 flex-shrink-0 mt-0.5">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
    </svg>
    <div class="font-medium space-y-0.5">
        @foreach($errors->all() as $err)
            <div>{{ $err }}</div>
        @endforeach
    </div>
</div>
@endif

<form method="POST" action="{{ route('login') }}">
    @csrf

    {{-- NIK --}}
    <div class="af-group">
        <label class="af-label" for="nik">
            Nomor Induk Kependudukan (NIK)
            <span class="required">*</span>
        </label>
        <input
            id="nik"
            name="nik"
            type="text"
            class="af-input {{ $errors->has('nik') ? 'is-error' : '' }}"
            placeholder="Masukkan 16 digit NIK"
            value="{{ old('nik') }}"
            maxlength="16"
            pattern="[0-9]{16}"
            inputmode="numeric"
            autocomplete="username"
            required
        >
        @error('nik')
        <div class="af-error">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
            {{ $message }}
        </div>
        @else
        <div class="af-hint">NIK terdiri dari 16 digit angka (sesuai KTP)</div>
        @enderror
    </div>

    {{-- Password --}}
    <div class="af-group">
        <label class="af-label" for="password">
            Kata Sandi
            <span class="required">*</span>
        </label>
        <input
            id="password"
            name="password"
            type="password"
            class="af-input {{ $errors->has('password') ? 'is-error' : '' }}"
            placeholder="Masukkan kata sandi"
            autocomplete="current-password"
            required
        >
        @error('password')
        <div class="af-error">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
            {{ $message }}
        </div>
        @enderror
    </div>

    {{-- Remember & Forgot --}}
    <div class="af-check-row">
        <label class="af-check">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Ingat Saya</label>
        </label>
        <a href="#" class="af-forgot">Lupa Kata Sandi?</a>
    </div>

    {{-- Submit --}}
    <button type="submit" class="af-submit">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15M12 9l-3 3m0 0 3 3m-3-3h12.75"/></svg>
        Masuk ke Portal
    </button>
</form>

<div class="af-footer-link">
    Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
</div>

@endsection
