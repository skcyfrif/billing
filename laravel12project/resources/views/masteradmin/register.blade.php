<x-guest-layout>
    <form method="POST" action="/masteradmin/register">
        @csrf

        <div>
            <label>Name</label>
            <input type="text" name="name" required autofocus>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" required>
        </div>

        <div>
            <label>Role</label>
            <select name="role" required>
                <option value="masteradmin">masteradmin</option>
            </select>
        </div>

        <div>
            <label>Password</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Confirm Password</label>
            <input type="password" name="password_confirmation" required>
        </div>

        <button type="submit">Register</button>
    </form>
</x-guest-layout>
