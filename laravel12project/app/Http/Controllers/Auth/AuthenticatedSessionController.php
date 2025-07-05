<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        $user = Auth::user();

    // Role-based redirect
    if ($user->role === 'masteradmin') {
        return redirect()->intended('/masteradmin/dashboard');
    } elseif ($user->role === 'controlpanel') {
        return redirect()->intended('/controlpanel/dashboard');
    } elseif ($user->role === 'controlpaneladmin') {
        return redirect()->intended('/controlpaneladmin/dashboard');
    } elseif ($user->role === 'admin') {
        return redirect()->intended('/admin/dashboard');
    } elseif ($user->role === 'user') {
        return redirect()->intended('/user/dashboard');
    }

    // fallback
    return redirect()->intended('/');

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
