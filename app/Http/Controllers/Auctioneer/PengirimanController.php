<?php

namespace App\Http\Controllers\Auctioneer;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Bidder;
use App\Models\Pengiriman;
use App\Mail\Bidder\ProductShipped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PengirimanController extends Controller
{
    public function semua()
    {
        $listPengiriman = Pengiriman::orderBy('waktu', 'desc')->get();

        return view('auctioneer.pengiriman.semua', compact('listPengiriman'));
    }

    public function kirim(Request $request)
    {
        $produk = old('produk', $request->query('produk'));

        return view('auctioneer.pengiriman.kirim', compact('produk'));
    }

    public function simpan(Request $request)
    {
        $input = $request->validate([
            'produk' => 'required',
            'layanan' => 'required|max:64',
            'no_resi' => 'required|max:64'
        ]);

        $produk = Produk::find($input['produk']);
        if (!isset($produk)) {
            return back()->withErrors(['error' => 'Product not found']);
        }

        $penerima = $produk->dataPemenang;
        if (!isset($penerima)) {
            return back()->withErrors(['error' => 'Product has not been sold yet']);
        }

        $produk->terkirim = true;
        $produk->save();

        $pengiriman = new Pengiriman();
        $pengiriman->id = (string)Str::uuid();
        $pengiriman->produk = $produk->id;
        $pengiriman->penerima = $penerima->id;
        $pengiriman->waktu = date('Y-m-d H:i:s');
        $pengiriman->layanan = $input['layanan'];
        $pengiriman->no_resi = $input['no_resi'];
        $pengiriman->alamat = $penerima->alamat;
        $pengiriman->save();

        Mail::to($penerima->email)->send(new ProductShipped($pengiriman));

        return redirect()->route('auctioneer.pengiriman.semua')->with('success', 'Product has been dispatched!');
    }
}
