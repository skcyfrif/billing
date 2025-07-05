<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ControlPanelAdminController extends Controller
{
    //
    public function dashboard()
    {
        return view('controlpaneladmin.dashboard');
    }





    // List all Admins
    public function AdminIndex()
    {
        $controlpanels = User::where('role', 'admin')->get();
        return view('controlpaneladmin.admin.index', compact('controlpanels'));

    }

    // Show add controlpanel form
    public function AdminCreate()
    {
        return view('controlpaneladmin.admin.create');
    }

    // Store controlpanel user
    public function AdminStore(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'role' => 'required|in:admin', // ✅ Validate only 'controlpanel'
        'password' => 'required|confirmed|min:6',
    ]);


// dd($request->all());
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('admin.index')
                     ->with('success', 'Admin created successfully!');
}

public function AdminShow($id)
{
    $controlpanel = User::where('role', 'admin')
                    ->where('id', $id)->firstOrFail();
    return view('controlpaneladmin.admin.show', compact('controlpanel'));
}

public function AdminEdit($id)
{
    $controlpanel = User::where('role', 'admin')->findOrFail($id);
    return view('controlpaneladmin.admin.edit', compact('controlpanel'));
}

public function AdminUpdate(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'role' => 'required|in:admin',
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
    return redirect()->route('admin.index')->with('success', 'Admin updated successfully!');
}

public function AdminDelete($id)
{
    $user = User::where('role', 'admin')->findOrFail($id);
    $user->delete();

    return redirect()->route('admin.index')->with('success', 'Admin deleted successfully!');
}
}
