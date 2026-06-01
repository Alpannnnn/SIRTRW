<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Aduan;
use App\Models\PeminjamanBarang;
use App\Models\Pengumuman;
use App\Models\Event;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Pengumuman aktif (shared)
        $recentPengumuman = Pengumuman::where(function ($q) {
                                $q->whereNull('tampil_sampai')
                                  ->orWhere('tampil_sampai', '>=', now());
                            })
                            ->orderByDesc('is_urgent')
                            ->orderByDesc('created_at')
                            ->take(5)
                            ->get();

        if ($user->isWarga()) {
            // Statistik personal warga
            $myStats = [
                'surat'       => Surat::where('warga_id', $user->id)->count(),
                'aduan'       => Aduan::where('warga_id', $user->id)->count(),
                'peminjaman'  => PeminjamanBarang::where('warga_id', $user->id)
                                    ->whereIn('status_peminjaman', ['APPROVED','ON_USE'])
                                    ->count(),
            ];

            // Surat terbaru milik warga
            $mySurat = Surat::where('warga_id', $user->id)
                            ->latest()->take(3)->get();

            // Aduan terbaru milik warga
            $myAduan = Aduan::where('warga_id', $user->id)
                            ->latest()->take(3)->get();

            // Peminjaman aktif milik warga
            $myPeminjaman = PeminjamanBarang::with('barang')
                                ->where('warga_id', $user->id)
                                ->whereIn('status_peminjaman', ['APPROVED','ON_USE','MENUNGGU_PERSETUJUAN'])
                                ->latest()->take(3)->get();

            // Event mendatang
            $eventMendatang = Event::where('tanggal_mulai', '>=', now())
                                ->orderBy('tanggal_mulai')
                                ->take(3)
                                ->get();

            return view('dashboard.warga', compact(
                'user', 'recentPengumuman', 'myStats',
                'mySurat', 'myAduan', 'myPeminjaman', 'eventMendatang'
            ));
        } elseif ($user->isPengurusRt() || $user->isPengurusRw()) {
            return redirect()->route('admin.dashboard');
        }

        abort(403);
    }
}
