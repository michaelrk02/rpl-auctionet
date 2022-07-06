@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Withdrawal')

@section('content')

{{-- 
    // Tampilkan nominal saldo saat ini
    // Tampilkan form yang berisi:
    // - input nominal yg akan ditarik
    // - input bank rekening penarikan
    // - input no. rekening penarikan
    // - input nama pemegang rekening penarikan
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
    <form method="post" action="{{ route('bidder.saldo.tarik') }}" onsubmit="return confirm('Are you sure?')">
            @csrf
            <div class="row mt-4">
                <div class="form-group col-md-6">
                    <label for="" class="text-light  fw-bold">Withdrawal Amount</label>
                    <input type="text" class="form-control mb-3" placeholder="Withdrawal Amount" required name="nominal" value="{{ old('nominal') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="" class="text-light  fw-bold">Bank Type</label>
                    <select class="form-select" aria-label="Default select example" name="bank">
                        {{-- <option hidden selected disabled style="color:gray">Bank Type</option> --}}
                        @foreach ($banks as $bank)
                        <option value="{{ $bank }}" @if (old('bank') === $bank) selected @endif>{{ $bank }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <label for="" class="text-light  fw-bold">Account Number</label>
                    <input type="text" class="form-control mb-3" placeholder="Account Number" required name="no_rekening" value="{{ old('no_rekening') }}">
                </div>
                <div class="form-group col-md-12">
                    <label for="" class="text-light  fw-bold">Account Name</label>
                    <input type="text" class="form-control mb-3" placeholder="Account Name" required name="nama_rekening" value="{{ old('nama_rekening') }}">
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-tarik btn-primary w-100 fw-bold" >Withdraw</button>
                </div>
               
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
.btn-tarik{
        transition: 0.1s ;
    }
.btn-tarik:hover{
       font-size: 17px
    }

</style>
@endpush
