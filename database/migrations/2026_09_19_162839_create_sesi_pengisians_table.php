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
        Schema::create('sesi_pengisian', function (Blueprint $table) {
            $table->char('id_sesi', 12)->primary();
            $table->char('id_pengguna', 12);
            $table->char('id_kendaraan', 12);
            $table->char('id_pengisi_daya', 12);
            $table->char('id_pemesanan', 12)->nullable();
            $table->char('id_tarif', 12);
            $table->char('id_promo', 12)->nullable();
            $table->enum('metode_mulai', ['aplikasi', 'qr', 'rfid']);
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai')->nullable();
            $table->decimal('energi_kwh', 12, 3);
            $table->integer('durasi');
            $table->decimal('biaya', 12, 2);
            $table->enum('status', ['berlangsung', 'selesai', 'gagal', 'dihentikan']);
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
            $table->foreign('id_kendaraan')->references('id_kendaraan')->on('kendaraan');
            $table->foreign('id_pengisi_daya')->references('id_pengisi_daya')->on('pengisi_daya');
            $table->foreign('id_pemesanan')->references('id_pemesanan')->on('pemesanan');
            $table->foreign('id_tarif')->references('id_tarif')->on('tarif');
            $table->foreign('id_promo')->references('id_promo')->on('promo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi_pengisian');
    }
};
