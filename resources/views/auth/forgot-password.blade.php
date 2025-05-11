@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow card bg-white rounded py-4">
            <div class="card-header border-0">
                <div class="title-header">
                    <h5 class="font-weight-normal">{{ __('auth.forgot_password_message') }}</h5>
                </div>
            </div>
            <div class="pb-3 px-3">
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <x-auth-validation-errors class="mb-4" :errors="$errors" />


                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <div>
                        <x-form.label for="email" :value="__('auth.email')" />
                        <x-form.input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-button class="px-5" color="primary"> {{ __('auth.send_email') }}</x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
