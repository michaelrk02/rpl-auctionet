@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Register Bidder')

@section('content')

{{-- // - Input nama
// - Input email
// - Input password
// - Input konfirmasi password
// - Tombol register --}}
    <form method="post" action="{{ route('bidder.auth.register') }}" onsubmit="return confirm('Are you sure?')">
        @csrf
        <div class="container">
            <div class="row">
                <div class="title d-flex justify-content-center align-items-center mb-4">
                    <img src="/assets/img/auc-logo.png" alt="" style="height: 30px">
                </div>
                <div class="form-group col-md-12">
                    <label for="" class="text-light mb-2 fw-bold">Full Name</label>
                    <input type="text" class="form-control mb-3" placeholder="Full Name" required name="nama">
                </div>
                <div class="form-group col-md-12">
                    <label for="" class="text-light mb-2 fw-bold">Email</label>
                    <input type="email" class="form-control mb-3" placeholder="Email" required name="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="" class="text-light mb-2 fw-bold">Password</label>
                    <input type="password" class="form-control mb-3" placeholder="Password" required name="password">
                </div>
                <div class="form-group col-md-6">
                    <label for="" class="text-light mb-2 fw-bold">Confirm Password</label>
                    <input type="password" class="form-control mb-3" placeholder="Confirm Password" required name="password_confirmation">
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-register btn-primary w-100 fw-bold" >Register</button>
                </div>
               
            </div>            
        </div>
    </form>
@endsection	

@push('styles')
<style>
.container{
    margin-top: 130px;
    padding: 43px;
    width: 600px;
    background-color:#00000080;
    border-radius: 10px;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.5);
}
.btn-register{
        transition: 0.1s ;
    }
.btn-register:hover{
       font-size: 19px
    }
</style>
@endpush
