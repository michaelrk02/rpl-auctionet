@extends('layouts.bidder')

@section('title', 'About')

@section('content')
<div class="about-banner d-flex justify-content-center">
    <div id="carouselExampleIndicators" class="carousel slide banner py-5" data-bs-ride="carousel">
        <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
            <div class="carousel-inner">
                    <div class="carousel-item active">
                        <section class="about">
                            <div class="main">
                                <img src="/assets/img/auc-wbg4.png">
                                <div class="about-text">
                                    <h1>About Us</h1>
                                    <h5>History<span class="text-primary"> & Description</span></h5>
                                    <p style="font-size: 22px">
                                        Established in 2022, Auctionet is an online based auctioneer operating in Indonesia. 
                                        Auctionet brings you the best auction experience today. 
                                        Find the products and items you are looking for
                                        and be the winner to get them!
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <div class="carousel-item">
                        <section class="about">
                            <div class="main">
                                <img src="/assets/img/why2.jpg">
                                <div class="about-text">
                                    <h1>Why Auctionet?</h1>
                                    <h5>Very<span class="text-primary"> Guaranteed</span></h5>
                                    <p style="font-size: 22px">
                                        With our system, there will be no auctioneer who is not responsible for 
                                        not shipping their auction item. Also, no bidder will be able to 
                                        'Bid n Run'. Here, not having enough balance is the same as not being able to bid.
                                        So, we will make sure your balance is filled first before you can bid!
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div> 
                    <div class="carousel-item">
                        <section class="about">
                            <div class="main">
                                <img src="/assets/img/contact3.jpg">
                                <div class="about-text">
                                    <h1>Contact Us</h1>
                                    <h5>To Be An<span class="text-primary"> Auctioneer</span></h5>
                                    <p style="font-size: 22px">
                                        We are very selective about our auctioneers. We will guarantee 
                                        all the convenience of both the auctioneer and bidder. 
                                        If you would like to be our auctioneer, feel free to contact 
                                        us at (+62)85712345678.
                                        <br><br>
                                        Call only: 021-720469
                                    </p>
                                </div>
                            </div>
                        </section>
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
    .about-banner{
        margin-top: 130px;
    }
    .banner{
        width:100%;
    }
    .main{
    /* width: 1600px; */
    max-width: 90%;
    margin: 0px auto;
}

.about{
    width: 100%;
    /* height: 400px; */
    /* padding: 100px 0px 100px 0; */
}

.about img{
    float: left;
    /* margin-top: 40px; */
    object-fit:cover;
    margin-left: 130px;
    height: 370px;
    width: 370px;
    position: relative;
    overflow: hidden;
    border-radius: 50%;
    opacity: 0.9;
    color: #660000;

}

.about-text{
    float: right;
    margin-right: 100px;
    /* margin-top: 50px; */
    width: 600px;
    opacity: 0.9;

}


.about-text h1{
    font-size: 70px;
    margin-bottom: 20px;
    color: white;
}

.about-text h5{
    font-size: 30px;
    margin-bottom: 25px;
    color: white;

}

.about-text  p{
    letter-spacing: 1px;
    line-height: 25px;
    /* font-size: 20px; */
    color: #ffffff;
    text-align: justify;
    text-indent: 30px;
}
</style>
@endpush
