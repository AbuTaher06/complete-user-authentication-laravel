<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show Register Page
    public function showRegister()
    {
        return view('auth.register');
    }

    // Show Login Page
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle User Registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login.form')->with('success', 'Registration successful! Please log in.');
    }

    // Handle User Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
           flash()->success('Logged in successfully.');
            // Regenerate session to prevent session fixation attac
            return redirect()->route('dashboard');
        }
        flash()->error('Invalid credentials. Please try again.');
        return back();
    }

    // Show Dashboard
    public function dashboard()
    {
        return view('users.dashboard');
    }

    // Handle Logout
    public function logout()
    {
        Auth::logout();
        flash()->success('Logged out successfully.');
        return redirect()->route('login.form');
}

}
