@props(['type' => 'button', 'variant' => 'primary', 'size' => 'md', 'href' => null])

@php
    $baseClasses = 'btn';
    $variantClasses = [
        'primary' => 'btn-primary',
        'success' => 'btn-success',
        'warning' => 'btn-warning',
        'danger' => 'btn-danger',
        'outline' => 'btn-outline',
        'ghost' => 'btn-ghost',
    ][$variant] ?? 'btn-primary';
    
    $sizeClasses = [
        'sm' => 'btn-sm',
        'md' => '',
        'lg' => 'btn-lg',
    ][$size] ?? '';

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
