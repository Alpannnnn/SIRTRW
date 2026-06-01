@props(['name', 'label', 'placeholder' => '', 'value' => null, 'rows' => 4, 'required' => false])

<div class="form-group">
    <label for="{{ $name }}" class="form-label">
        {{ $label }} @if($required) <span class="text-danger">*</span> @endif
    </label>
    
    <textarea 
        id="{{ $name }}" 
        name="{{ $name }}" 
        class="form-control @error($name) is-invalid @enderror" 
        placeholder="{{ $placeholder }}" 
        rows="{{ $rows }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes }}
    >{{ old($name, $value) }}</textarea>
    
    @error($name)
        <span class="form-error">{{ $message }}</span>
    @enderror
</div>
