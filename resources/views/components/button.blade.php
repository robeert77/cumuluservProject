<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'rounded-3 btn ' . ($outline ? 'btn-outline-' : 'btn-') . $color
    ]) }}
>
    {{ $slot }}
</button>
