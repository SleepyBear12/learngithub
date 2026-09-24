<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarif extends Model
{
    protected $table = 'tarif';
    protected $primaryKey = 'id_tarif';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_tarif', 'id_lokasi', 'harga_per_kwh', 'biaya_minimum', 'biaya_parkir', 'periode_mulai', 'periode_selesai', 'status'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_tarif ??= (string) random_int(100000000000, 999999999999)); }
    public function lokasi() { return $this->belongsTo(LokasiPengisian::class, 'id_lokasi', 'id_lokasi'); }
    public function sesiPengisian() { return $this->hasMany(SesiPengisian::class, 'id_tarif', 'id_tarif'); }
}
