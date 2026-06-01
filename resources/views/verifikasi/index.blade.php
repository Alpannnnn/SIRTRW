@extends('layouts.app')
@section('title', 'Verifikasi Warga')

@section('actions')
    <span class="badge badge-warning" style="font-size:0.85rem;padding:0.5rem 1rem;">
        {{ $pending->total() }} Menunggu
    </span>
@endsection

@section('content')
@if($pending->count() > 0)
<x-card>
    <x-slot name="header">
        <h3>Daftar Akun Menunggu Verifikasi</h3>
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
                    <div class="font-semibold" style="color:var(--color-text-primary)">{{ $w->nama_lengkap }}</div>
                </td>
                <td><code style="font-size:0.8rem;background:var(--color-surface);padding:2px 6px;border-radius:4px;">{{ $w->nik }}</code></td>
                <td>Blok {{ $w->blok_rumah }} / RT {{ $w->rt_id }} / RW {{ $w->rw_id }}</td>
                <td>{{ $w->no_telepon }}</td>
                <td class="text-muted text-sm">{{ $w->created_at->diffForHumans() }}</td>
                <td>
                    <div class="flex gap-2">
                        <form method="POST" action="{{ route('verifikasi.approve', $w) }}">
                            @csrf
                            <button type="submit" class="btn btn-success btn-sm">✓ Setujui</button>
                        </form>
                        <form method="POST" action="{{ route('verifikasi.suspend', $w) }}" onsubmit="return confirm('Tolak akun ini?')">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">✕ Tolak</button>
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
