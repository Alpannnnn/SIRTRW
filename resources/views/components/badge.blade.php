@props(['variant' => 'primary'])

@php
    $variantClass = [
        'pending' => 'badge-pending',
        'active' => 'badge-active',
        'rejected' => 'badge-rejected',
        'processing' => 'badge-processing',
        'primary' => 'badge-primary',
        'success' => 'badge-success',
        'warning' => 'badge-warning',
        'danger' => 'badge-danger',
        'info' => 'badge-info',
        'muted' => 'badge-muted',
    ][$variant] ?? 'badge-primary';
@endphp

<span {{ $attributes->merge(['class' => "badge $variantClass"]) }}>
    {{ $slot }}
</span>
