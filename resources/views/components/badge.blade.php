@props(['variant' => 'primary'])

@php
    $baseClasses = 'inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold border';
    
    $variantClass = [
        'pending' => 'bg-amber-50 text-amber-700 border-amber-200',
        'active' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
        'rejected' => 'bg-rose-50 text-rose-700 border-rose-200',
        'processing' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
        'primary' => 'bg-teal-50 text-teal-700 border-teal-200',
        'success' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
        'warning' => 'bg-amber-50 text-amber-700 border-amber-200',
        'danger' => 'bg-rose-50 text-rose-700 border-rose-200',
        'info' => 'bg-cyan-50 text-cyan-700 border-cyan-200',
        'muted' => 'bg-slate-100 text-slate-600 border-slate-200',
    ][$variant] ?? 'bg-teal-50 text-teal-700 border-teal-200';
@endphp

<span {{ $attributes->merge(['class' => "$baseClasses $variantClass"]) }}>
    {{ $slot }}
</span>
