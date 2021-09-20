<x-app-layout>
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow bg-white rounded">
            <div class="py-3 px-3">
                <div class="mb-4">
                    {{ __('Ți-ai uitat parola? Nici o problema. Spune-ne adresa ta de email iar noi îți vom trimite un email cu un link prin care
                    îți vei putea reseta parola.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-label for="email" :value="__('Email')" />

                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-button class="btn-outline-primary rounded-pill w-100 mb-2">
                            {{ __('Trimite Email') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
