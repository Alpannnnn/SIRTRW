<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengumuman', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('judul', 200);
            $table->text('konten');
            $table->uuid('dibuat_oleh');
            $table->boolean('is_urgent')->default(false);
            $table->dateTime('tampil_sampai')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('dibuat_oleh')->references('id')->on('warga');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengumuman');
    }
};
