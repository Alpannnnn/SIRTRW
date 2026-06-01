@extends('layouts.app')
@section('title', 'Detail Surat')
@section('breadcrumb') <a href="{{ route('surat.index') }}">Surat</a> <span class="separator">›</span> Detail @endsection

@section('content')
<div style="max-width:800px;margin:0 auto" class="flex-col gap-6">

{{-- Status Timeline --}}
<x-card title="Status Permohonan">
    <div class="flex items-center gap-2" style="padding:var(--space-4) 0;">
        @php
            $steps = [
                ['label'=>'Diajukan','status'=>'DIAJUKAN','done'=>true],
                ['label'=>'Disetujui RT','status'=>'DISETUJUI_RT','done'=>in_array($surat->status,['DISETUJUI_RT','DISETUJUI_RW','SELESAI'])],
                ['label'=>'Disetujui RW','status'=>'DISETUJUI_RW','done'=>in_array($surat->status,['DISETUJUI_RW','SELESAI'])],
                ['label'=>'Selesai','status'=>'SELESAI','done'=>$surat->status==='SELESAI'],
            ];
        @endphp
        @foreach($steps as $i => $step)
            <div class="flex items-center flex-1">
                <div style="
                    width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;
                    flex-shrink:0;font-size:0.75rem;font-weight:700;
                    background:{{ $step['done'] ? 'var(--color-success)' : ($surat->status==='DITOLAK' ? 'var(--color-danger-light)' : 'var(--color-surface)') }};
                    color:{{ $step['done'] ? 'white' : 'var(--color-text-muted)' }};
                    border:2px solid {{ $step['done'] ? 'var(--color-success)' : 'var(--color-border)' }};
                    ">{{ $step['done'] ? '✓' : ($i+1) }}</div>
                <div class="ml-2 flex-1">
                    <div class="text-xs font-semibold {{ $step['done'] ? 'text-success' : 'text-muted' }}">{{ $step['label'] }}</div>
                </div>
                @if(!$loop->last)
                    <div style="flex:1;height:2px;background:{{ $step['done'] ? 'var(--color-success)' : 'var(--color-border)' }};margin:0 var(--space-2);"></div>
                @endif
            </div>
        @endforeach
        @if($surat->status === 'DITOLAK')
            <div class="ml-4"><x-badge variant="danger">DITOLAK</x-badge></div>
        @endif
    </div>
</x-card>

{{-- Detail --}}
<x-card title="Detail Permohonan">
    <div class="grid grid-2 gap-4">
        <div>
            <div class="text-xs text-muted mb-1">Kode Verifikasi</div>
            <code style="font-size:0.9rem;background:var(--color-surface);padding:4px 10px;border-radius:6px;letter-spacing:0.1em;">{{ $surat->kode_verifikasi }}</code>
        </div>
        <div>
            <div class="text-xs text-muted mb-1">Jenis Surat</div>
            <x-badge variant="primary">{{ str_replace('_',' ',$surat->jenis_surat) }}</x-badge>
        </div>
        <div>
            <div class="text-xs text-muted mb-1">Pemohon</div>
            <div class="font-semibold">{{ $surat->pemohon->nama_lengkap }}</div>
            <div class="text-xs text-muted">RT {{ $surat->pemohon->rt_id }} · Blok {{ $surat->pemohon->blok_rumah }}</div>
        </div>
        <div>
            <div class="text-xs text-muted mb-1">Tanggal Pengajuan</div>
            <div>{{ $surat->created_at->format('d F Y, H:i') }}</div>
        </div>
    </div>

    <div class="mt-5">
        <div class="text-xs text-muted mb-2">Tujuan Pembuatan</div>
        <div style="background:var(--color-surface);padding:var(--space-4);border-radius:var(--radius-lg);font-size:0.9rem;line-height:1.7;color:var(--color-text-secondary)">
            {{ $surat->tujuan_pembuatan }}
        </div>
    </div>

    @if($surat->catatan_penolakan)
    <div class="mt-4">
        <div class="alert alert-error">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/></svg>
            <div><strong>Catatan Penolakan:</strong> {{ $surat->catatan_penolakan }}</div>
        </div>
    </div>
    @endif
</x-card>

{{-- Action Panel (Pengurus Only) --}}
@if((auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw()) && $surat->status !== 'DITOLAK' && $surat->status !== 'SELESAI')
<x-card title="Panel Tindakan">
    <div class="flex gap-3 flex-wrap" x-data="{ showReject: false }">
        @if(auth()->user()->isPengurusRt() && $surat->status === 'DIAJUKAN')
            <form method="POST" action="{{ route('surat.approve-rt', $surat) }}">
                @csrf
                <button class="btn btn-success">✓ Setujui (Tingkat RT)</button>
            </form>
        @endif

        @if(auth()->user()->isPengurusRw() && $surat->status === 'DISETUJUI_RT')
            <form method="POST" action="{{ route('surat.approve-rw', $surat) }}">
                @csrf
                <button class="btn btn-success">✓ Setujui & Selesaikan (Tingkat RW)</button>
            </form>
        @endif

        <button class="btn btn-danger" @click="showReject = !showReject">✕ Tolak Permohonan</button>

        <div x-show="showReject" x-transition class="mt-4" style="width:100%">
            <form method="POST" action="{{ route('surat.reject', $surat) }}">
                @csrf
                <x-textarea name="catatan_penolakan" label="Alasan Penolakan" placeholder="Jelaskan alasan penolakan..." rows="3" required="true" />
                <button type="submit" class="btn btn-danger">Konfirmasi Penolakan</button>
            </form>
        </div>
    </div>
</x-card>
@endif

</div>
@endsection

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
