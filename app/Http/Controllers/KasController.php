<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use Illuminate\Http\Request;

class KasController extends Controller
{
    public function dashboard()
    {
        $totalPemasukan  = Kas::where('jenis', 'PEMASUKAN')->sum('jumlah');
        $totalPengeluaran = Kas::where('jenis', 'PENGELUARAN')->sum('jumlah');
        $saldo           = $totalPemasukan - $totalPengeluaran;

        $recentTransaksi = Kas::with('pencatat')->latest('tanggal_transaksi')->take(10)->get();

        // Chart data — last 6 months
        $chartData = [];
        for ($i = 5; $i >= 0; $i--) {
            $month = now()->subMonths($i);
            $chartData[] = [
                'label'       => $month->translatedFormat('M Y'),
                'pemasukan'   => Kas::where('jenis', 'PEMASUKAN')
                                    ->whereYear('tanggal_transaksi', $month->year)
                                    ->whereMonth('tanggal_transaksi', $month->month)
                                    ->sum('jumlah'),
                'pengeluaran' => Kas::where('jenis', 'PENGELUARAN')
                                    ->whereYear('tanggal_transaksi', $month->year)
                                    ->whereMonth('tanggal_transaksi', $month->month)
                                    ->sum('jumlah'),
            ];
        }

        return view('kas.dashboard', compact('totalPemasukan', 'totalPengeluaran', 'saldo', 'recentTransaksi', 'chartData'));
    }

    public function index(Request $request)
    {
        $query = Kas::with('pencatat');

        if ($request->filled('jenis')) {
            $query->where('jenis', $request->jenis);
        }

        if ($request->filled('scope')) {
            $query->where('rt_rw_scope', $request->scope);
        }

        if ($request->filled('bulan')) {
            $query->whereMonth('tanggal_transaksi', $request->bulan);
        }

        $transaksi = $query->orderBy('tanggal_transaksi', 'desc')->paginate(15)->withQueryString();

        $totalPemasukan  = Kas::where('jenis', 'PEMASUKAN')->sum('jumlah');
        $totalPengeluaran = Kas::where('jenis', 'PENGELUARAN')->sum('jumlah');
        $saldo = $totalPemasukan - $totalPengeluaran;

        return view('kas.index', compact('transaksi', 'totalPemasukan', 'totalPengeluaran', 'saldo'));
    }

    public function create()
    {
        return view('kas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis'               => ['required', 'in:PEMASUKAN,PENGELUARAN'],
            'jumlah'              => ['required', 'numeric', 'min:1'],
            'keterangan'          => ['required', 'string'],
            'tanggal_transaksi'   => ['required', 'date'],
            'rt_rw_scope'         => ['required', 'in:RT,RW'],
        ]);

        Kas::create(array_merge($validated, ['dicatat_oleh' => auth()->id()]));

        return redirect()->route('kas.index')
                         ->with('success', 'Transaksi kas berhasil dicatat.');
    }

    public function destroy(Kas $kas)
    {
        $kas->delete();
        return redirect()->back()->with('success', 'Data transaksi berhasil dihapus.');
    }
}
