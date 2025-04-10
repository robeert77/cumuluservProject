<nav class="navbar navbar-expand-lg bg-dark" style="min-height: 80px;" data-bs-theme="dark">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand py-3" href="#">
            <img src="{{ asset('img/logo_cumuluserv.png') }}" alt="Cumuluserv Logo" width="220" height="59">
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarToggler">
            <ul class="navbar-nav mb-2 mb-lg-0">
                @auth
                    <li class="nav-item fs-5 pe-0 pe-md-3">
                        <a class="nav-link active" aria-current="page" href="{{ route('companies.index') }}">{{ __('companies.companies')  }}</a>
                    </li>
                    <li class="nav-item fs-5 pe-0 pe-md-3">
                        <a class="nav-link text-light" href="#">{{ __('Products')  }}</a>
                    </li>
                    <li class="nav-item fs-5 pe-0 pe-md-3">
                        <a class="nav-link text-light" href="#">{{ __('Reports')  }}</a>
                    </li>
                    <li class="nav-item fs-5 pe-0 pe-md-3">
                        <a class="nav-link text-light" href="#" role="button">
                            <span class="pe-2">
                                <x-icon name="person-circle" color="light"></x-icon>
                            </span>
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="{{ route('login') }}">{{ __('auth.log_in') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="{{ route('register') }}">{{ __('auth.register') }}</a>
                    </li>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle fs-5 text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ __('messages.language') }}
                    </a>
                    <ul class="dropdown-menu fs-5">
                        <li><a class="dropdown-item" href="{{ route('lang', 'en') }}">{{ __('messages.en') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('lang', 'ro') }}">{{ __('messages.ro') }}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
