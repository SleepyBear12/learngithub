<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id_pengguna';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pengguna', 'nama', 'email', 'kata_sandi', 'nomor_telepon', 'peran', 'status_akun'];

    protected static function booted(): void
    {
        static::creating(function (self $model): void {
            if (! $model->getAttribute('id_pengguna')) {
                $model->setAttribute('id_pengguna', (string) random_int(100000000000, 999999999999));
            }
        });
    }

    public function kendaraan() { return $this->hasMany(Kendaraan::class, 'id_pengguna', 'id_pengguna'); }
    public function lokasiPengisian() { return $this->hasMany(LokasiPengisian::class, 'id_operator', 'id_pengguna'); }
    public function pemesanan() { return $this->hasMany(Pemesanan::class, 'id_pengguna', 'id_pengguna'); }
    public function sesiPengisian() { return $this->hasMany(SesiPengisian::class, 'id_pengguna', 'id_pengguna'); }
    public function pemeliharaanPengisiDaya() { return $this->hasMany(PemeliharaanPengisiDaya::class, 'id_pengguna', 'id_pengguna'); }
    public function notifikasi() { return $this->hasMany(Notifikasi::class, 'id_pengguna', 'id_pengguna'); }
    public function pengaduan() { return $this->hasMany(Pengaduan::class, 'id_pengguna', 'id_pengguna'); }
    public function ratingPengguna() { return $this->hasMany(RatingPengguna::class, 'id_pengguna', 'id_pengguna'); }
    public function wallet() { return $this->hasOne(Wallet::class, 'id_pengguna', 'id_pengguna'); }
    public function logAktivitas() { return $this->hasMany(LogAktivitas::class, 'id_pengguna', 'id_pengguna'); }
}
