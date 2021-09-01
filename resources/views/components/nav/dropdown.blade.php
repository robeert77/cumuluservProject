<div class="dropdown">
    <button @class(['btn', 'dropdown-toggle' => Auth::check()])"btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        @auth
            {{ $trigger }}
        @else
            <a href="{{ route('login') }}" class="">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="">Register</a>
            @endif
        @endauth
    </button>
    @auth
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li> {{ $content }}</li>
        </ul>
    @endauth
</div>
