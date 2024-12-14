<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Pastikan ada file `login.blade.php`
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect('/'); // Arahkan ke home setelah login
        }

        return back()->withErrors(['email' => 'Login gagal. Periksa email dan password Anda.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
