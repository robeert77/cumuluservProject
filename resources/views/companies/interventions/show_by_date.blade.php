@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    <div class="row justify-content-between my-5">
        <div class="col-lg-4 pe-lg-0">
            <x-calendar :interventionDays="$interventionDays" :company="$company" :date="$date"/>
        </div>
        <div class="col-lg-8 card bg-white rounded">
            <div class="title-header pt-4 d-flex justify-content-between">
                <div class="d-flex">
                    <a href="{{ $back ?? url()->previous() }}" class="px-2 pt-1 btn" data-bs-toggle="tooltip"
                       title="{{ __('messages.back') }}">
                        <x-icon name="chevron-left" color="secondary" size="5"></x-icon>
                    </a>
                    <h3 class="px-2 m-0">
                        @if (count($interventions) > 1)
                            {!! __('interventions.interventions_for_company', ['company' => '<a href="' . route('companies.show', ['company' => $company, 'date' => $date->toDateString()]) . '" class="fw-bold text-decoration-none link-primary link-opacity-50-hover">' . $company->name . '</a>']) !!}
                        @else
                            {!! __('interventions.intervention_for_company', ['company' => '<a href="' . route('companies.show', ['company' => $company, 'date' => $date->toDateString()]) . '" class="fw-bold text-decoration-none link-primary link-opacity-50-hover">' . $company->name . '</a>']) !!}
                        @endif
                    </h3>
                </div>
                <div class="pe-2">
                    <span class="fs-4 bg-light rounded-3 px-3">{{ Carbon::parse($date)->format('d.m.Y')  }}</span>
                </div>
            </div>

            <hr class="my-3">

            <div class="accordion px-2 pb-4 fs-5" id="interventions-accordion">
                @foreach($interventions as $intervention)
                    @php
                        $startTime = Carbon::parse($intervention->start_time);
                        $endTime = Carbon::parse($intervention->end_time);
                        $diffInMinutes = $startTime->diffInMinutes($endTime);

                        $hours = floor($diffInMinutes / 60);
                        $minutes = $diffInMinutes % 60;
                    @endphp
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fs-4 " type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $loop->index }}"
                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $loop->index }}">
                                {{ ($loop->index + 1).'. '.$intervention->title }}
                            </button>
                        </h2>
                        <div id="collapse{{ $loop->index }}"
                             class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                             data-bs-parent="#interventions-accordion">
                            <div class="accordion-body">
                                <strong>{{ __('interventions.intervention_title') }}:</strong>
                                <a href="{{ route('companies.interventions.show', ['company' => $company, 'intervention' => $intervention]) }}"
                                   class="fw-bold text-decoration-none link-primary link-opacity-50-hover">
                                    {{ $intervention->title }}
                                </a><br>
                                <strong>{{ __('interventions.intervention_date') }}
                                    :</strong> {{ Carbon::parse($intervention->date)->format('d.m.Y') }} <br>
                                <strong>{{ __('interventions.accomplished_by') }}
                                    :</strong> {{ $usersArr[$intervention->user_id] ?? 'N/A' }} <br>
                                <strong>{{ __('interventions.start_time') }}:</strong> {{ $startTime->format('H:i') }}
                                <br>
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
                @endforeach
            </div>
        </div>
    </div>
@endsection
