@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Login Bidder')

@section('content')

<body>
    <form action="{{ route('bidder.auth.reset') }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="title d-flex justify-content-center align-items-center mb-4">
                    <img src="/assets/img/auc-logo.png" alt="" style="height: 30px">
                </div>
                <div class="form-group col-md-12">
                    <label for="" class="text-light mb-2 fw-bold">Forgot Password</label>
                    <p class="text-light">Enter the email whose password you want to reset for verification.</p>
                    <input type="email" class="form-control mb-3" placeholder="Email" required>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-forgot btn-primary w-100 fw-bold">Reset Password</button>
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
    width: 400px;
    background-color:#00000080;
    border-radius: 10px;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.5);
}
.btn-forgot{
        transition: 0.1s ;
    }
.btn-forgot:hover{
       font-size: 19px
    }
</style>
@endpush

