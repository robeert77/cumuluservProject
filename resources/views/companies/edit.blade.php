@extends('layouts.app')

@section('content')
    @component('components.page.form-wrapper', ['title' => __('Edit Company')])
        <form method="POST" action="{{ route('companies.update', $company->id) }}">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-md-4">
                    <x-form.label for="name" :value="__('Company')" />
                    <x-form.input type="text" name="name" :value="old('name', $company->name)" required autofocus />
                </div>

                <div class="col-md-2">
                    <x-form.label for="type" :value="__('Company Type')" />
                    <x-form.select name="type" :options="$types_arr" :selected="old('type', $company->type)" :placeholder="__('Choose')" required />
                </div>

                <div class="col-md-2">
                    <x-form.label for="status" :value="__('Company Status')" />
                    <x-form.select name="status" :options="$statuses_arr" :selected="old('status', $company->status)" :placeholder="__('Choose')" required/>
                </div>

                <div class="col-md-4">
                    <x-form.label for="vat" :value="__('VAT')" />
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-light" type="button" id="button-vat-check">
                            <x-icon name="arrow-right-circle" color="secondary"></x-icon>
                        </button>
                        <x-form.input type="text" name="vat" :value="old('vat', $company->vat)" aria-describedby="button-vat-check" required />
                    </div>
                </div>

                <div class="col-md-4">
                    <x-form.label for="address" :value="__('Address')" />
                    <x-form.input type="text" name="address" :value="old('address', $company->address)" />
                </div>

                <div class="col-md-4">
                    <x-form.label for="phone" :value="__('Phone')" />
                    <x-form.input type="tel" name="phone" :value="old('phone', $company->phone)" />
                </div>

                <div class="col-md-4">
                    <x-form.label for="email" :value="__('Email')" />
                    <x-form.input type="email" name="email" :value="old('email', $company->email)" />
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="with_contract" :value="__('Contract Collaboration')" />
                    <br>
                    <div class="form-check form-check-inline">
                        <x-form.label for="status_active" :value="__('Yes')" />
                        <x-form.input type="radio" name="with_contract" value="1"
                            :checked="old('with_contract', $company->with_contract ?? false) === true" />
                    </div>

                    <div class="form-check form-check-inline">
                        <x-form.label for="status_inactive" :value="__('No')" />
                        <x-form.input type="radio" name="with_contract" value="0"
                            :checked="old('with_contract', $company->with_contract ?? false) === false" />
                    </div>
                </div>

                <hr class="my-3">

                <div class="col-12">
                    <x-form.label for="details" :value="__('Company Details')" />
                    <x-form.textarea id="details" rows="10" name="details" :text="old('details', $company->details)" />
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
