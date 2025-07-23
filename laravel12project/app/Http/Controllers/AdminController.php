<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AdminController extends Controller
{
    //

public function dashboard()
    {
        return view('admin.dashboard');
    }


 // List all Users

public function UserIndex()
    {
        $controlpanels = User::where('role', 'user')
                            ->where('created_by', auth()->user()->id) // Filter by logged-in admin
                            ->get();

        return view('admin.users.index', compact('controlpanels'));
    }




    // Show add user form
public function UserCreate()
    {
        return view('admin.users.create');
    }

    // Store controlpanel user
public function UserStore(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:user', // ✅ Validate only 'controlpanel'
            'password' => 'required|confirmed|min:6',
        ]);


    // dd($request->all());
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'created_by' => auth()->id(),
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')
                        ->with('success', 'User created successfully!');
    }

public function UserShow($id)
    {
        $controlpanel = User::where('role', 'user')
                        ->where('id', $id)->firstOrFail();
        return view('admin.users.show', compact('controlpanel'));
    }

public function UserEdit($id)
    {
        $controlpanel = User::where('role', 'user')->findOrFail($id);
        return view('admin.users.edit', compact('controlpanel'));
    }




public function UserUpdate(Request $request, $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:user',
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();
        return redirect()->route('user.index')->with('success', 'User updated successfully!');
    }


public function UserDelete($id)
    {
        $user = User::where('role', 'user')->findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }

}
