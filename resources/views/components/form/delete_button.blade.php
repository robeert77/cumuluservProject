<form action="{{ $route }}" method="POST"
      onsubmit="return confirm({{ $confirmationMessage }});">
    @csrf
    @method('DELETE')

    <input type="hidden" name="redirect_url" value="{{ url()->full() }}">

    <x-button type="submit" data-bs-toggle="tooltip" title="{{ __('messages.delete') }}">
        <x-icon name="trash3" size="5" color="danger"></x-icon>
    </x-button>
</form>
