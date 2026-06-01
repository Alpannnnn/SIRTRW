<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman_barang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('warga_id');
            $table->uuid('barang_id');
            $table->integer('jumlah_pinjam')->default(1);
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_kembali_rencana');
            $table->dateTime('tanggal_kembali_realisasi')->nullable();
            $table->string('status_peminjaman', 30)->default('MENUNGGU_PERSETUJUAN');
            $table->text('alasan_peminjaman')->nullable();
            $table->text('catatan_kondisi_kembali')->nullable();
            $table->uuid('disetujui_oleh')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('warga_id')->references('id')->on('warga');
            $table->foreign('barang_id')->references('id')->on('barang');
            $table->foreign('disetujui_oleh')->references('id')->on('warga');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman_barang');
    }
};
