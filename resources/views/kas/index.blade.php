@extends('layouts.app')
@section('title', 'Semua Transaksi Kas')
@section('breadcrumb') <a href="{{ route('kas.dashboard') }}">Keuangan</a> <span class="separator">›</span> Riwayat Transaksi @endsection

@section('actions')
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <a href="{{ route('kas.create') }}" class="btn btn-primary btn-sm">+ Catat Transaksi</a>
    @endif
@endsection

@section('content')
<x-card>
    <x-slot name="header">
        <h3>Riwayat Transaksi Kas</h3>
        <form method="GET" class="flex gap-3">
            <select name="jenis" class="form-control" style="width:auto" onchange="this.form.submit()">
                <option value="">Semua Jenis</option>
                <option value="PEMASUKAN" {{ request('jenis')==='PEMASUKAN'?'selected':'' }}>Pemasukan</option>
                <option value="PENGELUARAN" {{ request('jenis')==='PENGELUARAN'?'selected':'' }}>Pengeluaran</option>
            </select>
            <select name="scope" class="form-control" style="width:auto" onchange="this.form.submit()">
                <option value="">RT & RW</option>
                <option value="RT" {{ request('scope')==='RT'?'selected':'' }}>RT</option>
                <option value="RW" {{ request('scope')==='RW'?'selected':'' }}>RW</option>
            </select>
        </form>
    </x-slot>

    <x-table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Jenis</th>
                <th>Scope</th>
                <th>Jumlah</th>
                <th>Dicatat Oleh</th>
                @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())<th>Aksi</th>@endif
            </tr>
        </thead>
        <tbody>
            @forelse($transaksi as $t)
            <tr>
                <td class="text-sm">{{ \Carbon\Carbon::parse($t->tanggal_transaksi)->format('d M Y') }}</td>
                <td>{{ $t->keterangan }}</td>
                <td><x-badge variant="{{ $t->jenis==='PEMASUKAN' ? 'success' : 'danger' }}">{{ $t->jenis }}</x-badge></td>
                <td><x-badge variant="muted">{{ $t->rt_rw_scope }}</x-badge></td>
                <td class="font-bold {{ $t->jenis==='PEMASUKAN' ? 'text-success' : 'text-danger' }}">
                    {{ $t->jenis==='PEMASUKAN' ? '+' : '-' }}Rp {{ number_format($t->jumlah,0,',','.') }}
                </td>
                <td class="text-sm text-muted">{{ $t->pencatat->nama_lengkap }}</td>
                @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                <td>
                    <form method="POST" action="{{ route('kas.destroy', $t) }}" onsubmit="return confirm('Hapus transaksi ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-ghost btn-sm text-danger">Hapus</button>
                    </form>
                </td>
                @endif
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-muted p-8">Belum ada data transaksi kas.</td></tr>
            @endforelse
        </tbody>
    </x-table>
    <div class="p-4">{{ $transaksi->links() }}</div>
</x-card>
@endsection
