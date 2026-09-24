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
        Schema::create('tarif', function (Blueprint $table) {
            $table->char('id_tarif', 12)->primary();
            $table->char('id_lokasi', 12);
            $table->decimal('harga_per_kwh', 12, 2);
            $table->decimal('biaya_minimum', 12, 2);
            $table->decimal('biaya_parkir', 12, 2);
            $table->dateTime('periode_mulai');
            $table->dateTime('periode_selesai');
            $table->enum('status', ['aktif', 'tidak_aktif']);
            $table->timestamps();
            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi_pengisian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarif');
    }
};
