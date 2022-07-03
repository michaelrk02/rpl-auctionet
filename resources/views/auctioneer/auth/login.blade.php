@extends('layouts.auctioneer')

@section('title', 'Auctioneer Login')

@section('content')
<div class="d-flex justify-content-center align-items-center h-100">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title text-center">LOGIN</h5>
            <form method="post" action="{{ route('auctioneer.auth.login') }}">
                @csrf
                <div class="py-2 input-group">
                    <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
                    <input type="email" class="form-control" name="email" placeholder="Enter your e-mail" value="{{ old('email') }}">
                </div>
                <div class="py-2 input-group">
                    <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="Enter your password">
                </div>
                <div class="py-2">
                    <button type="submit" class="btn btn-success"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
