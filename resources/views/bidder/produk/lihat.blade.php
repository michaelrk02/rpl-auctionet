@extends('layouts.bidder')

@section('title', 'Products List')

@section('content')

<div class="main d-flex justify-content-center">
    <div class="box d-flex flex-column justify-content-start align-items-around pb-2">
        <div class="box-1 d-flex justify-content-around align-items-start px-4 py-5">
            <img src="/assets/img/default-image.png" alt="product-img"
            style="width:420px; height:420px; object-fit:cover; border-radius:15px">
            <div class="box-1-right d-flex flex-column justify-content-start align-items-start">
                <div class="product-title">
                    <h4 class="text-light">Product title</h4>
                </div>
                <div class="product-desc mt-1 pb-2">
                    <h5 class="text-light">Description</h5>
                    <p class="text-light">
                        Product Description Product Description Product Description Product Description
                        Product Description Product Description Product Description Product Description
                        Product Description Product Description Product Description Product Description
                        Product Description Product Description Product Description Product Description
                    </p>
                </div>
                <div class="product-info mt-3 pb-2">
                    <p class="info-close text-light"><b>Close Bid: </b>
                        <span>00:00:00</span></p>
                    <p class="info-start text-light"><b>Start Bid: </b>
                        <span>Rp. XXX.XXX,00</span></p>
                    <p class="info-buy text-light"><b>Buy Now: </b>
                        <span>Rp. XXX.XXX,00</span></p>
                </div>
                <div class="">
                    <a href="#" class="btn btn-make-bid btn-primary text-light mt-3"
                    data-bs-toggle="modal" data-bs-target="#detailsModal">Make A Bid!</a>
                    <h5 class="text-light mt-3">See Ongoing Bid Below!</h5>
                </div>
            </div>
        </div>
        <div class="box-2 flex-column d-flex justify-content-start align-items-center px-5 pb-5">
            {{-- <table border="1" cellpadding="10" cellspacing="0" class="mt-3">
                <thead>
                    <tr>
                        <th style="width:20px ;">Rank</th>
                        <th >Bidder</th>
                        <th >Bid</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table> --}}
            <div class="table-wrapper-scroll-y my-custom-scrollbar">
                <table class="table table-dark table-hover table-striped mb-0 text-center">
                  <thead class="">
                    <tr>
                      <th scope="col" style="width: 33%">Rank</th>
                      <th scope="col" style="width: 33%">Bidder</th>
                      <th scope="col" style="width: 33%">Bid</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>John Doe</td>
                      <td>Rp.XXX.XXX,00</td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>John Doe</td>
                      <td>Rp.XXX.XXX,00</td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>John Doe</td>
                      <td>Rp.XXX.XXX,00</td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>John Doe</td>
                      <td>Rp.XXX.XXX,00</td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>John Doe</td>
                      <td>Rp.XXX.XXX,00</td>
                    </tr>
                    <tr>
                      <th scope="row">6</th>
                      <td>John Doe</td>
                      <td>Rp.XXX.XXX,00</td>
                    </tr>
                  </tbody>
                </table>
              
              </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="width: 350px">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Product title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="">
            <div class="modal-body line">
                <p class="text-dark"> <strong>Start Bid: </strong>
                    <span class="start-bid">Rp.XXX.XXX,00</span></p>
                <p class="text-dark"> <strong>Multiple Bid: </strong>
                    <span class="multiple-bid">Rp.XXX.XXX,00</span></p>
                <p class="text-dark"> <strong>Buy Now: </strong>
                    <span class="buy-now">Rp.XXX.XXX,00</span></p>
                <p class="text-dark"> <strong>Close Bid: </strong>
                    <span class="close-bid">00:00:00</span></p>
                <div class="form-group text-left">
                    <label for="make-bid" class="make-bid mt-3"><strong>Make A Bid</strong></label>
                    <input type="text" class="form-control mt-2" id="bid" name="bid">
                </div>    
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-bid btn-primary text-light">Bid!</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('styles')
<style>
    .box{
    margin-top: 110px;
    width: 80%;
    height: 800px;
    background-color: rgba(0, 0, 0, 0.5);
    border-radius: 15px;
    box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.5),

    }
    .box-1{
    width: 100%;
    height: 500px;
    /* background-color: black */
    }
    .box-1-right{
        height:420px; 
        width:570px;
        /* background-color: black; */
    }
    .product-title{
        border-bottom: 2px solid rgba(255, 255, 255, 0.24);
        height: 45px;
        width: 100%
    }
    .product-desc{
        border-bottom: 2px solid rgba(255, 255, 255, 0.24);
        height: 170px;
        width: 100%;
    }
    .product-info{
        border-bottom: 2px solid rgba(255, 255, 255, 0.24);
        height: 80px;
        width: 100%;
        line-height: 8px;

    }
    .btn-make-bid{
        font-size: 20px;
        transition: .1s;
    }
    .btn-make-bid:hover{
        /* transform: scale(1.03); */
        font-weight: bold;
    }
    .modal-content{
        background-color:#dadadafa;
        line-height: 8px;
    }
    .modal-header{
        border-bottom: 2px solid #a8a8a8b7;
    }
    .modal-footer{
        border-top: 2px solid #a8a8a8b7;
    }
    .btn-bid{
        transition: .1s;
    }
    .btn-bid:hover{
        /* transform: scale(1.03); */
        font-weight: bold;
    }
    .box-2{
    width: 100%;
    height: 500px;
    }
    .my-custom-scrollbar {
    position: relative;
    height: 200px;
    overflow: auto;
    }
    /* width */
    .my-custom-scrollbar::-webkit-scrollbar {
     width: 5px;
    }
    /* Track */
    .my-custom-scrollbar::-webkit-scrollbar-track {
    box-shadow: inset 0 0 3px grey; 
    border-radius: 5px;
    }
    /* Handle */
    .my-custom-scrollbar::-webkit-scrollbar-thumb {
    background: #6968688e; 
    border-radius: 5px;
    }
    /* Handle on hover */
    .my-custom-scrollbar::-webkit-scrollbar-thumb:hover {
    background: #4949498e; 
    }
    .table-wrapper-scroll-y {
    display: block;
    width: 100%;
    height: 250px;
    border-radius: 10px;
    }
    table{
        border-radius: 10px;
        overflow: hidden;
        opacity: .9;
    }
</style>
@endpush