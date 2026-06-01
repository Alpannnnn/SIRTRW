@props(['name', 'label', 'type' => 'text', 'placeholder' => '', 'value' => null, 'required' => false])

<div class="form-group">
    <label for="{{ $name }}" class="form-label">
        {{ $label }} @if($required) <span class="text-danger">*</span> @endif
    </label>
    
    <input 
        type="{{ $type }}" 
        id="{{ $name }}" 
        name="{{ $name }}" 
        class="form-control @error($name) is-invalid @enderror" 
        placeholder="{{ $placeholder }}" 
        value="{{ old($name, $value) }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes }}
    >
    
    @error($name)
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>
