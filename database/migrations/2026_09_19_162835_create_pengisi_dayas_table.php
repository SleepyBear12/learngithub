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
        Schema::create('pengisi_daya', function (Blueprint $table) {
            $table->char('id_pengisi_daya', 12)->primary();
            $table->char('id_lokasi', 12);
            $table->string('kode_perangkat', 100)->unique();
            $table->string('nomor_port', 50);
            $table->string('tipe_konektor', 50);
            $table->decimal('daya_kw', 10, 2);
            $table->enum('status', ['tersedia', 'digunakan', 'offline', 'rusak', 'pemeliharaan']);
            $table->timestamps();
            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi_pengisian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengisi_daya');
    }
};
