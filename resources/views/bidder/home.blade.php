@extends('layouts.bidder')

@section('title', 'Home')

@section('content')
<div class="home-banner d-flex justify-content-center align-items-center flex-column">
       
                    <div class="banner">
                        <div class="slide-banner text-center d-flex justify-content-center text-light">
                            <div class="text-banner">
                                <h1 class="mb-3" style="font-size: 65px">Welcome to</h1>
                                <img src="/assets/img/auc-logo.png" alt="" style="width: 470px">

                                {{-- <h5>Register & login now to be our bidder</h5> --}}
                                <h3 class="mt-2">The best online-based auctions with trusted auctioneers!</h3>
                                <p class="mt-3" style="font-size: 20px">Don't have an account yet? Click 
                                    <a href="{{ route('bidder.auth.register') }}" class="text-decoration-none fw-bold">here</a> 
                                    to register and be a part of us!</p>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="banner-2 mt-5">
                        <div class="slide-banner d-flex justify-content-center text-light">
                            <div class="text-banner text-center">
                                <h1 class="mt-4 mb-3" style="font-size: 50px">Join <span class="fw-bold text-primary">Us</span> Now!</h1>
                               
                                <a href="{{ route('bidder.produk.semua') }}">
                                    <button type="button" class="btn btn-primary fw-bold click-here" style="font-size: 30px">Click Here</button>
                                </a>
                                <h5 class="mt-3 mb-3">
                                    To see the items being auctioned. 
                                </h5>
                                <p class="mt-3">Be ready to bid the existing items! Don't forget to
                                    <a href="{{ route('bidder.auth.register') }}" class="text-decoration-none fw-bold">login</a> 
                                    first.</p>
                            </div>
                        </div>
                    </div>  --}}
</div>
@endsection

@push('styles')
<style>
    .home-banner{
        margin-top: 200px;
        margin-bottom: 300px;
    }
    .banner-2{
        width: 800px;
        background-color:#00000080;
        border-radius: 10px;
        box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.5);
}
    }


</style>
@endpush
