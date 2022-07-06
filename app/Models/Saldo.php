<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saldo extends Model
{
    use HasFactory;

    protected $table = 'saldo';
    protected $primaryKey = 'bidder';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function listRiwayat()
    {
        return $this->hasMany(SaldoRiwayat::class, 'saldo', 'bidder');
    }

    public function dataBidder()
    {
        return $this->belongsTo(Bidder::class, 'bidder', 'id');
    }
}
