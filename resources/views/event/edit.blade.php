@extends('layouts.app')
@section('title', 'Edit Event')
@section('breadcrumb') <a href="{{ route('event.index') }}">Event</a> <span class="separator">›</span> Edit @endsection

@section('content')
<div style="max-width:700px;margin:0 auto">
<x-card title="Edit Event">
    <form method="POST" action="{{ route('event.update', $event) }}">
        @csrf @method('PUT')
        <x-input name="judul" label="Nama Event" required="true" :value="$event->judul" />
        <x-textarea name="deskripsi" label="Deskripsi" rows="4" :value="$event->deskripsi" />
        <div class="grid grid-2 gap-4">
            <x-input name="tanggal_mulai" label="Tanggal & Waktu Mulai" type="datetime-local" required="true" :value="$event->tanggal_mulai ? \Carbon\Carbon::parse($event->tanggal_mulai)->format('Y-m-d\TH:i') : ''" />
            <x-input name="tanggal_selesai" label="Tanggal & Waktu Selesai" type="datetime-local" :value="$event->tanggal_selesai ? \Carbon\Carbon::parse($event->tanggal_selesai)->format('Y-m-d\TH:i') : ''" />
        </div>
        <x-input name="lokasi" label="Lokasi" :value="$event->lokasi" />
        <div class="flex gap-3 mt-4">
            <x-button type="submit" variant="primary">Update Event</x-button>
            <a href="{{ route('event.index') }}" class="btn btn-outline">Batal</a>
        </div>
    </form>
</x-card>
</div>
@endsection
