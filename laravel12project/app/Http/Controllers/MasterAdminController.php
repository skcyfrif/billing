<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;


class MasterAdminController extends Controller
{
    //


    public function showRegisterForm()
{
    return view('masteradmin.register');
}

public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
        'role' => 'required|in:masteradmin', // restrict to masteradmin only
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    Auth::login($user);

    return redirect('/masteradmin/dashboard');
}

public function dashboard()
{
    // return view('masteradmin.dashboard');
    $controlpanelCount = User::where('role', 'controlpanel')->count();

    return view('masteradmin.dashboard', compact('controlpanelCount'));
}



// === ControlPanel Management ===

    // List all controlpanel users
    public function controlpanelIndex()
    {
        $controlpanels = User::where('role', 'controlpanel')->get();
        return view('masteradmin.controlpanels.index', compact('controlpanels'));
    }

    // Show add controlpanel form
    public function controlpanelCreate()
    {
        return view('masteradmin.controlpanels.create');
    }

    // Store controlpanel user
    public function controlpanelStore(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'role' => 'required|in:controlpanel', // ✅ Validate only 'controlpanel'
        'password' => 'required|confirmed|min:6',
    ]);


// dd($request->all());
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => $request->role,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('controlpanels.index')
                     ->with('success', 'ControlPanel user created successfully!');
}



public function controlpanelShow($id)
{
    $controlpanel = User::where('role', 'controlpanel')
                    ->where('id', $id)->firstOrFail();
    return view('masteradmin.controlpanels.show', compact('controlpanel'));
}


public function controlpanelEdit($id)
{
    $controlpanel = User::where('role', 'controlpanel')->findOrFail($id);
    return view('masteradmin.controlpanels.edit', compact('controlpanel'));
}

public function controlpanelUpdate(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,'.$id,
        'role' => 'required|in:controlpanel',
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
    return redirect()->route('controlpanels.index')->with('success', 'ControlPanel user updated successfully!');
}

public function controlpanelDelete($id)
{
    $user = User::where('role', 'controlpanel')->findOrFail($id);
    $user->delete();

    return redirect()->route('controlpanels.index')->with('success', 'ControlPanel user deleted successfully!');
}


}

