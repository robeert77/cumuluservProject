<nav class="navbar px-5 navbar-expand-lg py-2 navbar-light">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/sigla3.png') }}" alt="" width="100" height="44">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo03">
            @auth
            <ul class="navbar-nav">
                <li class="nav-item pe-0 pe-md-3">
                    <a class="nav-link active fs-5 pb-0" aria-current="page" href="{{ route('newCompany') }}">Adăugare client</a>
                </li>
                <li class="nav-item pe-0 pe-md-3">
                    <a class="nav-link active fs-5 pb-0" aria-current="page" href="{{ route('showAllProducts') }}">Produse</a>
                </li>
                <li class="nav-item pe-0 pe-md-3">
                    <a class="nav-link active fs-5 pb-0" aria-current="page" href="">Raport Global</a>
                </li>
            </ul>

            <!-- Settings Dropdown -->
          <div>
              <x-nav.dropdown align="right" width="48">
                  <x-slot name="trigger">
                      {{ Auth::user()->name }}
                  </x-slot>

                  <x-slot name="content">
                      <!-- Authentication -->
                      <form method="POST" action="{{ route('logout') }}">
                          @csrf

                          <x-nav.dropdown-link :href="route('logout')"
                                  onclick="event.preventDefault();
                                              this.closest('form').submit();" >
                              {{ __('Log Out') }}
                          </x-nav.dropdown-link>
                      </form>
                  </x-slot>
              </x-dropdown>
              @else
                  <ul class="navbar-nav">
                      <li class="nav-item pe-0 pe-md-3">
                          <a class="nav-link active fs-5 pb-0" aria-current="page" href="{{ route('login') }}">Log in</a>
                      </li>
                      <li class="nav-item pe-0 pe-md-3">
                          <a class="nav-link active fs-5 pb-0" aria-current="page" href="{{ route('register') }}">Register</a>
                      </li>
                  </ul>
              @endauth
        </div>
    </div>
</nav>
