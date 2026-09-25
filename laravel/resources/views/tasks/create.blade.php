@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-gray-900 tracking-tight">Create Task</h1>

    <form action="/tasks" method="POST" class="bg-white p-6 rounded-xl shadow-sm border border-gray-400 space-y-4">
        @csrf
        <div>
            <label class="block mb-1 font-medium text-gray-800 text-sm">Task Name</label>
            <input type="text" name="task_name" required class="w-full border border-gray-300 p-2.5 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition">
        </div>
        <div>
            <label class="block mb-1 font-medium text-gray-800 text-sm">Description</label>
            <input type="text" name="description" class="w-full border border-gray-300 p-2.5 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition">
        </div>
        <div>
            <label class="block mb-1 font-medium text-gray-800 text-sm">Due Date</label>
            <input type="date" name="due_date" class="w-full border border-gray-300 p-2.5 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-red-600 focus:border-transparent transition">
        </div>
        <div class="flex justify-between items-center pt-2">
            <a href="/tasks" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm font-medium transition">Cancel</a>
            <button type="submit" class="bg-red-700 hover:bg-red-800 text-white px-5 py-2 rounded-lg text-sm font-medium transition shadow-sm">Save Task</button>
        </div>
    </form>
</div>
@endsection