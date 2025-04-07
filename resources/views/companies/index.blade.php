@extends('layouts.app')

@section('content')
    @component('components.page.table-wrapper', [
        'title'             => __('Companies'),
        'addButtonRoute'    => route('companies.create'),
        'addButtonText'     => __('Add Company'),
    ])
        @slot('filters')
            <form action="{{ route('companies.index') }}" method="GET">
                <div class="row row-gap-3 mt-3">
                    <div class="col-md-3">
                        <x-form.label for="name" :value="__('Company')" />
                        <x-form.input id="name" type="text" name="name" :value="old('name')" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="type" :value="__('Company Type')" />
                        <x-form.input id="type" type="number" name="type" :value="old('type')" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="status" :value="__('Status')" />
                        <x-form.input id="status" type="status" name="status" :value="old('status')" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="with_contract" :value="__('Contract Collaboration')" />
                        <x-form.input id="with_contract" type="with_contract" name="with_contract" :value="old('with_contract')" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="vat" :value="__('VAT')" />
                        <x-form.input id="vat" type="text" name="vat" :value="old('vat')" aria-describedby="button-vat-check" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label  for="phone" :value="__('Phone')" />
                        <x-form.input id="phone" type="tel" name="phone" :value="old('phone')" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label  for="email" :value="__('Email')" />
                        <x-form.input id="email" type="email" name="email" :value="old('email')" />
                    </div>
                </div>

                <div class="d-flex items-center justify-content-end my-3">
                    <x-button class="px-4" color="primary" outline>{{ __('Filter') }}</x-button>
                </div>
            </form>
        @endslot


        @slot('tableHead')
            <th scope="col">#</th>
            <th scope="col">{{ __('Company') }}</th>
            <th scope="col">{{ __('Company Type') }}</th>
            <th scope="col">{{ __('VAT') }}</th>
            <th scope="col">{{ __('Status') }}</th>
            <th scope="col">{{ __('Contract Collaboration') }}</th>
            <th scope="col">{{ __('Phone') }}</th>
            <th scope="col">{{ __('Email') }}</th>
            <th scope="col" class="text-end">{{ __('Actions') }}</th>
        @endslot

        @slot('tableBody')
            @foreach ($companies as $company)
                <tr>
                    <th scope="row">{{ $company->id }}</th>
                    <td>{{ $company->name }}</td>
                    <td>{{ $company->type }}</td>
                    <td>{{ $company->vat }}</td>
                    <td>{{ $company->status }}</td>
                    <td>{{ $company->contract ? __('Yes') : __('No') }}</td>
                    <td>{{ $company->phone }}</td>
                    <td>{{ $company->email }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('companies.edit', $company->id) }}" class="btn"><x-icon name="pencil" color="primary"></x-icon></a>
                            <form action="{{ route('companies.destroy', $company->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn"><x-icon name="trash3" color="danger"></x-icon></button>
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
