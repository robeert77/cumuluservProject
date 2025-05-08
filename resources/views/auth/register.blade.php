@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow bg-white rounded">
            <div class="title-header pt-3 pb-1">
                <h3 class="font-weight-normal px-3">{{ __('auth.register') }}</h3>
            </div>
            <div class="pb-3 px-3">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-form.label for="name" :value="__('auth.name')" />

                        <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-form.label for="email" :value="__('auth.email')" />

                        <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-form.label for="password" :value="__('auth.password')" />

                        <x-form.input class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-form.label for="password_confirmation" :value="__('auth.confirm_password')" />

                        <x-form.input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-button class="btn-outline-primary rounded-pill w-100 mb-2">
                            {{ __('auth.log_in') }}
                        </x-button>

                        <a class="text-decoration-none" href="{{ route('login') }}">
                            {{ __('auth.already_user') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
