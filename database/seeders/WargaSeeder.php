<?php

namespace Database\Seeders;

use App\Models\Warga;
use Illuminate\Database\Seeder;

class WargaSeeder extends Seeder
{
    public function run(): void
    {
        // Pengurus RW
        Warga::create([
            'nik' => '3201010101010001',
            'nama_lengkap' => 'Budi Santoso',
            'no_telepon' => '081234567001',
            'blok_rumah' => 'A1',
            'rt_id' => '001',
            'rw_id' => '001',
            'password' => 'password123',
            'role' => 'PENGURUS_RW',
            'status_akun' => 'ACTIVE',
        ]);

        // Pengurus RT 001
        Warga::create([
            'nik' => '3201010101010002',
            'nama_lengkap' => 'Ahmad Hidayat',
            'no_telepon' => '081234567002',
            'blok_rumah' => 'A2',
            'rt_id' => '001',
            'rw_id' => '001',
            'password' => 'password123',
            'role' => 'PENGURUS_RT',
            'status_akun' => 'ACTIVE',
        ]);

        // Pengurus RT 002
        Warga::create([
            'nik' => '3201010101010003',
            'nama_lengkap' => 'Siti Rahmawati',
            'no_telepon' => '081234567003',
            'blok_rumah' => 'B1',
            'rt_id' => '002',
            'rw_id' => '001',
            'password' => 'password123',
            'role' => 'PENGURUS_RT',
            'status_akun' => 'ACTIVE',
        ]);

        // 10 Warga Aktif
        $wargaData = [
            ['nik' => '3201010101010004', 'nama_lengkap' => 'Dewi Kusuma', 'blok_rumah' => 'A3', 'rt_id' => '001'],
            ['nik' => '3201010101010005', 'nama_lengkap' => 'Eko Prasetyo', 'blok_rumah' => 'A4', 'rt_id' => '001'],
            ['nik' => '3201010101010006', 'nama_lengkap' => 'Fitri Handayani', 'blok_rumah' => 'A5', 'rt_id' => '001'],
            ['nik' => '3201010101010007', 'nama_lengkap' => 'Gunawan Wibowo', 'blok_rumah' => 'A6', 'rt_id' => '001'],
            ['nik' => '3201010101010008', 'nama_lengkap' => 'Hendra Wijaya', 'blok_rumah' => 'A7', 'rt_id' => '001'],
            ['nik' => '3201010101010009', 'nama_lengkap' => 'Indah Permatasari', 'blok_rumah' => 'A8', 'rt_id' => '001'],
            ['nik' => '3201010101010010', 'nama_lengkap' => 'Joko Susanto', 'blok_rumah' => 'A9', 'rt_id' => '001'],
            ['nik' => '3201010101010011', 'nama_lengkap' => 'Kartika Sari', 'blok_rumah' => 'B2', 'rt_id' => '002'],
            ['nik' => '3201010101010012', 'nama_lengkap' => 'Lukman Hakim', 'blok_rumah' => 'B3', 'rt_id' => '002'],
            ['nik' => '3201010101010013', 'nama_lengkap' => 'Maya Anggraeni', 'blok_rumah' => 'A10', 'rt_id' => '001'],
        ];

        foreach ($wargaData as $i => $data) {
            Warga::create(array_merge($data, [
                'no_telepon' => '08123456700' . ($i + 4),
                'rw_id' => '001',
                'password' => 'password123',
                'role' => 'WARGA',
                'status_akun' => 'ACTIVE',
            ]));
        }

        // 2 Warga Pending Verification
        Warga::create([
            'nik' => '3201010101010014',
            'nama_lengkap' => 'Nugroho Prabowo',
            'no_telepon' => '081234567014',
            'blok_rumah' => 'B4',
            'rt_id' => '002',
            'rw_id' => '001',
            'password' => 'password123',
            'role' => 'WARGA',
            'status_akun' => 'PENDING_VERIFICATION',
        ]);

        Warga::create([
            'nik' => '3201010101010015',
            'nama_lengkap' => 'Oktavia Putri',
            'no_telepon' => '081234567015',
            'blok_rumah' => 'B5',
            'rt_id' => '002',
            'rw_id' => '001',
            'password' => 'password123',
            'role' => 'WARGA',
            'status_akun' => 'PENDING_VERIFICATION',
        ]);
    }
}
