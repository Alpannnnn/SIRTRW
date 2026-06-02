@props(['label', 'value', 'icon', 'color' => 'primary', 'trend' => null])

@php
    $colorClass = [
        'primary' => 'bg-teal-50 text-teal-700',
        'success' => 'bg-emerald-50 text-emerald-700',
        'warning' => 'bg-amber-50 text-amber-700',
        'danger' => 'bg-rose-50 text-rose-700',
        'info' => 'bg-cyan-50 text-cyan-700',
    ][$color] ?? 'bg-teal-50 text-teal-700';
@endphp

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl border border-slate-200 p-5 flex items-center gap-4 shadow-sm']) }}>
    <div class="w-12 h-12 rounded-lg flex items-center justify-center flex-shrink-0 {{ $colorClass }}">
        <div class="w-6 h-6">
            {!! $icon !!}
        </div>
    </div>
    <div class="flex-1 min-width-0">
        <div class="text-xl md:text-2xl font-extrabold text-slate-900 leading-tight">{{ $value }}</div>
        <p class="text-sm font-semibold text-slate-500 m-0 mt-0.5 truncate">{{ $label }}</p>
        @if($trend === 'up')
            <div class="text-xs font-bold text-emerald-600 mt-1 flex items-center gap-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" /></svg>
                <span>Meningkat</span>
            </div>
        @elseif($trend === 'down')
            <div class="text-xs font-bold text-rose-600 mt-1 flex items-center gap-0.5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-3.5 h-3.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 4.5l-15 15m0 0h11.25m-11.25 0V8.25" /></svg>
                <span>Menurun</span>
            </div>
        @endif
    </div>
</div>
