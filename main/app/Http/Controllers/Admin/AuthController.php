<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        $login = trim((string) ($request->input('login') ?? $request->input('email') ?? $request->input('username')));
        $password = (string) $request->input('password');

        if ($login === '' || $password === '') {
            return back()
                ->withErrors([
                    'login' => 'Please enter both your username/email and password.',
                    'email' => 'Please enter both your username/email and password.',
                ])
                ->withInput();
        }

        $user = User::where(function ($query) use ($login) {
            $query->where('email', $login)
                  ->orWhere('name', $login);
            if (strtolower($login) === 'admin') {
                $query->orWhere('email', 'admin@temax.local');
            }
        })->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return back()
                ->withErrors([
                    'login' => 'These credentials do not match our records.',
                    'email' => 'These credentials do not match our records.',
                ])
                ->withInput();
        }

        if (!$user->is_admin) {
            return back()
                ->withErrors([
                    'login' => 'This account does not have administrator access.',
                    'email' => 'This account does not have administrator access.',
                ])
                ->withInput();
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('success', 'You have been signed out.');
    }
}
