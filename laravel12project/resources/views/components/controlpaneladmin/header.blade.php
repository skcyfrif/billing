<header class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-xl font-semibold">ControlPanel Admin: {{ Auth::user()->name }}</h1>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">
            Logout
        </button>
    </form>
</header>
