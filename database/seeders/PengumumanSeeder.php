<?php

namespace Database\Seeders;

use App\Models\Pengumuman;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class PengumumanSeeder extends Seeder
{
    public function run(): void
    {
        $pengurusRw = Warga::where('nik', '3201010101010001')->first();
        $pengurusRt1 = Warga::where('nik', '3201010101010002')->first();

        Pengumuman::create([
            'judul' => '⚠️ Perbaikan Jalan Gang 5 - Harap Waspada',
            'konten' => 'Diberitahukan kepada seluruh warga bahwa mulai tanggal 1 Juni 2026, akan dilakukan perbaikan jalan di Gang 5 Blok A. Selama masa perbaikan (estimasi 5 hari kerja), akses kendaraan roda 4 akan dialihkan melalui Gang 4. Mohon kerja samanya dan harap hati-hati saat melintas. Terima kasih.',
            'dibuat_oleh' => $pengurusRw->id,
            'is_urgent' => true,
            'tampil_sampai' => '2026-06-10 23:59:00',
        ]);

        Pengumuman::create([
            'judul' => 'Pengumpulan Iuran Bulanan Juni 2026',
            'konten' => 'Warga RT 001 diharapkan segera melakukan pembayaran iuran bulanan bulan Juni 2026 sebesar Rp 50.000,- per KK. Pembayaran dapat dilakukan langsung ke Pengurus RT atau melalui transfer ke rekening kas RT. Batas pembayaran: 10 Juni 2026. Terima kasih atas partisipasinya.',
            'dibuat_oleh' => $pengurusRt1->id,
            'is_urgent' => false,
            'tampil_sampai' => '2026-06-15 23:59:00',
        ]);
    }
}
