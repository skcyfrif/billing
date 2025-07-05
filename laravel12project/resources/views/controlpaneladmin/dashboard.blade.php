{{-- <x-app-layout>
    <h2>Welcome Master Admin, {{ Auth::user()->name }}</h2>
</x-app-layout> --}}


{{-- @extends('layouts.masteradmin')

@section('content')
    <h2 class="text-xl font-bold mb-4">Dashboard Overview</h2>
    <p>You are logged in as Master Admin.</p>

    <!-- Add dashboard widgets, charts, etc. here -->
@endsection --}}


@extends('layouts.controlpaneladmin')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Total Users -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-700">Total Users</h3>
            <p class="text-3xl font-bold mt-2 text-blue-600">145</p>
        </div>

        <!-- Active Admins -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-700">Active Admins</h3>
            <p class="text-3xl font-bold mt-2 text-green-600">5</p>
        </div>

        <!-- Pending Requests -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-700">Pending Requests</h3>
            <p class="text-3xl font-bold mt-2 text-red-600">12</p>
        </div>
    </div>

    <!-- More Content -->
    <div class="mt-10">
        <h2 class="text-xl font-bold mb-4">Recent Activities</h2>
        <ul class="bg-white p-4 rounded shadow divide-y">
            <li class="py-2">User John created an account.</li>
            <li class="py-2">Admin Priya updated settings.</li>
            <li class="py-2">New user registration pending approval.</li>
        </ul>
    </div>
@endsection

