@props(['title' => null, 'padding' => true])

<div {{ $attributes->merge(['class' => 'bg-white rounded-xl border border-slate-200 shadow-sm overflow-hidden']) }}>
    @if(isset($header))
        <div class="px-5 py-4 border-b border-slate-100 flex items-center justify-between gap-4 flex-wrap bg-slate-50/50">
            {{ $header }}
        </div>
    @elseif($title)
        <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
            <h3 class="text-base font-bold text-slate-900 m-0">{{ $title }}</h3>
        </div>
    @endif

    <div class="{{ $padding ? 'p-5' : '' }} text-slate-700">
        {{ $slot }}
    </div>

    @if(isset($footer))
        <div class="px-5 py-4 border-t border-slate-100 bg-slate-50/50">
            {{ $footer }}
        </div>
    @endif
</div>
