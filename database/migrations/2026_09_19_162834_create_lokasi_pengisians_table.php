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
        Schema::create('lokasi_pengisian', function (Blueprint $table) {
            $table->char('id_lokasi', 12)->primary();
            $table->char('id_operator', 12);
            $table->string('nama_lokasi', 150);
            $table->text('alamat');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->string('jam_operasional', 100);
            $table->text('fasilitas');
            $table->string('foto', 255)->nullable();
            $table->enum('status', ['aktif', 'tutup_sementara', 'penuh', 'pemeliharaan']);
            $table->timestamps();
            $table->foreign('id_operator')->references('id_pengguna')->on('pengguna');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasi_pengisian');
    }
};
