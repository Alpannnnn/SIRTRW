@extends('layouts.app')
@section('title', 'Verifikasi Warga')

@section('actions')
    <x-badge variant="warning" class="text-sm px-4 py-2">
        {{ $pending->total() }} Menunggu
    </x-badge>
@endsection

@section('content')
@if($pending->count() > 0)
<x-card>
    <x-slot name="header">
        <h3 class="text-base font-extrabold text-slate-900">Daftar Akun Menunggu Verifikasi</h3>
    </x-slot>

    <x-table>
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Blok / RT / RW</th>
                <th>No. WA</th>
                <th>Terdaftar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pending as $w)
            <tr>
                <td>
                    <div class="font-bold text-slate-900">{{ $w->nama_lengkap }}</div>
                </td>
                <td>
                    <code class="text-xs font-semibold bg-slate-100 text-slate-800 px-2 py-1 rounded border border-slate-200">{{ $w->nik }}</code>
                </td>
                <td class="text-slate-600 font-medium">Blok {{ $w->blok_rumah }} / RT {{ $w->rt_id }} / RW {{ $w->rw_id }}</td>
                <td class="text-slate-600 font-medium">{{ $w->no_telepon }}</td>
                <td class="text-slate-400 font-bold text-xs">{{ $w->created_at->diffForHumans() }}</td>
                <td>
                    <div class="flex gap-2">
                        <form method="POST" action="{{ route('verifikasi.approve', $w) }}">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-1.5 bg-teal-50 hover:bg-teal-100 text-teal-700 border border-teal-200 font-bold py-1.5 px-3 rounded-lg transition text-xs cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                                Setujui
                            </button>
                        </form>
                        <form method="POST" action="{{ route('verifikasi.suspend', $w) }}" onsubmit="return confirm('Tolak akun ini?')">
                            @csrf
                            <button type="submit" class="inline-flex items-center gap-1.5 bg-rose-50 hover:bg-rose-100 text-rose-700 border border-rose-200 font-bold py-1.5 px-3 rounded-lg transition text-xs cursor-pointer">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                                Tolak
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table>

    <div class="p-4">{{ $pending->links() }}</div>
</x-card>
@else
<x-card>
    <x-empty-state
        title="Semua Akun Sudah Diverifikasi"
        message="Tidak ada akun warga yang sedang menunggu verifikasi saat ini."
    />
</x-card>
@endif
@endsection
