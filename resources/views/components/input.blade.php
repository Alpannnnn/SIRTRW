@props(['name', 'label', 'type' => 'text', 'placeholder' => '', 'value' => null, 'required' => false])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-semibold text-slate-700 mb-1.5">
        {{ $label }} @if($required) <span class="text-rose-500">*</span> @endif
    </label>
    
    <input 
        type="{{ $type }}" 
        id="{{ $name }}" 
        name="{{ $name }}" 
        class="w-full bg-slate-50 border border-slate-300 rounded-lg py-2 px-3 text-sm text-slate-900 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-600 focus:bg-white transition duration-150 @error($name) border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 bg-rose-50/10 @enderror" 
        placeholder="{{ $placeholder }}" 
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes }}
    >
    
    @error($name)
        <span class="block text-xs text-rose-600 mt-1 font-medium">{{ $message }}</span>
    @enderror
</div>
