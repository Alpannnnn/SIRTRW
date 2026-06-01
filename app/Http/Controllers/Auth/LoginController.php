<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'nik' => ['required', 'string', 'size:16'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
            
            if ($user->status_akun === 'PENDING_VERIFICATION') {
                return redirect()->route('pending.verification');
            }
            
            if ($user->status_akun === 'SUSPENDED') {
                Auth::logout();
                return back()->with('error', 'Akun Anda telah ditangguhkan. Silakan hubungi Pengurus RT.');
            }

            return redirect()->intended('dashboard');
        }

        return back()->withErrors([
            'nik' => 'Kombinasi NIK dan Kata Sandi tidak cocok.',
        ])->onlyInput('nik');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
