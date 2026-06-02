@extends('layouts.app')
@section('title', 'Pengaduan Warga')

@section('actions')
    <a href="{{ route('aduan.create') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded-lg shadow-xs transition text-xs">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
        Buat Aduan
    </a>
@endsection

@section('content')
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center justify-between gap-4 flex-wrap">
        <h3 class="text-sm font-extrabold text-slate-900">Daftar Pengaduan</h3>
        <form method="GET" class="flex flex-wrap gap-2">
            <select name="kategori" class="text-xs font-semibold border border-slate-200 rounded-lg px-3 py-1.5 bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-teal-500 cursor-pointer" onchange="this.form.submit()">
                <option value="">Semua Kategori</option>
                @foreach(['KEAMANAN','FASILITAS','KEBERSIHAN','PERSELISIHAN'] as $k)
                    <option value="{{ $k }}" {{ request('kategori') === $k ? 'selected':'' }}>{{ $k }}</option>
                @endforeach
            </select>
            <select name="status" class="text-xs font-semibold border border-slate-200 rounded-lg px-3 py-1.5 bg-white text-slate-700 focus:outline-none focus:ring-2 focus:ring-teal-500 cursor-pointer" onchange="this.form.submit()">
                <option value="">Semua Status</option>
                <option value="DITERIMA" {{ request('status') === 'DITERIMA' ? 'selected':'' }}>Diterima</option>
                <option value="DIPROSES" {{ request('status') === 'DIPROSES' ? 'selected':'' }}>Diproses</option>
                <option value="SELESAI" {{ request('status') === 'SELESAI' ? 'selected':'' }}>Selesai</option>
            </select>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm">
            <thead>
                <tr class="border-b border-slate-100 bg-slate-50/50">
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Judul Aduan</th>
                    @if(!auth()->user()->isWarga())<th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Pelapor</th>@endif
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Kategori</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Status</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Tanggal</th>
                    <th class="text-left px-5 py-3 text-xs font-bold text-slate-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($aduan as $a)
                <tr class="hover:bg-slate-50/50 transition">
                    <td class="px-5 py-3.5">
                        <div class="text-sm font-semibold text-slate-900">{{ $a->judul }}</div>
                        <div class="text-xs text-slate-400 font-semibold mt-0.5">{{ Str::limit($a->deskripsi, 60) }}</div>
                    </td>
                    @if(!auth()->user()->isWarga())<td class="px-5 py-3.5 text-sm font-semibold text-slate-800">{{ $a->pelapor->nama_lengkap }}</td>@endif
                    <td class="px-5 py-3.5">
                        @php $kMap=['KEAMANAN'=>'danger','FASILITAS'=>'warning','KEBERSIHAN'=>'info','PERSELISIHAN'=>'muted']; @endphp
                        <x-badge variant="{{ $kMap[$a->kategori] ?? 'muted' }}">{{ $a->kategori }}</x-badge>
                    </td>
                    <td class="px-5 py-3.5">
                        @php $sMap=['DITERIMA'=>'pending','DIPROSES'=>'processing','SELESAI'=>'success']; @endphp
                        <x-badge variant="{{ $sMap[$a->status] ?? 'muted' }}">{{ $a->status }}</x-badge>
                    </td>
                    <td class="px-5 py-3.5 text-xs font-semibold text-slate-500 whitespace-nowrap">{{ $a->created_at->format('d M Y') }}</td>
                    <td class="px-5 py-3.5">
                        <a href="{{ route('aduan.show', $a) }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 bg-teal-50 hover:bg-teal-100 border border-teal-100 px-3 py-1.5 rounded-lg transition">Detail</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="px-5 py-12 text-center text-slate-400 text-sm font-semibold">Belum ada aduan yang masuk.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="px-5 py-4 border-t border-slate-100">{{ $aduan->links() }}</div>
</div>
@endsection
