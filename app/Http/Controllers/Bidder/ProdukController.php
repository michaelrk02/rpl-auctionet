<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Tampilkan list semua produk yg available utk dilelang
    public function semua()
    {
        $daftarProduk = Produk::all();

        return view('bidder.produk.semua', ['daftarProduk' => $daftarProduk]);
    }

    // Tampilkan detail produk
    // Tampilkan list tawaran masuk
    // Tampilkan countdown menuju waktu selesai pelelangan (opsional)
    public function lihat(Produk $produk)
    {
        return view('bidder.produk.lihat', ['produk' => $produk]);
    }
}
