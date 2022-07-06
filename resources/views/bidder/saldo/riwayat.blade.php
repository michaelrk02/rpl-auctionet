@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Balance')

@section('content')

{{-- 
// Tampilkan nominal saldo saat ini
// Button top up & tarik
// Tampilkan tabel yg berisi kolom:
// - Waktu
// - Jenis
// - Nominal
// - Keterangan --}}

        <div class="container">
                <div class="title d-flex justify-content-center align-items-center mb-4">
                    <img src="/assets/img/auc-logo.png" alt="" style="height: 30px">
                </div>

                <div class="balance-main d-flex justify-content-between align-items-center">
                    <div class="main-1 " style="width: 600px">
                        <h5 class="text-light mb-2 fw-bold">Your Current Balance</h5>
                        <h4 class="text-light mb-2" style="font-size: 42px">{{ Auctionet::rupiah($saldo->nominal) }}</h4>
                    </div>
                    <div class="main-2 d-flex justify-content-center align-items-end "
                    style="width: 160px; height:100px; ">
                        <div class="topup text-center">
                            <a href="{{ route('bidder.saldo.topup') }}" class="btn btn-topup btn-primary fw-bold" style="height: 42px; width:42px">
                                <i class="bi bi-plus-lg topup-icon" style="font-size: 14px;"></i>
                            </a>
                            <p class="text-light" style="font-size: 13px;">Top Up</p>
                        </div>
                        <div class="tarik text-center" style="margin-left: 10px">
                            <a href="{{ route('bidder.saldo.tarik') }}" class="btn btn-tarik btn-primary fw-bold" style="height: 42px; width:42px">
                                <i class="bi bi-arrow-down-up" style="font-size: 14px;"></i>
                            </a>
                            <p class="text-light" style="font-size: 13px;">Withdraw</p>
                        </div>
                    </div>  
                </div>
                <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                    <table class="table table-dark table-hover table-striped mb-0 text-center">
                        <thead class="">
                            <tr>
                                <th scope="col">Timestamp</th>
                                <th scope="col">Type</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Details</th>
                                <th scope="col">Confirm</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listRiwayat as $riwayat)
                            <tr>
                                <td>{{ $riwayat->waktu }}</td>
                                <td class="font-monospace">{{ $riwayat->jenis }}</td>
                                <td class="font-monospace">{{ Auctionet::rupiah($riwayat->nominal) }}</td>
                                <td class="font-monospace">{{ $riwayat->keterangan }}</td>
                                <td>@if ($riwayat->jenis === 'req:topup') <a href="https://web.whatsapp.com/send?phone={{ env('AUCTIONET_TRANSFER_CONFIRM') }}" 
                                    class="btn btn-primary"><i class="bi bi-whatsapp"></i></a> @endif</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
@endsection		

@push('styles')
<style>
.container{
    margin-top: 130px;
    padding: 43px;
    width: 1000px;
    background-color:#00000080;
    border-radius: 10px;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.5);
}

.balance-main{
    background-color:#00000094;
    border: solid 2px rgba(197, 197, 197, 0.623);
    border-radius: 10px;
    padding: 20px 30px 20px 30px;
}
.my-custom-scrollbar {
    position: relative;
    height: 200px;
    overflow: auto;
    }
    /* width */
    .my-custom-scrollbar::-webkit-scrollbar {
     width: 5px;
    }
    /* Track */
    .my-custom-scrollbar::-webkit-scrollbar-track {
    box-shadow: inset 0 0 3px grey; 
    border-radius: 5px;
    }
    /* Handle */
    .my-custom-scrollbar::-webkit-scrollbar-thumb {
    background: #6968688e; 
    border-radius: 5px;
    }
    /* Handle on hover */
    .my-custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #4949498e; 
    }
    .table-wrapper-scroll-y {
    display: block;
    width: 100%;
    height: 250px;
    border-radius: 10px;
    }
    table{
    border-radius: 10px;
    overflow: hidden;
    opacity: .9;
    }
</style>
@endpush
