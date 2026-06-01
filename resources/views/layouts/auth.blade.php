<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Login') — SIRTRW</title>
    <meta name="description" content="Portal Digital RT/RW - Sistem Informasi Terpadu untuk Tata Kelola Lingkungan">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div class="auth-layout">
    <div class="auth-container">
        <div class="auth-brand">
            <h1>SIRTRW</h1>
            <p>Portal Digital RT/RW Terintegrasi</p>
        </div>

        <div class="auth-card">
            @yield('content')
        </div>

        <div class="auth-copyright">
            &copy; {{ date('Y') }} SIRTRW — Sistem Informasi RT/RW. All rights reserved.
        </div>
    </div>
</div>

</body>
</html>
