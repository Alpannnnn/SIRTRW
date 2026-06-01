<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PeminjamanBarang;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $user  = auth()->user();
        $query = PeminjamanBarang::with(['warga', 'barang', 'approver']);

        if ($user->isWarga()) {
            $query->where('warga_id', $user->id);
        }

        if ($request->filled('status')) {
            $query->where('status_peminjaman', $request->status);
        }

        $peminjaman = $query->latest()->paginate(15)->withQueryString();

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $barang = Barang::where('stok_tersedia', '>', 0)
                        ->where('kondisi_fisik', 'BAIK')
                        ->orderBy('nama_barang')
                        ->get();

        return view('peminjaman.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id'                 => ['required', 'exists:barang,id'],
            'jumlah_pinjam'             => ['required', 'integer', 'min:1'],
            'tanggal_mulai'             => ['required', 'date', 'after_or_equal:today'],
            'tanggal_kembali_rencana'   => ['required', 'date', 'after:tanggal_mulai'],
            'alasan_peminjaman'         => ['required', 'string', 'min:10'],
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);

        if ($barang->stok_tersedia < $validated['jumlah_pinjam']) {
            return back()->withErrors(['jumlah_pinjam' => 'Stok yang tersedia tidak mencukupi.'])->withInput();
        }

        PeminjamanBarang::create([
            'warga_id'                  => auth()->id(),
            'barang_id'                 => $validated['barang_id'],
            'jumlah_pinjam'             => $validated['jumlah_pinjam'],
            'tanggal_mulai'             => $validated['tanggal_mulai'],
            'tanggal_kembali_rencana'   => $validated['tanggal_kembali_rencana'],
            'alasan_peminjaman'         => $validated['alasan_peminjaman'],
            'status_peminjaman'         => 'MENUNGGU_PERSETUJUAN',
        ]);

        return redirect()->route('peminjaman.index')
                         ->with('success', 'Permohonan peminjaman berhasil diajukan. Menunggu persetujuan pengurus.');
    }

    public function approve(PeminjamanBarang $peminjaman)
    {
        $barang = $peminjaman->barang;

        if ($barang->stok_tersedia < $peminjaman->jumlah_pinjam) {
            return back()->with('error', 'Stok tidak mencukupi untuk disetujui.');
        }

        $peminjaman->update([
            'status_peminjaman' => 'ON_USE',
            'disetujui_oleh'    => auth()->id(),
        ]);

        $barang->decrement('stok_tersedia', $peminjaman->jumlah_pinjam);

        return redirect()->back()->with('success', 'Peminjaman disetujui.');
    }

    public function reject(Request $request, PeminjamanBarang $peminjaman)
    {
        $request->validate(['catatan_kondisi_kembali' => ['nullable', 'string']]);

        $peminjaman->update([
            'status_peminjaman'         => 'REJECTED',
            'catatan_kondisi_kembali'   => $request->catatan_kondisi_kembali,
            'disetujui_oleh'            => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Peminjaman ditolak.');
    }

    public function returnItem(Request $request, PeminjamanBarang $peminjaman)
    {
        $request->validate(['catatan_kondisi_kembali' => ['nullable', 'string']]);

        $peminjaman->update([
            'status_peminjaman'         => 'RETURNED',
            'tanggal_kembali_realisasi' => now(),
            'catatan_kondisi_kembali'   => $request->catatan_kondisi_kembali,
        ]);

        $peminjaman->barang->increment('stok_tersedia', $peminjaman->jumlah_pinjam);

        return redirect()->back()->with('success', 'Barang berhasil dikembalikan. Stok diperbarui.');
    }
}
