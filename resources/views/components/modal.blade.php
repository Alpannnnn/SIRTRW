@props(['id', 'title', 'size' => 'md'])

<div 
    x-data="{ open: false }" 
    x-show="open" 
    @keydown.escape.window="open = false"
    @open-modal-{{ $id }}.window="open = true"
    @close-modal-{{ $id }}.window="open = false"
    class="modal-overlay" 
    style="display: none;"
>
    <div 
        class="modal modal-{{ $size }}" 
        @click.away="open = false"
    >
        <div class="modal-header">
            <h3>{{ $title }}</h3>
            <button type="button" class="modal-close" @click="open = false">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" style="width:20px;height:20px;"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        
        <div class="modal-body">
            {{ $slot }}
        </div>
        
        @if(isset($footer))
            <div class="modal-footer">
                {{ $footer }}
            </div>
        @endif
    </div>
</div>
