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
            <div class="card-body text-body">
                <h4 class="card-title mb-3 text-light">{{ $produk->nama }}</h4>
                @if ($produk->dimenangkan_oleh !== null) <p class="badge bg-info">AUCTION ENDED</p> @endif
                <p class="card-text mb-1 text-light"> <strong>Open Bid<span style="margin-left: 5.5px"></span>: </strong>
                    <span class="open-bid">{{ $produk->lelang_waktu_mulai }}</span></p> 
                <p class="card-text mb-1 text-light"> <strong>Close Bid<span style="margin-left: 6px"></span>: </strong>
                    <span class="buy-now">{{ $produk->lelangWaktuSelesai() ?? '-' }}</span></p> 
                <p class="card-text mb-1 text-light"> <strong>Buy Now<span style="margin-left: 7px"></span>: </strong>
                    <span class="buy-now">{{ $produk->lelang_harga_tutup == 0 ? '-' : Auctionet::rupiah($produk->lelang_harga_tutup) }}</span></p> 
                <p class="card-text text-light"> <strong>Start Bid<span style="margin-left: 10px"></span>: </strong>
                    <span class="start-bid">{{ Auctionet::rupiah($produk->lelang_harga_buka) }}</span></p>
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
