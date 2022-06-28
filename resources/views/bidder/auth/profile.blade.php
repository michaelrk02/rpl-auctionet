@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.bidder')

@section('title', 'Register Bidder')

@section('content')

{{-- 
    // Tampilkan identitas bidder (nama dan email)
    // Tampilkan form yg berisi:
    // - Input password baru*
    // - Input konfirmasi password baru*
    // - Input nomor telepon
    // - Input alamat rumah
    // - Tombol simpan
    // *) password bidder akan terganti apabila input tidak kosongan --}}
<body>
    <form action="">
        @csrf
        <div class="container">
            <div class="row">
                <div class="title d-flex justify-content-center align-items-center mb-4">
                    <img src="/assets/img/auc-logo.png" alt="" style="height: 30px">
                </div>
                <div class="form-group col-md-6">
                    <label for="" class="text-light mb-2 fw-bold">Full Name</label>
                    <input type="text" class="form-control mb-3" placeholder="Full Name" value="Mr. Eugene Krabs" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="" class="text-light mb-2 fw-bold">Email</label>
                    <input type="email" class="form-control mb-3" placeholder="Email" value="eugenekrabs@krustykrab.com" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="" class="text-light mb-2 fw-bold">Password</label>
                    <input type="password" class="form-control mb-3" placeholder="Password">
                </div>
                <div class="form-group col-md-6">
                    <label for="" class="text-light mb-2 fw-bold">Confirm Password</label>
                    <input type="password" class="form-control mb-3" placeholder="Confirm Password">
                </div>
                <div class="form-group col-md-12">
                    <label for="" class="text-light mb-2 fw-bold">Phone Number</label>
                    <input type="text" class="form-control mb-3" placeholder="Phone Number" required value="hello im underwater">
                </div>
                <div class="form-group col-md-12">
                    <label for="" class="text-light mb-2 fw-bold">Address</label>
                    <input type="text" class="form-control mb-3" placeholder="Address" required value="Bikini Bottom Anchor">
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-save btn-primary w-100 fw-bold">Save</button>
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
    width: 600px;
    background-color:#00000080;
    border-radius: 10px;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.5);
}
.btn-save{
        transition: 0.1s ;
    }
.btn-save:hover{
       font-size: 19px
    }
</style>
@endpush
