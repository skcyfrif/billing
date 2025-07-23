<x-guest-layout>
    <form method="POST" action="/masteradmin/register">
        @csrf
@if ($errors->has('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4">
        {{ $errors->first('error') }}
    </div>
@endif

        {{-- <div>
            <label>Name</label>
            <input type="text" name="name" required autofocus>
        </div> --}}

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
                <option value="masteradmin">masteradmin</option>
            </select>
        </div>

        {{-- <div>
            <label>Role</label>
            <select name="role" required>
                <option value="masteradmin">masteradmin</option>
            </select>
        </div> --}}



        <div class="mb-4">
            <label class="block mb-1">Password</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" class="w-full border p-2 rounded" required>
        </div>


        {{-- <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div> --}}



        {{-- <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div> --}}

        {{-- <button type="submit">Register</button> --}}
        {{-- <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 text-center">Save</button> --}}
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 block mx-auto">
            Save
        </button>

    </form>
</x-guest-layout>
