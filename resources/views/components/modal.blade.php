@props(['id', 'title', 'size' => 'md'])

@php
    $sizeClass = [
        'sm' => 'max-w-md',
        'md' => 'max-w-lg',
        'lg' => 'max-w-2xl',
        'xl' => 'max-w-5xl',
    ][$size] ?? 'max-w-lg';
@endphp

<div 
    x-data="{ open: false }" 
    x-show="open" 
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    @keydown.escape.window="open = false"
    @open-modal-{{ $id }}.window="open = true"
    @close-modal-{{ $id }}.window="open = false"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/60 backdrop-blur-xs" 
    style="display: none;"
>
    <div 
        class="bg-white rounded-xl shadow-xl border border-slate-200 overflow-hidden w-full flex flex-col max-h-[90vh] {{ $sizeClass }}"
        @click.away="open = false"
        x-show="open"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
    >
        <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between bg-slate-50/50">
            <h3 class="text-base font-bold text-slate-900 m-0">{{ $title }}</h3>
            <button type="button" class="text-slate-400 hover:text-slate-600 hover:bg-slate-100 rounded-lg p-1.5 transition duration-150" @click="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        
        <div class="px-6 py-5 overflow-y-auto text-sm text-slate-700">
            {{ $slot }}
        </div>
        
        @if(isset($footer))
            <div class="px-6 py-4 border-t border-slate-100 bg-slate-50/50 flex justify-end gap-3">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
