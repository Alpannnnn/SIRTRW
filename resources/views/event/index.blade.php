@extends('layouts.app')
@section('title', 'Agenda & Event')

@section('actions')
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <a href="{{ route('event.create') }}" class="btn btn-primary btn-sm">+ Tambah Event</a>
    @endif
@endsection

@section('content')
<div class="mb-8">
    <h4 class="mb-4" style="color:var(--color-text-secondary);font-weight:600;">📅 Agenda Mendatang</h4>
    @if($upcoming->count() > 0)
    <div class="grid grid-2">
        @foreach($upcoming as $e)
        <div class="card" style="animation-delay:{{ $loop->index * 0.05 }}s">
            <div class="card-body">
                <div class="flex justify-between items-start mb-3">
                    <div style="background:var(--color-primary-light);padding:8px 14px;border-radius:var(--radius-lg);text-align:center;min-width:60px">
                        <div class="font-bold" style="color:var(--color-primary);font-size:1.4rem;line-height:1">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                        <div class="text-xs" style="color:var(--color-primary)">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('M') }}</div>
                    </div>
                    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                    <div class="flex gap-1">
                        <a href="{{ route('event.edit', $e) }}" class="btn btn-ghost btn-sm">Edit</a>
                        <form method="POST" action="{{ route('event.destroy', $e) }}" onsubmit="return confirm('Hapus event ini?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-ghost btn-sm text-danger">✕</button>
                        </form>
                    </div>
                    @endif
                </div>
                <h4 style="font-size:0.95rem;margin-bottom:var(--space-2);">{{ $e->judul }}</h4>
                @if($e->deskripsi)<p class="text-sm" style="margin-bottom:var(--space-3);">{{ Str::limit($e->deskripsi, 100) }}</p>@endif
                <div class="flex flex-col gap-1">
                    <div class="text-xs text-muted">
                        🕐 {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('H:i') }}
                        @if($e->tanggal_selesai) – {{ \Carbon\Carbon::parse($e->tanggal_selesai)->format('H:i') }}@endif
                    </div>
                    @if($e->lokasi)<div class="text-xs text-muted">📍 {{ $e->lokasi }}</div>@endif
                    <div class="text-xs text-muted">👤 {{ $e->pembuat->nama_lengkap }}</div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <x-card>
        <x-empty-state title="Belum ada agenda mendatang" message="Tidak ada event yang dijadwalkan dalam waktu dekat." />
    </x-card>
    @endif
</div>

@if($past->count() > 0)
<x-card title="Event Sebelumnya">
    @foreach($past as $e)
    <div class="flex justify-between items-center py-3" style="border-bottom:1px solid var(--color-border);opacity:0.6">
        <div>
            <div class="font-semibold text-sm">{{ $e->judul }}</div>
            <div class="text-xs text-muted">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d M Y') }} · {{ $e->lokasi }}</div>
        </div>
        <x-badge variant="muted">Selesai</x-badge>
    </div>
    @endforeach
</x-card>
@endif
@endsection
