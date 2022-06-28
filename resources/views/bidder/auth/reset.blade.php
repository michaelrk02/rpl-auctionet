@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Reset Bidder')

@section('content')
    <form method="post" action="{{ $resetUrl }}">
        @csrf
        <div class="container">
            <div class="row">
                <div class="title d-flex justify-content-center align-items-center mb-4">
                    <img src="/assets/img/auc-logo.png" alt="" style="height: 30px">
                </div>
                <div class="form-group col-md-12">
                    <label for="" class="text-light mb-2 fw-bold">New Password</label>
                    <input type="password" class="form-control mb-3" placeholder="New Password" required name="password">
                </div>
                <div class="form-group col-md-12">
                    <label for="" class="text-light mb-2 fw-bold">Confirm New Password</label>
                    <input type="password" class="form-control mb-3" placeholder="Confirm New Password" required name="password_confirmation">
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-reset btn-primary w-100 fw-bold" >Save New Password</button>
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
    width: 400px;
    background-color:#00000080;
    border-radius: 10px;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.5);
}
.btn-reset{
        transition: 0.1s ;
    }
.btn-reset:hover{
       font-size: 19px
    }
</style>
@endpush
