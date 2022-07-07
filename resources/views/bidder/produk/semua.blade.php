@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Products List')

@section('content')

<div class="list-product">
    @foreach ($daftarProduk as $produk)
        <div class="card bg-transparent mb-5" style="width: 20rem;">
            <img class="card-img-top img-product" src="@if ($produk->gambar !== null) {{ route('bidder.produk.lihat.gambar', ['produk' => $produk->id]) }} @else /assets/img/default-image.png @endif" alt="">
            <div class="card-body text-body" style="line-height: 15px">
                <h4 class="card-title mb-3 text-light">{{ $produk->nama }}</h4>
                @if ($produk->dimenangkan_oleh !== null) <p class="badge bg-info">AUCTION ENDED</p> @endif
                <div class="card-text open-bid mb-1 row text-light">
                    <p class="col-4"><strong>Open Bid</strong></p> 
                    <p class="col-8 "><span class="fw-bold">: </span> {{ $produk->lelang_waktu_mulai }}</p>
                </div>
                <div class="card-text close-bid mb-1 row text-light">
                    <p class="col-4"><strong>Close Bid</strong></p> 
                    <p class="col-8 "><span class="fw-bold">: </span> {{ $produk->lelangWaktuSelesai() ?? '-' }}</p>
                </div>     
                <div class="card-text buy-now mb-1 row text-light">
                    <p class="col-4"><strong>Buy Now</strong></p> 
                    <p class="col-8 "><span class="fw-bold">: </span> {{ $produk->lelang_harga_tutup == 0 ? '-' : Auctionet::rupiah($produk->lelang_harga_tutup) }}</p>
                </div>  
                <div class="card-text start-bid mb-1 row text-light">
                    <p class="col-4"><strong>Start Bid</strong></p> 
                    <p class="col-8 "><span class="fw-bold">: </span> {{ Auctionet::rupiah($produk->lelang_harga_buka) }}</p>
                </div>
                <div class="card-btn ">
                    <a href="{{ route('bidder.produk.lihat', ['produk' => $produk->id]) }}" class="btn btn-join-bid btn-primary text-light">Join Bidding!</a>
                </div>
            </div>
        </div>
    @endforeach

</div>

@endsection

@push('styles')
<style>
    .list-product{
        /* padding: 0px 0px 150px 0px; */
        margin-top: 130px;
        display: flex;
        align-items: center;
        justify-content: space-around;
        flex-wrap: wrap;
        /* background-color: white */
    }
    .img-product{
        height: 230px;
        border-radius: 10px 10px 0 0;
        object-fit:cover;
    }
    .text-body{
        background-color:rgba(0, 0, 0, 0.5);
        border-radius:  0 0 10px 10px;
    }
    .btn-join-bid{
        transition: 0.1s ;
    }
    .btn-details{
        transition: 0.1s ;
    }
    .card{
        border-radius: 10px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.5);
        transition: 0.2s transform;
    }
    .card:hover{
        transform: scale(1.02);
    }
    .btn-join-bid:hover{
        /* transform: scale(1.03); */
        font-weight: bold;
    }
    .btn-details:hover{
        /* transform: scale(1.03); */
        font-weight: bold;
        background-color: transparent;
    }
 
</style>
@endpush
