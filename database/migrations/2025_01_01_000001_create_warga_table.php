<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nik', 16)->unique();
            $table->string('nama_lengkap', 150);
            $table->string('no_telepon', 15);
            $table->string('blok_rumah', 10);
            $table->string('rt_id', 3);
            $table->string('rw_id', 3);
            $table->string('password');
            $table->string('role', 30)->default('WARGA');
            $table->string('status_akun', 30)->default('PENDING_VERIFICATION');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warga');
    }
};
