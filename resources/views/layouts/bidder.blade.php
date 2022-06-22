@extends('layouts.main')

@section('body')
<nav class="navbar fixed-top navbar-dark  py-3 justify-content-center"  >
    <div class="container-xxl text-white" style="padding-left:40px; padding-right:40px">
        <a href="#" class=" align-items-center col-md-3 mb-2 mb-md-0">
           <img src="/assets/img/auc-logo.png" alt="" style="width:90px ;">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 w-50 justify-content-around mb-md-0 ">
            <li class="nav-item"><a href="home.php" class="nav-link px-2 fw-bold link-primary">Home</a></li>
            <li class="nav-item"><a href="products.php" class="nav-link px-2 fw-bold link-light">Products</a></li>
            <li class="nav-item"><a href="about.php" class="nav-link px-2 fw-bold link-light">About</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-primary fw-bold">Login</button>
            <button type="button" class="btn btn-outline-primary me-2 fw-bold text-light">Register</button>
        </div>
    </div>
</nav>
@yield('content')
@endsection

@push('styles')
<style>
    body{
    background-image: url("/assets/img/bg-home.jpg");
    min-height: 100vh;
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    }
    nav{
        background-color:rgba(0, 0, 0, 0.5);
    }
    nav ul li{
        transition: .2s;
    }
    nav ul li:hover{
        opacity: 0.9;
    }
    /*.active-nav{
    color: #bd0000;
    }*/
    /*.btn-login{
        color: white;
        background-color: #bd0000;
    }
    .btn-register{
        color: white;
        border: solid 2px #bd0000;
    }*/
    .slide-banner{
        background-color: rgba(0, 0, 0, 0.5);
        width:100%;
        height: 400px;
        margin-top: 120px;
        padding:100px 130px 100px 150px;
        color: white;
    }
</style>
@endpush

