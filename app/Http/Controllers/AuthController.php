<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view("login");
    }
    public function register()
    {
        return view("register");
    }

        public function prosses_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/')->with('success', 'Sukses Masuk');
        }
        return redirect('/')->with('error', 'Invalid email or password.');
    }
        public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function proses_register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect('/login');
    }
}