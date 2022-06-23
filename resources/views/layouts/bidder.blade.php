@extends('layouts.main')

@section('body')
<nav class="navbar fixed-top navbar-dark  py-3 justify-content-center"  >
    <div class="container-xxl text-white" style="padding-left:40px; padding-right:40px">
        <a href="{{ route('bidder.home') }}" class=" align-items-center col-md-3 mb-2 mb-md-0">
           <img src="/assets/img/auc-logo.png" alt="" style="width:90px ;">
        </a>
        <ul class="nav col-12 col-md-auto mb-2 w-50 justify-content-around mb-md-0 ">
            <li class="nav-item"><a href="{{ route('bidder.home') }}" class="nav-link px-2 fw-bold link-light">Home</a></li>
            <li class="nav-item"><a href="{{ route('bidder.produk.semua') }}" class="nav-link px-2 fw-bold link-light">Products</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 fw-bold link-light">About</a></li>
        </ul>
        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-primary fw-bold">Login</button>
            <button type="button" class="btn btn-outline-primary me-2 fw-bold text-light">Register</button>
        </div>
    </div>
</nav>

@yield('content')
{{-- <div class="flex-grow-1"> --}}
  <footer class="d-flex flex-grow-1 flex-wrap justify-content-between align-items-center py-4" style="padding: 0 40px 0 40px">
    <p class="col-md-4 mb-0 text-secondary">&copy; Kelas B kelompok 7, Auctionet</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <img src="/assets/img/auc-logo.png" alt="" style="width:90px ;">
    </a>

    <ul class="nav col-md-4 justify-content-end">
      <li class="nav-item"><a href="{{ route('bidder.home') }}" class="nav-link px-2 text-secondary">Home</a></li>
      <li class="nav-item"><a href="{{ route('bidder.produk.semua') }}" class="nav-link px-2 text-secondary">Product</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-secondary">About</a></li>
      <li class="nav-item"><a href="#" class="nav-link px-2 text-secondary">Contact Us</a></li>
    </ul>
  </footer>
{{-- </div> --}}
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

