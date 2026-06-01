<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_barang', 100);
            $table->string('kategori_barang', 50);
            $table->integer('total_stok')->default(1);
            $table->integer('stok_tersedia')->default(1);
            $table->string('kondisi_fisik', 50)->default('BAIK');
            $table->text('deskripsi_aset')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
