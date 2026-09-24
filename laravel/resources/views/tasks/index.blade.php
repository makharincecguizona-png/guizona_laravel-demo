@extends('layouts.app')

@content
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Personal Task Manager</h1>
    <a href="{{ route('tasks.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Add Task</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-3">Task</th>
                <th class="p-3">Description</th>
                <th class="p-3">Due Date</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tasks as $task)
            <tr class="border-t">
                <td class="p-3 font-semibold">{{ $task->task_name }}</td>
                <td class="p-3 text-gray-600">{{ $task->description }}</td>
                <td class="p-3">{{ $task->due_date }}</td>
                <td class="p-3">
                    <form action="{{ route('tasks.updateStatus', $task) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-2 py-1 rounded text-white text-sm {{ $task->status === 'Completed' ? 'bg-green-600' : 'bg-yellow-500' }}">
                            {{ $task->status }}
                        </button>
                    </form>
                </td>
                <td class="p-3 flex space-x-2">
                    <a href="{{ route('tasks.edit', $task) }}" class="bg-gray-500 text-white px-2 py-1 rounded text-sm">Edit</a>
                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirm('Delete task?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-2 py-1 rounded text-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-500">No tasks found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection