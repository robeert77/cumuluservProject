@extends('layouts.app')

@section('content')
    @component('components.page.table-wrapper', [
        'title'             => __('Interventions for :company', ['company' => $company->name]),
        'addButtonRoute'    => route('companies.interventions.create', $company),
        'addButtonText'     => __('Add Intervention'),
    ])
        @slot('filters')
            <form action="{{ route('companies.interventions.index', $company)}}" method="GET">
                <div class="row row-gap-3 mt-3">
                    <div class="col-md-3">
                        <x-form.label for="title" :value="__('Title')"/>
                        <x-form.input name="title" :value="request('title')" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="user_id" :value="__('Accomplished By')"/>
                        <x-form.select name="user_id" :options="$users_arr" :selected="request('user_id')" :placeholder="__('Choose')" />
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="start_date" :value="__('Start Date')"/>
                        <x-form.input type="date" name="start_date" :value="request('start_date')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="end_date" :value="__('End Date')"/>
                        <x-form.input type="date" name="end_date" :value="request('end_date')"/>
                    </div>
                </div>

                <div class="d-flex items-center justify-content-end my-3">
                    <x-button class="px-4" color="primary" outline>{{ __('Filter') }}</x-button>
                </div>
            </form>
        @endslot


        @slot('tableHead')
            <th scope="col">#</th>
            <th scope="col">{{ __('Title') }}</th>
            <th scope="col">{{ __('Intervention Date') }}</th>
            <th scope="col">{{ __('Accomplished By') }}</th>
            <th scope="col">{{ __('Start Time') }}</th>
            <th scope="col">{{ __('End Time') }}</th>
            <th scope="col" class="text-end">{{ __('Actions') }}</th>
        @endslot

        @slot('tableBody')
            @foreach ($interventions as $intervention)
                <tr>
                    <th scope="row">{{ $intervention->id }}</th>
                    <td>{{ $intervention->title }}</td>
                    <td>{{ $intervention->date }}</td>
                    <td>{{ $users_arr[$intervention->user_id] ?? 'N/A' }}</td>
                    <td>{{ $intervention->start_time }}</td>
                    <td>{{ $intervention->end_time }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('companies.interventions.index', [$company, $intervention]) }}" class="btn">
                                <x-icon name="pencil" size="5" color="primary"></x-icon>
                            </a>

                            <form action="{{ route('companies.interventions.destroy', [$company, $intervention]) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this intervention?');">
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
            {{ $interventions->links() }}
        @endslot

    @endcomponent
@endsection
