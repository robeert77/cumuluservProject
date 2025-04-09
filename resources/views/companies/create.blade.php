@extends('layouts.app')

@section('content')
    @component('components.page.form-wrapper', ['title' => __('Add Company')])
        <form method="POST" action="{{ route('companies.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-4">
                    <x-form.label for="name" :value="__('Company')" />
                    <x-form.input name="name" :value="old('name')" required autofocus />
                </div>

                <div class="col-md-2">
                    <x-form.label for="type" :value="__('Company Type')" />
                    <x-form.select name="type" :options="$types_arr" :selected="old('type')" :placeholder="__('Choose')" required />
                </div>

               <div class="col-md-2">
                    <x-form.label for="status" :value="__('Company Status')" />
                    <x-form.select name="status" :options="$statuses_arr" :selected="old('status')" :placeholder="__('Choose')" required/>
                </div>

                <div class="col-md-4">
                    <x-form.label for="vat" :value="__('VAT')" />
                    <div class="input-group mb-3">
                        <button class="btn btn-outline-light" type="button" id="button-vat-check">
                            <x-icon name="arrow-right-circle" color="secondary"></x-icon>
                        </button>
                        <x-form.input name="vat" :value="old('vat')" aria-describedby="button-vat-check" required />
                    </div>
                </div>

                <div class="col-md-4">
                    <x-form.label for="address" :value="__('Address')" />
                    <x-form.input name="address" :value="old('address')" />
                </div>

                <div class="col-md-4">
                    <x-form.label for="phone" :value="__('Phone')" />
                    <x-form.input type="tel" name="phone" :value="old('phone')" />
                </div>

                <div class="col-md-4">
                    <x-form.label for="email" :value="__('Email')" />
                    <x-form.input type="email" name="email" :value="old('email')" />
                </div>

                <div class="col-12 mt-3">
                    <x-form.label for="with_contract" :value="__('Contract Collaboration')" />
                    <br>
                    <div class="form-check form-check-inline">
                        <x-form.label for="status_active" :value="__('Yes')" />
                        <x-form.input type="radio" name="with_contract" value="1"
                            :checked="old('with_contract') === '1'" />
                    </div>

                    <div class="form-check form-check-inline">
                        <x-form.label for="status_inactive" :value="__('No')" />
                        <x-form.input type="radio" name="with_contract" value="0"
                            :checked="old('with_contract') === '0'" />
                    </div>
                </div>

                <hr class="my-3">

                <div class="col-12">
                    <x-form.label for="details" :value="__('Company Details')" />
                    <x-form.textarea rows="10" name="details" />
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
