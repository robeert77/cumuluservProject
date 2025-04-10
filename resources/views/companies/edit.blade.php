@extends('layouts.app')

@section('content')
    @component('components.page.form-wrapper', ['title' => __('companies.edit_company')])
        <form method="POST" action="{{ route('companies.update', $company->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4">
                    <x-form.label for="name" :value="__('companies.company_name')" />
                    <x-form.input type="text" name="name" :value="old('name', $company->name)" required autofocus />
                </div>

                <div class="col-md-2">
                    <x-form.label for="type" :value="__('companies.company_type')" />
                    <x-form.select name="type" :options="$types_arr" :selected="old('type', $company->type)" :placeholder="__('Choose')" required />
                </div>

                <div class="col-md-2">
                    <x-form.label for="status" :value="__('companies.status')" />
                    <x-form.select name="status" :options="$statuses_arr" :selected="old('status', $company->status)" :placeholder="__('Choose')" required/>
                </div>

                <div class="col-md-4">
                    <x-form.label for="vat" :value="__('companies.vat')" />
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-light" type="button" id="button-vat-check">
                            <x-icon name="arrow-right-circle" color="secondary"></x-icon>
                        </button>
                        <x-form.input type="text" name="vat" :value="old('vat', $company->vat)" aria-describedby="button-vat-check" required />
                    </div>
                </div>

                <div class="col-md-4">
                    <x-form.label for="address" :value="__('companies.address')" />
                    <x-form.input type="text" name="address" :value="old('address', $company->address)" />
                </div>

                <div class="col-md-4">
                    <x-form.label for="phone" :value="__('companies.phone')" />
                    <x-form.input type="tel" name="phone" :value="old('phone', $company->phone)" />
                </div>

                <div class="col-md-4">
                    <x-form.label for="email" :value="__('companies.email')" />
                    <x-form.input type="email" name="email" :value="old('email', $company->email)" />
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="with_contract" :value="__('companies.contract_collaboration')" />
                    <br>
                    <div class="form-check form-check-inline">
                        <x-form.label for="status_active" :value="__('messages.yes')" />
                        <x-form.input type="radio" name="with_contract" value="1"
                            :checked="old('with_contract', $company->with_contract ?? false) === true" />
                    </div>

                    <div class="form-check form-check-inline">
                        <x-form.label for="status_inactive" :value="__('messages.no')" />
                        <x-form.input type="radio" name="with_contract" value="0"
                            :checked="old('with_contract', $company->with_contract ?? false) === false" />
                    </div>
                </div>

                <hr class="my-3">

                <div class="col-12">
                    <x-form.label for="details" :value="__('companies.details')" />
                    <x-form.textarea id="details" rows="10" name="details" :text="old('details', $company->details)" />
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
