@extends('layouts.app')
@section('title', 'Pengaduan Warga')

@section('actions')
    <a href="{{ route('aduan.create') }}" class="btn btn-primary btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
        Buat Aduan
    </a>
@endsection

@section('content')
<x-card>
    <x-slot name="header">
        <h3>Daftar Pengaduan</h3>
        <form method="GET" class="flex gap-3">
            <select name="kategori" class="form-control" style="width:auto" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                @foreach(['KEAMANAN','FASILITAS','KEBERSIHAN','PERSELISIHAN'] as $k)
                    <option value="{{ $k }}" {{ request('kategori') === $k ? 'selected':'' }}>{{ $k }}</option>
                @endforeach
            </select>
            <select name="status" class="form-control" style="width:auto" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="DITERIMA" {{ request('status') === 'DITERIMA' ? 'selected':'' }}>Diterima</option>
                <option value="DIPROSES" {{ request('status') === 'DIPROSES' ? 'selected':'' }}>Diproses</option>
                <option value="SELESAI" {{ request('status') === 'SELESAI' ? 'selected':'' }}>Selesai</option>
            </select>
        </form>
    </x-slot>

    <x-table>
        <thead>
            <tr>
                <th>Judul Aduan</th>
                @if(!auth()->user()->isWarga())<th>Pelapor</th>@endif
                <th>Kategori</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($aduan as $a)
            <tr>
                <td>
                    <div class="font-semibold" style="color:var(--color-text-primary)">{{ $a->judul }}</div>
                    <div class="text-xs text-muted">{{ Str::limit($a->deskripsi, 60) }}</div>
                </td>
                @if(!auth()->user()->isWarga())<td>{{ $a->pelapor->nama_lengkap }}</td>@endif
                <td>
                    @php $kMap=['KEAMANAN'=>'danger','FASILITAS'=>'warning','KEBERSIHAN'=>'info','PERSELISIHAN'=>'muted']; @endphp
                    <x-badge variant="{{ $kMap[$a->kategori] ?? 'muted' }}">{{ $a->kategori }}</x-badge>
                </td>
                <td>
                    @php $sMap=['DITERIMA'=>'pending','DIPROSES'=>'processing','SELESAI'=>'success']; @endphp
                    <x-badge variant="{{ $sMap[$a->status] ?? 'muted' }}">{{ $a->status }}</x-badge>
                </td>
                <td class="text-sm text-muted">{{ $a->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('aduan.show', $a) }}" class="btn btn-outline btn-sm">Detail</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="text-center text-muted p-8">Belum ada aduan yang masuk.</td></tr>
            @endforelse
        </tbody>
    </x-table>
    <div class="p-4">{{ $aduan->links() }}</div>
</x-card>
@endsection
