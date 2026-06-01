@extends('layouts.app')
@section('title', 'Pengajuan Surat')

@section('actions')
    <a href="{{ route('surat.create') }}" class="btn btn-primary btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:16px;height:16px;"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
        Ajukan Surat
    </a>
@endsection

@section('content')
<x-card>
    <x-slot name="header">
        <h3>Daftar Pengajuan Surat</h3>
        <form method="GET" class="flex gap-3">
            <select name="jenis" class="form-control" style="width:auto" onchange="this.form.submit()">
                <option value="">Semua Jenis</option>
                <option value="DOMISILI" {{ request('jenis') === 'DOMISILI' ? 'selected':'' }}>Domisili</option>
                <option value="KTP" {{ request('jenis') === 'KTP' ? 'selected':'' }}>KTP</option>
                <option value="SKTM" {{ request('jenis') === 'SKTM' ? 'selected':'' }}>SKTM</option>
            </select>
            <select name="status" class="form-control" style="width:auto" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="DIAJUKAN" {{ request('status') === 'DIAJUKAN' ? 'selected':'' }}>Diajukan</option>
                <option value="DISETUJUI_RT" {{ request('status') === 'DISETUJUI_RT' ? 'selected':'' }}>Disetujui RT</option>
                <option value="SELESAI" {{ request('status') === 'SELESAI' ? 'selected':'' }}>Selesai</option>
                <option value="DITOLAK" {{ request('status') === 'DITOLAK' ? 'selected':'' }}>Ditolak</option>
            </select>
        </form>
    </x-slot>

    <x-table>
        <thead>
            <tr>
                <th>No. Verifikasi</th>
                @if(!auth()->user()->isWarga())<th>Pemohon</th>@endif
                <th>Jenis Surat</th>
                <th>Tujuan</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($surat as $s)
            <tr>
                <td><code style="font-size:0.75rem;background:var(--color-surface);padding:2px 6px;border-radius:4px;">{{ $s->kode_verifikasi }}</code></td>
                @if(!auth()->user()->isWarga())<td>{{ $s->pemohon->nama_lengkap }}</td>@endif
                <td>
                    <x-badge variant="primary">{{ str_replace('_', ' ', $s->jenis_surat) }}</x-badge>
                </td>
                <td class="text-sm">{{ Str::limit($s->tujuan_pembuatan, 50) }}</td>
                <td>
                    @php
                        $map = ['DIAJUKAN'=>'pending','DISETUJUI_RT'=>'info','DISETUJUI_RW'=>'info','SELESAI'=>'success','DITOLAK'=>'danger'];
                    @endphp
                    <x-badge variant="{{ $map[$s->status] ?? 'muted' }}">{{ str_replace('_',' ',$s->status) }}</x-badge>
                </td>
                <td class="text-sm text-muted">{{ $s->created_at->format('d M Y') }}</td>
                <td>
                    <a href="{{ route('surat.show', $s) }}" class="btn btn-outline btn-sm">Detail</a>
                </td>
            </tr>
            @empty
            <tr><td colspan="7" class="text-center text-muted p-8">Belum ada pengajuan surat.</td></tr>
            @endforelse
        </tbody>
    </x-table>
    <div class="p-4">{{ $surat->links() }}</div>
</x-card>
@endsection
