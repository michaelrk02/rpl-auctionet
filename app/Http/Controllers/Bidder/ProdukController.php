<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

    public function lihatGambar(Produk $produk)
    {
        return response()->file(Storage::path($produk->gambar));
    }

    public function tawar(Request $request, Produk $produk)
    {
        $input = $request->validate([
            'harga' => 'required|integer'
        ]);

        if (!$produk->bisaMenawar($input['harga'])) {
            return back()->withErrors(['error' => 'Unable to bid this product. Make sure you\'ve entered the correct bid amount and the auction hasn\'t been ended yet']);
        }

        $produk->listTawaran()->detach($this->bidder()->id);
        $produk->listTawaran()->attach($this->bidder()->id, ['waktu' => date('Y-m-d H:i:s'), 'harga' => $input['harga']]);

        if ($input['harga'] >= $produk->lelang_harga_tutup) {
            $produk->menangkan();
        }

        return back()->with('success', 'Successfully made a new bid for this product');
    }
}
