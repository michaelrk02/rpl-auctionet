<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function selesai()
    {
        $waktuSelesai = $this->lelangWaktuSelesai();

        return isset($waktuSelesai) && (time() > strtotime($waktuSelesai));
    }

    public function menangkan()
    {
        $pemenang = $this->listTawaran()->first();
        $pemenang->dataSaldo->nominal -= $pemenang->pivot->harga;
        $pemenang->dataSaldo->save();

        $transaksi = new SaldoRiwayat();
        $transaksi->id = (string)Str::uuid();
        $transaksi->saldo = $pemenang->id;
        $transaksi->waktu = date('Y-m-d H:i:s');
        $transaksi->jenis = 'payment';
        $transaksi->keterangan = 'WIN '.$this->nama;
        $transaksi->nominal = $pemenang->pivot->harga;
        $transaksi->save();

        $this->dimenangkan_oleh = $pemenang->id;
        $this->dimenangkan_saat = date('Y-m-d H:i:s');
        $this->save();
    }

    public function bisaMenawar($harga)
    {
        $waktuSelesai = $this->lelangWaktuSelesai();
        $tawaranTertinggi = $this->tawaranTertinggi();

        if (time() < strtotime($this->lelang_waktu_mulai)) {
            return false;
        }

        if ($harga < $this->lelang_harga_buka) {
            return false;
        }

        if ($harga <= $tawaranTertinggi) {
            return false;
        }

        if ($harga % $this->lelang_kelipatan != 0) {
            return false;
        }

        if ($this->selesai()) {
            return false;
        }

        return true;
    }

    public function dataPemenang()
    {
        return $this->hasOne(Bidder::class, 'id', 'dimenangkan_oleh');
    }
}
