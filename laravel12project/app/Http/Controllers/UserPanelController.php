<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class UserPanelController extends Controller
{
    //

    public function dashboard()
    {
        return view('user.dashboard');
    }
}
