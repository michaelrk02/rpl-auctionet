<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Tampilkan layar beranda
    public function index()
    {
        return view('bidder.home');
    }
}
