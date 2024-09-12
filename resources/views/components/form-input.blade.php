@php
    $id = $attributes->get('id');
    $value = $value ?? null;
    $type = $type ?? 'text';
    $label = $label ?? null;
    $min = $min ?? null;
    $step = $step ?? null;
    $options = $options ?? [];
    $checked = $checked ?? false;

    //     $id = $attributes->get('id');
    // $value = $attributes->get('value');
    // $type = $attributes->get('type');
    // $label = $attributes->get('label');
    // $min = $attributes->get('min');
    // $step = $attributes->get('step');
    // $options = $attributes->get('options');
    // $checked = $attributes->get('checked');
@endphp

<div class="mb-3">
    @if($label)
        <label for="{{ $id }}" class="form-label">{{ $label }}</label>
    @endif

    @if($type === 'text' || $type === 'number')
        <input type="{{ $type }}" id="{{ $id }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name, $value) }}" min="{{ $min }}" step="{{ $step }}">
    @elseif($type === 'file')
        <input type="file" id="{{ $id }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror">

    @elseif($type === 'select')
        <select id="{{ $id }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
            <option value="" {{ old($name, $value) == '' ? 'selected' : '' }}>Select {{ $label }}</option>
            @foreach($options as $optionValue => $display)
                <option value="{{ $optionValue }}" {{ old($name, $value) == $optionValue ? 'selected' : '' }}>
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

