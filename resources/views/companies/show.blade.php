@extends('layouts.app')

@section('content')
    <div class="row justify-content-between my-5">
        <div class="col-lg-4 pe-lg-0">
            <x-calendar :interventionDays="$interventionDays" :company="$company" :date="$date"/>
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
                        {{ __($company->name) }}
                    </span>
                    </h3>
                </div>
                <div class="pe-2 d-flex justify-content-end">
                    <form action="{{ route('companies.destroy', $company) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this company?');">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" data-bs-toggle="tooltip" title="{{ __('messages.delete') }}">
                            <x-icon name="trash3" size="4" color="danger"></x-icon>
                        </x-button>
                    </form>

                    <a href="{{ route('companies.edit', $company) }}" class="btn" data-bs-toggle="tooltip"
                       title="{{ __('messages.edit') }}">
                        <x-icon name="pencil" size="4" color="primary"></x-icon>
                    </a>
                </div>
            </div>

            <hr class="my-3">

            <div class="px-2 fs-5">
                <strong>{{ __('companies.company_name') }}:</strong> {{ $company->name }} <br>
                <strong>{{ __('companies.company_type') }}:</strong> {{ $typesArr[$company->type] ?? 'N/A' }} <br>
                <strong>{{ __('companies.company_status') }}:</strong> {{ $statusesArr[$company->status] ?? 'N/A' }}
                <br>
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
                <hr>
                <div class="p-3 mb-4 rounded bg-light details-box">
                    {{ Markdown::parse($company->details) }}
                </div>
            </div>
        </div>
    </div>
@endsection
