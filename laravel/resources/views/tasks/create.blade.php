@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto">
    <h1 class="text-2xl font-bold mb-4 text-gray-800">Create Task</h1>

    <form action="/tasks" method="POST" class="bg-white p-6 rounded-lg shadow-sm border border-pink-100 space-y-4">
        @csrf
        <div>
            <label class="block mb-1 font-medium text-black-700">Task Name</label>
            <input type="text" name="task_name" required class="w-full border border-pink-200 p-2 rounded focus:outline-none focus:ring-2 focus:ring-pink-300">
        </div>
        <div>
            <label class="block mb-1 font-medium text-black-700">Description</label>
            <textarea name="description" rows="2" class="w-full border border-pink-200 p-2 rounded focus:outline-none focus:ring-2 focus:ring-pink-300"></textarea>
        </div>
        <div>
            <label class="block mb-1 font-medium text-black-700">Due Date</label>
            <input type="date" name="due_date" class="w-full border border-pink-200 p-2 rounded focus:outline-none focus:ring-2 focus:ring-pink-300">
        </div>
        <div class="flex justify-between pt-2">
            <a href="/tasks" class="bg-pink-100 hover:bg-pink-200 text-pink-800 px-4 py-2 rounded text-sm font-medium transition">Cancel</a>
            <button type="submit" class="bg-pink-500 hover:bg-pink-600 text-white px-4 py-2 rounded text-sm font-medium transition shadow-sm">Save Task</button>
        </div>
    </form>
</div>
@endsection