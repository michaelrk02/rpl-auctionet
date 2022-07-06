<?php

namespace App\Http\Controllers\Auctioneer;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Bidder;
use App\Models\SaldoRiwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $info = [];

        $info['jml_produk'] = Produk::count();
        $info['jml_bidder'] = Bidder::count();

        $info['jml_produk_terjual'] = Produk::where('dimenangkan_oleh', '!=', null)->count();
        $info['jml_produk_belum_terjual'] = Produk::where('dimenangkan_oleh', null)->count();
        $info['jml_tawaran'] = DB::table('tawaran')->count();

        $info['jml_topup'] = SaldoRiwayat::where('jenis', 'req:topup')->count();
        $info['jml_tarik'] = SaldoRiwayat::where('jenis', 'req:withdraw')->count();

        return view('auctioneer.dashboard', compact('info'));
    }
}
