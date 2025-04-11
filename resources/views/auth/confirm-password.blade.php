@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow bg-white rounded">
            <div class="py-3 px-3">
                <div class="mb-4">
                    {{ __('auth.confirm_password_message') }}
                </div>

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div>
                        <x-form.label for="password" :value="__('auth.password')" />

                        <x-form.input id="password" class="mt-1"
                                        type="password"
                                        name="password"
                                        required autocomplete="current-password"
                                        autofocus />
                    </div>

                    <div class="mt-4">
                        <x-button class="btn-outline-primary rounded-pill w-100 mb-2">
                            {{ __('auth.confirm') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
