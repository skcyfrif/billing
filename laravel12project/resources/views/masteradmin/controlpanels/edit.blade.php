@extends('layouts.masteradmin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Edit ControlPanel User</h2>

    <a href="{{ url()->previous() }}" class="inline-block mb-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        ← Back
    </a>

    <form action="{{ route('controlpanels.update', $controlpanel->id) }}" method="POST"
        class="bg-white p-6 rounded shadow w-full max-w-lg">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded"
                value="{{ old('name', $controlpanel->name) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded"
                value="{{ old('email', $controlpanel->email) }}" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Role</label>
            <select name="role" class="w-full border p-2 rounded" required>
                <option value="controlpanel" {{ $controlpanel->role === 'controlpanel' ? 'selected' : '' }}>controlpanel
                </option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">New Password <small>(leave blank to keep current)</small></label>
            <input type="password" name="password" class="w-full border p-2 rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-1">Confirm New Password</label>
            <input type="password" name="password_confirmation" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Update</button>
    </form>
@endsection
