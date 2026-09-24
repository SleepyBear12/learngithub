<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'promo';
    protected $primaryKey = 'id_promo';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_promo', 'kode_promo', 'nama_promo', 'jenis_diskon', 'nilai_diskon', 'minimal_transaksi', 'periode_mulai', 'periode_selesai', 'kuota', 'status'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_promo ??= (string) random_int(100000000000, 999999999999)); }
    public function sesiPengisian() { return $this->hasMany(SesiPengisian::class, 'id_promo', 'id_promo'); }
}
