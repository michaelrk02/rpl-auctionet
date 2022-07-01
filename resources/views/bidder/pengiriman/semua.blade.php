@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Balance')

@section('content')

{{-- 
  // Tampilkan tabel yang berisi:
    // - Waktu
    // - Produk yg dikirim (sertakan link ke route detail produknya)
    // - Layanan
    // - No. Resi
    // - Alamat --}}

        <div class="container">
                <div class="title d-flex justify-content-center align-items-center mb-4 ">
                    <img src="/assets/img/auc-logo.png" alt="" style="height: 30px">
                </div>

                <div class="shipment-main d-flex justify-content-start align-items-center">
                    <div class="main-1">
                        <i class="bi bi-geo-alt text-light" style="font-size:50px;"></i>
                    </div>
                    <div class="main-2 d-flex justify-content-start align-items-center mt-2"
                    style=" height:50px; margin-left:10px">
                        <h2 class="text-light">Track Your Items!</h2>
                    </div>  
                </div>
                <div class="table-wrapper-scroll-y my-custom-scrollbar mt-3">
                    <table class="table table-dark table-hover table-striped mb-0 text-center">
                        <thead class="">
                            <tr>
                                <th scope="col">Time</th>
                                <th scope="col">Item</th>
                                <th scope="col">Service</th>
                                <th scope="col">Receipt</th>
                                <th scope="col">Destination</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>05.00</td>
                                <td><a href=""
                                    class=" text-decoration-none fw-bold">Sendok Sup Abad 17</a></td>
                                <td>REG</td>
                                <td>JT-8734802832345</td>
                                <td>Banjarsari, SOC</td>

                            </tr>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>
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
    width: 800px;
    background-color:#00000080;
    border-radius: 10px;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.5);
}

.shipment-main{
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
