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
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->char('id_log', 12)->primary();
            $table->char('id_pengguna', 12);
            $table->string('aktivitas', 150);
            $table->string('modul', 100);
            $table->char('data_id', 12)->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamp('waktu_aktivitas');
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_aktivitas');
    }
};
