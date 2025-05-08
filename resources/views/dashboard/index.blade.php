@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    <div class="row my-5">
        <div class="col-12 col-lg-6 col-xl-6">
            <div class="row">
                <div class="col-sm-6 col-xl-6 mb-4">
                    <div class="card bg-body-tertiary rounded-4">
                        <div class="card-body p-4">
                            <div class="row align-items-start">
                                <div class="col">
                                    <h4 class="fs-5 fw-normal text-body-secondary mb-1">
                                        {{ __('dashboard.total_interventions_made_by_me') }}
                                    </h4>
                                    <span class="fs-6 text-secondary">- {{ __('dashboard.made_by_me') }}</span>
                                    <div class="fs-3 fw-semibold mt-2">
                                        {{ $interventionCountForUser }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="avatar avatar-lg">
                                        <x-icon name="wrench" size="3" color="success"></x-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-xl-6 mb-4">
                    <div class="card bg-body-tertiary rounded-4">
                        <div class="card-body p-4">
                            <div class="row align-items-start">
                                <div class="col">
                                    <h4 class="fs-5 fw-normal text-body-secondary mb-1">
                                        {{ __('dashboard.interventions_duration_this_month') }}
                                    </h4>
                                    <span class="fs-6 text-secondary">- {{ __('dashboard.made_by_me') }}</span>
                                    <div class="fs-3 fw-semibold mt-2">
                                        {{ __('interventions.duration_parameter', ['hours' => $totalDurationArr['h'], 'minutes' => $totalDurationArr['m']]) }}
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <div class="avatar avatar-lg">
                                        <x-icon name="clock" size="3" color="success"></x-icon>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 mb-4 mb-xxl-0">
                <div class="card bg-body-tertiary rounded-4">
                    <div class="card-body p-4">
                        <div class="row align-items-start">
                            <div class="col">
                                <h4 class="fs-5 fw-normal text-body-secondary mb-1">
                                    {{ __('dashboard.new_companies_this_year') }}
                                </h4>
                                <div class="mt-2">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">{{ __('companies.company_name') }}</th>
                                            <th scope="col">{{ __('messages.created') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($newCompanies as $company)
                                            <tr>
                                                <th scope="row">{{ $loop->index + 1 }}</th>
                                                <td>
                                                    <a href="{{ route('companies.show', $company) }}"
                                                       class="fw-bold text-decoration-none link-primary link-opacity-50-hover">
                                                        {{ $company->name }}
                                                    </a>
                                                </td>
                                                <td class="fs-sm text-body-secondary">{{ Carbon::parse($company->created_at)->format('d.m.Y, H:i') }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="avatar avatar-lg">
                                    <x-icon name="person-fill-add" size="3" color="success"></x-icon>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6 col-xl-6 mb-4 mb-xxl-0">
            <div class="card bg-body-tertiary rounded-4">
                <div class="card-body p-4">
                    <div class="row align-items-start">
                        <div class="col">
                            <h4 class="fs-5 fw-normal text-body-secondary mb-1">
                                {{ __('dashboard.most_interventions') }}
                            </h4>
                            <div class="mt-2">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">{{ __('companies.company_name') }}</th>
                                        <th scope="col">{{ __('interventions.nr_interventions') }}</th>
                                        <th scope="col">{{ __('interventions.duration') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($companiesWithMostInterventions as $company)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>
                                                <a href="{{ route('companies.show', $company['id']) }}"
                                                   class="fw-bold text-decoration-none link-primary link-opacity-50-hover">
                                                    {{ $company['company_name'] }}
                                                </a>
                                            </td>
                                            <td>{{ $company['total_interventions'] }}</td>
                                            <td>{{ __('interventions.duration_parameter', ['hours' => $company['total_duration']['h'], 'minutes' => $company['total_duration']['m']]) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="avatar avatar-lg">
                                <x-icon name="graph-up" size="3" color="success"></x-icon>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
