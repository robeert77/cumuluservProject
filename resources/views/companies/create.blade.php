@extends('layouts.app')

@section('content')
    @component('components.page.form-wrapper', ['title' => __('companies.add_company')])
        <form method="POST" action="{{ route('companies.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <x-form.label for="name" :value="__('companies.company_name')" />
                    <x-form.input name="name" :value="old('name')" required autofocus />
                </div>

                <div class="col-md-2">
                    <x-form.label for="type" :value="__('companies.company_type')" />
                    <x-form.select name="type" :options="$types_arr" :selected="old('type')" :placeholder="__('Choose')" required />
                </div>

               <div class="col-md-2">
                    <x-form.label for="status" :value="__('companies.status')" />
                    <x-form.select name="status" :options="$statuses_arr" :selected="old('status')" :placeholder="__('Choose')" required/>
                </div>

                <div class="col-md-4">
                    <x-form.label for="vat" :value="__('companies.vat')" />
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-light" type="button" id="button-vat-check">
                            <x-icon name="arrow-right-circle" color="secondary"></x-icon>
                        </button>
                        <x-form.input name="vat" :value="old('vat')" aria-describedby="button-vat-check" required />
                    </div>
                </div>

                <div class="col-md-4">
                    <x-form.label for="address" :value="__('companies.address')" />
                    <x-form.input name="address" :value="old('address')" />
                </div>

                <div class="col-md-4">
                    <x-form.label for="phone" :value="__('companies.phone')" />
                    <x-form.input type="tel" name="phone" :value="old('phone')" />
                </div>

                <div class="col-md-4">
                    <x-form.label for="email" :value="__('companies.email')" />
                    <x-form.input type="email" name="email" :value="old('email')" />
                </div>

                <div class="col-12 mt-3">
                    <x-form.label for="with_contract" :value="__('companies.contract_collaboration')" />
                    <br>
                    <div class="form-check form-check-inline">
                        <x-form.label for="status_active" :value="__('messages.yes')" />
                        <x-form.input type="radio" name="with_contract" value="1"
                            :checked="old('with_contract') === '1'" />
                    </div>

                    <div class="form-check form-check-inline">
                        <x-form.label for="status_inactive" :value="__('messages.no')" />
                        <x-form.input type="radio" name="with_contract" value="0"
                            :checked="old('with_contract') === '0'" />
                    </div>
                </div>

                <hr class="my-3">

                <div class="col-12">
                    <x-form.label for="details" :value="__('companies.details')" />
                    <x-form.textarea rows="10" name="details" />
                </div>
            </div>

            <div class="d-flex items-center justify-content-end mt-3">
                <a class="me-3" href="{{ route('companies.index') }}">
                    <x-button class="px-4" type="button" color="danger" outline>{{ __('messages.cancel') }}</x-button>
                </a>
                <x-button class="px-4" color="primary">{{ __('messages.save') }}</x-button>
            </div>
        </form>
    @endcomponent
@endsection
