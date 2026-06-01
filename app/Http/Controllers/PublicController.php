<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use App\Models\Event;
use App\Models\Warga;
use App\Models\Aduan;
use App\Models\Surat;

class PublicController extends Controller
{
    public function landing()
    {
        // Ambil pengumuman publik (urgent duluan)
        $pengumuman = Pengumuman::where(function ($q) {
                            $q->whereNull('tampil_sampai')
                              ->orWhere('tampil_sampai', '>=', now());
                        })
                        ->with('pembuat')
                        ->orderByDesc('is_urgent')
                        ->orderByDesc('created_at')
                        ->take(6)
                        ->get();

        // Event mendatang
        $events = Event::where('tanggal_mulai', '>=', now())
                        ->orderBy('tanggal_mulai')
                        ->take(4)
                        ->get();

        // Statistik publik
        $stats = [
            'total_warga'   => Warga::where('status_akun', 'ACTIVE')->count(),
            'total_aduan'   => Aduan::where('status', 'SELESAI')->count(),
            'total_surat'   => Surat::where('status', 'SELESAI')->count(),
            'total_event'   => Event::count(),
        ];

        return view('public.landing', compact('pengumuman', 'events', 'stats'));
    }
}
