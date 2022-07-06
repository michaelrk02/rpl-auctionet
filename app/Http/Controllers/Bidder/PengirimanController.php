<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengirimanController extends Controller
{
    // Tampilkan tabel yang berisi:
    // - Waktu
    // - Produk yg dikirim (sertakan link ke route detail produknya)
    // - Layanan
    // - No. Resi
    // - Alamat
    public function semua()
    {
        $listPengiriman = $this->bidder()->listPengiriman()->orderBy('waktu', 'desc')->get();

        return view('bidder.pengiriman.semua', compact('listPengiriman'));
    }
}
