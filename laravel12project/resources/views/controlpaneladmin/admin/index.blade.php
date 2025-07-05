@extends('layouts.controlpaneladmin')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-xl font-bold"> Users Listing</h2>
        <a href="{{ route('admin.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-white rounded shadow">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-2 text-left">Name</th>
                <th class="p-2 text-left">Email</th>
                <th class="p-2 text-left">Role</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($controlpanels as $controlpanel)
                <tr class="border-t">
                    <td class="p-2">{{ $controlpanel->name }}</td>
                    <td class="p-2">{{ $controlpanel->email }}</td>
                    <td class="p-2">{{ $controlpanel->role }}</td>
                    <td class="p-2 space-x-2">
                        {{-- <a href="{{ route('user.show', $controlpanel->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">View</a> --}}
                        <a href="{{ route('admin.show', $controlpanel->id) }}" class="view_button">View</a>
                        <a href="{{ route('admin.edit', $controlpanel->id) }}" class="edit_button">Edit</a>
                        <form action="{{ route('admin.delete', $controlpanel->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure to delete?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete_button">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="p-2 text-center">No controlpanel users found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
