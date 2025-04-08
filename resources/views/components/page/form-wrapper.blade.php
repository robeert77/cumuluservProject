<div class="row d-flex justify-content-center my-5">
    <div class="col-lg-8 card bg-white rounded">
        <div class="title-header pt-4 d-flex">
            <a href="{{ $back ?? url()->previous() }}" class="px-2 pt-1 btn" data-bs-toggle="tooltip" title="{{ __('Back') }}">
                <x-icon name="chevron-left" color="secondary" size="5"></x-icon>
            </a>
            <h3 class="font-weight-normal px-2 m-0">{{ __($title) }}</h3>
        </div>

        <hr class="my-3">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>{{ __('Whoops! Something went wrong.') }}</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="pb-3 px-3">
           {{ $slot }}
        </div>
    </div>
</div>
