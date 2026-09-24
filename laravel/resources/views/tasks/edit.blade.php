@extends('layouts.app')

@content
<h1 class="text-2xl font-bold mb-4">Edit Task</h1>

<form action="{{ route('tasks.update', $task) }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block mb-1">Task Name</label>
        <input type="text" name="task_name" value="{{ $task->task_name }}" required class="w-full border p-2 rounded">
    </div>
    <div>
        <label class="block mb-1">Description</label>
        <textarea name="description" class="w-full border p-2 rounded">{{ $task->description }}</textarea>
    </div>
    <div>
        <label class="block mb-1">Status</label>
        <select name="status" class="w-full border p-2 rounded">
            <option value="Pending" {{ $task->status === 'Pending' ? 'selected' : '' }}>Pending</option>
            <option value="Completed" {{ $task->status === 'Completed' ? 'selected' : '' }}>Completed</option>
        </select>
    </div>
    <div>
        <label class="block mb-1">Due Date</label>
        <input type="date" name="due_date" value="{{ $task->due_date }}" class="w-full border p-2 rounded">
    </div>
    <div class="flex justify-between">
        <a href="{{ route('tasks.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Update Task</button>
    </div>
</form>
@endsection