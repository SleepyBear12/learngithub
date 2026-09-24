<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rating_pengguna', function (Blueprint $table) {
            $table->char('id_rating', 12)->primary();
            $table->char('id_pengguna', 12);
            $table->char('id_lokasi', 12);
            $table->char('id_sesi', 12)->unique();
            $table->unsignedTinyInteger('rating');
            $table->text('ulasan')->nullable();
            $table->timestamps();
            $table->foreign('id_pengguna')->references('id_pengguna')->on('pengguna');
            $table->foreign('id_lokasi')->references('id_lokasi')->on('lokasi_pengisian');
            $table->foreign('id_sesi')->references('id_sesi')->on('sesi_pengisian');
        });

        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE rating_pengguna ADD CONSTRAINT rating_pengguna_rating_check CHECK (rating BETWEEN 1 AND 5)');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_pengguna');
    }
};
