@extends('layouts.auctioneer')

@section('title', 'Auctioneer Dashboard')

@section('content')
<h3 class="mb-4">Statistics</h3>
<div class="py-2">
    <h5>Overall</h5>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert alert-info">
                <h5>{{ $info['jml_produk'] }}</h5>
                <p>Total Products</p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert alert-info">
                <h5>{{ $info['jml_bidder'] }}</h5>
                <p>Registered Bidders</p>
            </div>
        </div>
    </div>
</div>
<div class="py-2">
    <h5>Auction</h5>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert alert-info">
                <h5>{{ $info['jml_produk_terjual'] }}</h5>
                <p>Products Sold</p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert alert-info">
                <h5>{{ $info['jml_produk_belum_terjual'] }}</h5>
                <p>Products Selling</p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert alert-info">
                <h5>{{ $info['jml_tawaran'] }}</h5>
                <p>Total Bids</p>
            </div>
        </div>
    </div>
</div>
<div class="py-2">
    <h5>Transaction</h5>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert alert-info">
                <h5>{{ $info['jml_topup'] }}</h5>
                <p>Top-Up Requests</p>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="alert alert-info">
                <h5>{{ $info['jml_tarik'] }}</h5>
                <p>Withdraw Requests</p>
            </div>
        </div>
    </div>
</div>
@endsection
