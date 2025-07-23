@extends('layouts.controlpaneladmin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Add  Admin</h2>
    <a href="{{ url()->previous() }}" class="inline-block mb-4 bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        ← Back
    </a>

    <form action="{{ route('admin.store') }}" method="POST" class="bg-white p-6 rounded shadow w-full max-w-lg">
        @csrf

        <div class="mb-4">
            <label class="block mb-1">Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Role</label>
            <select name="role" class="w-full border p-2 rounded" required>
                <option value="admin">Admin</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Created By</label>
            <input type="text" name="created_by" class="w-full border p-2 rounded bg-gray-100"
                value="{{ Auth::user()->name }}" readonly>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Password</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Save</button>
    </form>
@endsection
