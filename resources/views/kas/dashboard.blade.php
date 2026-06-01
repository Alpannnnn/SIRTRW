@extends('layouts.app')
@section('title', 'Keuangan Kas')

@section('actions')
    @if(auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw())
        <a href="{{ route('kas.create') }}" class="btn btn-primary btn-sm">+ Catat Transaksi</a>
    @endif
    <a href="{{ route('kas.index') }}" class="btn btn-outline btn-sm">Semua Transaksi</a>
@endsection

@section('content')
<div class="grid grid-3 mb-6">
    <x-stat-card label="Total Pemasukan" value="Rp {{ number_format($totalPemasukan,0,',','.') }}"
        icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941"/></svg>'
        color="success" />
    <x-stat-card label="Total Pengeluaran" value="Rp {{ number_format($totalPengeluaran,0,',','.') }}"
        icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6 9 12.75l4.286-4.286a11.948 11.948 0 0 1 4.306 6.43l.776 2.898m0 0 3.182-5.511m-3.182 5.51-5.511-3.181"/></svg>'
        color="danger" />
    <x-stat-card label="Saldo Kas" value="Rp {{ number_format($saldo,0,',','.') }}"
        icon='<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3"/></svg>'
        color="{{ $saldo >= 0 ? 'primary' : 'danger' }}" />
</div>

<div class="grid grid-2">
    <x-card title="Grafik Kas 6 Bulan Terakhir">
        <canvas id="kasChart" height="220"></canvas>
    </x-card>

    <x-card title="Transaksi Terbaru">
        <div style="overflow-y:auto;max-height:360px">
            @foreach($recentTransaksi as $t)
            <div class="flex justify-between items-center py-3" style="border-bottom:1px solid var(--color-border)">
                <div>
                    <div class="text-sm font-semibold" style="color:var(--color-text-primary)">{{ Str::limit($t->keterangan, 45) }}</div>
                    <div class="text-xs text-muted">{{ \Carbon\Carbon::parse($t->tanggal_transaksi)->format('d M Y') }} · {{ $t->pencatat->nama_lengkap }}</div>
                </div>
                <div class="text-sm font-bold {{ $t->jenis === 'PEMASUKAN' ? 'text-success' : 'text-danger' }}">
                    {{ $t->jenis === 'PEMASUKAN' ? '+' : '-' }}Rp {{ number_format($t->jumlah,0,',','.') }}
                </div>
            </div>
            @endforeach
        </div>
    </x-card>
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
            { label: 'Pemasukan', data: chartData.map(d => d.pemasukan), backgroundColor: 'rgba(16,185,129,0.7)', borderColor: '#10b981', borderWidth: 1, borderRadius: 4 },
            { label: 'Pengeluaran', data: chartData.map(d => d.pengeluaran), backgroundColor: 'rgba(244,63,94,0.7)', borderColor: '#f43f5e', borderWidth: 1, borderRadius: 4 }
        ]
    },
    options: {
        responsive: true, maintainAspectRatio: false,
        plugins: { legend: { labels: { color: '#94a3b8', font: { family: 'Inter' } } } },
        scales: {
            x: { ticks: { color: '#64748b' }, grid: { color: 'rgba(148,163,184,0.1)' } },
            y: { ticks: { color: '#64748b', callback: v => 'Rp ' + (v/1000000).toFixed(1) + 'jt' }, grid: { color: 'rgba(148,163,184,0.1)' } }
        }
    }
});
</script>
@endpush
