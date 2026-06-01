<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kas', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('jenis', 20);
            $table->decimal('jumlah', 15, 2);
            $table->text('keterangan');
            $table->date('tanggal_transaksi');
            $table->uuid('dicatat_oleh');
            $table->string('rt_rw_scope', 10)->default('RT');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dicatat_oleh')->references('id')->on('warga');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kas');
    }
};
