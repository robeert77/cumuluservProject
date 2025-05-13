@php
    use Carbon\Carbon;
    use App\Models\Task;
@endphp
@extends('layouts.app')

@section('content')
    <div class="row justify-content-around my-5">
        <div class="col-lg-6 card bg-white rounded">
            <div class="title-header pt-4 d-flex justify-content-between align-items-center">
                <div class="d-flex">
                    <a href="{{ $back ?? url()->previous() }}" class="px-2 pt-1 btn" data-bs-toggle="tooltip"
                       title="{{ __('messages.back') }}">
                        <x-icon name="chevron-left" color="secondary" size="5"></x-icon>
                    </a>
                    <h3 class="px-2 m-0">
                    <span class="bg-light rounded-3 px-3 me-2">
                        {{ __($task->title) }}
                    </span>
                    </h3>
                </div>
                <div class="pe-2 d-flex justify-content-end">
                    @if ($task->status === Task::STATUS_ACTIVE)
                        <a href="{{ route('tasks.status', ['task' => $task, 'status' => Task::STATUS_IN_PROGRESS]) }}"
                           class="btn" data-bs-toggle="tooltip" title="{{ __('tasks.start_task') }}">
                            <x-icon name="play-circle" size="5" color="success"></x-icon>
                        </a>
                    @elseif ($task->status === Task::STATUS_IN_PROGRESS)
                        <a href="{{ route('tasks.status', ['task' => $task, 'status' => Task::STATUS_COMPLETED]) }}"
                           class="btn" data-bs-toggle="tooltip" title="{{ __('tasks.complete_task') }}">
                            <x-icon name="check-circle" size="5" color="success"></x-icon>
                        </a>
                    @elseif ($task->status === Task::STATUS_ON_HOLD)
                        <a href="{{ route('tasks.status', ['task' => $task, 'status' => Task::STATUS_ACTIVE]) }}"
                           class="btn" data-bs-toggle="tooltip" title="{{ __('tasks.restart_task') }}">
                            <x-icon name="arrow-counterclockwise" size="5" color="success"></x-icon>
                        </a>
                    @endif

                    @if ($task->status === Task::STATUS_ACTIVE || $task->status === Task::STATUS_IN_PROGRESS)
                        <a href="{{ route('tasks.status', ['task' => $task, 'status' => Task::STATUS_ON_HOLD]) }}"
                           class="btn" data-bs-toggle="tooltip" title="{{ __('tasks.on_hold_task') }}">
                            <x-icon name="pause-circle" size="5" color="warning"></x-icon>
                        </a>

                        <a href="{{ route('tasks.edit', $task) }}" class="btn" data-bs-toggle="tooltip"
                           title="{{ __('messages.edit') }}">
                            <x-icon name="pencil" size="5" color="primary"></x-icon>
                        </a>
                    @endif

                    <x-form.delete_button route="{{ route('tasks.destroy', $task) }}"
                                          confirmationMessage="'{{ __('tasks.confirm_delete') }}'" />
                </div>
            </div>

            <hr class="my-3">

            <div class="px-2 fs-5">
                <strong>{{ __('tasks.title') }}:</strong> {{ $task->title }} <br>
                <strong>{{ __('tasks.user_assigned') }}:</strong> {{ $task->user->name }} <br>

                @if ($task->company_id)
                    <strong>{{ __('tasks.company_assigned') }}:</strong> {{ $task->company->name }}<br>
                @endif

                <strong>{{ __('tasks.status') }}:</strong>
                {{ $statusesArr[$task->status] ?? 'N/A' }}
                @if ($task->status === Task::STATUS_COMPLETED)
                    <span style="cursor: context-menu;" class="btn p-0">
                        <x-icon name="check-circle-fill" size="5" color="success"></x-icon>
                    </span>
                @elseif ($task->status === Task::STATUS_IN_PROGRESS)
                    <span style="cursor: context-menu;" class="btn p-0">
                        <x-icon name="play-circle-fill" size="5" color="success"></x-icon>
                    </span>
                @elseif ($task->status === Task::STATUS_ON_HOLD)
                    <span style="cursor: context-menu;" class="btn p-0">
                        <x-icon name="pause-circle-fill" size="5" color="warning"></x-icon>
                    </span>
                @elseif ($task->status === Task::STATUS_ACTIVE)
                    <span style="cursor: context-menu;" class="btn p-0">
                        <x-icon name="circle-fill" size="5" color="success"></x-icon>
                    </span>
                @endif

                <br>
                <strong>{{ __('tasks.scheduled_date') }}:</strong>
                {{ Carbon::parse($task->scheduled_date)->format('d.m.Y') }}
                @if (-1 * Carbon::parse($task->scheduled_date)->diffInDays(now()) <= 2)
                    <span style="cursor: context-menu;" class="btn p-0">
                        <x-icon name="exclamation-circle-fill" size="5" color="{{ Carbon::parse($task->scheduled_date)->lt(now()->startOfDay()) ? 'danger' : 'warning' }}"></x-icon>
                    </span>
                @endif
                <br>

                @if ($task->status === Task::STATUS_COMPLETED && !empty($task->completed_date))
                    <strong>{{ __('tasks.completed_date') }}:</strong> {{ Carbon::parse($task->completed_date)->format('d.m.Y H:i') }} <br>
                @endif

                <hr>

                <div class="p-3 mb-4 rounded bg-light details-box">
                    {{ Markdown::parse($task->description) }}
                </div>
            </div>
        </div>
    </div>
@endsection
