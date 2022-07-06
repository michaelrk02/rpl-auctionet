<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use App\Models\Bidder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Tampilkan layar beranda
    public function index()
    {
        $info = [];

        $info['jml_produk_terjual'] = Produk::where('dimenangkan_oleh', '!=', null)->count();
        $info['jml_bidder_terdaftar'] = Bidder::count();
        $info['jml_tawaran_masuk'] = DB::table('tawaran')->count();

        return view('bidder.home', compact('info'));
    }

    // Tampilkan layar about
    public function about()
    {
        return view('bidder.home.about');
    }
}
