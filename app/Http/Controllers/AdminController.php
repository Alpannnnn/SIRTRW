<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\Surat;
use App\Models\Aduan;
use App\Models\Kas;
use App\Models\Event;
use App\Models\Barang;
use App\Models\PeminjamanBarang;
use App\Models\Pengumuman;

class AdminController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Stats utama
        $stats = [
            'total_warga'       => Warga::where('status_akun', 'ACTIVE')->count(),
            'pending_verifikasi'=> Warga::where('status_akun', 'PENDING_VERIFICATION')->count(),
            'surat_menunggu'    => Surat::whereIn('status', ['DIAJUKAN', 'DISETUJUI_RT'])->count(),
            'aduan_aktif'       => Aduan::whereIn('status', ['DITERIMA', 'DIPROSES'])->count(),
            'peminjaman_pending'=> PeminjamanBarang::where('status_peminjaman', 'MENUNGGU_PERSETUJUAN')->count(),
            'barang_tersedia'   => Barang::where('stok_tersedia', '>', 0)->count(),
        ];

        // Keuangan
        $keuangan = [
            'pemasukan'   => Kas::where('jenis', 'PEMASUKAN')->sum('jumlah'),
            'pengeluaran' => Kas::where('jenis', 'PENGELUARAN')->sum('jumlah'),
        ];
        $keuangan['saldo'] = $keuangan['pemasukan'] - $keuangan['pengeluaran'];

        // Data terbaru (untuk quick review)
        $pendingWarga   = Warga::where('status_akun', 'PENDING_VERIFICATION')->latest()->take(5)->get();
        $suratTerbaru   = Surat::with('pemohon')->whereIn('status', ['DIAJUKAN','DISETUJUI_RT'])->latest()->take(5)->get();
        $aduanTerbaru   = Aduan::with('pelapor')->whereIn('status', ['DITERIMA','DIPROSES'])->latest()->take(5)->get();
        $peminjamanPending = PeminjamanBarang::with(['warga','barang'])->where('status_peminjaman','MENUNGGU_PERSETUJUAN')->latest()->take(5)->get();

        // Event mendatang
        $eventMendatang = Event::where('tanggal_mulai', '>=', now())->orderBy('tanggal_mulai')->take(3)->get();

        // Grafik kas 6 bulan
        $chartKas = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $chartKas[] = [
                'label'       => $month->format('M'),
                'pemasukan'   => Kas::where('jenis','PEMASUKAN')->whereYear('tanggal_transaksi',$month->year)->whereMonth('tanggal_transaksi',$month->month)->sum('jumlah'),
                'pengeluaran' => Kas::where('jenis','PENGELUARAN')->whereYear('tanggal_transaksi',$month->year)->whereMonth('tanggal_transaksi',$month->month)->sum('jumlah'),
            ];
        }

        // Distribusi aduan per kategori
        $aduanByKategori = Aduan::selectRaw('kategori, COUNT(*) as total')
                                ->groupBy('kategori')
                                ->pluck('total', 'kategori');

        return view('admin.dashboard', compact(
            'stats', 'keuangan',
            'pendingWarga', 'suratTerbaru', 'aduanTerbaru', 'peminjamanPending',
            'eventMendatang', 'chartKas', 'aduanByKategori'
        ));
    }
}
