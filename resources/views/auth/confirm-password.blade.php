<x-app-layout>
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow bg-white rounded">
            <div class="py-3 px-3">
                <div class="mb-4">
                    {{ __('Aceasta este o acțiune ireversibilă și are nevoie de confirmarea parolei dumneavoastră!') }}
                </div>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div>
                        <x-label for="password" :value="__('Parolă')" />

                        <x-input id="password" class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password" />
                    </div>

                    <div class="mt-4">
                        <x-button class="btn-outline-primary rounded-pill w-100 mb-2">
                            {{ __('Confirmă') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
