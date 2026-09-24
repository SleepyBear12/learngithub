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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->char('id_pengaduan', 12)->primary();
            $table->char('id_pengguna', 12);
            $table->char('id_pengisi_daya', 12)->nullable();
            $table->char('id_sesi', 12)->nullable();
            $table->string('kategori', 100);
            $table->string('judul', 150);
            $table->text('deskripsi');
            $table->enum('status', ['baru', 'diproses', 'selesai', 'ditolak']);
            $table->text('tanggapan')->nullable();
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
            $table->foreign('id_pengisi_daya')->references('id_pengisi_daya')->on('pengisi_daya');
            $table->foreign('id_sesi')->references('id_sesi')->on('sesi_pengisian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
