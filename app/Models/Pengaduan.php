<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = 'pengaduan';
    protected $primaryKey = 'id_pengaduan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pengaduan', 'id_pengguna', 'id_pengisi_daya', 'id_sesi', 'kategori', 'judul', 'deskripsi', 'status', 'tanggapan'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_pengaduan ??= (string) random_int(100000000000, 999999999999)); }
    public function pengguna() { return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna'); }
    public function pengisiDaya() { return $this->belongsTo(PengisiDaya::class, 'id_pengisi_daya', 'id_pengisi_daya'); }
    public function sesiPengisian() { return $this->belongsTo(SesiPengisian::class, 'id_sesi', 'id_sesi'); }
}
