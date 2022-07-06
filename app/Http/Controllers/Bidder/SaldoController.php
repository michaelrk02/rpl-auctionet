<?php

namespace App\Http\Controllers\Bidder;

use App\Http\Controllers\Controller;
use App\Models\SaldoRiwayat;
use App\Libraries\Auctionet;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $saldo = $this->bidder()->dataSaldo;
        $listRiwayat = $saldo->listRiwayat()->orderBy('waktu', 'desc')->get();

        return view('bidder.saldo.riwayat', compact('saldo', 'listRiwayat'));
    }

    // Tampilkan nominal saldo saat ini
    // Tampilkan form yang berisi:
    // - input nominal yg akan ditopup
    // - tombol submit
    public function topup()
    {
        $methods = env('AUCTIONET_TRANSFER_METHODS');
        $methods = explode(';', $methods);
        foreach ($methods as &$method)
        {
            $method = explode('_', $method);
            $method = implode(' - ', $method);
        }

        return view('bidder.saldo.topup', compact('methods'));
    }

    public function requestTopup(Request $request)
    {
        $input = $request->validate([
            'metode' => 'required',
            'nominal' => 'required|gt:0'
        ]);

        if ($input['nominal'] % 1000 != 0) {
            return back()->withErrors(['error' => 'Amount must be multiple of 1000!'])->withInput();
        }

        $nominal = $input['nominal'] + random_int(0, 999);
        $deadline = time() + env('AUCTIONET_TRANSFER_DURATION') * 3600;

        $riwayat = new SaldoRiwayat();
        $riwayat->id = (string)Str::uuid();
        $riwayat->saldo = $this->bidder()->id;
        $riwayat->waktu = date('Y-m-d H:i:s');
        $riwayat->jenis = 'req:topup';
        $riwayat->keterangan = 'DB ['.$input['metode'].'] @ '.Auctionet::rupiah($nominal).' < '.date('Y-m-d H:i:s', $deadline);
        $riwayat->nominal = $nominal;
        $riwayat->save();

        return redirect()->route('bidder.saldo.riwayat')->with('success', 'Top-up has been requested. Please pay according to the payment option you\'ve chosen');
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
        $saldo = $this->bidder()->dataSaldo;

        $banks = env('AUCTIONET_TRANSFER_PAYOUTS');
        $banks = explode(';', $banks);

        return view('bidder.saldo.tarik', compact('saldo', 'banks'));
    }

    public function requestTarik(Request $request)
    {
        $input = $request->validate([
            'nominal' => 'required|gt:0',
            'bank' => 'required',
            'no_rekening' => 'required',
            'nama_rekening' => 'required'
        ]);

        if ($input['nominal'] > $this->bidder()->dataSaldo->nominal) {
            return back()->withErrors(['error' => 'Not enough balance!'])->withInput();
        }

        if ($input['nominal'] % 1000 != 0) {
            return back()->withErrors(['error' => 'Amount must be multiple of 1000!'])->withInput();
        }

        $nominal = $input['nominal'] + random_int(0, 999);

        $riwayat = new SaldoRiwayat();
        $riwayat->id = (string)Str::uuid();
        $riwayat->saldo = $this->bidder()->id;
        $riwayat->waktu = date('Y-m-d H:i:s');
        $riwayat->jenis = 'req:withdraw';
        $riwayat->keterangan = 'CR ['.implode(' - ', [$input['no_rekening'], $input['bank'], $input['nama_rekening']]).'] @ '.Auctionet::rupiah($nominal);
        $riwayat->nominal = $nominal;
        $riwayat->save();

        return redirect()->route('bidder.saldo.riwayat')->with('success', 'Withdrawal has been requested. Please wait for the admin to process your request');
    }
}
