<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    protected function loginValidator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required'],
            'password' => ['required']
        ]);
    }

    public function index()
    {
        return view('user.login');
    }

    public function registration()
    {
        return view('user.registration');
    }

    public function create(Request $request)
    {
        $this->validator($request->all())->validate();
        
        $user = User::create([
            'id' => Uuid::uuid1()->toString(),
            'name' => $this->extractName($request->email),
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return Redirect('login');
    }

    public function doLogin(Request $request)
    {
        $this->loginValidator($request->all())->validate();
        
        if (Auth::attempt($request->only('email', 'password'))) 
        {
            return redirect()->intended('dashboard');
        }
    }

    public function doResetPassword(Request $request)
    {

    }
    
    public function logout()
    {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }

    protected function extractName($email) 
    {
        $email_arr = explode("@", $email);
        
        return $email_arr[0];
    }
}
