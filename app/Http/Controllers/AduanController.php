<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\KomentarAduan;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Aduan::with('pelapor');

        if ($user->isWarga()) {
            $query->where('warga_id', $user->id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('search')) {
            $query->where('judul', 'like', '%'.$request->search.'%');
        }

        $aduan = $query->latest()->paginate(12)->withQueryString();

        return view('aduan.index', compact('aduan'));
    }

    public function create()
    {
        return view('aduan.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'       => ['required', 'string', 'max:200'],
            'deskripsi'   => ['required', 'string', 'min:20'],
            'kategori'    => ['required', 'in:KEAMANAN,FASILITAS,KEBERSIHAN,PERSELISIHAN'],
        ]);

        Aduan::create([
            'warga_id'  => auth()->id(),
            'judul'     => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'kategori'  => $validated['kategori'],
            'status'    => 'DITERIMA',
        ]);

        return redirect()->route('aduan.index')
                         ->with('success', 'Pengaduan berhasil dikirim! Pengurus RT akan segera menindaklanjuti.');
    }

    public function show(Aduan $aduan)
    {
        $user = auth()->user();
        if ($user->isWarga() && $aduan->warga_id !== $user->id) {
            abort(403);
        }
        $aduan->load(['pelapor', 'komentar.penulis']);
        return view('aduan.show', compact('aduan'));
    }

    public function updateStatus(Request $request, Aduan $aduan)
    {
        $request->validate(['status' => ['required', 'in:DITERIMA,DIPROSES,SELESAI']]);
        $aduan->update(['status' => $request->status]);
        return redirect()->back()->with('success', 'Status aduan berhasil diperbarui.');
    }

    public function storeKomentar(Request $request, Aduan $aduan)
    {
        $request->validate(['isi_komentar' => ['required', 'string']]);

        KomentarAduan::create([
            'aduan_id'      => $aduan->id,
            'warga_id'      => auth()->id(),
            'isi_komentar'  => $request->isi_komentar,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil dikirim.');
    }
}
