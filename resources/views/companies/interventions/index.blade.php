@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    @component('components.page.table-wrapper', [
        'title'             => __('interventions.interventions_for_company', ['company' => $company->name]),
        'addButtonRoute'    => route('companies.interventions.create', $company),
        'addButtonText'     => __('interventions.add_intervention'),
    ])
        @slot('filters')
            <form action="{{ route('companies.interventions.index', $company)}}" method="GET">
                <div class="row row-gap-3 mt-3">
                    <div class="col-md-3">
                        <x-form.label for="title" :value="__('interventions.intervention_title')"/>
                        <x-form.input name="title" :value="request('title')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="user_id" :value="__('interventions.accomplished_by')"/>
                        <x-form.select name="user_id" :options="$users_arr" :selected="request('user_id')"
                                       :placeholder="__('messages.choose')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="start_date" :value="__('interventions.start_date')"/>
                        <x-form.input type="date" name="start_date" :value="request('start_date')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="end_date" :value="__('interventions.end_date')"/>
                        <x-form.input type="date" name="end_date" :value="request('end_date')"/>
                    </div>
                </div>

                <div class="d-flex items-center justify-content-end my-3">
                    <x-button class="px-4" color="primary" outline>{{ __('messages.filter') }}</x-button>
                </div>
            </form>
        @endslot

        @slot('tableHead')
            <th scope="col">#</th>
            <th scope="col">{{ __('interventions.intervention_title') }}</th>
            <th scope="col">{{ __('interventions.intervention_date') }}</th>
            <th scope="col">{{ __('interventions.accomplished_by') }}</th>
            <th scope="col">{{ __('interventions.start_time') }}</th>
            <th scope="col">{{ __('interventions.end_time') }}</th>
            <th scope="col">{{ __('interventions.duration') }}</th>
            <th scope="col" class="text-end">{{ __('messages.actions') }}</th>
        @endslot

        @slot('tableBody')
            @foreach ($interventions as $intervention)
                @php
                    $startTime = Carbon::parse($intervention->start_time);
                    $endTime = Carbon::parse($intervention->end_time);
                    $diffInMinutes = $startTime->diffInMinutes($endTime);

                    $hours = floor($diffInMinutes / 60);
                    $minutes = $diffInMinutes % 60;
                @endphp
                <tr class="align-middle">
                    <th scope="row">{{ $intervention->id }}</th>
                    <td>
                        <a href="{{ route('companies.interventions.show', ['company' => $company, 'intervention' => $intervention]) }}"
                           class="fw-bold text-decoration-none link-primary link-opacity-50-hover">
                            {{ $intervention->title }}
                        </a>
                    </td>
                    <td>{{ Carbon::parse($intervention->date)->format('d.m.Y') }}</td>
                    <td>{{ $users_arr[$intervention->user_id] ?? 'N/A' }}</td>
                    <td>{{ $startTime->format('H:i') }}</td>
                    <td>{{ $endTime->format('H:i') }}</td>
                    <td>{{ __('interventions.duration_parameter', ['hours' => $hours, 'minutes' => $minutes]) }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('companies.interventions.edit', [$company, $intervention]) }}" class="btn"
                               data-bs-toggle="tooltip" title="{{ __('messages.edit') }}">
                                <x-icon name="pencil" size="5" color="primary"></x-icon>
                            </a>

                            <x-form.delete_button route="{{ route('companies.interventions.destroy', [$company, $intervention]) }}"
                                                  confirmationMessage="'{{ __('interventions.confirm_delete') }}'" />
                        </div>
                    </td>
                </tr>
            @endforeach
        @endslot

        @slot('paginationLinks')
            {{ $interventions->links() }}
        @endslot

    @endcomponent
@endsection
