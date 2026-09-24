@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Personal Task Manager</h1>
    <a href="/tasks/create" class="bg-red-700 hover:bg-black-200 text-white px-4 py-2 rounded text-sm font-medium transition shadow-sm">Add Task</a>
</div>

<div class="bg-red rounded-lg shadow overflow-hidden border border-pink-200">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-pink-300/60 text-black-800">
                <th class="p-3">Task</th>
                <th class="p-3">Description</th>
                <th class="p-3">Due Date</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-red-200 text-sm">
            @forelse($tasks as $task)
            <tr class="border-t">
                <td class="p-3 font-semibold text-black-800">{{ $task->task_name }}</td>
                <td class="p-3 text-black-600">{{ $task->description }}</td>
                <td class="p-3 text-black-600">{{ $task->due_date }}</td>
                <td class="p-3">
                    <form action="/tasks/{{ $task->id }}/status" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-3 py-1 rounded-full text-xs font-semibold {{ $task->status === 'Completed' ? 'bg-pink-200 text-pink-800' : 'bg-rose-100 text-rose-700' }}">
                            {{ $task->status }}
                        </button>
                    </form>
                </td>
                <td class="p-3 flex space-x-2">
                    <a href="/tasks/{{ $task->id }}/edit" class="bg-pink-100 hover:bg-pink-200 text-pink-800 px-3 py-1 rounded-md text-xs font-medium transition">Edit</a>
                    <form action="/tasks/{{ $task->id }}" method="POST" onsubmit="return confirm('Delete task?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-rose-400 hover:bg-rose-500 text-white px-3 py-1 rounded-md text-xs font-medium transition">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-black-800">No tasks found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection