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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->char('id_pembayaran', 12)->primary();
            $table->char('id_sesi', 12);
            $table->string('metode_pembayaran', 50);
            $table->decimal('jumlah', 12, 2);
            $table->enum('status', ['menunggu', 'berhasil', 'gagal', 'dikembalikan', 'dibatalkan']);
            $table->string('kode_transaksi', 100)->unique();
            $table->string('id_transaksi_midtrans', 150)->nullable();
            $table->string('jenis_pembayaran', 100);
            $table->dateTime('waktu_pembayaran')->nullable();
            $table->dateTime('waktu_refund')->nullable();
            $table->text('alasan_refund')->nullable();
            $table->timestamps();
            $table->foreign('id_sesi')->references('id_sesi')->on('sesi_pengisian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
