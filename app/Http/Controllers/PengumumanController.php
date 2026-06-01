<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        $urgent  = Pengumuman::where('is_urgent', true)
                             ->where(fn($q) => $q->whereNull('tampil_sampai')->orWhere('tampil_sampai', '>=', now()))
                             ->with('pembuat')
                             ->latest()
                             ->get();

        $normal  = Pengumuman::where('is_urgent', false)
                             ->where(fn($q) => $q->whereNull('tampil_sampai')->orWhere('tampil_sampai', '>=', now()))
                             ->with('pembuat')
                             ->latest()
                             ->paginate(10);

        return view('pengumuman.index', compact('urgent', 'normal'));
    }

    public function create()
    {
        return view('pengumuman.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'         => ['required', 'string', 'max:200'],
            'konten'        => ['required', 'string'],
            'is_urgent'     => ['boolean'],
            'tampil_sampai' => ['nullable', 'date', 'after:now'],
        ]);

        Pengumuman::create([
            'judul'         => $validated['judul'],
            'konten'        => $validated['konten'],
            'is_urgent'     => $request->has('is_urgent'),
            'tampil_sampai' => $validated['tampil_sampai'] ?? null,
            'dibuat_oleh'   => auth()->id(),
        ]);

        return redirect()->route('pengumuman.index')
                         ->with('success', 'Pengumuman berhasil dipublikasikan.');
    }

    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil dihapus.');
    }
}
