<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('warga_id');
            $table->string('jenis_surat', 50);
            $table->text('tujuan_pembuatan');
            $table->string('status', 30)->default('DIAJUKAN');
            $table->uuid('approved_by_rt')->nullable();
            $table->uuid('approved_by_rw')->nullable();
            $table->string('kode_verifikasi', 50)->unique()->nullable();
            $table->string('file_pdf_path')->nullable();
            $table->text('catatan_penolakan')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('warga_id')->references('id')->on('warga');
            $table->foreign('approved_by_rt')->references('id')->on('warga');
            $table->foreign('approved_by_rw')->references('id')->on('warga');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('surat');
    }
};
