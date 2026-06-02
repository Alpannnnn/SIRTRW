@extends('layouts.auth')
@section('title', 'Daftar Akun — SIRTRW')

@section('content')

<h2 class="auth-form-title">Daftar Akun Warga Baru</h2>
<p class="auth-form-sub">Isi data diri Anda sesuai KTP. Akun akan diverifikasi pengurus RT.</p>

{{-- Info Verifikasi --}}
<div class="af-info-box">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 0 1 1.063.852l-.708 2.836a.75.75 0 0 0 1.063.853l.041-.021M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9-3.75h.008v.008H12V8.25Z"/>
    </svg>
    <div>
        Setelah mendaftar, akun Anda akan diverifikasi terlebih dahulu oleh Pengurus RT/RW sebelum bisa digunakan.
    </div>
</div>

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

<form method="POST" action="{{ route('register') }}">
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
            placeholder="16 digit angka sesuai KTP"
            value="{{ old('nik') }}"
            maxlength="16"
            pattern="[0-9]{16}"
            inputmode="numeric"
            autocomplete="off"
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

    {{-- Nama Lengkap --}}
    <div class="af-group">
        <label class="af-label" for="nama_lengkap">
            Nama Lengkap
            <span class="required">*</span>
        </label>
        <input
            id="nama_lengkap"
            name="nama_lengkap"
            type="text"
            class="af-input {{ $errors->has('nama_lengkap') ? 'is-error' : '' }}"
            placeholder="Nama sesuai KTP, contoh: Budi Santoso"
            value="{{ old('nama_lengkap') }}"
            autocomplete="name"
            required
        >
        @error('nama_lengkap')
        <div class="af-error">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
            {{ $message }}
        </div>
        @enderror
    </div>

    {{-- No. Telepon & Blok Rumah --}}
    <div class="af-row mb-4">
        <div>
            <label class="af-label" for="no_telepon">
                No. WhatsApp
                <span class="required">*</span>
            </label>
            <input
                id="no_telepon"
                name="no_telepon"
                type="tel"
                class="af-input {{ $errors->has('no_telepon') ? 'is-error' : '' }}"
                placeholder="0812xxxx..."
                value="{{ old('no_telepon') }}"
                autocomplete="tel"
                required
            >
            @error('no_telepon')
            <div class="af-error">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label class="af-label" for="blok_rumah">
                Blok / No. Rumah
                <span class="required">*</span>
            </label>
            <input
                id="blok_rumah"
                name="blok_rumah"
                type="text"
                class="af-input {{ $errors->has('blok_rumah') ? 'is-error' : '' }}"
                placeholder="Contoh: A1 atau 12"
                value="{{ old('blok_rumah') }}"
                required
            >
            @error('blok_rumah')
            <div class="af-error">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    {{-- RT & RW --}}
    <div class="af-row mb-4">
        <div>
            <label class="af-label" for="rt_id">
                RT
                <span class="required">*</span>
            </label>
            <select id="rt_id" name="rt_id" class="af-select {{ $errors->has('rt_id') ? 'is-error' : '' }}" required>
                <option value="" disabled {{ old('rt_id') ? '' : 'selected' }}>Pilih RT</option>
                @foreach(['001'=>'RT 001','002'=>'RT 002','003'=>'RT 003','004'=>'RT 004','005'=>'RT 005','006'=>'RT 006','007'=>'RT 007','008'=>'RT 008','009'=>'RT 009','010'=>'RT 010'] as $val => $label)
                <option value="{{ $val }}" {{ old('rt_id') == $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @error('rt_id')
            <div class="af-error">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                {{ $message }}
            </div>
            @enderror
        </div>
        <div>
            <label class="af-label" for="rw_id">
                RW
                <span class="required">*</span>
            </label>
            <select id="rw_id" name="rw_id" class="af-select {{ $errors->has('rw_id') ? 'is-error' : '' }}" required>
                <option value="" disabled {{ old('rw_id') ? '' : 'selected' }}>Pilih RW</option>
                @foreach(['001'=>'RW 001','002'=>'RW 002','003'=>'RW 003','004'=>'RW 004','005'=>'RW 005'] as $val => $label)
                <option value="{{ $val }}" {{ old('rw_id') == $val ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            @error('rw_id')
            <div class="af-error">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
                {{ $message }}
            </div>
            @enderror
        </div>
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
            placeholder="Minimal 8 karakter"
            minlength="8"
            autocomplete="new-password"
            required
        >
        @error('password')
        <div class="af-error">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
            {{ $message }}
        </div>
        @else
        <div class="af-hint">Gunakan kombinasi huruf dan angka, minimal 8 karakter</div>
        @enderror
    </div>

    {{-- Konfirmasi Password --}}
    <div class="af-group">
        <label class="af-label" for="password_confirmation">
            Konfirmasi Kata Sandi
            <span class="required">*</span>
        </label>
        <input
            id="password_confirmation"
            name="password_confirmation"
            type="password"
            class="af-input"
            placeholder="Ulangi kata sandi"
            minlength="8"
            autocomplete="new-password"
            required
        >
    </div>

    {{-- Submit --}}
    <button type="submit" class="af-submit mt-2">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M18 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0ZM3 19.235v-.11a6.375 6.375 0 0 1 12.75 0v.109A12.318 12.318 0 0 1 9.374 21c-2.331 0-4.512-.645-6.374-1.766Z"/></svg>
        Daftar Akun Sekarang
    </button>
</form>

<div class="af-footer-link">
    Sudah punya akun? <a href="{{ route('login') }}">Masuk di Sini</a>
</div>

@endsection
