@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    <div class="row justify-content-between my-5">
        <div class="col-lg-4 pe-lg-0">
            <x-calendar :interventionDays="$interventionDays" :company="$intervention->company" :date="$date"/>
        </div>
        <div class="col-lg-8 card bg-white rounded">
            <div class="title-header pt-4 d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <a href="{{ $back ?? url()->previous() }}" class="px-2 pt-1 btn" data-bs-toggle="tooltip"
                       title="{{ __('messages.back') }}">
                        <x-icon name="chevron-left" color="secondary" size="5"></x-icon>
                    </a>
                    <h3 class="px-2 m-0">
                        <span class="bg-light rounded-3 px-3 me-2">
                            {{ $intervention->title }}
                        </span>
                        {{ __('messages.for') }}
                        <a href="{{  route('companies.show', ['company' => $intervention->company, 'date' => $date->toDateString()]) }}"
                           class="fw-bold text-decoration-none link-primary link-opacity-50-hover">{{  $intervention->company->name }}</a>
                    </h3>
                </div>

                <div class="pe-2 d-flex justify-content-end">
                    <x-form.delete_button route="{{ route('companies.interventions.destroy', [$intervention->company, $intervention]) }}"
                                          confirmationMessage="'{{ __('interventions.confirm_delete') }}'" />

                    <a href="{{ route('companies.interventions.edit', [$intervention->company, $intervention]) }}"
                       class="btn" data-bs-toggle="tooltip" title="{{ __('messages.edit') }}">
                        <x-icon name="pencil" size="4" color="primary"></x-icon>
                    </a>
                </div>
            </div>

            <hr class="my-3">

            <div class="px-2 pb-4 fs-5">
                @php
                    $startTime = Carbon::parse($intervention->start_time);
                    $endTime = Carbon::parse($intervention->end_time);
                    $diffInMinutes = $startTime->diffInMinutes($endTime);

                    $hours = floor($diffInMinutes / 60);
                    $minutes = $diffInMinutes % 60;
                @endphp
                <strong>{{ __('interventions.intervention_date') }}
                    :</strong> {{ Carbon::parse($intervention->date)->format('d.m.Y') }} <br>
                <strong>{{ __('interventions.accomplished_by') }}
                    :</strong> {{ $usersArr[$intervention->user_id] ?? 'N/A' }} <br>
                <strong>{{ __('interventions.start_time') }}:</strong> {{ $startTime->format('H:i') }} <br>
                <strong>{{ __('interventions.end_time') }}:</strong> {{ $endTime->format('H:i') }} <br>
                <strong>{{ __('interventions.duration') }}:</strong> {{ $hours.'h '.$minutes.'m' }} <br>
                <strong>{{ __('interventions.intervention_description') }}:</strong>
                <hr>
                <div class="mb-4 ">
                    {{ Markdown::parse($intervention->description) }}
                </div>
            </div>
        </div>
    </div>
@endsection
