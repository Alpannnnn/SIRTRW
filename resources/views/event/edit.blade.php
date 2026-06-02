@extends('layouts.app')
@section('title', 'Edit Event')
@section('breadcrumb') <a href="{{ route('event.index') }}" class="hover:text-teal-600 transition">Event</a> @endsection

@section('content')
<div class="max-w-2xl mx-auto">
<div class="bg-white rounded-xl border border-slate-200 shadow-xs overflow-hidden">
    <div class="px-5 py-4 border-b border-slate-100 bg-slate-50/50">
        <h3 class="text-sm font-extrabold text-slate-900">Edit Event</h3>
    </div>
    <div class="p-6">
    <form method="POST" action="{{ route('event.update', $event) }}" class="space-y-5">
        @csrf @method('PUT')
        <x-input name="judul" label="Nama Event" required="true" :value="$event->judul" />
        <x-textarea name="deskripsi" label="Deskripsi" rows="4" :value="$event->deskripsi" />
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input name="tanggal_mulai" label="Tanggal &amp; Waktu Mulai" type="datetime-local" required="true" :value="$event->tanggal_mulai ? \Carbon\Carbon::parse($event->tanggal_mulai)->format('Y-m-d\TH:i') : ''" />
            <x-input name="tanggal_selesai" label="Tanggal &amp; Waktu Selesai" type="datetime-local" :value="$event->tanggal_selesai ? \Carbon\Carbon::parse($event->tanggal_selesai)->format('Y-m-d\TH:i') : ''" />
        </div>
        <x-input name="lokasi" label="Lokasi" :value="$event->lokasi" />
        <div class="flex gap-3 pt-2">
            <x-button type="submit" variant="primary">Update Event</x-button>
            <x-button href="{{ route('event.index') }}" variant="outline">Batal</x-button>
        </div>
    </form>
    </div>
</div>
</div>
@endsection
