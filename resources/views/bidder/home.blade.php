@extends('layouts.bidder')

@section('title', 'Home')

@section('content')
<div class="home-banner d-flex justify-content-center">
    <div id="carouselExampleIndicators" class="carousel slide banner py-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        </div>
            <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="slide-banner text-center d-flex justify-content-center">
                            <div class="text-banner w-75">
                                <h1 class="mb-3">Welcome to</h1>
                                <img src="/assets/img/auc-logo.png" alt="" style="width: 300px">

                                {{-- <h5>Register & login now to be our bidder</h5> --}}
                                <h4 class="mt-2">The best online-based auctions with trusted auctioneers!</h4>
                                <p class="mt-3">Don't have an account yet? Click 
                                    <a href="#" class="text-decoration-none fw-bold">here</a> 
                                    to register and be a part of us!</p>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="slide-banner text-center d-flex justify-content-center">
                            <div class="text-banner w-50">
                                <h1>Why Auctionet?</h1>
                                <h5 class="mt-3">
                                    We are not like the online auctions that are out there. <br>
                                    Auctioneers are <span class="fw-bold text-primary">not responsible</span>. <br>
                                    Auction winners often <span class="fw-bold text-primary">Bid n Run</span>.
                                </h5>
                                <h4 class="mt-3">
                                    We don't do that here!
                                </h4>
                                <h4 class="mt-3">
                                    We have our trusted and qualified auctioneers. <br>
                                    No balance no bidding for bidders.
                                </h4>
                                    
                                <h6 class="mt-3">With our system, there will be no cheating from both auctioneers and bidders!</h6>
                                
                            </div>
                        </div>
                    </div> 
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
    </div>
</div>
@endsection

@push('styles')
<style>
    .home-banner{
        margin-top: 130px;
        margin-bottom: 120px;
    }
    .banner{
        width: 90%;
        background-color: rgba(0, 0, 0, 0.5);
        height: 400px;
        border-radius: 15px;
        color: white;
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.5);
        border: solid rgba(97, 0, 0, 0.582);
    }   
</style>
@endpush
