@extends('layouts.app')
@section('title', 'Peminjaman Barang')

@section('actions')
    <a href="{{ route('peminjaman.create') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded-lg shadow-xs transition text-sm cursor-pointer">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
        </svg>
        Ajukan Peminjaman
    </a>
@endsection

@section('content')
<x-card>
    <x-slot name="header">
        <h3 class="text-sm font-extrabold text-slate-900">Daftar Peminjaman</h3>
        <form method="GET" class="w-full sm:w-auto mt-2 sm:mt-0">
            <select name="status" class="w-full sm:w-48 bg-slate-50 border border-slate-350 rounded-lg py-2 pl-3 pr-10 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-700 focus:bg-white transition appearance-none bg-[url('data:image/svg+xml,%3Csvg_xmlns=%22http://www.w3.org/2000/svg%22_fill=%22none%22_viewBox=%220_0_24_24%22_stroke-width=%222%22_stroke=%22%2364748b%22%3E%3Cpath_stroke-linecap=%22round%22_stroke-linejoin=%22round%22_d=%22m19.5_8.25-7.5_7.5-7.5-7.5%22/%3E%3C/svg%3E')] bg-[length:14px] bg-[right_12px_center] bg-no-repeat" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="MENUNGGU_PERSETUJUAN" {{ request('status')==='MENUNGGU_PERSETUJUAN'?'selected':'' }}>Menunggu</option>
                <option value="ON_USE" {{ request('status')==='ON_USE'?'selected':'' }}>Sedang Dipinjam</option>
                <option value="RETURNED" {{ request('status')==='RETURNED'?'selected':'' }}>Dikembalikan</option>
                <option value="REJECTED" {{ request('status')==='REJECTED'?'selected':'' }}>Ditolak</option>
            </select>
        </form>
    </x-slot>

    <x-table>
        <thead>
            <tr>
                @if(!auth()->user()->isWarga())<th>Peminjam</th>@endif
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Tanggal Pinjam</th>
                <th>Rencana Kembali</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjaman as $p)
            <tr>
                @if(!auth()->user()->isWarga())
                <td class="font-bold text-slate-800">{{ $p->warga->nama_lengkap }}</td>
                @endif
                <td>
                    <div class="font-extrabold text-sm text-slate-900 leading-snug">{{ $p->barang->nama_barang }}</div>
                    <div class="text-[10px] text-slate-400 font-bold uppercase tracking-wider mt-0.5">{{ $p->barang->kategori_barang }}</div>
                </td>
                <td class="font-bold text-slate-800 text-sm">{{ $p->jumlah_pinjam }} unit</td>
                <td class="text-sm font-semibold text-slate-600">{{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M Y') }}</td>
                <td class="text-sm font-semibold text-slate-600">
                    <span class="{{ \Carbon\Carbon::parse($p->tanggal_kembali_rencana)->isPast() && $p->status_peminjaman === 'ON_USE' ? 'text-red-650 font-bold' : '' }}">
                        {{ \Carbon\Carbon::parse($p->tanggal_kembali_rencana)->format('d M Y') }}
                    </span>
                    @if(\Carbon\Carbon::parse($p->tanggal_kembali_rencana)->isPast() && $p->status_peminjaman === 'ON_USE')
                        <span class="inline-block ml-1"><x-badge variant="danger">Terlambat</x-badge></span>
                    @endif
                </td>
                <td>
                    @php $sMap=['MENUNGGU_PERSETUJUAN'=>'warning','ON_USE'=>'info','RETURNED'=>'muted','REJECTED'=>'danger','APPROVED'=>'primary']; @endphp
                    <x-badge variant="{{ $sMap[$p->status_peminjaman] ?? 'muted' }}">{{ str_replace('_',' ',$p->status_peminjaman) }}</x-badge>
                </td>
                <td>
                    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                        @if($p->status_peminjaman === 'MENUNGGU_PERSETUJUAN')
                            <div class="flex items-center gap-1.5">
                                <form method="POST" action="{{ route('peminjaman.approve', $p) }}">
                                    @csrf 
                                    <button type="submit" class="inline-flex items-center justify-center bg-teal-50 hover:bg-teal-100 border border-teal-200 text-teal-700 font-bold p-1.5 rounded-lg transition cursor-pointer" title="Setujui Peminjaman">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                                    </button>
                                </form>
                                <form method="POST" action="{{ route('peminjaman.reject', $p) }}" onsubmit="return confirm('Tolak permohonan peminjaman ini?')">
                                    @csrf 
                                    <button type="submit" class="inline-flex items-center justify-center bg-rose-50 hover:bg-rose-100 border border-rose-200 text-rose-600 font-bold p-1.5 rounded-lg transition cursor-pointer" title="Tolak Peminjaman">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                                    </button>
                                </form>
                            </div>
                        @elseif($p->status_peminjaman === 'ON_USE')
                            <form method="POST" action="{{ route('peminjaman.return', $p) }}">
                                @csrf 
                                <button type="submit" class="inline-flex items-center justify-center border border-slate-350 hover:border-teal-700 hover:bg-teal-50 text-slate-700 hover:text-teal-800 font-bold py-1.5 px-3 rounded-lg text-xs transition cursor-pointer">Kembalikan</button>
                            </form>
                        @endif
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-slate-400 font-semibold p-8">Belum ada data peminjaman.</td></tr>
            @endforelse
        </tbody>
    </x-table>
    <div class="p-4">{{ $peminjaman->links() }}</div>
</x-card>
@endsection
