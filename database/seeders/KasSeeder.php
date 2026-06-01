<?php

namespace Database\Seeders;

use App\Models\Kas;
use App\Models\Warga;
use Illuminate\Database\Seeder;

class KasSeeder extends Seeder
{
    public function run(): void
    {
        $pengurusRw = Warga::where('nik', '3201010101010001')->first();
        $pengurusRt1 = Warga::where('nik', '3201010101010002')->first();
        $pengurusRt2 = Warga::where('nik', '3201010101010003')->first();

        $transactions = [
            ['jenis' => 'PEMASUKAN', 'jumlah' => 5000000, 'keterangan' => 'Iuran bulanan warga RT 001 - Januari 2026', 'tanggal_transaksi' => '2026-01-05', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 4500000, 'keterangan' => 'Iuran bulanan warga RT 002 - Januari 2026', 'tanggal_transaksi' => '2026-01-06', 'dicatat_oleh' => $pengurusRt2->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PENGELUARAN', 'jumlah' => 750000, 'keterangan' => 'Perbaikan lampu jalan gang 3', 'tanggal_transaksi' => '2026-01-12', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PENGELUARAN', 'jumlah' => 500000, 'keterangan' => 'Pembelian alat kebersihan (sapu, pel, tempat sampah)', 'tanggal_transaksi' => '2026-01-20', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 2000000, 'keterangan' => 'Donasi warga Pak Hendra untuk perbaikan mushola', 'tanggal_transaksi' => '2026-02-01', 'dicatat_oleh' => $pengurusRw->id, 'rt_rw_scope' => 'RW'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 5000000, 'keterangan' => 'Iuran bulanan warga RT 001 - Februari 2026', 'tanggal_transaksi' => '2026-02-05', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 4500000, 'keterangan' => 'Iuran bulanan warga RT 002 - Februari 2026', 'tanggal_transaksi' => '2026-02-06', 'dicatat_oleh' => $pengurusRt2->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PENGELUARAN', 'jumlah' => 1500000, 'keterangan' => 'Pengecatan pagar taman RW', 'tanggal_transaksi' => '2026-02-15', 'dicatat_oleh' => $pengurusRw->id, 'rt_rw_scope' => 'RW'],
            ['jenis' => 'PENGELUARAN', 'jumlah' => 300000, 'keterangan' => 'Santunan duka cita keluarga Bpk Joko', 'tanggal_transaksi' => '2026-02-20', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 5000000, 'keterangan' => 'Iuran bulanan warga RT 001 - Maret 2026', 'tanggal_transaksi' => '2026-03-05', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 4500000, 'keterangan' => 'Iuran bulanan warga RT 002 - Maret 2026', 'tanggal_transaksi' => '2026-03-06', 'dicatat_oleh' => $pengurusRt2->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PENGELUARAN', 'jumlah' => 2500000, 'keterangan' => 'Perbaikan saluran air got blok A', 'tanggal_transaksi' => '2026-03-10', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 5000000, 'keterangan' => 'Iuran bulanan warga RT 001 - April 2026', 'tanggal_transaksi' => '2026-04-05', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 4500000, 'keterangan' => 'Iuran bulanan warga RT 002 - April 2026', 'tanggal_transaksi' => '2026-04-06', 'dicatat_oleh' => $pengurusRt2->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PENGELUARAN', 'jumlah' => 850000, 'keterangan' => 'Pembelian HT untuk ronda malam', 'tanggal_transaksi' => '2026-04-12', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 5000000, 'keterangan' => 'Iuran bulanan warga RT 001 - Mei 2026', 'tanggal_transaksi' => '2026-05-05', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 4500000, 'keterangan' => 'Iuran bulanan warga RT 002 - Mei 2026', 'tanggal_transaksi' => '2026-05-06', 'dicatat_oleh' => $pengurusRt2->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PENGELUARAN', 'jumlah' => 3500000, 'keterangan' => 'Persiapan kegiatan Isra Miraj - dekorasi & konsumsi', 'tanggal_transaksi' => '2026-05-10', 'dicatat_oleh' => $pengurusRw->id, 'rt_rw_scope' => 'RW'],
            ['jenis' => 'PENGELUARAN', 'jumlah' => 450000, 'keterangan' => 'Penggantian kunci gerbang pos ronda', 'tanggal_transaksi' => '2026-05-15', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
            ['jenis' => 'PEMASUKAN', 'jumlah' => 1000000, 'keterangan' => 'Donasi warga Ibu Dewi untuk kegiatan posyandu', 'tanggal_transaksi' => '2026-05-20', 'dicatat_oleh' => $pengurusRt1->id, 'rt_rw_scope' => 'RT'],
        ];

        foreach ($transactions as $t) {
            Kas::create($t);
        }
    }
}
