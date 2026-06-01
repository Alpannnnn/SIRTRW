<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('komentar_aduan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('aduan_id');
            $table->uuid('warga_id');
            $table->text('isi_komentar');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('aduan_id')->references('id')->on('aduan')->onDelete('cascade');
            $table->foreign('warga_id')->references('id')->on('warga');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('komentar_aduan');
    }
};
