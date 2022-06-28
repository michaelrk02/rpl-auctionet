<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';
    public $incrementing = false;
    protected $keyType = 'string';
    public $timestamps = false;

    public function lelangWaktuSelesai()
    {
        return DB::table('produk_lelang_waktu_selesai')->where('id', $this->id)->first()->waktu_selesai;
    }

    public function tawaranTertinggi()
    {
        return DB::table('produk_tawaran_tertinggi')->where('id', $this->id)->first()->harga_tertinggi;
    }

    public function listTawaran()
    {
        return $this->belongsToMany(Bidder::class, 'tawaran', 'produk', 'bidder', 'id', 'id')->withPivot(['harga', 'waktu'])->orderByPivot('harga', 'desc');
    }

    public function bisaMenawar($harga)
    {
        $waktuSelesai = $this->lelangWaktuSelesai();
        $tawaranTertinggi = $this->tawaranTertinggi();

        if ($harga < $this->lelang_harga_buka) {
            return false;
        }

        if ($harga <= $tawaranTertinggi) {
            return false;
        }

        if ($harga % $this->lelang_kelipatan != 0) {
            return false;
        }

        if (isset($waktuSelesai) && (time() > strtotime($waktuSelesai))) {
            return false;
        }

        return true;
    }
}
