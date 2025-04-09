<select {{ $attributes->merge(['class' => 'form-select']) }} name="{{ $name }}" id="{{ $name }}">
    @if ($placeholder)
        <option value="">{{ $placeholder }}</option>
    @endif

    @foreach ($options as $key => $value)
        <option value="{{ $key }}" {{ $selected === $key ? 'selected' : '' }}>{{ $value }}</option>
    @endforeach
</select>
