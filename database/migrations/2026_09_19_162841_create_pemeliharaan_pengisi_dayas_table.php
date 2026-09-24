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
        Schema::create('pemeliharaan_pengisi_daya', function (Blueprint $table) {
            $table->char('id_pemeliharaan', 12)->primary();
            $table->char('id_pengisi_daya', 12);
            $table->char('id_pengguna', 12);
            $table->string('jenis_masalah', 100);
            $table->text('deskripsi');
            $table->dateTime('tanggal_mulai');
            $table->dateTime('tanggal_selesai')->nullable();
            $table->enum('status', ['dilaporkan', 'diproses', 'selesai']);
            $table->text('catatan')->nullable();
            $table->timestamps();
            $table->foreign('id_pengisi_daya')->references('id_pengisi_daya')->on('pengisi_daya');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaan_pengisi_daya');
    }
};
