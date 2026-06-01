<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function showForm()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'nik' => ['required', 'string', 'size:16', 'unique:warga'],
            'nama_lengkap' => ['required', 'string', 'max:150'],
            'no_telepon' => ['required', 'string', 'max:15'],
            'blok_rumah' => ['required', 'string', 'max:10'],
            'rt_id' => ['required', 'string', 'size:3'],
            'rw_id' => ['required', 'string', 'size:3'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ], [
            'nik.unique' => 'NIK ini sudah terdaftar di sistem kami.',
            'nik.size' => 'NIK harus tepat 16 digit angka.',
        ]);

        $warga = Warga::create([
            'nik' => $validated['nik'],
            'nama_lengkap' => $validated['nama_lengkap'],
            'no_telepon' => $validated['no_telepon'],
            'blok_rumah' => $validated['blok_rumah'],
            'rt_id' => $validated['rt_id'],
            'rw_id' => $validated['rw_id'],
            'password' => Hash::make($validated['password']),
            'role' => 'WARGA',
            'status_akun' => 'PENDING_VERIFICATION',
        ]);

        Auth::login($warga);

        return redirect()->route('pending.verification');
    }

    public function showPending()
    {
        $user = Auth::user();
        
        if (!$user) {
            return redirect()->route('login');
        }
        
        if ($user->status_akun === 'ACTIVE') {
            return redirect()->route('dashboard');
        }
        
        return view('auth.pending');
    }
}
