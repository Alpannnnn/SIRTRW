@extends('layouts.app')
@section('title', 'Keuangan Kas')

@section('actions')
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <a href="{{ route('kas.create') }}" class="inline-flex items-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-2 px-4 rounded-lg shadow-xs transition text-xs">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            Catat Transaksi
        </a>
    @endif
    <a href="{{ route('kas.index') }}" class="inline-flex items-center gap-1.5 bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 font-bold py-2 px-4 rounded-lg shadow-xs transition text-xs">
        Semua Transaksi
    </a>
@endsection

@section('content')

{{-- Stat Cards --}}
<div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-6">
    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-emerald-50 text-emerald-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"/></svg>
        </div>
        <div>
            <div class="text-xl font-extrabold text-slate-900">Rp {{ number_format($totalPemasukan,0,',','.') }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Total Pemasukan</div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 bg-rose-50 text-rose-700 rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181"/></svg>
        </div>
        <div>
            <div class="text-xl font-extrabold text-slate-900">Rp {{ number_format($totalPengeluaran,0,',','.') }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Total Pengeluaran</div>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-xs">
        <div class="w-12 h-12 {{ $saldo >= 0 ? 'bg-teal-50 text-teal-700' : 'bg-rose-50 text-rose-700' }} rounded-lg flex items-center justify-center flex-shrink-0">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3"/></svg>
        </div>
        <div>
            <div class="text-xl font-extrabold {{ $saldo >= 0 ? 'text-teal-700' : 'text-rose-700' }}">Rp {{ number_format($saldo,0,',','.') }}</div>
            <div class="text-xs font-bold text-slate-500 mt-0.5 uppercase tracking-wider">Saldo Kas</div>
        </div>
    </div>
</div>

{{-- Chart & Recent Transactions --}}
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex items-center gap-2.5">
            <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v5.25c0 .621-.504 1.125-1.125 1.125h-2.25A1.125 1.125 0 0 1 3 18.375v-5.25ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125v-9.75ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v14.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z" /></svg>
            <h3 class="text-sm font-extrabold text-slate-900">Grafik Kas 6 Bulan Terakhir</h3>
        </div>
        <div class="p-5 flex-1 min-h-[260px]">
            <canvas id="kasChart" height="220"></canvas>
        </div>
    </div>

    <div class="bg-white rounded-xl border border-slate-200 shadow-xs flex flex-col overflow-hidden">
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center gap-4">
            <div class="flex items-center gap-2.5">
                <svg class="w-5 h-5 text-teal-700 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8.25 6.75h12M8.25 12h12m-12 5.25h12M3.75 6.75h.007v.008H3.75V6.75Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0ZM3.75 12h.007v.008H3.75V12Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm-.375 5.25h.007v.008H3.75v-.008Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" /></svg>
                <h3 class="text-sm font-extrabold text-slate-900">Transaksi Terbaru</h3>
            </div>
            <a href="{{ route('kas.index') }}" class="text-xs font-bold text-teal-700 hover:text-teal-800 transition">Lihat Semua</a>
        </div>
        <div class="p-5 space-y-1 overflow-y-auto max-h-[360px]">
            @forelse($recentTransaksi as $t)
            <div class="flex justify-between items-center py-3 border-b border-slate-100 last:border-0 last:pb-0">
                <div>
                    <div class="text-sm font-semibold text-slate-900">{{ Str::limit($t->keterangan, 45) }}</div>
                    <div class="text-xs text-slate-400 font-semibold mt-0.5">{{ \Carbon\Carbon::parse($t->tanggal_transaksi)->format('d M Y') }} · {{ $t->pencatat->nama_lengkap }}</div>
                </div>
                <div class="text-sm font-bold {{ $t->jenis === 'PEMASUKAN' ? 'text-emerald-600' : 'text-rose-600' }} flex-shrink-0 ml-4">
                    {{ $t->jenis === 'PEMASUKAN' ? '+' : '-' }}Rp {{ number_format($t->jumlah,0,',','.') }}
                </div>
            </div>
            @empty
            <div class="text-center py-8 text-slate-400">
                <p class="text-xs font-semibold">Belum ada transaksi tercatat.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
const ctx = document.getElementById('kasChart').getContext('2d');
const chartData = @json($chartData);
new Chart(ctx, {
    type: 'bar',
    data: {
        labels: chartData.map(d => d.label),
        datasets: [
            { label: 'Pemasukan', data: chartData.map(d => d.pemasukan), backgroundColor: '#0f766e', hoverBackgroundColor: '#0d9488', borderRadius: 4 },
            { label: 'Pengeluaran', data: chartData.map(d => d.pengeluaran), backgroundColor: '#f43f5e', hoverBackgroundColor: '#e11d48', borderRadius: 4 }
        ]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        plugins: { legend: { labels: { color: '#334155', font: { family: 'Inter', size: 11, weight: 'bold' } } } },
        scales: {
            x: { ticks: { color: '#475569', font: { family: 'Inter', size: 11, weight: 'bold' } }, grid: { color: 'rgba(148,163,184,0.06)' } },
            y: { ticks: { color: '#475569', font: { family: 'Inter', size: 11, weight: 'bold' }, callback: v => 'Rp ' + (v/1000000).toFixed(1) + 'jt' }, grid: { color: 'rgba(148,163,184,0.06)' } }
        }
    }
});
</script>
@endpush
