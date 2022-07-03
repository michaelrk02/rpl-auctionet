@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.auctioneer')

@section('Product Bids')

@section('content')
<h3 class="mb-4">Product Bids</h3>
<div class="py-2 text-muted fw-bold">{{ $produk->nama }}</div>
<div class="py-2">
    <table class="table table-striped datatable">
        <thead>
            <th>#</th>
            <th>Bidder</th>
            <th>Bid</th>
            <th>Time</th>
        </thead>
        <tbody>
            @foreach ($produk->listTawaran as $i => $tawaran)
                <tr>
                    <th>{{ $i + 1 }}</th>
                    <td>{{ $tawaran->nama }}</td>
                    <td>{{ Auctionet::rupiah($tawaran->pivot->harga) }}</td>
                    <td>{{ $tawaran->pivot->waktu }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
