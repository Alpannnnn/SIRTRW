<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    public function index()
    {
        $pending = Warga::where('status_akun', 'PENDING_VERIFICATION')
                        ->orderBy('created_at')
                        ->paginate(15);

        return view('verifikasi.index', compact('pending'));
    }

    public function approve(Warga $warga)
    {
        $warga->update(['status_akun' => 'ACTIVE']);

        return redirect()->route('verifikasi.index')
                         ->with('success', "Akun warga {$warga->nama_lengkap} telah diaktifkan.");
    }

    public function suspend(Warga $warga)
    {
        $warga->update(['status_akun' => 'SUSPENDED']);

        return redirect()->back()
                         ->with('success', "Akun warga {$warga->nama_lengkap} telah ditangguhkan.");
    }

    public function restore(Warga $warga)
    {
        $warga->update(['status_akun' => 'ACTIVE']);

        return redirect()->back()
                         ->with('success', "Akun warga {$warga->nama_lengkap} telah dipulihkan.");
    }
}
