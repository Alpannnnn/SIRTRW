@props(['title' => null, 'padding' => true])

<div {{ $attributes->merge(['class' => 'card']) }}>
    @if(isset($header))
        <div class="card-header">
            {{ $header }}
        </div>
    @elseif($title)
        <div class="card-header">
            <h3>{{ $title }}</h3>
        </div>
    @endif

    <div class="card-body {{ !$padding ? 'no-padding' : '' }}">
        {{ $slot }}
    </div>

    @if(isset($footer))
        <div class="card-footer">
            {{ $footer }}
        </div>
    @endif
</div>
