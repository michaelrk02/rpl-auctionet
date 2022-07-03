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
    <div class="container d-flex justify-content-center" style="margin-top: 120px; margin-bottom: 150px">
        <div class="list-statistic">
            <div class="statistic d-flex justify-content-center align-items-center">
                <div class="stat-1 text-center">
                    <h5 class="text-light mb-2 fw-bold">Auctionet's Product(s) Sold</h5>
                    <h4 class="text-light mb-2" style="font-size: 42px"><span class="text-primary">15</span> item(s)</h4>
                </div>
            </div>
            <div class="statistic d-flex justify-content-center align-items-center">
                <div class="stat-1 text-center">
                    <h5 class="text-light mb-2 fw-bold">Auctionet's Registered Bidder(s)</h5>
                    <h4 class="text-light mb-2" style="font-size: 42px"><span class="text-primary">190</span> user(s)</h4>
                </div>
            </div>   
            <div class="statistic d-flex justify-content-center align-items-center">
                <div class="stat-1 text-center">
                    <h5 class="text-light mb-2 fw-bold">Number of Bid(s) Received</h5>
                    <h4 class="text-light mb-2" style="font-size: 42px"><span class="text-primary">290</span> bid(s)</h4>
                </div>
            </div>   
        </div>
    </div>
@endsection

@push('styles')
<style>
    .home-banner{
        margin-top: 160px;
        margin-bottom: 50px;
    }
    /* .banner-2{
        width: 800px;
        background-color:#00000080;
        border-radius: 10px;
        box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.5);
    } */
/* .container{
    width: 70%;
    height: 500px;
    padding: 43px;
    background-color:#00000080;
    border-radius: 10px;
    box-shadow: 0px 0px 4px 0px rgba(0, 0, 0, 0.5);
} */
.statistic{
    margin-top: 30px;
    width: 350px;
    height: 150px;
    background-color:#00000094;
    border: solid 2px rgba(197, 197, 197, 0.623);
    border-radius: 10px;
    /* padding: 20px 30px 20px 30px; */
}
.list-statistic{
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-around;
        flex-wrap: wrap;
        /* background-color: white */
    }

</style>
@endpush
