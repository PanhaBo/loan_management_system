<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register()
    {
        return view('/auth/register');
    }

    public function registerPost(Request $request)
    {
        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user->save();

        return back()->with('success', 'Register successfully');
    }

    public function login()
    {
        return view('/auth/login');
    }

    public function loginPost(Request $request)
    {
        $credetails = [
            'email' => $request -> email,
            'password' => $request -> password,
        ];

        if (Auth::attempt($credetails)) {
            return redirect('/homepage')->with('success', 'Login Successfully');
        }

        return back()->with('error', 'Email or Password Incorrect');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
