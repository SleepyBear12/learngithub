<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengguna', function (Blueprint $table) {
            $table->char('id_pengguna', 12)->primary();
            $table->string('nama', 100);
            $table->string('email', 150)->unique();
            $table->string('kata_sandi', 255);
            $table->string('nomor_telepon', 20);
            $table->enum('peran', ['pengemudi', 'operator', 'admin']);
            $table->enum('status_akun', ['aktif', 'tidak_aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
