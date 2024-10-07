<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login', [
            'title' => 'Login',
            'subtitle' => 'Form Login',
        ]);

        // dd('ini adalah halaman login');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            toast('Success Login', 'success');
            return redirect('/');
        }
        return back()->with('error', 'Email or Password salah');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('/login');
        // return redirect()->route('login');
    }
}
