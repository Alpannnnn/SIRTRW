@props(['name', 'label', 'options' => [], 'selected' => null, 'required' => false, 'placeholder' => 'Pilih...'])

<div class="mb-4">
    <label for="{{ $name }}" class="block text-sm font-semibold text-slate-700 mb-1.5">
        {{ $label }} @if($required) <span class="text-rose-500">*</span> @endif
    </label>
    
    <div class="relative">
        <select 
            id="{{ $name }}" 
            name="{{ $name }}" 
            class="w-full bg-slate-50 border border-slate-300 rounded-lg py-2 px-3 pr-10 text-sm text-slate-900 focus:outline-none focus:ring-2 focus:ring-teal-500/20 focus:border-teal-600 focus:bg-white transition duration-150 appearance-none bg-[url('data:image/svg+xml,%3Csvg_xmlns=%22http://www.w3.org/2000/svg%22_fill=%22none%22_viewBox=%220_0_24_24%22_stroke-width=%222%22_stroke=%22%2364748b%22%3E%3Cpath_stroke-linecap=%22round%22_stroke-linejoin=%22round%22_d=%22m19.5_8.25-7.5_7.5-7.5-7.5%22/%3E%3C/svg%3E')] bg-[length:16px] bg-[right_12px_center] bg-no-repeat @error($name) border-rose-500 focus:ring-rose-500/20 focus:border-rose-500 bg-rose-50/10 @enderror" 
            {{ $required ? 'required' : '' }}
            {{ $attributes }}
        >
            @if($placeholder)
                <option value="">{{ $placeholder }}</option>
            @endif
            
            @if(count($options) > 0)
                @foreach($options as $value => $text)
                    <option value="{{ $value }}" {{ old($name, $selected) == $value ? 'selected' : '' }}>
                        {{ $text }}
                    </option>
                @endforeach
            @else
                {{ $slot }}
            @endif
        </select>
    </div>
    
    @error($name)
        <span class="block text-xs text-rose-600 mt-1 font-medium">{{ $message }}</span>
    @enderror
</div>
