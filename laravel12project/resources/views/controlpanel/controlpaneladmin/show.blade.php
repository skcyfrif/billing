@extends('layouts.controlpanel')

@section('content')
    <h2 class="text-xl font-bold mb-4">View ControlPanel User</h2>
    <a href="{{ url()->previous() }}" class="inline-block mb-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        ← Back
    </a>

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 text-left">Name</th>
                <th class="p-2 text-left">Email</th>
                <th class="p-2 text-left">Role</th>
                <th class="p-2 text-left">Created By</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-t">
                <td class="p-2">{{ $controlpanel->name }}</td>
                <td class="p-2">{{ $controlpanel->email }}</td>
                <td class="p-2">{{ $controlpanel->role }}</td>
                <td class="p-2">{{ $controlpanel->creator->name }}</td>
            </tr>
        </tbody>
    </table>
@endsection
