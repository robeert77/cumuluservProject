@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    @component('components.page.form-wrapper', ['title' => __('interventions.edit_intervention_for', ['company' => $company->name])])
        <form method="POST" action="{{ route('companies.interventions.update', [$company, $intervention]) }}">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-md-6">
                    <x-form.label for="title" :value="__('interventions.intervention_title')"/>
                    <x-form.input name="title" :value="old('title', $intervention->title)" required autofocus/>
                </div>

                <div class="col-md-6">
                    <x-form.label for="user_id" :value="__('interventions.accomplished_by')"/>
                    <x-form.select name="user_id" :options="$usersArr"
                                   :selected="old('user_id', $intervention->user_id)" :placeholder="__('messages.choose')"/>
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="date" :value="__('interventions.intervention_date')"/>
                    <x-form.input type="date" name="date" :value="old('date', $intervention->date)"/>
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="start_time" :value="__('interventions.start_time')"/>
                    <x-form.input type="time" name="start_time"
                                  :value="old('start_time', Carbon::parse($intervention->start_time)->format('H:i'))"/>
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="end_time" :value="__('interventions.end_time')"/>
                    <x-form.input type="time" name="end_time"
                                  :value="old('end_time', Carbon::parse($intervention->end_time)->format('H:i'))"/>
                </div>

                <hr class="mt-4 mb-3">

                <div class="col-12">
                    <x-form.label for="description" :value="__('interventions.intervention_description')"/>
                    <x-form.textarea rows="10" name="description" :text="old('description', $intervention->description)"/>
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
