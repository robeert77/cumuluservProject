@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'fs-6 text-info']) }}>
        {{ $status }}
    </div>
@endif
