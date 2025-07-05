<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/app.css', 'resources/css/admin.css', 'resources/js/app.js'])
    {{-- <link rel="stylesheet" href="{{ asset('css/masteradmin.css') }}"> --}}

</head>
<body class="bg-gray-100 text-gray-800">

    <div class="flex h-screen">
        <!-- Sidebar -->
        <x-admin.sidebar />

        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <x-admin.header />

            <!-- Main Content -->
            <main class="p-4 overflow-y-auto">
                @yield('content')
            </main>

            <!-- Footer -->
            <x-admin.footer />
        </div>
    </div>

</body>
</html>
