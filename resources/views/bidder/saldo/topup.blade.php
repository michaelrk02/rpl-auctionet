@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Top-Up')

@section('content')

{{-- 
    // Tampilkan nominal saldo saat ini
    // Tampilkan form yang berisi:
    // - input nominal yg akan ditopup
    // - tombol submit
    --}}
<body>
    
@csrf
<div class="container">
    <div class="title d-flex justify-content-center align-items-center mb-4">
        <img src="/assets/img/auc-logo.png" alt="" style="height: 30px">
    </div>
    <div class="balance-main d-flex justify-content-between align-items-center mb-2">
        <div class="main-1" style="width: 500px">
            <h5 class="text-light mb-2 fw-bold">Your Current Balance</h5>
            <h4 class="text-light mb-2" style="font-size: 42px">{{ Auctionet::rupiah($saldo->nominal) }}</h4>
        </div>
    </div>
    <form method="post" action="{{ route('bidder.saldo.topup') }}" onsubmit="return confirm('Are you sure?')">
            @csrf
            <div class="row mt-4">
                <div class="topup-method">
                    <label for="" class="text-light mb-2 fw-bold">Transfer Option</label>
                    @foreach ($methods as $i => $method)
                    <div class="form-check py-1">
                        <input class="form-check-input" type="radio" name="metode" id="method-{{ $i }}" value="{{ $method }}" @if (old('metode') == $method) checked @endif>
                        <label class="form-check-label text-light" for="method-{{ $i }}">{{ $method }}</label>
                    </div>
                    @endforeach
                </div>

                <div class="form-group col-md-12 mb-2 mt-2">
                    <label for="" class="text-light  fw-bold">Top Up Amount *)</label>
                </div>
                <div class="form-group col-md-9">
                    <input type="number" class="form-control mb-3" placeholder="Top Up Amount" name="nominal" required value="{{ old('nominal') }}">
                </div>
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-topup btn-primary w-100 fw-bold" >Top Up</button>
                </div>
                <div class="form-group col-md-9 text-light">*) A unique code will be augmented to the transfer amount to distinguish from another transactions</div>
            </div>
        </div>
    </form>
	
</body>

@push('styles')
<style>
.container{
    margin-top: 130px;
    padding: 43px;
    width: 550px;
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
.btn-topup{
        transition: 0.1s ;
    }
.btn-topup:hover{
       font-size: 17px
    }
</style>
@endpush
