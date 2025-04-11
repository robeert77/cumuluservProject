@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow bg-white rounded">
            <div class="py-3 px-3">
                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div>
                        <x-form.label for="email" :value="__('auth.email')" />

                        <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-form.label for="password" :value="__('auth.password')" />

                        <x-form.input id="password" class="block mt-1 w-full" type="password" name="password" required />
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
                            {{ __('auth.reset_password') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
