<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function dashboard()
    {
        if(Auth::check())
        {
            return view('user.dashboard');
        }

        return Redirect('login');
    }
}
