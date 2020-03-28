<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Models\BookKeeping;

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

    public function userProfile($uuid)
    {
        return view('user.profile');
    }

    public function bookKeeping($uuid)
    {
        $transactions = BookKeeping::where('user_id', '=', $uuid)->simplePaginate(10);
        
        return view('user.bookkeeping', ['transactions' => $transactions]);
    }
}
