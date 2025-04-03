@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center my-5">
        <div class="col-lg-4 card-shadow bg-white rounded">
            <div class="title-header pt-3 pb-1">
                <h3 class="font-weight-normal px-3">Editează un client</h3>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops! Something went wrong.</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="pb-3 px-3">
                <form method="POST" action="{{ route('companies.store') }}">
                    @csrf

                    <div>
                        <x-form.label for="name" :value="__('Companie')" />
                        <x-form.input id="name" type="text" name="name" :value="old('name')" required autofocus />
                    </div>

                    <div class="mt-4">
                        <x-form.label for="vat" :value="__('CIF')" />
                        <x-form.input id="vat" type="text" name="vat" :value="old('vat')" required />
                    </div>

                    <div class="mt-4">
                        <x-form.label for="type" :value="__('Tipul companiei')" />
                        <x-form.input id="type" type="number" name="type" :value="old('type')" required />
                    </div>

                    <div class="mt-4">
                        <x-form.label for="with_contract" :value="__('Contract de colaborare')" />
                        <x-form.input id="with_contract" type="checkbox" name="with_contract" :checked="old('with_contract') ? true : false" required />
                    </div>

                    <div class="mt-4">
                        <x-form.label for="address" :value="__('Adresa')" />
                        <x-form.input id="address" type="text" name="address" :value="old('address')" required />
                    </div>

                    <div class="mt-4">
                        <x-form.label  for="phone" :value="__('Telefon')" />
                        <x-form.input id="phone" type="tel" name="phone" :value="old('phone')" />
                    </div>

                    <div class="mt-4">
                        <x-form.label  for="email" :value="__('Email')" />
                        <x-form.input id="email" type="email" name="email" :value="old('email')" />
                    </div>

                    <div class="flex items-center justify-end mt-3">
                        <x-button class="btn-outline-primary rounded-pill w-100 mb-2">
                            {{ __('Adaugare client') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
