@extends('layouts.app')
@section('title', 'Pengumuman')

@section('actions')
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <a href="{{ route('pengumuman.create') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded-lg shadow-xs transition text-sm cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Buat Pengumuman
        </a>
    @endif
@endsection

@section('content')
@if($urgent->count() > 0)
<div class="mb-8">
    <div class="flex items-center gap-2 mb-4 text-red-700 font-extrabold text-sm uppercase tracking-wider">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4 flex-shrink-0">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"/>
        </svg>
        <span>Pengumuman Penting</span>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($urgent as $p)
        <div class="bg-red-50/20 border border-red-200 rounded-xl p-6 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex justify-between items-start gap-4 mb-3">
                    <h4 class="text-base font-extrabold text-slate-900 leading-snug">{{ $p->judul }}</h4>
                    <x-badge variant="danger">URGENT</x-badge>
                </div>
                <p class="text-sm text-slate-650 leading-relaxed font-semibold mb-4">{{ Str::limit($p->konten, 160) }}</p>
            </div>
            <div class="flex justify-between items-center pt-3 border-t border-red-100 text-xs font-semibold text-slate-500">
                <span>{{ $p->pembuat->nama_lengkap }} · {{ $p->created_at->diffForHumans() }}</span>
                @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                <form method="POST" action="{{ route('pengumuman.destroy', $p) }}" onsubmit="return confirm('Hapus pengumuman ini?')">
                    @csrf @method('DELETE')
                    <button class="text-xs font-bold text-red-600 hover:text-red-700 bg-red-50 border border-red-100 hover:border-red-200 px-2 py-1 rounded transition">Hapus</button>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>
</div>
@endif

<x-card title="Pengumuman Umum">
    @if($normal->count() > 0)
        <div class="divide-y divide-slate-100">
            @foreach($normal as $p)
            <div class="py-5 first:pt-0 last:pb-0 hover:bg-slate-50/70 p-4 -mx-4 rounded-xl transition duration-150">
                <div class="flex justify-between items-start gap-4 mb-2">
                    <h4 class="text-base font-extrabold text-slate-900 leading-snug">{{ $p->judul }}</h4>
                    <div class="flex gap-3 items-center flex-shrink-0">
                        <span class="text-xs text-slate-400 font-semibold">{{ $p->created_at->diffForHumans() }}</span>
                        @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                        <form method="POST" action="{{ route('pengumuman.destroy', $p) }}" onsubmit="return confirm('Hapus pengumuman ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="text-slate-400 hover:text-rose-600 p-1 hover:bg-slate-100 rounded transition flex items-center justify-center" title="Hapus Pengumuman">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
                <p class="text-sm text-slate-650 leading-relaxed font-semibold mb-3">{{ Str::limit($p->konten, 220) }}</p>
                <div class="text-xs text-slate-400 font-semibold">
                    Oleh: <span class="text-slate-700 font-bold">{{ $p->pembuat->nama_lengkap }}</span>
                    @if($p->tampil_sampai)
                        · Berlaku s/d <span class="text-slate-700 font-bold">{{ \Carbon\Carbon::parse($p->tampil_sampai)->format('d M Y') }}</span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div class="pt-4">{{ $normal->links() }}</div>
    @else
        <x-empty-state title="Belum ada pengumuman" message="Belum ada pengumuman umum yang dipublikasikan saat ini." />
    @endif
</x-card>
@endsection
