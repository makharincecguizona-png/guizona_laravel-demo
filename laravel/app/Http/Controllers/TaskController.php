<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
        ]);

        Task::create([
            'task_name' => $request->task_name,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => 'Pending',
        ]);

        return redirect()->to('https://animated-xylophone-xrppgq5xj6wrfp4v4-8000.app.github.dev/tasks');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'task_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|string',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->only(['task_name', 'description', 'status', 'due_date']));

        return redirect()->to('https://animated-xylophone-xrppgq5xj6wrfp4v4-8000.app.github.dev/tasks');
    }

    public function updateStatus(Task $task)
    {
        $task->update([
            'status' => $task->status === 'Completed' ? 'Pending' : 'Completed',
        ]);

        return redirect()->to('https://animated-xylophone-xrppgq5xj6wrfp4v4-8000.app.github.dev/tasks');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->to('https://animated-xylophone-xrppgq5xj6wrfp4v4-8000.app.github.dev/tasks');
    }
}