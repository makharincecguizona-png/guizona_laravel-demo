@extends('layouts.app')

@content
<h1 class="text-2xl font-bold mb-4">Create Task</h1>

<form action="{{ route('tasks.store') }}" method="POST" class="bg-white p-6 rounded shadow space-y-4">
    @csrf
    <div>
        <label class="block mb-1">Task Name</label>
        <input type="text" name="task_name" required class="w-full border p-2 rounded">
    </div>
    <div>
        <label class="block mb-1">Description</label>
        <textarea name="description" class="w-full border p-2 rounded"></textarea>
    </div>
    <div>
        <label class="block mb-1">Due Date</label>
        <input type="date" name="due_date" class="w-full border p-2 rounded">
    </div>
    <div class="flex justify-between">
        <a href="{{ route('tasks.index') }}" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</a>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Save Task</button>
    </div>
</form>
@endsection