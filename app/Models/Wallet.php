<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $table = 'wallet';
    protected $primaryKey = 'id_wallet';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['id_wallet', 'id_pengguna', 'saldo', 'status'];

    protected static function booted(): void { static::creating(fn (self $model) => $model->id_wallet ??= (string) random_int(100000000000, 999999999999)); }
    public function pengguna() { return $this->belongsTo(Pengguna::class, 'id_pengguna', 'id_pengguna'); }
}
