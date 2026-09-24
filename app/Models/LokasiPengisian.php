<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LokasiPengisian extends Model
{
    protected $table = 'lokasi_pengisian';
    protected $primaryKey = 'id_lokasi';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_lokasi', 'id_operator', 'nama_lokasi', 'alamat', 'latitude', 'longitude', 'jam_operasional', 'fasilitas', 'foto', 'status'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_lokasi ??= (string) random_int(100000000000, 999999999999)); }
    public function operator() { return $this->belongsTo(Pengguna::class, 'id_operator', 'id_pengguna'); }
    public function pengisiDaya() { return $this->hasMany(PengisiDaya::class, 'id_lokasi', 'id_lokasi'); }
    public function tarif() { return $this->hasMany(Tarif::class, 'id_lokasi', 'id_lokasi'); }
    public function ratingPengguna() { return $this->hasMany(RatingPengguna::class, 'id_lokasi', 'id_lokasi'); }
}
