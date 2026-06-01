<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\PeminjamanBarang;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function katalog(Request $request)
    {
        $query = Barang::query();

        if ($request->filled('kategori')) {
            $query->where('kategori_barang', $request->kategori);
        }

        if ($request->filled('search')) {
            $query->where('nama_barang', 'like', '%'.$request->search.'%');
        }

        $barang = $query->orderBy('nama_barang')->paginate(12)->withQueryString();

        $kategoris = Barang::select('kategori_barang')->distinct()->pluck('kategori_barang');

        return view('inventaris.katalog', compact('barang', 'kategoris'));
    }

    public function show(Barang $barang)
    {
        $barang->load('peminjaman.warga');
        return view('inventaris.show', compact('barang'));
    }

    public function create()
    {
        return view('inventaris.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_barang'       => ['required', 'string', 'max:100'],
            'kategori_barang'   => ['required', 'string'],
            'total_stok'        => ['required', 'integer', 'min:1'],
            'kondisi_fisik'     => ['required', 'in:BAIK,RUSAK_RINGAN,RUSAK_BERAT'],
            'deskripsi_aset'    => ['nullable', 'string'],
        ]);

        Barang::create(array_merge($validated, [
            'stok_tersedia' => $validated['total_stok'],
        ]));

        return redirect()->route('inventaris.katalog')
                         ->with('success', 'Barang inventaris berhasil ditambahkan.');
    }

    public function edit(Barang $barang)
    {
        return view('inventaris.edit', compact('barang'));
    }

    public function update(Request $request, Barang $barang)
    {
        $validated = $request->validate([
            'nama_barang'       => ['required', 'string', 'max:100'],
            'kategori_barang'   => ['required', 'string'],
            'kondisi_fisik'     => ['required', 'in:BAIK,RUSAK_RINGAN,RUSAK_BERAT'],
            'deskripsi_aset'    => ['nullable', 'string'],
        ]);

        $barang->update($validated);

        return redirect()->route('inventaris.katalog')
                         ->with('success', 'Data barang berhasil diperbarui.');
    }
}
