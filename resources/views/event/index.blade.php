@extends('layouts.app')
@section('title', 'Agenda & Event')

@section('actions')
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <a href="{{ route('event.create') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded-lg shadow-xs transition text-sm cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Event
        </a>
    @endif
@endsection

@section('content')
<div class="mb-8">
    <div class="flex items-center gap-2 mb-5">
        <div class="w-7 h-7 bg-teal-50 text-teal-700 rounded-lg flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
            </svg>
        </div>
        <h3 class="text-base font-extrabold text-slate-800 tracking-tight">Agenda Mendatang</h3>
    </div>

    @if($upcoming->count() > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($upcoming as $e)
        <div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden flex flex-col p-6">
            <div class="flex justify-between items-start mb-4">
                <div class="bg-teal-55 bg-teal-50 border border-teal-200 text-teal-800 rounded-lg p-2.5 text-center min-w-[64px] flex-shrink-0">
                    <div class="text-2xl font-black leading-none">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d') }}</div>
                    <div class="text-[10px] font-bold uppercase tracking-wider mt-1">{{ \Carbon\Carbon::parse($e->tanggal_mulai)->isoFormat('MMM') }}</div>
                </div>
                @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                <div class="flex gap-1.5 flex-shrink-0">
                    <a href="{{ route('event.edit', $e) }}" class="inline-flex items-center justify-center bg-slate-50 hover:bg-slate-100 border border-slate-200 text-slate-600 font-bold py-1.5 px-3 rounded-lg text-xs transition" title="Edit Event">Edit</a>
                    <form method="POST" action="{{ route('event.destroy', $e) }}" onsubmit="return confirm('Hapus event ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="inline-flex items-center justify-center bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-600 font-bold py-1.5 px-2.5 rounded-lg text-xs transition" title="Hapus Event">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                        </button>
                    </form>
                </div>
                @endif
            </div>

            <h4 class="text-base font-extrabold text-slate-900 leading-snug mb-2">{{ $e->judul }}</h4>
            @if($e->deskripsi)
                <p class="text-xs text-slate-500 leading-relaxed font-semibold mb-4 flex-1">{{ Str::limit($e->deskripsi, 120) }}</p>
            @else
                <div class="flex-1"></div>
            @endif

            <div class="flex flex-col gap-2.5 pt-3 border-t border-slate-100 text-xs font-semibold text-slate-500">
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-600 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <span>
                        {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('H:i') }}
                        @if($e->tanggal_selesai) – {{ \Carbon\Carbon::parse($e->tanggal_selesai)->format('H:i') }}@endif WIB
                    </span>
                </div>
                @if($e->lokasi)
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-600 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                    </svg>
                    <span>{{ $e->lokasi }}</span>
                </div>
                @endif
                <div class="flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-teal-600 flex-shrink-0">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                    </svg>
                    <span>{{ $e->pembuat->nama_lengkap }} ({{ str_replace('_', ' ', $e->pembuat->role) }})</span>
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
    <div class="divide-y divide-slate-100">
        @foreach($past as $e)
        <div class="flex justify-between items-center py-4 first:pt-0 last:pb-0 opacity-75">
            <div class="space-y-0.5">
                <div class="font-bold text-sm text-slate-800">{{ $e->judul }}</div>
                <div class="text-xs text-slate-500 font-semibold">
                    {{ \Carbon\Carbon::parse($e->tanggal_mulai)->format('d M Y') }}
                    @if($e->lokasi) · {{ $e->lokasi }} @endif
                </div>
            </div>
            <x-badge variant="muted">Selesai</x-badge>
        </div>
        @endforeach
    </div>
</x-card>
@endif
@endsection
