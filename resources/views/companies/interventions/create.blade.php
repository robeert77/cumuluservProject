@extends('layouts.app')

@section('content')
    @component('components.page.form-wrapper', ['title' => __('interventions.add_intervention_for', ['company' => $company->name])])
        <form method="POST" action="{{ route('companies.interventions.store', $company) }}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <x-form.label for="title" :value="__('interventions.intervention_title')" />
                    <x-form.input name="title" :value="old('title')" required autofocus />
                </div>

                <div class="col-md-6">
                    <x-form.label for="user_id" :value="__('interventions.accomplished_by')" />
                    <x-form.select name="user_id" :options="$usersArr" :selected="old('user_id', auth()->id())" :placeholder="__('messages.choose')" />
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="date" :value="__('interventions.intervention_date')" />
                    <x-form.input type="date" name="date" :value="old('date')" />
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="start_time" :value="__('interventions.start_time')" />
                    <x-form.input type="time" name="start_time" :value="old('start_time')" />
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="end_time" :value="__('interventions.end_time')" />
                    <x-form.input type="time" name="end_time" :value="old('end_time')" />
                </div>

                <hr class="mt-4 mb-3">

                <div class="col-12">
                    <x-form.label for="description" :value="__('interventions.intervention_description')" />
                    <x-form.textarea rows="10" name="description" />
                </div>
            </div>

            <div class="d-flex items-center justify-content-end mt-3">
                <a class="me-3" href="{{ route('companies.interventions.index', $company) }}">
                    <x-button class="px-4" type="button" color="danger" outline>{{ __('messages.cancel') }}</x-button>
                </a>
                <x-button class="px-4" color="primary">{{ __('messages.save') }}</x-button>
            </div>
        </form>
    @endcomponent
@endsection
