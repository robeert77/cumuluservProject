@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    @component('components.page.form-wrapper', ['title' => __('Edit Intervention for :company', ['company' => $company->name])])
        <form method="POST" action="{{ route('companies.interventions.update', [$company, $intervention]) }}">
            @csrf
            @method('PATCH')

            <div class="row">
                <div class="col-md-6">
                    <x-form.label for="title" :value="__('Title')"/>
                    <x-form.input name="title" :value="old('title', $intervention->title)" required autofocus/>
                </div>

                <div class="col-md-6">
                    <x-form.label for="user_id" :value="__('Accomplished By')"/>
                    <x-form.select name="user_id" :options="$users_arr"
                                   :selected="old('user_id', $intervention->user_id)" :placeholder="__('Choose')"/>
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="date" :value="__('Date')"/>
                    <x-form.input type="date" name="date" :value="old('date', $intervention->date)"/>
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="start_time" :value="__('Start Time')"/>
                    <x-form.input type="time" name="start_time"
                                  :value="old('start_time', Carbon::parse($intervention->start_time)->format('H:i'))"/>
                </div>

                <div class="col-md-4 mt-3">
                    <x-form.label for="end_time" :value="__('End Time')"/>
                    <x-form.input type="time" name="end_time"
                                  :value="old('end_time', Carbon::parse($intervention->end_time)->format('H:i'))"/>
                </div>

                <hr class="mt-4 mb-3">

                <div class="col-12">
                    <x-form.label for="description" :value="__('Intervention Description')"/>
                    <x-form.textarea rows="10" name="description" :text="old('description', $intervention->description)"/>
                </div>
            </div>

            <div class="d-flex items-center justify-content-end mt-3">
                <a class="me-3" href="{{ route('companies.interventions.index', $company) }}">
                    <x-button class="px-4" type="button" color="danger" outline>Cancel</x-button>
                </a>
                <x-button class="px-4" color="primary">Save</x-button>
            </div>
        </form>
    @endcomponent
@endsection
