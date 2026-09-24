<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    protected $table = 'notifikasi';
    protected $primaryKey = 'id_notifikasi';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';
    protected $fillable = ['id_notifikasi', 'id_pengguna', 'id_sesi', 'judul', 'pesan', 'jenis', 'status_baca', 'waktu_dikirim'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_notifikasi ??= (string) random_int(100000000000, 999999999999)); }
    public function pengguna() { return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna'); }
    public function sesiPengisian() { return $this->belongsTo(SesiPengisian::class, 'id_sesi', 'id_sesi'); }
}
