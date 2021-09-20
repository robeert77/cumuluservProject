<x-app-layout>
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow bg-white rounded">
            <div class="py-3 px-3">
                <div class="mb-4">
                    {{ __('Mulțumim pentru înregistrare! Înainte să începem, te rugăm verifică-ți adresa de email accesând link-ul pe care
                    ți l-am trimis. Dacă nu ai primit nici un email, îți vom retrimite emailul.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 fs-6 text-info">
                        {{ __('Un link nou de verificare a fost trimis la adresa de email precizată la înregistrare.') }}
                    </div>
                @endif

                <div class="mt-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-button class="btn-outline-primary rounded-pill w-100 mb-2 py-2">
                                {{ __('Retrimite Email') }}
                            </x-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <div class="">
                            <button type="submit" class="btn-outline-primary rounded-pill w-100 py-2">
                                {{ __('Log Out') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
