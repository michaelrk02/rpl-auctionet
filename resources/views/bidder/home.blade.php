@extends('layouts.bidder')

@section('title', 'Home')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>

    <div class="banner" style="margin-bottom: 120px">
        <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="slide-banner text-center">
                        <h1>Welcome to Auctionet!</h1>
                        <h5>Register & login now to be our bidder</h5>
                        <p>
                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX <br>
                            XXXXXXXXXXXXXXXXXXXXXXXXX Slide 1 XXXXXXXXXXXXXXXXXXXXXXXXX <br>
                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                        </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slide-banner text-center">
                            <h1>Go to our products to start bidding!</h1>
                            <h5>............................</h5>
                            <p>
                                XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX <br>
                                XXXXXXXXXXXXXXXXXXXXXXXXX Slide 2 XXXXXXXXXXXXXXXXXXXXXXXXX <br>
                                XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                            </p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="slide-banner text-center">
                        <h1>...............</h1>
                        <h5>...................</h5>
                        <p>
                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX <br>
                            XXXXXXXXXXXXXXXXXXXXXXXXX Slide 3 XXXXXXXXXXXXXXXXXXXXXXXXX <br>
                            XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX
                        </p>
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
