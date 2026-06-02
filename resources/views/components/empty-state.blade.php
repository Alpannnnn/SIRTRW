@props(['icon' => null, 'title', 'message'])

<div {{ $attributes->merge(['class' => 'flex flex-col items-center justify-center text-center p-8 bg-slate-50/30 rounded-xl border border-dashed border-slate-300']) }}>
    <div class="w-12 h-12 text-slate-400 mb-3">
        @if($icon)
            {!! $icon !!}
        @else
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12">
                <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
        @endif
    </div>
    
    <h4 class="text-base font-bold text-slate-800 mb-1">{{ $title }}</h4>
    <p class="text-sm text-slate-500 max-w-sm leading-relaxed">{{ $message }}</p>
    
    @if(isset($action))
        <div class="mt-4">
            {{ $action }}
        </div>
    @endif
</div>
