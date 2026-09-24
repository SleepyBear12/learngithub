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
        Schema::create('kendaraan', function (Blueprint $table) {
            $table->char('id_kendaraan', 12)->primary();
            $table->char('id_pengguna', 12);
            $table->string('merek', 100);
            $table->string('model', 100);
            $table->string('nomor_polisi', 20);
            $table->string('tipe_konektor', 50);
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan');
    }
};
