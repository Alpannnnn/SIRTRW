@extends('layouts.app')
@section('title', 'Semua Transaksi Kas')
@section('breadcrumb') <a href="{{ route('kas.dashboard') }}" class="hover:text-teal-600 transition">Keuangan</a> @endsection

@section('actions')
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <a href="{{ route('kas.create') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded-lg shadow-xs transition text-xs">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            Catat Transaksi
        </a>
    @endif
@endsection

@section('content')
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between gap-4 flex-wrap">
        <h3 class="text-sm font-extrabold text-slate-900">Riwayat Transaksi Kas</h3>
        <form method="GET" class="flex flex-wrap gap-2">
            <select name="jenis" class="text-xs font-semibold border border-slate-200 rounded-lg px-3 py-1.5 bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-teal-500 cursor-pointer" onchange="this.form.submit()">
                <option value="">Semua Jenis</option>
                <option value="PEMASUKAN" {{ request('jenis')==='PEMASUKAN'?'selected':'' }}>Pemasukan</option>
                <option value="PENGELUARAN" {{ request('jenis')==='PENGELUARAN'?'selected':'' }}>Pengeluaran</option>
            </select>
            <select name="scope" class="text-xs font-semibold border border-slate-200 rounded-lg px-3 py-1.5 bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-teal-500 cursor-pointer" onchange="this.form.submit()">
                <option value="">RT &amp; RW</option>
                <option value="RT" {{ request('scope')==='RT'?'selected':'' }}>RT</option>
                <option value="RW" {{ request('scope')==='RW'?'selected':'' }}>RW</option>
            </select>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-100 bg-slate-50/50">
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Keterangan</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Jenis</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Lingkup</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Jumlah</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Dicatat Oleh</th>
                    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())<th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Aksi</th>@endif
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($transaksi as $t)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-5 py-3.5 text-xs font-semibold text-slate-500 whitespace-nowrap">{{ \Carbon\Carbon::parse($t->tanggal_transaksi)->format('d M Y') }}</td>
                    <td class="px-5 py-3.5 text-sm font-semibold text-slate-800">{{ $t->keterangan }}</td>
                    <td class="px-5 py-3.5">
                        <x-badge variant="{{ $t->jenis==='PEMASUKAN' ? 'success' : 'danger' }}">{{ $t->jenis }}</x-badge>
                    </td>
                    <td class="px-5 py-3.5">
                        <x-badge variant="muted">{{ $t->rt_rw_scope }}</x-badge>
                    </td>
                    <td class="px-5 py-3.5 font-bold text-sm {{ $t->jenis==='PEMASUKAN' ? 'text-emerald-600' : 'text-rose-600' }} whitespace-nowrap">
                        {{ $t->jenis==='PEMASUKAN' ? '+' : '-' }}Rp {{ number_format($t->jumlah,0,',','.') }}
                    </td>
                    <td class="px-5 py-3.5 text-xs font-semibold text-slate-500">{{ $t->pencatat->nama_lengkap }}</td>
                    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                    <td class="px-5 py-3.5">
                        <form method="POST" action="{{ route('kas.destroy', $t) }}" onsubmit="return confirm('Hapus transaksi ini?')">
                            @csrf @method('DELETE')
                            <button class="text-xs font-bold text-rose-600 hover:text-rose-800 bg-rose-50 hover:bg-rose-100 border border-rose-100 px-2.5 py-1 rounded-lg transition cursor-pointer">Hapus</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-5 py-12 text-center text-slate-400 text-sm font-semibold">Belum ada data transaksi kas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-slate-100">{{ $transaksi->links() }}</div>
</div>
@endsection
