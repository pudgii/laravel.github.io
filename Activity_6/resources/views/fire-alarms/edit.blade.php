@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
        <h2 class="text-4xl font-extrabold mb-8 text-white text-center tracking-wide">✏️ Edit Fire Alarm</h2>

        @if ($errors->any())
            <div class="mb-6 bg-red-100 text-red-800 p-4 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('fire-alarms.update', $fireAlarm->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="location" class="block text-sm font-medium text-gray-200">Location</label>
                <input type="text" name="location" id="location" value="{{ $fireAlarm->location }}"
                       class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-white focus:ring focus:ring-blue-300">
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-gray-200">Status</label>
                <select name="status" id="status"
                        class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-white focus:ring focus:ring-blue-300">
                    <option {{ $fireAlarm->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option {{ $fireAlarm->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    <option {{ $fireAlarm->status == 'Faulty' ? 'selected' : '' }}>Faulty</option>
                </select>
            </div>

            <div>
                <label for="installation_date" class="block text-sm font-medium text-gray-200">Installation Date</label>
                <input type="date" name="installation_date" id="installation_date" value="{{ $fireAlarm->installation_date }}"
                       class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-700 text-white focus:ring focus:ring-blue-300">
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('fire-alarms.index') }}" class="text-blue-400 hover:underline">← Back to List</a>

                <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                    ✅ Update
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
