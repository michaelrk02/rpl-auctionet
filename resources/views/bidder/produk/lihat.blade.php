@php
use App\Libraries\Auctionet;
use Illuminate\Support\Facades\Auth;
@endphp

@extends('layouts.bidder')

@section('title', 'Bidding List')

@section('content')

<div class="main d-flex justify-content-center">
    <div class="box d-flex flex-column justify-content-start align-items-around pb-2">
        <div class="box-1 d-flex justify-content-around align-items-start px-4 py-5">
            <img src="@if ($produk->gambar !== null) {{ route('bidder.produk.lihat.gambar', ['produk' => $produk->id]) }} @else /assets/img/default-image.png @endif" alt="product-img"
            style="width:420px; height:420px; object-fit:cover; border-radius:15px">
            <div class="box-1-right d-flex flex-column justify-content-start align-items-start">
                <div class="product-title">
                    <h4 class="text-light">{{ $produk->nama }} @if ($produk->dimenangkan_oleh !== null) <span class="badge bg-info">AUCTION ENDED</span> @endif</h4>
                </div>
                <div class="product-desc mt-1 pb-2">
                    <h5 class="text-light">Description</h5>
                    <p class="text-light markdown">{{ $produk->deskripsi }}</p>
                </div>
                <div class="product-info mt-3 mb-3">
                    <div class="info-open mb-1 row text-light">
                        <p class="col-2"><strong>Open Bid</strong></p> 
                        <p class="open-bid col-10 "><span class="fw-bold">: </span> {{ $produk->lelang_waktu_mulai }}</p>
                    </div>
                    <div class="info-close mb-1 row text-light">
                        <p class="col-2"><strong>Close Bid</strong></p> 
                        <p class="open-bid col-10 "><span class="fw-bold">: </span> {{ $produk->lelangWaktuSelesai() ?? '-' }}</p>
                    </div>     
                    <div class="info-start mb-1 row text-light">
                        <p class="col-2"><strong>Start Bid</strong></p> 
                        <p class="open-bid col-10 "><span class="fw-bold">: </span> {{ Auctionet::rupiah($produk->lelang_harga_buka) }}</p>
                    </div>
                    <div class="info-buy-now row text-light">
                        <p class="col-2"><strong>Buy Now</strong></p> 
                        <p class="open-bid col-10 "><span class="fw-bold">: </span> {{ $produk->lelang_harga_tutup == 0 ? '-' : Auctionet::rupiah($produk->lelang_harga_tutup) }}</p>
                    </div>
                </div>
                <div class="button-text">
                    @auth('bidder')
                    <a href="#" class="btn btn-make-bid btn-primary text-light mt-3"
                    data-bs-toggle="modal" data-bs-target="#detailsModal">Make A Bid!</a>
                    @endauth
                    @guest('bidder')
                    <a class="text-decoration-none mt-3" href="{{ route('bidder.auth.login') }}">
                        <h6 class="mt-3">Login first to be able to make a bid!</h6>
                    </a>
                    @endguest
                    <h5 class="text-light mt-3">See Ongoing Bid Below!</h5>
                </div>
            </div>
        </div>
        
        <div class="box-2 flex-column d-flex justify-content-start align-items-center px-5 pb-5">
            
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

@auth('bidder')
<!-- Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 400px">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-light" id="exampleModalLabel">{{ $produk->nama }}</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="{{ route('bidder.produk.tawar', ['produk' => $produk->id]) }}" onsubmit="return confirm('Are you sure? This cannot be undone')">
            @csrf
            <div class="modal-body line" style="line-height: 15px">
                <div class="modal-balance w-100 mb-4">
                    <h5 class="text-light mb-2 fw-bold">Your Current Balance</h5>
                    <h4 class="text-light mb-2" style="font-size: 42px">{{ Auctionet::rupiah(Auth::guard('bidder')->user()->dataSaldo->nominal) }}</h4>
                </div>
                <div class="start-bid row text-light">
                    <p class="col-4"><strong>Start Bid</strong></p> 
                    <p class="col-8 "><span class="fw-bold">: </span> {{ Auctionet::rupiah($produk->lelang_harga_buka) }}</p>
                </div>
                <div class="multiple-bid row text-light">
                    <p class="col-4"><strong>Multiple Bid</strong></p> 
                    <p class=" col-8 "><span class="fw-bold">: </span> {{ Auctionet::rupiah($produk->lelang_kelipatan) }}</p>
                </div>
                <div class="buy-now row text-light">
                    <p class="col-4"><strong>Buy Now</strong></p> 
                    <p class="col-8 "><span class="fw-bold">: </span> {{ $produk->lelang_harga_tutup == 0 ? '-' : Auctionet::rupiah($produk->lelang_harga_tutup) }}</p>
                </div>
                <div class="close-bid  row text-light">
                    <p class="col-4"><strong>Close Bid</strong></p> 
                    <p class="col-8 "><span class="fw-bold">: </span> {{ $produk->lelangWaktuSelesai() ?? '-' }}</p>
                </div>       
                <div class="form-group text-left">
                    <h4 for="make-bid" class="make-bid mt-3 text-light">Make A Bid</h4>
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
@endauth
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
        height: 100px;
        width: 100%;
        line-height: 8px;
    }
    .button-text{
        border-top: 2px solid rgba(255, 255, 255, 0.24);

    }

    .btn-make-bid{
        font-size: 20px;
        transition: .1s;
    }
    .btn-make-bid:hover{
        /* transform: scale(1.03); */
        font-weight: bold;
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
