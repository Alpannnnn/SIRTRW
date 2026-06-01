@extends('layouts.app')
@section('title', 'Pengumuman')

@section('actions')
    @can('pengurus_rt,pengurus_rw')
    @endcan
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <a href="{{ route('pengumuman.create') }}" class="btn btn-primary btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            Buat Pengumuman
        </a>
    @endif
@endsection

@section('content')
@if($urgent->count() > 0)
<div class="mb-6">
    <h4 class="text-danger mb-4" style="display:flex;align-items:center;gap:8px;">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/></svg>
        🚨 Pengumuman Penting
    </h4>
    <div class="grid grid-2">
        @foreach($urgent as $p)
        <div class="card" style="border-color:var(--color-danger);box-shadow:0 0 20px rgba(244,63,94,0.1)">
            <div class="card-body">
                <div class="flex justify-between items-start mb-3">
                    <h4 style="color:var(--color-text-primary);font-size:1rem;">{{ $p->judul }}</h4>
                    <x-badge variant="danger">URGENT</x-badge>
                </div>
                <p class="text-sm" style="margin-bottom:var(--space-3);">{{ Str::limit($p->konten, 150) }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs text-muted">{{ $p->pembuat->nama_lengkap }} · {{ $p->created_at->diffForHumans() }}</span>
                    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                    <form method="POST" action="{{ route('pengumuman.destroy', $p) }}" onsubmit="return confirm('Hapus pengumuman ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-ghost btn-sm text-danger">Hapus</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<x-card title="Pengumuman Umum">
    @if($normal->count() > 0)
        <div class="flex-col" style="gap:0">
            @foreach($normal as $p)
            <div style="padding:var(--space-5) var(--space-6);border-bottom:1px solid var(--color-border);transition:background var(--transition-fast);" onmouseover="this.style.background='var(--color-surface)'" onmouseout="this.style.background='transparent'">
                <div class="flex justify-between items-start mb-2">
                    <h4 style="font-size:0.95rem;color:var(--color-text-primary);">{{ $p->judul }}</h4>
                    <div class="flex gap-2 items-center">
                        <span class="text-xs text-muted">{{ $p->created_at->diffForHumans() }}</span>
                        @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                        <form method="POST" action="{{ route('pengumuman.destroy', $p) }}" onsubmit="return confirm('Hapus?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-ghost btn-sm" style="color:var(--color-danger);padding:2px 6px;">✕</button>
                        </form>
                        @endif
                    </div>
                </div>
                <p class="text-sm" style="margin-bottom:var(--space-2);">{{ Str::limit($p->konten, 200) }}</p>
                <span class="text-xs text-muted">Oleh: {{ $p->pembuat->nama_lengkap }}</span>
                @if($p->tampil_sampai)
                    <span class="text-xs text-muted"> · Berlaku s/d {{ \Carbon\Carbon::parse($p->tampil_sampai)->format('d M Y') }}</span>
                @endif
            </div>
            @endforeach
        </div>
        <div class="p-4">{{ $normal->links() }}</div>
    @else
        <x-empty-state title="Belum ada pengumuman" message="Belum ada pengumuman umum yang dipublikasikan saat ini." />
    @endif
</x-card>
@endsection
