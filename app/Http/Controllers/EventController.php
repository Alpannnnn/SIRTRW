<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $upcoming = Event::where('tanggal_mulai', '>=', now())
                         ->orderBy('tanggal_mulai')
                         ->get();

        $past = Event::where('tanggal_mulai', '<', now())
                     ->orderBy('tanggal_mulai', 'desc')
                     ->take(5)
                     ->get();

        return view('event.index', compact('upcoming', 'past'));
    }

    public function create()
    {
        return view('event.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul'             => ['required', 'string', 'max:200'],
            'deskripsi'         => ['nullable', 'string'],
            'tanggal_mulai'     => ['required', 'date'],
            'tanggal_selesai'   => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'lokasi'            => ['nullable', 'string', 'max:200'],
        ]);

        Event::create(array_merge($validated, ['dibuat_oleh' => auth()->id()]));

        return redirect()->route('event.index')
                         ->with('success', 'Event berhasil ditambahkan ke agenda.');
    }

    public function edit(Event $event)
    {
        return view('event.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'judul'             => ['required', 'string', 'max:200'],
            'deskripsi'         => ['nullable', 'string'],
            'tanggal_mulai'     => ['required', 'date'],
            'tanggal_selesai'   => ['nullable', 'date', 'after_or_equal:tanggal_mulai'],
            'lokasi'            => ['nullable', 'string', 'max:200'],
        ]);

        $event->update($validated);

        return redirect()->route('event.index')
                         ->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('event.index')->with('success', 'Event berhasil dihapus.');
    }
}
