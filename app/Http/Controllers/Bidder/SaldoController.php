<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SaldoController extends Controller
{
    // Tampilkan nominal saldo saat ini
    // Tampilkan tabel yg berisi kolom:
    // - Waktu
    // - Jenis
    // - Nominal
    // - Keterangan
    public function riwayat()
    {
        return view('bidder.saldo.riwayat');
    }

    // Tampilkan nominal saldo saat ini
    // Tampilkan form yang berisi:
    // - input nominal yg akan ditopup
    // - tombol submit
    public function topup()
    {
        return view('bidder.saldo.topup');
    }

    // Tampilkan nominal saldo saat ini
    // Tampilkan form yang berisi:
    // - input nominal yg akan ditarik
    // - input bank rekening penarikan
    // - input no. rekening penarikan
    // - input nama pemegang rekening penarikan
    // - tombol submit
    public function tarik()
    {
        return view('bidder.saldo.tarik');
    }
}
