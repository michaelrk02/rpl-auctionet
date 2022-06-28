@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Login Bidder')

@section('content')

<body>
    <form action="">
        @csrf
        <div class="container">
            <div class="row">
                <div class="title d-flex justify-content-center align-items-center mb-4">
                    <img src="/assets/img/auc-logo.png" alt="" style="height: 30px">
                </div>
                {{-- <div class="form-group col-md-12 mb-4 text-center">
                    <h4 class="text-light">Login Here!</h4>
                    {{-- <img src="/assets/img/auc-logo.png" alt="" style="width: 70px"> --}}
                
                <div class="form-group col-md-12">
                    <label for="" class="text-light mb-2 fw-bold">Email</label>
                    <input type="email" class="form-control mb-3" placeholder="Email" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="" class="text-light mb-2 fw-bold">Password</label>
                    <input type="password" class="form-control mb-3" placeholder="Password" required>
                </div>
               
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-signin btn-primary w-100 fw-bold" >Sign In</button>
                </div>
                <div class="form-group col-md-12 d-flex justify-content-between mt-2 mb-3">
                    <div class="text-left">
                        <label class="text-black" style="font-size: 13px">
                            <input type="checkbox" checked="checked" name="remember" style="accent-color: #bd0000"> Remember me
                          </label>
                    </div>
                    <div class="text-left">
                        <a href="{{ route('bidder.auth.forgot')}}" class="text-decoration-none text-black" style="font-size: 13px">Forgot Password?</a>
                    </div>
                </div>
                <p class="text-center text-light" style="font-size: 13px">Not a bidder yet? <a class="text-decoration-none fw-bold" href="{{ route('bidder.auth.register')}}">Register Now!</a></p>
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
.btn-signin{
        transition: 0.1s ;
    }
.btn-signin:hover{
       font-size: 19px
    }
</style>
@endpush
