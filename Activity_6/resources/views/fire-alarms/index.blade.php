@extends('layouts.app')

@section('content')
<div class="py-6 px-4 w-full h-screen bg-white dark:bg-gray-900">
    <div class="w-full h-full bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md overflow-auto">
        <h2 class="text-4xl font-extrabold mb-8 text-white tracking-wide">🔥 Fire Alarm List</h2>

        {{-- Success Message --}}
        @if (session('success'))
            <p class="text-green-400 font-semibold mb-4">
                {{ session('success') }}
            </p>
        @endif

        {{-- Table --}}
        <div class="overflow-x-auto mb-6">
            <table class="w-full table-auto divide-y divide-gray-300 dark:divide-gray-600">
                <thead>
                    <tr class="bg-gray-100 dark:bg-gray-700">
                        @foreach (['Location', 'Status', 'Installation Date', 'Actions'] as $heading)
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-800 dark:text-gray-100 uppercase tracking-wider">
                                {{ $heading }}
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-300 dark:divide-gray-700">
                    @forelse ($fireAlarms as $alarm)
                        <tr>
                            <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $alarm->location }}</td>
                            <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $alarm->status }}</td>
                            <td class="px-6 py-4 text-gray-900 dark:text-gray-100">{{ $alarm->installation_date }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('fire-alarms.edit', $alarm->id) }}" class="text-blue-400 hover:underline">Edit</a>
                                <form action="{{ route('fire-alarms.destroy', $alarm->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Delete this fire alarm?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-400 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-600 dark:text-gray-300">
                                No fire alarms found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Add New Fire Alarm Button (Below Table) --}}
        <div class="flex justify-center">
            <a href="{{ route('fire-alarms.create') }}"
               class="px-8 py-3 bg-green-600 text-white rounded-full shadow-lg hover:bg-green-700 transition duration-200">
                ➕ Add New Fire Alarm
            </a>
        </div>
    </div>
</div>
@endsection
