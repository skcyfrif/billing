<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class ControlPanelController extends Controller
{



    public function dashboard()
{
    $controlpaneladminCount = User::where('role', 'controlpaneladmin')
                        ->where('created_by', auth()->id())
                        ->count();

    return view('controlpanel.dashboard', compact('controlpaneladminCount'));
}





    // === ControlPanel Admin Management ===

    // List all controlpanel Admins
    public function cpadminIndex()
    {


        $controlpanels = User::where('role', 'controlpaneladmin')
                            ->where('created_by', auth()->user()->id) // Filter by logged-in admin
                            ->get();

        return view('controlpanel.controlpaneladmin.index', compact('controlpanels'));

    }

    // Show add controlpanel form
    public function controlpanelCreate()
    {
        return view('controlpanel.controlpaneladmin.create');
    }

    // Store controlpanel user
    public function cpadminStore(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'role' => 'required|in:controlpaneladmin', // ✅ Validate only 'controlpanel'
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

    return redirect()->route('cpadmin.index')
                     ->with('success', 'ControlPanel Admin created successfully!');
}

public function cpadminShow($id)
{

    $controlpanel = User::where('role', 'controlpaneladmin')
                    ->where('id', $id)->firstOrFail();
    return view('controlpanel.controlpaneladmin.show', compact('controlpanel'));
}


public function cpadminEdit($id)
{
    $controlpanel = User::where('role', 'controlpaneladmin')->findOrFail($id);
    return view('controlpanel.controlpaneladmin.edit', compact('controlpanel'));
}

public function cpadminUpdate(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'role' => 'required|in:controlpaneladmin',
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
    return redirect()->route('cpadmin.index')->with('success', 'ControlPanel Admin updated successfully!');
}

public function cpadminDelete($id)
{
    $user = User::where('role', 'controlpaneladmin')->findOrFail($id);
    $user->delete();

    return redirect()->route('cpadmin.index')->with('success', 'ControlPanel Admin deleted successfully!');
}
}
