@extends('layouts.app')

@section('content')
    @component('components.page.table-wrapper', [
        'title'             => __('Companies'),
        'addButtonRoute'    => route('companies.create'),
        'addButtonText'     => __('Add Company'),
    ])
        @slot('filters')
            <form action="{{ route('companies.index')}}" method="GET">
                <div class="row row-gap-3 mt-3">
                    <div class="col-md-3">
                        <x-form.label for="name" :value="__('companies.company_name')"/>
                        <x-form.input id="name" name="name" :value="request('name')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="type" :value="__('companies.company_type')"/>
                        <x-form.select name="type" :options="$types_arr" :selected="request('type')" :placeholder="__('Choose')" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="status" :value="__('companies.status')"/>
                        <x-form.select name="status" :options="$statuses_arr" :selected="request('status')" :placeholder="__('Choose')" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="with_contract" :value="__('companies.contract_collaboration')"/>
                        <x-form.select name="with_contract" :options="[0 => __('No'), 1 => __('Yes')]" :selected="request('with_contract')" :placeholder="__('Choose')" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="vat" :value="__('companies.vat')"/>
                        <x-form.input id="vat" name="vat" :value="request('vat')" aria-describedby="button-vat-check"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="phone" :value="__('companies.phone')"/>
                        <x-form.input id="phone" name="phone" :value="request('phone')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="email" :value="__('companies.email')"/>
                        <x-form.input id="email" name="email" :value="request('email')"/>
                    </div>
                </div>

                <div class="d-flex items-center justify-content-end my-3">
                    <x-button class="px-4" color="primary" outline>{{ __('messages.filter') }}</x-button>
                </div>
            </form>
        @endslot


        @slot('tableHead')
            <th scope="col">#</th>
            <th scope="col">{{ __('companies.company_name') }}</th>
            <th scope="col">{{ __('companies.company_type') }}</th>
            <th scope="col">{{ __('companies.vat') }}</th>
            <th scope="col">{{ __('companies.status') }}</th>
            <th scope="col">{{ __('companies.contract_collaboration') }}</th>
            <th scope="col">{{ __('companies.phone') }}</th>
            <th scope="col">{{ __('companies.email') }}</th>
            <th scope="col" class="text-end">{{ __('messages.actions') }}</th>
        @endslot

        @slot('tableBody')
            @foreach ($companies as $company)
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td>{{ $company->name }}</td>
                    <td>{{ $types_arr[$company->type] ?? 'N/A' }}</td>
                    <td>{{ $company->vat }}</td>
                    <td>{{ $statuses_arr[$company->status] ?? 'N/A' }}</td>
                    <td>{{ $company->with_contract ? __('messages.yes') : __('messages.no') }}</td>
                    <td>{{ $company->phone }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('companies.interventions.index', $company) }}" class="btn">
                                <x-icon name="wrench" size="5" color="dark"></x-icon>
                            </a>

                            <a href="{{ route('companies.edit', $company) }}" class="btn">
                                <x-icon name="pencil" size="5" color="primary"></x-icon>
                            </a>

                            <form action="{{ route('companies.destroy', $company) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this company?');">
                                @csrf
                                @method('DELETE')
                                <x-button type="submit">
                                    <x-icon name="trash3" size="5" color="danger"></x-icon>
                                </x-button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endslot

        @slot('paginationLinks')
            {{ $companies->links() }}
        @endslot

    @endcomponent
@endsection
