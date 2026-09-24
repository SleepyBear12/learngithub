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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->char('id_pemesanan', 12)->primary();
            $table->char('id_pengguna', 12);
            $table->char('id_kendaraan', 12);
            $table->char('id_pengisi_daya', 12);
            $table->string('kode_pemesanan', 50)->unique();
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai');
            $table->text('catatan')->nullable();
            $table->enum('status', ['menunggu', 'dikonfirmasi', 'aktif', 'selesai', 'dibatalkan']);
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
            $table->foreign('id_kendaraan')->references('id_kendaraan')->on('kendaraan');
            $table->foreign('id_pengisi_daya')->references('id_pengisi_daya')->on('pengisi_daya');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanan');
    }
};
