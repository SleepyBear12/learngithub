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
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->char('id_notifikasi', 12)->primary();
            $table->char('id_pengguna', 12);
            $table->char('id_sesi', 12)->nullable();
            $table->string('judul', 150);
            $table->text('pesan');
            $table->enum('jenis', ['charging', 'pembayaran', 'charger', 'pemesanan', 'sistem']);
            $table->enum('status_baca', ['belum_dibaca', 'sudah_dibaca']);
            $table->timestamp('waktu_dikirim');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
            $table->foreign('id_sesi')->references('id_sesi')->on('sesi_pengisian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
