<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::filters(request()->all())
            ->orderBy('created_at', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(10);

        $statusesArr = Task::getStatuses();

        return view('tasks.index',
            compact('tasks', 'statusesArr'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usersArr = User::pluck('name', 'id');
        $statusesArr = Task::getStatuses();

        return view('tasks.create',
            compact('statusesArr', 'usersArr'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate((new Task())->validationRules());
        Task::create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', __('tasks.success_created'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $statusesArr = Task::getStatuses();

        return view('tasks.show',
            compact('task', 'statusesArr'));
    }

    public function changeStatus(Task $task, Int $newStatus)
    {
        try {
            $task->updateStatus($newStatus);

            return redirect()
                ->back()
                ->with('success', __('tasks.success_updated'));
        } catch (ValidationException $e) {
            return redirect()
                ->back()
                ->with('danger', $e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        if (!$task->isEditable()) {
            return redirect()
                ->back()
                ->with('danger', __('tasks.error_edit_not_allowed'));
        }

        $usersArr = User::pluck('name', 'id');
        $statusesArr = Task::getStatuses();

        return view('tasks.edit',
            compact('task', 'statusesArr', 'usersArr'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        if (!$task->isEditable()) {
            return redirect()
                ->back()
                ->with('danger', __('tasks.error_edit_not_allowed'));
        }

        $validated = $request->validate((new Task())->validationRules());
        $task->update($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', __('tasks.success_updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task, Request $request)
    {
        $task->delete();

        return redirect($request->input('redirect_url', route('tasks.index')))
            ->with('success', __('tasks.success_deleted'));
    }
}
