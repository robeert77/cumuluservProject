@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow bg-white rounded">
            <div class="py-3 px-3">
                <div class="mb-4">
                    {{ __('auth.thank_you_for_registering') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 fs-6 text-info">
                        {{ __('auth.verification_link_send') }}
                    </div>
                @endif

                <div class="mt-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf

                        <div>
                            <x-button class="btn-outline-primary rounded-pill w-100 mb-2 py-2">
                                {{ __('auth.resend_email') }}
                            </x-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <div class="">
                            <button type="submit" class="btn-outline-primary rounded-pill w-100 py-2">
                                {{ __('auth.log_out') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection
