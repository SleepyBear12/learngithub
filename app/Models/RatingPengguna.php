<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RatingPengguna extends Model
{
    protected $table = 'rating_pengguna';
    protected $primaryKey = 'id_rating';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_rating', 'id_pengguna', 'id_lokasi', 'id_sesi', 'rating', 'ulasan'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_rating ??= (string) random_int(100000000000, 999999999999)); }
    public function pengguna() { return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna'); }
    public function lokasi() { return $this->belongsTo(LokasiPengisian::class, 'id_lokasi', 'id_lokasi'); }
    public function sesiPengisian() { return $this->belongsTo(SesiPengisian::class, 'id_sesi', 'id_sesi'); }
}
