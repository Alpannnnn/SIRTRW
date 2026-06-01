<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('aduan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('warga_id');
            $table->string('judul', 200);
            $table->text('deskripsi');
            $table->string('kategori', 50);
            $table->string('foto_bukti_path')->nullable();
            $table->string('status', 30)->default('DITERIMA');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('warga_id')->references('id')->on('warga');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aduan');
    }
};
