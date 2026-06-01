<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $pengurusRw = Warga::where('nik', '3201010101010001')->first();
        $pengurusRt1 = Warga::where('nik', '3201010101010002')->first();

        $events = [
            [
                'judul' => 'Kerja Bakti Triwulan II',
                'deskripsi' => 'Kerja bakti bersama membersihkan selokan, memangkas rumput, dan merapikan taman RW. Warga diharapkan membawa peralatan masing-masing.',
                'tanggal_mulai' => '2026-06-08 07:00:00',
                'tanggal_selesai' => '2026-06-08 11:00:00',
                'lokasi' => 'Seluruh area RW 001',
                'dibuat_oleh' => $pengurusRw->id,
            ],
            [
                'judul' => 'Rapat Pleno Warga Semester I',
                'deskripsi' => 'Rapat pleno membahas laporan keuangan semester I, rencana kegiatan HUT RI, dan evaluasi keamanan lingkungan.',
                'tanggal_mulai' => '2026-06-15 19:30:00',
                'tanggal_selesai' => '2026-06-15 21:30:00',
                'lokasi' => 'Balai Warga RW 001',
                'dibuat_oleh' => $pengurusRw->id,
            ],
            [
                'judul' => 'Posyandu Balita & Lansia',
                'deskripsi' => 'Kegiatan posyandu rutin bulanan. Pemeriksaan kesehatan, imunisasi balita, dan cek tekanan darah lansia.',
                'tanggal_mulai' => '2026-06-20 08:00:00',
                'tanggal_selesai' => '2026-06-20 12:00:00',
                'lokasi' => 'Pos RT 001',
                'dibuat_oleh' => $pengurusRt1->id,
            ],
            [
                'judul' => 'Jadwal Ronda Malam - Juni 2026',
                'deskripsi' => 'Jadwal piket ronda malam untuk bulan Juni. Setiap malam terdiri dari 3 orang warga secara bergilir.',
                'tanggal_mulai' => '2026-06-01 22:00:00',
                'tanggal_selesai' => '2026-06-30 05:00:00',
                'lokasi' => 'Pos Ronda RT 001 & RT 002',
                'dibuat_oleh' => $pengurusRt1->id,
            ],
            [
                'judul' => 'Peringatan HUT RI ke-81',
                'deskripsi' => 'Rangkaian acara peringatan Hari Kemerdekaan: upacara bendera, lomba 17-an (balap karung, makan kerupuk, panjat pinang), dan malam puncak hiburan.',
                'tanggal_mulai' => '2026-08-10 07:00:00',
                'tanggal_selesai' => '2026-08-17 22:00:00',
                'lokasi' => 'Lapangan & Jalan Utama RW 001',
                'dibuat_oleh' => $pengurusRw->id,
            ],
        ];

        foreach ($events as $e) {
            Event::create($e);
        }
    }
}
