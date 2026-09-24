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
        Schema::create('promo', function (Blueprint $table) {
            $table->char('id_promo', 12)->primary();
            $table->string('kode_promo', 50)->unique();
            $table->string('nama_promo', 100);
            $table->enum('jenis_diskon', ['persentase', 'nominal']);
            $table->decimal('nilai_diskon', 12, 2);
            $table->decimal('minimal_transaksi', 12, 2);
            $table->dateTime('periode_mulai');
            $table->dateTime('periode_selesai');
            $table->integer('kuota')->nullable();
            $table->enum('status', ['aktif', 'tidak_aktif']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promo');
    }
};
