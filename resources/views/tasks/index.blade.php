@php use Carbon\Carbon; @endphp
@extends('layouts.app')

@section('content')
    @component('components.page.table-wrapper', [
        'title'             => __('tasks.tasks'),
        'addButtonRoute'    => route('tasks.create'),
        'addButtonText'     => __('tasks.add_task'),
    ])
        @slot('filters')
            <form action="{{ route('tasks.index')}}" method="GET">
                <div class="row row-gap-3 mt-3">
                    <div class="col-md-3">
                        <x-form.label for="title" :value="__('tasks.title')"/>
                        <x-form.input id="title" name="title" :value="request('title')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="status" :value="__('tasks.status')"/>
                        <x-form.select name="status" :options="$statusesArr" :selected="request('status')"
                                       :placeholder="__('messages.choose')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="start_scheduled_date" :value="__('tasks.start_scheduled_date')"/>
                        <x-form.input type="date" name="start_scheduled_date" :value="request('start_scheduled_date')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="end_scheduled_date" :value="__('tasks.end_scheduled_date')"/>
                        <x-form.input type="date" name="end_scheduled_date" :value="request('end_scheduled_date')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="start_completed_date" :value="__('tasks.start_completed_date')"/>
                        <x-form.input type="date" name="start_completed_date" :value="request('start_completed_date')"/>
                    </div>

                    <div class="col-md-3">
                        <x-form.label for="end_completed_date" :value="__('tasks.end_completed_date')"/>
                        <x-form.input type="date" name="end_completed_date" :value="request('end_completed_date')"/>
                    </div>
                </div>

                <div class="d-flex items-center justify-content-end my-3">
                    <x-button class="px-4" color="primary" outline>{{ __('messages.filter') }}</x-button>
                </div>
            </form>
        @endslot


        @slot('tableHead')
            <th scope="col">#</th>
            <th scope="col">{{ __('tasks.title') }}</th>
            <th scope="col">{{ __('tasks.company_assigned') }}</th>
            <th scope="col">{{ __('tasks.user_assigned') }}</th>
            <th scope="col">{{ __('tasks.status') }}</th>
            <th scope="col">{{ __('tasks.scheduled_date') }}</th>
            <th scope="col">{{ __('tasks.completed_date') }}</th>
            <th scope="col">{{ __('tasks.created_at') }}</th>
            <th scope="col" class="text-end">{{ __('messages.actions') }}</th>
        @endslot

        @slot('tableBody')
            @foreach ($tasks as $task)
                <tr class="align-middle">
                    <th scope="row">{{ $task->id }}</th>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}"
                           class="fw-bold text-decoration-none link-primary link-opacity-50-hover">
                            {{ $task->title }}
                        </a>
                    </td>
                    <td>
                        @if (!empty($task->company))
                            <a href="{{ route('companies.show', $task->company) }}"
                               class="fw-bold text-decoration-none link-primary link-opacity-50-hover">
                                {{ $task->company->name }}
                            </a>
                        @else
                            N/A
                        @endif
                    </td>
                    <td>{{ $task->user->name }}</td>
                    <td>{{ $statusesArr[$task->status] ?? 'N/A' }}</td>
                    <td class="text-body-secondary">{{ Carbon::parse($task->scheduled_date)->format('d.m.Y') ?? 'N/A' }}</td>
                    <td class="text-body-secondary">{{ Carbon::parse($task->completed_date)->format('d.m.Y H:i') ?? 'N/A' }}</td>
                    <td class="text-body-secondary">{{ Carbon::parse($task->created_at)->format('d.m.Y H:i') ?? 'N/A' }}</td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('tasks.edit', $task) }}" class="btn" data-bs-toggle="tooltip"
                               title="{{ __('messages.edit') }}">
                                <x-icon name="pencil" size="5" color="primary"></x-icon>
                            </a>

                            <x-form.delete_button route="{{ route('tasks.destroy', $task) }}"
                                confirmationMessage="'{{ __('tasks.confirm_delete') }}'" />
                        </div>
                    </td>
                </tr>
            @endforeach
        @endslot

        @slot('paginationLinks')
            {{ $tasks->links() }}
        @endslot

    @endcomponent
@endsection
