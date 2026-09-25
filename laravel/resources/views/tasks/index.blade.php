@extends('layouts.app')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold text-gray-900">Personal Task Manager</h1>
    <a href="/tasks/create" class="bg-red-700 hover:bg-red-800 text-white px-4 py-2 rounded text-sm font-medium transition shadow-sm inline-flex items-center">Add Task</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden border border-gray-400">
    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="bg-red-100 text-gray-900 border-b border-gray-300">
                <th class="p-3 text-left">Task</th>
                <th class="p-3 text-left">Description</th>
                <th class="p-3 text-left">Due Date</th>
                <th class="p-3 text-center">Status</th>
                <th class="p-3 text-center">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-300 text-sm">
            @forelse($tasks as $task)
            <tr class="border-t border-gray-200 hover:bg-gray-50/50 transition">
                <td class="p-3 align-middle font-semibold text-gray-900">{{ $task->task_name }}</td>
                <td class="p-3 align-middle text-gray-700">{{ $task->description }}</td>
                <td class="p-3 align-middle text-gray-700 whitespace-nowrap">{{ $task->due_date }}</td>
                <td class="p-3 align-middle text-center">
                    <form action="/tasks/{{ $task->id }}/status" method="POST" class="inline-block">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="px-3 py-1 rounded-full text-xs font-semibold inline-block {{ $task->status === 'Completed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $task->status }}
                        </button>
                    </form>
                </td>
                <td class="p-3 align-middle text-center">
                    <div class="flex items-center justify-center space-x-2">
                        <a href="/tasks/{{ $task->id }}/edit" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-3 py-1 rounded-md text-xs font-medium transition inline-block">Edit</a>
                        <form action="/tasks/{{ $task->id }}" method="POST" onsubmit="return confirm('Delete task?')" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md text-xs font-medium transition inline-block">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="p-4 text-center text-gray-600">No tasks found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection