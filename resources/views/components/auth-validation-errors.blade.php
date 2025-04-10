@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="fs-5 text-danger">
            {{ __('validation.something_went_wrong') }}
        </div>

        <ul class="mt-3 fs-6 text-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
