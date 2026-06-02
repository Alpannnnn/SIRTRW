@extends('layouts.app')
@section('title', 'Pengajuan Surat')

@section('actions')
    <a href="{{ route('surat.create') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded-lg shadow-xs transition text-xs">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
        Ajukan Surat
    </a>
@endsection

@section('content')
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between gap-4 flex-wrap">
        <h3 class="text-sm font-extrabold text-slate-900">Daftar Pengajuan Surat</h3>
        <form method="GET" class="flex flex-wrap gap-2">
            <select name="jenis" class="text-xs font-semibold border border-slate-200 rounded-lg px-3 py-1.5 bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-teal-500 cursor-pointer" onchange="this.form.submit()">
                <option value="">Semua Jenis</option>
                <option value="DOMISILI" {{ request('jenis') === 'DOMISILI' ? 'selected':'' }}>Domisili</option>
                <option value="KTP" {{ request('jenis') === 'KTP' ? 'selected':'' }}>KTP</option>
                <option value="SKTM" {{ request('jenis') === 'SKTM' ? 'selected':'' }}>SKTM</option>
            </select>
            <select name="status" class="text-xs font-semibold border border-slate-200 rounded-lg px-3 py-1.5 bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-teal-500 cursor-pointer" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="DIAJUKAN" {{ request('status') === 'DIAJUKAN' ? 'selected':'' }}>Diajukan</option>
                <option value="DISETUJUI_RT" {{ request('status') === 'DISETUJUI_RT' ? 'selected':'' }}>Disetujui RT</option>
                <option value="SELESAI" {{ request('status') === 'SELESAI' ? 'selected':'' }}>Selesai</option>
                <option value="DITOLAK" {{ request('status') === 'DITOLAK' ? 'selected':'' }}>Ditolak</option>
            </select>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-100 bg-slate-50/50">
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">No. Verifikasi</th>
                    @if(!auth()->user()->isWarga())<th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Pemohon</th>@endif
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Jenis Surat</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Tujuan</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($surat as $s)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-5 py-3.5">
                        <code class="text-[11px] bg-slate-100 text-slate-700 font-mono px-2 py-0.5 rounded">{{ $s->kode_verifikasi }}</code>
                    </td>
                    @if(!auth()->user()->isWarga())<td class="px-5 py-3.5 text-sm font-semibold text-slate-800">{{ $s->pemohon->nama_lengkap }}</td>@endif
                    <td class="px-5 py-3.5">
                        <x-badge variant="primary">{{ str_replace('_', ' ', $s->jenis_surat) }}</x-badge>
                    </td>
                    <td class="px-5 py-3.5 text-xs text-slate-500 font-semibold">{{ Str::limit($s->tujuan_pembuatan, 50) }}</td>
                    <td class="px-5 py-3.5">
                        @php
                            $map = ['DIAJUKAN'=>'pending','DISETUJUI_RT'=>'info','DISETUJUI_RW'=>'info','SELESAI'=>'success','DITOLAK'=>'danger'];
                        @endphp
                        <x-badge variant="{{ $map[$s->status] ?? 'muted' }}">{{ str_replace('_',' ',$s->status) }}</x-badge>
                    </td>
                    <td class="px-5 py-3.5 text-xs font-semibold text-slate-500 whitespace-nowrap">{{ $s->created_at->format('d M Y') }}</td>
                    <td class="px-5 py-3.5">
                        <a href="{{ route('surat.show', $s) }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 bg-teal-50 hover:bg-teal-100 border border-teal-100 px-3 py-1.5 rounded-lg transition">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-5 py-12 text-center text-slate-400 text-sm font-semibold">Belum ada pengajuan surat.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-slate-100">{{ $surat->links() }}</div>
</div>
@endsection
