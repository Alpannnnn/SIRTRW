@extends('layouts.app')
@section('title', 'Detail Surat')
@section('breadcrumb') <a href="{{ route('surat.index') }}">Surat</a> <span class="mx-1.5 text-slate-300">/</span> <span class="text-slate-600 font-bold">Detail</span> @endsection

@section('content')
<div class="max-w-3xl mx-auto space-y-6">

    {{-- Status Timeline --}}
    <x-card title="Status Permohonan">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 py-4 flex-wrap">
            @php
                $steps = [
                    ['label'=>'Diajukan','status'=>'DIAJUKAN','done'=>true],
                    ['label'=>'Disetujui RT','status'=>'DISETUJUI_RT','done'=>in_array($surat->status,['DISETUJUI_RT','DISETUJUI_RW','SELESAI'])],
                    ['label'=>'Disetujui RW','status'=>'DISETUJUI_RW','done'=>in_array($surat->status,['DISETUJUI_RW','SELESAI'])],
                    ['label'=>'Selesai','status'=>'SELESAI','done'=>$surat->status==='SELESAI'],
                ];
            @endphp
            @foreach($steps as $i => $step)
                <div class="flex items-center flex-1 w-full sm:w-auto">
                    @if($step['done'])
                        <div class="w-8 h-8 rounded-full bg-teal-700 text-white flex items-center justify-center font-bold text-xs border-2 border-teal-700 flex-shrink-0 shadow-xs">
                            <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                            </svg>
                        </div>
                    @elseif($surat->status === 'DITOLAK')
                        <div class="w-8 h-8 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center font-bold text-xs border-2 border-rose-200 flex-shrink-0">
                            <svg class="w-3.5 h-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </div>
                    @else
                        <div class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 flex items-center justify-center font-bold text-xs border-2 border-slate-200 flex-shrink-0">
                            {{ $i + 1 }}
                        </div>
                    @endif
                    
                    <div class="ml-2.5 flex-1 min-w-[70px]">
                        <div class="text-xs font-bold uppercase tracking-wider {{ $step['done'] ? 'text-teal-700' : ($surat->status==='DITOLAK' ? 'text-rose-600' : 'text-slate-400') }}">{{ $step['label'] }}</div>
                    </div>
                    @if(!$loop->last)
                        <div class="hidden sm:block flex-1 h-0.5 mx-2 bg-slate-200 {{ $step['done'] ? 'bg-teal-700' : '' }}"></div>
                    @endif
                </div>
            @endforeach
            @if($surat->status === 'DITOLAK')
                <div class="ml-auto flex-shrink-0"><x-badge variant="danger">DITOLAK</x-badge></div>
            @endif
        </div>
    </x-card>

    {{-- Detail --}}
    <x-card title="Detail Permohonan">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 text-sm font-semibold mb-6">
            <div class="space-y-1">
                <div class="text-xs text-slate-400 font-bold uppercase tracking-wider">Kode Verifikasi</div>
                <code class="inline-block text-xs bg-slate-100 border border-slate-200 text-slate-700 font-mono py-1 px-2.5 rounded-lg tracking-widest font-bold select-all">{{ $surat->kode_verifikasi }}</code>
            </div>
            <div class="space-y-1">
                <div class="text-xs text-slate-400 font-bold uppercase tracking-wider">Jenis Surat</div>
                <div><x-badge variant="primary">{{ str_replace('_',' ',$surat->jenis_surat) }}</x-badge></div>
            </div>
            <div class="space-y-1">
                <div class="text-xs text-slate-400 font-bold uppercase tracking-wider">Pemohon</div>
                <div class="text-slate-800 font-extrabold">{{ $surat->pemohon->nama_lengkap }}</div>
                <div class="text-xs text-slate-500 font-semibold">RT {{ $surat->pemohon->rt_id }} · Blok {{ $surat->pemohon->blok_rumah }}</div>
            </div>
            <div class="space-y-1">
                <div class="text-xs text-slate-400 font-bold uppercase tracking-wider">Tanggal Pengajuan</div>
                <div class="text-slate-700 font-extrabold">{{ $surat->created_at->format('d F Y, H:i') }} WIB</div>
            </div>
        </div>

        <div class="pt-5 border-t border-slate-100">
            <div class="text-xs text-slate-400 font-bold uppercase tracking-wider mb-2">Tujuan Pembuatan</div>
            <div class="bg-slate-50 border border-slate-200 p-4 rounded-xl text-sm leading-relaxed text-slate-700 font-semibold">
                {{ $surat->tujuan_pembuatan }}
            </div>
        </div>

        @if($surat->catatan_penolakan)
        <div class="mt-5 border-t border-slate-100 pt-5">
            <div class="bg-rose-50 border border-rose-200 text-rose-800 rounded-xl p-4 flex gap-3 items-start text-sm font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5 text-rose-600 flex-shrink-0 mt-0.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 3.75h.008v.008H12v-.008Z"/>
                </svg>
                <div>
                    <strong class="text-rose-950 font-bold block mb-0.5">Permohonan Ditolak</strong>
                    <span>Catatan Penolakan: {{ $surat->catatan_penolakan }}</span>
                </div>
            </div>
        </div>
        @endif
    </x-card>

    {{-- Action Panel (Pengurus Only) --}}
    @if((auth()->user()->isPengurusRt() || auth()->user()->isPengurusRw()) && $surat->status !== 'DITOLAK' && $surat->status !== 'SELESAI')
    <x-card title="Panel Tindakan">
        <div class="flex flex-col gap-4 w-full" x-data="{ showReject: false }">
            <div class="flex gap-3 flex-wrap items-center">
                @if(auth()->user()->isPengurusRt() && $surat->status === 'DIAJUKAN')
                    <form method="POST" action="{{ route('surat.approve-rt', $surat) }}" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-2.5 px-5 rounded-lg text-sm shadow-xs transition cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                            Setujui (Tingkat RT)
                        </button>
                    </form>
                @endif

                @if(auth()->user()->isPengurusRw() && $surat->status === 'DISETUJUI_RT')
                    <form method="POST" action="{{ route('surat.approve-rw', $surat) }}" class="w-full sm:w-auto">
                        @csrf
                        <button type="submit" class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 bg-teal-700 hover:bg-teal-800 text-white font-bold py-2.5 px-5 rounded-lg text-sm shadow-xs transition cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                            Setujui &amp; Selesaikan (RW)
                        </button>
                    </form>
                @endif

                <button class="w-full sm:w-auto inline-flex items-center justify-center gap-1.5 bg-white border border-slate-300 hover:border-slate-400 hover:bg-slate-50 text-slate-700 font-bold py-2.5 px-5 rounded-lg text-sm transition cursor-pointer" @click="showReject = !showReject">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-4 h-4"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                    Tolak Permohonan
                </button>
            </div>

            <div x-show="showReject" x-transition class="mt-2 border-t border-slate-100 pt-4" style="display: none;">
                <form method="POST" action="{{ route('surat.reject', $surat) }}" class="space-y-4">
                    @csrf
                    <x-textarea name="catatan_penolakan" label="Alasan Penolakan" placeholder="Jelaskan alasan penolakan..." rows="3" required="true" />
                    <button type="submit" class="inline-flex items-center justify-center gap-1.5 bg-rose-600 hover:bg-rose-700 text-white font-bold py-2.5 px-5 rounded-lg text-sm shadow-xs transition cursor-pointer">
                        Konfirmasi Penolakan
                    </button>
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
