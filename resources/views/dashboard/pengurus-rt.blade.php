@extends('layouts.app')

@section('title', 'Dashboard Pengurus RT')

@section('content')
<div class="grid grid-4 mb-6">
    <x-stat-card 
        label="Menunggu Verifikasi" 
        value="0" 
        icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>'
        color="warning"
    />
    <x-stat-card 
        label="Surat Masuk" 
        value="0" 
        icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75"/></svg>'
        color="primary"
    />
    <x-stat-card 
        label="Aduan Belum Diproses" 
        value="0" 
        icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5"/></svg>'
        color="danger"
    />
    <x-stat-card 
        label="Total Warga Aktif" 
        value="0" 
        icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"/></svg>'
        color="success"
    />
</div>

<div class="grid grid-2">
    <x-card title="Tugas Perlu Tindakan">
        <x-empty-state title="Semua tugas selesai" message="Tidak ada tugas tertunda saat ini. Anda dapat bersantai." />
    </x-card>

    <x-card title="Pengumuman Terbaru">
        @if($recentPengumuman->count() > 0)
            <div class="flex-col gap-4">
                @foreach($recentPengumuman as $pengumuman)
                    <div class="p-4 rounded border border-border" style="background: var(--color-surface);">
                        <div class="flex justify-between items-center mb-2">
                            <h4 class="text-md font-bold {{ $pengumuman->is_urgent ? 'text-danger' : '' }}">{{ $pengumuman->judul }}</h4>
                            <span class="text-xs text-muted">{{ $pengumuman->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-sm text-secondary">{{ Str::limit($pengumuman->konten, 100) }}</p>
                    </div>
                @endforeach
            </div>
        @else
            <x-empty-state title="Belum ada pengumuman" message="Pengumuman terbaru dari pengurus RT/RW akan muncul di sini." />
        @endif
    </x-card>
</div>
@endsection
