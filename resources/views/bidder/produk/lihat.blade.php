@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Products List')

@section('content')

<div class="main d-flex justify-content-center">
    <div class="box d-flex flex-column justify-content-start align-items-around pb-2">
        <div class="box-1 d-flex justify-content-around align-items-start px-4 py-5">
            <img src="/assets/img/default-image.png" alt="product-img"
            style="width:420px; height:420px; object-fit:cover; border-radius:15px">
            <div class="box-1-right d-flex flex-column justify-content-start align-items-start">
                <div class="product-title">
                    <h4 class="text-light">{{ $produk->nama }}</h4>
                </div>
                <div class="product-desc mt-1 pb-2">
                    <h5 class="text-light">Description</h5>
                    <p class="text-light markdown">{{ $produk->deskripsi }}</p>
                </div>
                <div class="product-info mt-3 pb-2">
                    <p class="info-close text-light"><b>Open Bid<span style="margin-left: 15px"></span>: </b>
                        <span>Maghrib</span></p>
                    <p class="info-close text-light"><b>Close Bid<span style="margin-left: 15px"></span>: </b>
                        <span>{{ $produk->lelangWaktuSelesai() ?? '-' }}</span></p>
                    <p class="info-start text-light"><b>Start Bid<span style="margin-left: 19px"></span>: </b>
                        <span>{{ Auctionet::rupiah($produk->lelang_harga_buka) }}</span></p>
                    <p class="info-buy text-light"><b>Buy Now<span style="margin-left: 16px"></span>: </b>
                        <span>{{ $produk->lelang_harga_tutup == 0 ? '-' : Auctionet::rupiah($produk->lelang_harga_tutup) }}</span></p>
                </div>
                <div class="">
                    <a href="#" class="btn btn-make-bid btn-primary text-light mt-3"
                    data-bs-toggle="modal" data-bs-target="#detailsModal">Make A Bid!</a>
                    <h5 class="text-light mt-3">See Ongoing Bid Below!</h5>
                </div>
            </div>
        </div>
        <div class="box-2 flex-column d-flex justify-content-start align-items-center px-5 pb-5">
            {{-- <table border="1" cellpadding="10" cellspacing="0" class="mt-3">
                <thead>
                    <tr>
                        <th style="width:20px ;">Rank</th>
                        <th >Bidder</th>
                        <th >Bid</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table> --}}
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-dark table-hover table-striped mb-0 text-center">
                  <thead class="">
                    <tr>
                      <th scope="col">Rank</th>
                      <th scope="col">Bidder</th>
                      <th scope="col">Bid</th>
                      <th scope="col">Time</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produk->listTawaran as $i => $tawaran)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $tawaran->nama }}</td>
                            <td>{{ Auctionet::rupiah($tawaran->pivot->harga) }}</td>
                            <td>{{ $tawaran->pivot->waktu }}</td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              
              </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 350px">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title text-light" id="exampleModalLabel">{{ $produk->nama }}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{ route('bidder.produk.tawar', ['produk' => $produk->id]) }}">
            @csrf
            <div class="modal-body line">
                <div class="text-light"> <strong>Start Bid<span style="margin-left: 52px"></span>: </strong>
                    <span class="start-bid">{{ Auctionet::rupiah($produk->lelang_harga_buka) }}</span></div>
                <div class="text-light"> <strong>Multiple Bid<span style="margin-left: 25px"></span>: </strong>
                    <span class="multiple-bid">{{ Auctionet::rupiah($produk->lelang_kelipatan) }}</span></div>
                <div class="text-light"> <strong>Buy Now <span style="margin-left: 45px"></span>: </strong>
                    <span class="buy-now">{{ $produk->lelang_harga_tutup == 0 ? '-' : Auctionet::rupiah($produk->lelang_harga_tutup) }}</span></div>
                <div class="text-light"> <strong>Close Bid<span style="margin-left: 49px"></span>: </strong>
                    <span class="close-bid">{{ $produk->lelangWaktuSelesai() ?? '-' }}</span></div>
                <div class="form-group text-left">
                    <label for="make-bid" class="make-bid mt-3 text-light"><strong>Make A Bid</strong></label>
                    <input type="text" class="form-control mt-2" id="bid" name="harga">
                </div>    
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-bid btn-primary text-light">Bid!</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('styles')
<style>
    .box{
    margin-top: 110px;
    width: 80%;
    height: 800px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 15px;
    box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.5);

    }
    .box-1{
    width: 100%;
    height: 500px;
    /* background-color: black */
    }
    .box-1-right{
        height:420px; 
        width:570px;
        /* background-color: black; */
    }
    .product-title{
        border-bottom: 2px solid rgba(255, 255, 255, 0.24);
        height: 45px;
        width: 100%
    }
    .product-desc{
        border-bottom: 2px solid rgba(255, 255, 255, 0.24);
        height: 170px;
        width: 100%;
    }
    .product-info{
        border-bottom: 2px solid rgba(255, 255, 255, 0.24);
        height: 100px;
        width: 100%;
        line-height: 8px;
 
    }
    .btn-make-bid{
        font-size: 20px;
        transition: .1s;
    }
    .btn-make-bid:hover{
        /* transform: scale(1.03); */
        font-weight: bold;
    }
    .modal-content{
        background-color:#0f0f0fe5; 
        box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.5);
        border: solid 1px;
        line-height: 40px;
    }
    .modal-header{
        border-bottom: 2px solid #41404080;
    }
    .modal-footer{
        border-top: 2px solid #41404080;
    }
    .btn-bid{
        transition: .1s;
    }
    .btn-bid:hover{
        /* transform: scale(1.03); */
        font-weight: bold;
    }
    .box-2{
    width: 100%;
    height: 500px;
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
