@extends('layouts.app')

@section('content')
    @component('components.page.form-wrapper', ['title' => __('tasks.add_task')])
        <form method="POST" action="{{ route('tasks.store') }}">
            @csrf

            <div class="row">
                <div class="col-md-6">
                    <x-form.label for="title" :value="__('tasks.title')"/>
                    <x-form.input name="title" :value="old('title')" required autofocus/>
                </div>

                <div class="col-md-6">
                    <x-form.label for="scheduled_date" :value="__('tasks.scheduled_date')"/>
                    <x-form.input type="date" name="scheduled_date" :value="old('scheduled_date')" required />
                </div>

                <div class="col-md-6 mt-3">
                    <x-form.label for="type" :value="__('tasks.user_assigned')"/>
                    <x-form.select name="user_id" :options="$usersArr" :selected="old('user_id', auth()->id())" :placeholder="__('messages.choose')"
                                   required/>
                </div>

                <div class="col-md-6 mt-3">
                    <x-form.label for="status" :value="__('tasks.company_assigned')"/>
                    <x-form.select name="company_id" :options="$usersArr" :selected="old('company_id')" :placeholder="__('messages.choose')" />
                </div>

                <hr class="my-3 mb-3">

                <div class="col-12">
                    <x-form.label for="description" :value="__('tasks.description')"/>
                    <x-form.textarea rows="10" name="description" :text="old('description')"/>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-end mt-3">
                <a class="me-3" href="{{ route('tasks.index') }}">
                    <x-button class="px-4" type="button" color="danger" outline>{{ __('messages.cancel') }}</x-button>
                </a>
                <x-button class="px-4" color="primary">{{ __('messages.save') }}</x-button>
            </div>
        </form>
    @endcomponent
@endsection
