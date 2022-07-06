<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    use HasFactory;

    protected $table = 'pengiriman';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function dataProduk()
    {
        return $this->hasOne(Produk::class, 'id', 'produk');
    }

    public function dataPenerima()
    {
        return $this->hasOne(Bidder::class, 'id', 'penerima');
    }
}
