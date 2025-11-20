<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display login form
     */
    public function index()
    {
        return view('login-form');
    }

    /**
     * Handle login form submission - Use Laravel Auth
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to authenticate user using email and password
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('laporan.index')->with('success', 'Login berhasil');
        }

        return redirect()->back()
            ->withInput($request->only('email'))
            ->with('error', 'Email atau password salah');
    }

    /**
     * Display registration form
     */
    public function registerForm()
    {
        return view('register-form');
    }

    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Auto-login after registration
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('laporan.index')->with('success', 'Registrasi berhasil! Selamat datang ' . $user->name);
    }

    /**
     * Handle logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Logout berhasil');
    }
}
