<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Tampilkan list semua produk yg available utk dilelang
    public function semua()
    {
        return view('bidder.produk.semua');
    }

    // Tampilkan detail produk
    // Tampilkan list tawaran masuk
    // Tampilkan countdown menuju waktu selesai pelelangan (opsional)
    public function lihat()
    {
        return view('bidder.produk.lihat');
    }
}
