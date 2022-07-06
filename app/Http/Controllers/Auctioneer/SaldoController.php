<?php

namespace App\Http\Controllers\Auctioneer;

use App\Http\Controllers\Controller;
use App\Models\SaldoRiwayat;
use App\Mail\Bidder\BalanceRequestAccepted;
use App\Mail\Bidder\BalanceRequestRejected;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SaldoController extends Controller
{
    public function semua()
    {
        $listPengajuan = SaldoRiwayat::with('dataSaldo.dataBidder')->where('jenis', 'like', 'req:%')->orderBy('waktu', 'asc')->get();

        return view('auctioneer.saldo.semua', compact('listPengajuan'));
    }

    public function terima(SaldoRiwayat $pengajuan)
    {
        if ($pengajuan->jenis === 'req:topup') {
            $pengajuan->jenis = 'topup';
            $pengajuan->keterangan = 'TRANSFER SUCCESSFUL';
            $pengajuan->dataSaldo->nominal += $pengajuan->nominal;
            $pengajuan->dataSaldo->save();
            $pengajuan->save();

            Mail::to($pengajuan->dataSaldo->dataBidder->email)->send(new BalanceRequestAccepted('Top-Up', $pengajuan));
        } else if ($pengajuan->jenis === 'req:withdraw') {
            if ($pengajuan->dataSaldo->nominal < $pengajuan->nominal) {
                return back()->withErrors(['error' => 'Insufficient balance']);
            }

            $pengajuan->jenis = 'withdraw';
            $pengajuan->keterangan = 'TRANSFER SUCCESSFUL';
            $pengajuan->dataSaldo->nominal -= $pengajuan->nominal;
            $pengajuan->dataSaldo->save();
            $pengajuan->save();

            Mail::to($pengajuan->dataSaldo->dataBidder->email)->send(new BalanceRequestAccepted('Withdrawal', $pengajuan));
        }

        return back()->with('success', 'Successfully accepted the request');
    }

    public function tolak(SaldoRiwayat $pengajuan)
    {
        $pengajuan->delete();

        $type = ['req:topup' => 'Top-Up', 'req:withdraw' => 'Withdrawal'][$pengajuan->jenis];
        Mail::to($pengajuan->dataSaldo->dataBidder->email)->send(new BalanceRequestRejected($type, $pengajuan));

        return back()->with('success', 'Successfully rejected the request');
    }
}
