@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow card bg-white rounded py-4">
            <div class="card-header border-0">
                <div class="title-header">
                    <h3 class="font-weight-normal">{{ __('auth.register') }}</h3>
                </div>
            </div>
            <div class="pb-3 px-3">
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        <x-form.label for="name" :value="__('auth.name')" />
                        <x-form.input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-form.label for="email" :value="__('auth.email')" />
                        <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                    </div>

                    <div class="mt-4">
                        <x-form.label for="password" :value="__('auth.password')" />
                        <x-form.input class="block mt-1 w-full"
                                        type="password"
                                        name="password"
                                        required autocomplete="new-password" />
                    </div>

                    <div class="mt-4">
                        <x-form.label for="password_confirmation" :value="__('auth.confirm_password')" />
                        <x-form.input id="password_confirmation" class="block mt-1 w-full"
                                        type="password"
                                        name="password_confirmation" required />
                    </div>

                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <a class="text-decoration-none p-0 btn link-secondary" href="{{ route('login') }}">
                            {{ __('auth.already_user') }}
                        </a>

                        <x-button class="px-5" color="primary">{{ __('auth.register') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
