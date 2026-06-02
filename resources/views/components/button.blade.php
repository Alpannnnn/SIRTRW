@props(['type' => 'button', 'variant' => 'primary', 'size' => 'md', 'href' => null])

@php
    $baseClasses = 'inline-flex items-center justify-center font-semibold transition duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2';
    
    $variantClasses = [
        'primary' => 'bg-teal-700 hover:bg-teal-800 text-white focus:ring-teal-500 border border-transparent shadow-sm',
        'success' => 'bg-emerald-600 hover:bg-emerald-700 text-white focus:ring-emerald-500 border border-transparent shadow-sm',
        'warning' => 'bg-amber-600 hover:bg-amber-700 text-white focus:ring-amber-500 border border-transparent shadow-sm',
        'danger' => 'bg-rose-600 hover:bg-rose-700 text-white focus:ring-rose-500 border border-transparent shadow-sm',
        'outline' => 'bg-white border border-slate-300 hover:bg-slate-50 text-slate-700 focus:ring-teal-500 shadow-sm',
        'ghost' => 'bg-transparent hover:bg-slate-100 text-slate-600 focus:ring-slate-500 border border-transparent',
    ][$variant] ?? 'bg-teal-700 hover:bg-teal-800 text-white';
    
    $sizeClasses = [
        'sm' => 'px-3 py-1.5 text-xs rounded-md gap-1.5',
        'md' => 'px-4 py-2 text-sm rounded-lg gap-2',
        'lg' => 'px-5 py-2.5 text-base rounded-xl gap-2.5',
    ][$size] ?? 'px-4 py-2 text-sm rounded-lg gap-2';

    $classes = trim("$baseClasses $variantClasses $sizeClasses " . ($attributes->get('class') ?? ''));
@endphp

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
