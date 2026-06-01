<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuratController extends Controller
{
    public function index(Request $request)
    {
        $user = auth()->user();
        $query = Surat::with('pemohon');

        if ($user->isWarga()) {
            $query->where('warga_id', $user->id);
        } elseif ($user->isPengurusRt()) {
            // RT sees surat from their RT
            $query->whereHas('pemohon', fn($q) => $q->where('rt_id', $user->rt_id));
        }
        // RW sees all

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('jenis')) {
            $query->where('jenis_surat', $request->jenis);
        }

        $surat = $query->latest()->paginate(15)->withQueryString();

        return view('surat.index', compact('surat'));
    }

    public function create()
    {
        return view('surat.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'jenis_surat'       => ['required', 'in:DOMISILI,KTP,SKTM'],
            'tujuan_pembuatan'  => ['required', 'string', 'min:20'],
        ]);

        Surat::create([
            'warga_id'          => auth()->id(),
            'jenis_surat'       => $validated['jenis_surat'],
            'tujuan_pembuatan'  => $validated['tujuan_pembuatan'],
            'status'            => 'DIAJUKAN',
            'kode_verifikasi'   => strtoupper(Str::random(10)),
        ]);

        return redirect()->route('surat.index')
                         ->with('success', 'Permohonan surat berhasil diajukan! Mohon tunggu persetujuan dari Pengurus RT.');
    }

    public function show(Surat $surat)
    {
        $this->authorizeView($surat);
        $surat->load(['pemohon', 'approverRt', 'approverRw']);
        return view('surat.show', compact('surat'));
    }

    public function approveRt(Surat $surat)
    {
        $this->authorize('pengurus_rt');
        $surat->update([
            'status'          => 'DISETUJUI_RT',
            'approved_by_rt'  => auth()->id(),
        ]);
        return redirect()->back()->with('success', 'Surat disetujui oleh RT. Menunggu persetujuan RW.');
    }

    public function approveRw(Surat $surat)
    {
        $this->authorize('pengurus_rw');
        $surat->update([
            'status'          => 'SELESAI',
            'approved_by_rw'  => auth()->id(),
        ]);
        return redirect()->back()->with('success', 'Surat telah disetujui dan selesai diproses.');
    }

    public function reject(Request $request, Surat $surat)
    {
        $request->validate(['catatan_penolakan' => ['required', 'string']]);

        $surat->update([
            'status'              => 'DITOLAK',
            'catatan_penolakan'   => $request->catatan_penolakan,
        ]);

        return redirect()->back()->with('success', 'Surat telah ditolak.');
    }

    private function authorizeView(Surat $surat)
    {
        $user = auth()->user();
        if ($user->isWarga() && $surat->warga_id !== $user->id) {
            abort(403);
        }
    }
}
