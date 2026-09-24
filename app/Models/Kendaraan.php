<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'kendaraan';
    protected $primaryKey = 'id_kendaraan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_kendaraan', 'id_pengguna', 'merek', 'model', 'nomor_polisi', 'tipe_konektor'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_kendaraan ??= (string) random_int(100000000000, 999999999999)); }
    public function pengguna() { return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna'); }
    public function pemesanan() { return $this->hasMany(Pemesanan::class, 'id_kendaraan', 'id_kendaraan'); }
    public function sesiPengisian() { return $this->hasMany(SesiPengisian::class, 'id_kendaraan', 'id_kendaraan'); }
}
