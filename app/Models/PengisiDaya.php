<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengisiDaya extends Model
{
    protected $table = 'pengisi_daya';
    protected $primaryKey = 'id_pengisi_daya';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pengisi_daya', 'id_lokasi', 'kode_perangkat', 'nomor_port', 'tipe_konektor', 'daya_kw', 'status'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_pengisi_daya ??= (string) random_int(100000000000, 999999999999)); }
    public function lokasi() { return $this->belongsTo(LokasiPengisian::class, 'id_lokasi', 'id_lokasi'); }
    public function pemesanan() { return $this->hasMany(Pemesanan::class, 'id_pengisi_daya', 'id_pengisi_daya'); }
    public function sesiPengisian() { return $this->hasMany(SesiPengisian::class, 'id_pengisi_daya', 'id_pengisi_daya'); }
    public function pemeliharaan() { return $this->hasMany(PemeliharaanPengisiDaya::class, 'id_pengisi_daya', 'id_pengisi_daya'); }
    public function pengaduan() { return $this->hasMany(Pengaduan::class, 'id_pengisi_daya', 'id_pengisi_daya'); }
}
