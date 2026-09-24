<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanan';
    protected $primaryKey = 'id_pemesanan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pemesanan', 'id_pengguna', 'id_kendaraan', 'id_pengisi_daya', 'kode_pemesanan', 'waktu_mulai', 'waktu_selesai', 'catatan', 'status'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_pemesanan ??= (string) random_int(100000000000, 999999999999)); }
    public function pengguna() { return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna'); }
    public function kendaraan() { return $this->belongsTo(Kendaraan::class, 'id_kendaraan', 'id_kendaraan'); }
    public function pengisiDaya() { return $this->belongsTo(PengisiDaya::class, 'id_pengisi_daya', 'id_pengisi_daya'); }
    public function sesiPengisian() { return $this->hasOne(SesiPengisian::class, 'id_pemesanan', 'id_pemesanan'); }
}
