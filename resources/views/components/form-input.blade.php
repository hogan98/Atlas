<div class="mb-3">
    @if($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif

    @if($type === 'text' || $type === 'number')
        <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $value) }}" min="{{ $min }}" step="{{ $step }}"">
    @elseif($type === 'file')
        <input type="file" id="{{ $id }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror">

    @elseif($type === 'select')
        <select id="{{ $id }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
            <option value="" {{ old($name, $value) == '' ? 'selected' : '' }}>Select {{ $label }}</option>
            @foreach($options as $value => $display)
                <option value="{{ $value }}" {{ old($name, $value) == $value ? 'selected' : '' }}>
                    {{ $display }}
                </option>
            @endforeach
        </select>
        
    @elseif($type === 'checkbox')
        <input type="hidden" name="{{ $name }}" value="0">
        <input type="checkbox" id="{{ $id }}" name="{{ $name }}" class="checkbox" value="1" {{ $checked ? 'checked' : '' }}>
    @endif
    
    @error($name)
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

