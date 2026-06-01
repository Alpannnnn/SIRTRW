<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['nama_barang' => 'Sound System Portable', 'kategori_barang' => 'Elektronik', 'total_stok' => 2, 'stok_tersedia' => 2, 'kondisi_fisik' => 'BAIK', 'deskripsi_aset' => 'Speaker portable 12 inch dengan mic wireless, cocok untuk acara outdoor.'],
            ['nama_barang' => 'Tenda Pesta 4x6m', 'kategori_barang' => 'Tenda', 'total_stok' => 3, 'stok_tersedia' => 3, 'kondisi_fisik' => 'BAIK', 'deskripsi_aset' => 'Tenda kerucut putih ukuran 4x6 meter untuk acara hajatan.'],
            ['nama_barang' => 'Set Kursi Lipat (50pcs)', 'kategori_barang' => 'Furnitur', 'total_stok' => 5, 'stok_tersedia' => 5, 'kondisi_fisik' => 'BAIK', 'deskripsi_aset' => 'Kursi lipat stainless steel, 1 set isi 50 buah.'],
            ['nama_barang' => 'Genset Portabel 2200W', 'kategori_barang' => 'Elektronik', 'total_stok' => 1, 'stok_tersedia' => 1, 'kondisi_fisik' => 'BAIK', 'deskripsi_aset' => 'Generator listrik portabel kapasitas 2200 Watt.'],
            ['nama_barang' => 'Cangkul', 'kategori_barang' => 'Perkakas', 'total_stok' => 10, 'stok_tersedia' => 10, 'kondisi_fisik' => 'BAIK', 'deskripsi_aset' => 'Cangkul besi untuk kerja bakti dan berkebun.'],
            ['nama_barang' => 'Sekop', 'kategori_barang' => 'Perkakas', 'total_stok' => 8, 'stok_tersedia' => 8, 'kondisi_fisik' => 'BAIK', 'deskripsi_aset' => 'Sekop standar untuk kerja bakti.'],
            ['nama_barang' => 'Meja Lipat', 'kategori_barang' => 'Furnitur', 'total_stok' => 10, 'stok_tersedia' => 10, 'kondisi_fisik' => 'BAIK', 'deskripsi_aset' => 'Meja lipat plastik ukuran 120x60cm.'],
            ['nama_barang' => 'Terpal 5x7m', 'kategori_barang' => 'Perlengkapan', 'total_stok' => 4, 'stok_tersedia' => 4, 'kondisi_fisik' => 'BAIK', 'deskripsi_aset' => 'Terpal biru tahan air ukuran 5x7 meter.'],
        ];

        foreach ($items as $item) {
            Barang::create($item);
        }
    }
}
