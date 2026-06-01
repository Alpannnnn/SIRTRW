@props(['label', 'value', 'icon', 'color' => 'primary', 'trend' => null])

<div {{ $attributes->merge(['class' => 'stat-card']) }}>
    <div class="stat-card-icon {{ $color }}">
        {!! $icon !!}
    </div>
    <div class="stat-card-content">
        <div class="stat-card-value">{{ $value }}</div>
        <p class="stat-card-label">{{ $label }}</p>
        @if($trend === 'up')
            <div class="stat-card-trend up">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:12px;height:12px;display:inline;vertical-align:middle;"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 19.5l15-15m0 0H8.25m11.25 0v11.25" /></svg>
                Meningkat
            </div>
        @elseif($trend === 'down')
            <div class="stat-card-trend down">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:12px;height:12px;display:inline;vertical-align:middle;"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 4.5l-15 15m0 0h11.25m-11.25 0V8.25" /></svg>
                Menurun
            </div>
        @endif
    </div>
</div>
