@extends('layouts.app')

@section('content')
    @component('components.page.form-wrapper', ['title' => __('Add Company')])
        <form method="POST" action="{{ route('companies.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <x-form.label for="name" :value="__('Company')" />
                    <x-form.input id="name" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <div class="col-md-4">
                    <x-form.label for="type" :value="__('Company Type')" />
                    <x-form.input id="type" type="number" name="type" :value="old('type')" required />
                </div>

                <div class="col-md-4">
                    <x-form.label for="vat" :value="__('VAT')" />
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-light" type="button" id="button-vat-check">
                            <x-icon name="arrow-right-circle" color="secondary"></x-icon>
                        </button>
                        <x-form.input id="vat" type="text" name="vat" :value="old('vat')" aria-describedby="button-vat-check" required />
                    </div>
                </div>

                <div class="col-md-4">
                    <x-form.label for="address" :value="__('Address')" />
                    <x-form.input id="address" type="text" name="address" :value="old('address')" required />
                </div>

                <div class="col-md-4">
                    <x-form.label  for="phone" :value="__('Phone')" />
                    <x-form.input id="phone" type="tel" name="phone" :value="old('phone')" />
                </div>

                <div class="col-md-4">
                    <x-form.label  for="email" :value="__('Email')" />
                    <x-form.input id="email" type="email" name="email" :value="old('email')" />
                </div>

                <div class="col-12 mt-3">
                    <x-form.label for="with_contract" :value="__('Contract Collaboration')" />
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                               type="radio"
                               name="with_contract"
                               id="with_contract_1"
                               value="1"
                            {{ old('with_contract') === '1' ? 'checked' : '' }}>
                        <x-form.label class="form-check-label" for="status_active" :value="__('Yes')" />
                    </div>

                    <div class="form-check form-check-inline">
                        <input class="form-check-input"
                               type="radio"
                               name="with_contract"
                               id="with_contract_0"
                               value="0"
                            {{ old('with_contract') === '0' ? 'checked' : '' }}>
                        <x-form.label class="form-check-label" for="status_inactive" :value="__('No')" />
                    </div>
                </div>

                <hr class="my-3">

                <div class="col-12">
                    <x-form.label for="details" :value="__('Company Details')" />
                    <x-form.textarea id="details" rows="10" name="details" />
                </div>
            </div>

            <div class="d-flex items-center justify-content-end mt-3">
                <a class="me-3" href="{{ route('companies.index') }}">
                    <x-button class="px-4" type="button" color="danger" outline>Cancel</x-button>
                </a>
                <x-button class="px-4" color="primary">Save</x-button>
            </div>
        </form>
    @endcomponent
@endsection
