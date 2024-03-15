<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PengaturanController extends Controller
{
    public function index()
    {
        return view("Page.pengaturan");
    }
     public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|min:8',
            'profile' => 'nullable|image|max:1024', // Assuming max file size is 1MB
        ]);

        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasFile('profile')) {
            $request->file('profile')->move('profile_user/', $request->file('profile')->getClientOriginalName());
            $user->profile = $request->file('profile')->getClientOriginalName();
            $user->save();
        }


        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}