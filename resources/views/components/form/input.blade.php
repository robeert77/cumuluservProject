<input
    id="{{ $name }}"
    name="{{ $name }}"
    type="{{ $type }}"
    value="{{ $value }}"

    @if ($type === 'checkbox' || $type === 'radio')
        @if ($checked)
            checked
       @endif
        {{ $attributes->merge(['class' => 'form-check-input']) }}
    @else
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'form-control']) }}
        @if ($required)
            required
       @endif
    @endif

    @if ($disabled) disabled @endif
>
