<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $primaryKey = 'id_pembayaran';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_pembayaran', 'id_sesi', 'metode_pembayaran', 'jumlah', 'status', 'kode_transaksi', 'id_transaksi_midtrans', 'jenis_pembayaran', 'waktu_pembayaran', 'waktu_refund', 'alasan_refund'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_pembayaran ??= (string) random_int(100000000000, 999999999999)); }
    public function sesiPengisian() { return $this->belongsTo(SesiPengisian::class, 'id_sesi', 'id_sesi'); }
}
