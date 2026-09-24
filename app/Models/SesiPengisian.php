<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SesiPengisian extends Model
{
    protected $table = 'sesi_pengisian';
    protected $primaryKey = 'id_sesi';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_sesi', 'id_pengguna', 'id_kendaraan', 'id_pengisi_daya', 'id_pemesanan', 'id_tarif', 'id_promo', 'metode_mulai', 'waktu_mulai', 'waktu_selesai', 'energi_kwh', 'durasi', 'biaya', 'status'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_sesi ??= (string) random_int(100000000000, 999999999999)); }
    public function pengguna() { return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna'); }
    public function kendaraan() { return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id_kendaraan'); }
    public function pengisiDaya() { return $this->belongsTo(PengisiDaya::class, 'id_pengisi_daya', 'id_pengisi_daya'); }
    public function pemesanan() { return $this->belongsTo(Pemesanan::class, 'id_pemesanan', 'id_pemesanan'); }
    public function tarif() { return $this->belongsTo(Tarif::class, 'id_tarif', 'id_tarif'); }
    public function promo() { return $this->belongsTo(Promo::class, 'id_promo', 'id_promo'); }
    public function pembayaran() { return $this->hasOne(Pembayaran::class, 'id_sesi', 'id_sesi'); }
    public function notifikasi() { return $this->hasMany(Notifikasi::class, 'id_sesi', 'id_sesi'); }
    public function pengaduan() { return $this->hasMany(Pengaduan::class, 'id_sesi', 'id_sesi'); }
    public function ratingPengguna() { return $this->hasOne(RatingPengguna::class, 'id_sesi', 'id_sesi'); }
}
