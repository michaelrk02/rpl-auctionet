@php
use Illuminate\Support\Facades\Auth;
@endphp

@extends('layouts.main')

@section('body')
<nav class="navbar fixed-top navbar-dark  py-3 justify-content-center"  >
    <div class="container-xxl text-white" style="padding-left:40px; padding-right:40px">
        <a href="{{ route('bidder.home') }}" class=" align-items-center col-md-3 mb-2 mb-md-0">
           <img src="/assets/img/auc-logo.png" alt="" style="width:90px ;">
        </a>
        <ul class="nav col-12 col-md-auto mb-2 w-50 justify-content-around mb-md-0 ">
            <li class="nav-item"><a href="{{ route('bidder.home') }}" class="nav-link px-2 fw-bold {{ Route::currentRouteName() === 'bidder.home' ? 'link-primary' : 'link-light' }}">Home</a></li>
            <li class="nav-item"><a href="{{ route('bidder.produk.semua') }}" class="nav-link px-2 fw-bold {{ Route::currentRouteName() === 'bidder.produk.semua' ? 'link-primary' : 'link-light' }}">Products</a></li>
            <li class="nav-item"><a href="{{ route('bidder.home.about') }}" class="nav-link px-2 fw-bold {{ Route::currentRouteName() === 'bidder.home.about' ? 'link-primary' : 'link-light' }}">About</a></li>
        </ul>
        @guest('bidder')
            <div class="col-md-3 text-end">
                <a href="{{ route('bidder.auth.login') }}"><button type="button" class="btn btn-primary fw-bold">Login</button></a>
                <a href="{{ route('bidder.auth.register') }}"><button type="button" class="btn btn-outline-primary me-2 fw-bold text-light">Register</button></a>      
            </div>
        @endguest
        @auth('bidder')
            <div class="col-1"></div>
            <div class="" style="width: 150px"></div>
                <div class="nav-item dropdown text-end" >
                    <a class="nav-link dropdown-toggle fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle" style="font-weight: bold"></i><span style="margin-left: 5px"></span> 
                    </a>
                    <ul class="dropdown-menu  animate slideIn user-dropdown" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-light" href="{{ route('bidder.auth.profile') }}"><i class="bi bi-person-lines-fill"></i><span style="margin-left: 10px"></span>{{ Auth::guard('bidder')->user()->nama }}</a></li>
                        <li><hr class="dropdown-divider" style="background-color: #41404080"></li>
                        <li><a class="dropdown-item text-light" href="{{ route('bidder.saldo.riwayat') }}"><i class="bi bi-wallet2"></i><span style="margin-left: 10px"></span>Balance</a></li>
                        <li><a class="dropdown-item text-light" href="{{ route('bidder.pengiriman.semua') }}"><i class="bi bi-truck"></i></i><span style="margin-left: 10px"></span>Shipment</a></li>
                        <li><hr class="dropdown-divider" style="background-color: #41404080"></li>
                        <li><a class="dropdown-item text-light" href="{{ route('bidder.auth.logout') }}"><i class="bi bi-box-arrow-left"></i><span style="margin-left: 10px"></span>Logout</a></li>
                    </ul>
                </div>
            {{-- </div> --}}
        @endauth
    </div>
</nav>

@yield('content')
  <footer class="d-flex flex-grow-1 flex-wrap justify-content-between align-items-center py-4" style="padding: 0 40px 0 40px">
    <p class="col-md-4 mb-0 text-secondary">&copy; Kelas B kelompok 7, Auctionet</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img src="/assets/img/auc-logo.png" alt="" style="width:90px ;">
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="{{ route('bidder.home') }}" class="nav-link px-2 text-secondary">Home</a></li>
      <li class="nav-item"><a href="{{ route('bidder.produk.semua') }}" class="nav-link px-2 text-secondary">Product</a></li>
      <li class="nav-item"><a href="{{ route('bidder.home.about') }}" class="nav-link px-2 text-secondary">About</a></li>
      <li class="nav-item"><a href="{{ route('bidder.home.about') }}" class="nav-link px-2 text-secondary">Contact Us</a></li>
    </ul>
  </footer>
@endsection



@push('styles')
<style>
    body{
    background-image: url("/assets/img/bg-home.jpg");
    min-height: 100vh;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    height: 100%;
    min-height: 100vh;
    }
    nav{
        background-color:#00000080;
        box-shadow: 0px 0px 2px 2px rgba(0, 0, 0, 0.5);

    }
    nav ul li{
        transition: .2s;
    }
    nav ul li:hover{
        opacity: 0.9;
    }
    .user-dropdown{
        background-color:#00000094;
        width: 150px;
        border: solid 2px;
        box-shadow: 0px 0px 2px 2px #00000080;

    }
    .dropdown-item{
      /*height: 45px;*/
      display: flex;
      align-items: center;
      transition: 0.3s;
      white-space: normal;
    }
    .dropdown-item:hover{
        background-color:#79797934;
    }
    .animate {
    animation-duration: 0.3s;
    -webkit-animation-duration: 0.3s;
    animation-fill-mode: both;
    -webkit-animation-fill-mode: both;
  }
  /* .dropdown-menu-center { 
    right: auto !important; 
    left: 50% !important; 
    top: 100% !important; 
    -webkit-transform: translate(-50%, 0) !important; 
    -o-transform: translate(-50%, 0) !important; 
    transform: translate(-50%, 0) !important; 
    } */
    .dropdown {text-align:center;}
     /* .dropdown-menu {margin:10px auto} */
    .dropdown-menu { left:50%; margin-left:-60px;}
  @keyframes slideIn {
  0% {
    transform: translateY(1rem);
    opacity: 0;
  }

  100% {
    transform: translateY(0rem);
    opacity: 1;
  }

  0% {
    transform: translateY(1rem);
    opacity: 0;
  }
}

@-webkit-keyframes slideIn {
  0% {
    -webkit-transform: transform;
    -webkit-opacity: 0;
  }

  100% {
    -webkit-transform: translateY(0);
    -webkit-opacity: 1;
  }

  0% {
    -webkit-transform: translateY(1rem);
    -webkit-opacity: 0;
  }
}
.slideIn {
  -webkit-animation-name: slideIn;
  animation-name: slideIn;
}
    footer{
        background-color:#00000080;
        position:sticky;
        top: 100%;
        bottom: 0;
        left: 0;
        width: 100%;
        margin-top: 60px;
        box-shadow:
        3px 3px 3px rgba(0, 0, 0, 0.5),
        3px -3px 3px rgba(0, 0, 0, 0.5);
    }
</style>
@endpush

