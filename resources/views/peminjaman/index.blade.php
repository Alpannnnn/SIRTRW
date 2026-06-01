@extends('layouts.app')
@section('title', 'Peminjaman Barang')

@section('actions')
    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm">+ Ajukan Peminjaman</a>
@endsection

@section('content')
<x-card>
    <x-slot name="header">
        <h3>Daftar Peminjaman</h3>
        <form method="GET" class="flex gap-3">
            <select name="status" class="form-control" style="width:auto" onchange="this.form.submit()">
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
                @if(!auth()->user()->isWarga())<td>{{ $p->warga->nama_lengkap }}</td>@endif
                <td>
                    <div class="font-semibold text-sm" style="color:var(--color-text-primary)">{{ $p->barang->nama_barang }}</div>
                    <div class="text-xs text-muted">{{ $p->barang->kategori_barang }}</div>
                </td>
                <td>{{ $p->jumlah_pinjam }} unit</td>
                <td class="text-sm">{{ \Carbon\Carbon::parse($p->tanggal_mulai)->format('d M Y') }}</td>
                <td class="text-sm {{ \Carbon\Carbon::parse($p->tanggal_kembali_rencana)->isPast() && $p->status_peminjaman === 'ON_USE' ? 'text-danger font-bold' : '' }}">
                    {{ \Carbon\Carbon::parse($p->tanggal_kembali_rencana)->format('d M Y') }}
                    @if(\Carbon\Carbon::parse($p->tanggal_kembali_rencana)->isPast() && $p->status_peminjaman === 'ON_USE')
                        <x-badge variant="danger">Terlambat</x-badge>
                    @endif
                </td>
                <td>
                    @php $sMap=['MENUNGGU_PERSETUJUAN'=>'pending','ON_USE'=>'info','RETURNED'=>'success','REJECTED'=>'danger','APPROVED'=>'primary']; @endphp
                    <x-badge variant="{{ $sMap[$p->status_peminjaman] ?? 'muted' }}">{{ str_replace('_',' ',$p->status_peminjaman) }}</x-badge>
                </td>
                <td>
                    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
                        @if($p->status_peminjaman === 'MENUNGGU_PERSETUJUAN')
                            <div class="flex gap-1">
                                <form method="POST" action="{{ route('peminjaman.approve', $p) }}">
                                    @csrf <button class="btn btn-success btn-sm">✓</button>
                                </form>
                                <form method="POST" action="{{ route('peminjaman.reject', $p) }}" onsubmit="return confirm('Tolak?')">
                                    @csrf <button class="btn btn-danger btn-sm">✕</button>
                                </form>
                            </div>
                        @elseif($p->status_peminjaman === 'ON_USE')
                            <form method="POST" action="{{ route('peminjaman.return', $p) }}">
                                @csrf <button class="btn btn-outline btn-sm">Kembalikan</button>
                            </form>
                        @endif
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-muted p-8">Belum ada data peminjaman.</td></tr>
            @endforelse
        </tbody>
    </x-table>
    <div class="p-4">{{ $peminjaman->links() }}</div>
</x-card>
@endsection
