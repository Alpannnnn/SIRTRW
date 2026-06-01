@extends('layouts.app')
@section('title', 'Data Kependudukan')
@section('breadcrumb') Data Warga @endsection

@section('actions')
    <span class="badge badge-success">{{ $stats['total_aktif'] }} Aktif</span>
    <span class="badge badge-warning">{{ $stats['total_pending'] }} Pending</span>
@endsection

@section('content')
<div class="grid grid-3 mb-6">
    <x-stat-card label="Total Warga Terdaftar" value="{{ $stats['total_semua'] }}"
        icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0Zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>'
        color="primary" />
    <x-stat-card label="Warga Aktif" value="{{ $stats['total_aktif'] }}"
        icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
        color="success" />
    <x-stat-card label="Menunggu Verifikasi" value="{{ $stats['total_pending'] }}"
        icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>'
        color="warning" />
</div>

<x-card>
    <x-slot name="header">
        <h3>Daftar Warga</h3>
        <div class="search-bar" style="margin:0">
            <form method="GET" class="flex gap-3 items-center">
                <div class="search-input-wrapper">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                    <input type="text" name="search" class="form-control" placeholder="Cari nama/NIK..." value="{{ request('search') }}">
                </div>
                <select name="rt" class="form-control" style="width:auto">
                    <option value="">Semua RT</option>
                    @foreach(['001','002','003','004','005'] as $rt)
                        <option value="{{ $rt }}" {{ request('rt') == $rt ? 'selected' : '' }}>RT {{ $rt }}</option>
                    @endforeach
                </select>
                <select name="status" class="form-control" style="width:auto">
                    <option value="">Semua Status</option>
                    <option value="ACTIVE" {{ request('status') == 'ACTIVE' ? 'selected' : '' }}>Aktif</option>
                    <option value="PENDING_VERIFICATION" {{ request('status') == 'PENDING_VERIFICATION' ? 'selected' : '' }}>Pending</option>
                    <option value="SUSPENDED" {{ request('status') == 'SUSPENDED' ? 'selected' : '' }}>Ditangguhkan</option>
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Filter</button>
            </form>
        </div>
    </x-slot>

    <x-table>
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>NIK</th>
                <th>Blok / RT / RW</th>
                <th>No. Telepon</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($warga as $w)
            <tr>
                <td>
                    <div class="font-semibold" style="color:var(--color-text-primary)">{{ $w->nama_lengkap }}</div>
                    <div class="text-xs text-muted">{{ str_replace('_', ' ', $w->role) }}</div>
                </td>
                <td><code style="font-size:0.8rem;background:var(--color-surface);padding:2px 6px;border-radius:4px;">{{ $w->nik }}</code></td>
                <td>{{ $w->blok_rumah }} / RT {{ $w->rt_id }} / RW {{ $w->rw_id }}</td>
                <td>{{ $w->no_telepon }}</td>
                <td>
                    @if($w->status_akun === 'ACTIVE')
                        <x-badge variant="active">Aktif</x-badge>
                    @elseif($w->status_akun === 'PENDING_VERIFICATION')
                        <x-badge variant="pending">Pending</x-badge>
                    @else
                        <x-badge variant="danger">Ditangguhkan</x-badge>
                    @endif
                </td>
                <td>
                    <a href="{{ route('kependudukan.show', $w) }}" class="btn btn-outline btn-sm">Detail</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center text-muted p-8">Tidak ada data warga ditemukan.</td>
            </tr>
            @endforelse
        </tbody>
    </x-table>
    <div class="p-4">{{ $warga->links() }}</div>
</x-card>
@endsection
