@extends('layouts.app')
@section('title', 'Data Kependudukan')
@section('breadcrumb') Data Warga @endsection

@section('actions')
    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold border bg-emerald-50 text-emerald-700 border-emerald-200">{{ $stats['total_aktif'] }} Aktif</span>
    <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold border bg-amber-50 text-amber-700 border-amber-200">{{ $stats['total_pending'] }} Pending</span>
@endsection

@section('content')

{{-- Stat Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-teal-50 text-teal-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0Zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
        </div>
        <div>
            <div class="text-2xl font-extrabold text-slate-900">{{ $stats['total_semua'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Total Warga Terdaftar</div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <div class="text-2xl font-extrabold text-slate-900">{{ $stats['total_aktif'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Warga Aktif</div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-amber-50 text-amber-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        </div>
        <div>
            <div class="text-2xl font-extrabold text-slate-900">{{ $stats['total_pending'] }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Menunggu Verifikasi</div>
        </div>
    </div>
</div>

<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between gap-4 flex-wrap">
        <h3 class="text-sm font-extrabold text-slate-900">Daftar Warga</h3>
        <form method="GET" class="flex flex-wrap gap-2 items-center">
            <div class="relative">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 absolute left-3 top-1/2 -translate-y-1/2 text-slate-400"><path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"/></svg>
                <input type="text" name="search" class="text-xs font-semibold border border-slate-200 rounded-lg pl-8 pr-3 py-1.5 bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-teal-500 w-44" placeholder="Cari nama/NIK..." value="{{ request('search') }}">
            </div>
            <select name="rt" class="text-xs font-semibold border border-slate-200 rounded-lg px-3 py-1.5 bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-teal-500 cursor-pointer">
                <option value="">Semua RT</option>
                @foreach(['001','002','003','004','005'] as $rt)
                    <option value="{{ $rt }}" {{ request('rt') == $rt ? 'selected' : '' }}>RT {{ $rt }}</option>
                @endforeach
            </select>
            <select name="status" class="text-xs font-semibold border border-slate-200 rounded-lg px-3 py-1.5 bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-teal-500 cursor-pointer">
                <option value="">Semua Status</option>
                <option value="ACTIVE" {{ request('status') == 'ACTIVE' ? 'selected' : '' }}>Aktif</option>
                <option value="PENDING_VERIFICATION" {{ request('status') == 'PENDING_VERIFICATION' ? 'selected' : '' }}>Pending</option>
                <option value="SUSPENDED" {{ request('status') == 'SUSPENDED' ? 'selected' : '' }}>Ditangguhkan</option>
            </select>
            <button type="submit" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-1.5 px-3 rounded-lg shadow-xs transition text-xs cursor-pointer">Filter</button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-100 bg-slate-50/50">
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Nama Lengkap</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">NIK</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Blok / RT / RW</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">No. Telepon</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($warga as $w)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-5 py-3.5">
                        <div class="text-sm font-semibold text-slate-900">{{ $w->nama_lengkap }}</div>
                        <div class="text-xs text-slate-400 font-semibold mt-0.5">{{ str_replace('_', ' ', $w->role) }}</div>
                    </td>
                    <td class="px-5 py-3.5">
                        <code class="text-[11px] bg-slate-100 text-slate-700 font-mono px-2 py-0.5 rounded">{{ $w->nik }}</code>
                    </td>
                    <td class="px-5 py-3.5 text-sm font-semibold text-slate-600">{{ $w->blok_rumah }} / RT {{ $w->rt_id }} / RW {{ $w->rw_id }}</td>
                    <td class="px-5 py-3.5 text-sm font-semibold text-slate-600">{{ $w->no_telepon }}</td>
                    <td class="px-5 py-3.5">
                        @if($w->status_akun === 'ACTIVE')
                            <x-badge variant="active">Aktif</x-badge>
                        @elseif($w->status_akun === 'PENDING_VERIFICATION')
                            <x-badge variant="pending">Pending</x-badge>
                        @else
                            <x-badge variant="danger">Ditangguhkan</x-badge>
                        @endif
                    </td>
                    <td class="px-5 py-3.5">
                        <a href="{{ route('kependudukan.show', $w) }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 bg-teal-50 hover:bg-teal-100 border border-teal-100 px-3 py-1.5 rounded-lg transition">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-12 text-center text-slate-400 text-sm font-semibold">Tidak ada data warga ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-slate-100">{{ $warga->links() }}</div>
</div>
@endsection
