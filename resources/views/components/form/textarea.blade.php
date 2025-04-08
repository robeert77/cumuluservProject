<textarea
    id="{{ $name }}"
    name="{{ $name }}"
    rows="{{ $rows }}"
    {{ $required ? 'required' : '' }}
    {{ $disabled ? 'disabled' : '' }}
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => 'form-control']) }}
    >{{ old($name, $text) }}
</textarea>
