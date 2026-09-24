<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemeliharaanPengisiDaya extends Model
{
    protected $table = 'pemeliharaan_pengisi_daya';
    protected $primaryKey = 'id_pemeliharaan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pemeliharaan', 'id_pengisi_daya', 'id_pengguna', 'jenis_masalah', 'deskripsi', 'tanggal_mulai', 'tanggal_selesai', 'status', 'catatan'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_pemeliharaan ??= (string) random_int(100000000000, 999999999999)); }
    public function pengisiDaya() { return $this->belongsTo(PengisiDaya::class, 'id_pengisi_daya', 'id_pengisi_daya'); }
    public function pengguna() { return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna'); }
}
