<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class KependudukanController extends Controller
{
    public function index(Request $request)
    {
        $query = Warga::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_lengkap', 'like', "%$search%")
                  ->orWhere('nik', 'like', "%$search%")
                  ->orWhere('blok_rumah', 'like', "%$search%");
            });
        }

        if ($request->filled('rt')) {
            $query->where('rt_id', $request->rt);
        }

        if ($request->filled('status')) {
            $query->where('status_akun', $request->status);
        }

        $warga = $query->orderBy('nama_lengkap')->paginate(15)->withQueryString();

        $stats = [
            'total_aktif'   => Warga::where('status_akun', 'ACTIVE')->count(),
            'total_pending' => Warga::where('status_akun', 'PENDING_VERIFICATION')->count(),
            'total_semua'   => Warga::count(),
        ];

        return view('kependudukan.index', compact('warga', 'stats'));
    }

    public function show(Warga $warga)
    {
        $warga->load(['surat', 'aduan', 'peminjaman']);
        return view('kependudukan.show', compact('warga'));
    }
}
