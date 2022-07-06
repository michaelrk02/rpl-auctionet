@extends('layouts.auctioneer')

@section('title', 'Dispatch Product')

@section('content')
<h3 class="mb-4">Dispatch Product</h3>
<form method="post" action="{{ route('auctioneer.pengiriman.kirim') }}" onsubmit="return confirm('Are you sure?')">
    @csrf
    <div class="py-2">
        <label class="form-label">Product ID</label>
        <input type="text" class="form-control" name="produk" value="{{ $produk }}" placeholder="Enter product ID">
    </div>
    <div class="py-2">
        <label class="form-label">Service</label>
        <input type="text" class="form-control" name="layanan" value="{{ old('layanan') }}" placeholder="Enter shipping service">
    </div>
    <div class="py-2">
        <label class="form-label">Tracking Number</label>
        <input type="text" class="form-control" name="no_resi" value="{{ old('no_resi') }}" placeholder="Enter tracking number">
    </div>
    <div class="py-2">
        <button type="submit" class="btn btn-success"><i class="bi bi-send"></i> Submit</button>
    </div>
</form>
@endsection
