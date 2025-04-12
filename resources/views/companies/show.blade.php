@extends('layouts.app')

@section('content')
    <div class="row d-flex justify-content-between my-5">
        <div class="col-lg-3 pe-lg-0">
            <x-calendar :interventionDays="$interventionDays" :company="$company" />
        </div>
        <div class="col-lg-8 card bg-white rounded">
            <div class="title-header pt-4 d-flex">
                <a href="{{ $back ?? url()->previous() }}" class="px-2 pt-1 btn" data-bs-toggle="tooltip" title="{{ __('messages.back') }}">
                    <x-icon name="chevron-left" color="secondary" size="5"></x-icon>
                </a>
                <h3 class="font-weight-normal px-2 m-0">{{ __($company->name) }}</h3>
            </div>

            <hr class="my-3">

            <div class="fs-5">
                <strong>{{ __('companies.company_name') }}:</strong> {{ $company->name }} <br>
                <strong>{{ __('companies.company_type') }}:</strong> {{ $types_arr[$company->type] ?? 'N/A' }} <br>
                <strong>{{ __('companies.company_status') }}:</strong> {{ $statuses_arr[$company->status] ?? 'N/A' }} <br>
                <strong>{{ __('companies.address') }}:</strong> {{ $company->address ?? 'N/A' }} <br>
                <strong>{{ __('companies.vat') }}:</strong> {{ $company->vat ?? 'N/A' }} <br>
                <strong>{{ __('companies.email') }}:</strong>
                    @if (!empty($company->email))
                        <a href="mailto:{{ $company->email}}">{{ $company->email }}</a>
                    @else
                        N/A
                    @endif
                    <br>
                <strong>{{ __('companies.phone') }}:</strong>
                    @if (!empty($company->phone))
                        <a href="tel:{{ $company->phone}}">{{ $company->phone }}</a>
                    @else
                        N/A
                    @endif
                    <br>
                <strong>{{ __('companies.details') }}:</strong>
                <div class="p-3 mb-4 rounded bg-light details-box">
                    {{ Markdown::parse($company->details) }}
                </div>
            </div>
        </div>
    </div>
@endsection
