@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.auctioneer')

@section('title', 'Product Bids')

@section('content')
<h3 class="mb-4">Product Bids</h3>
<div class="py-2 text-muted fw-bold">{{ $produk->nama }}</div>
@if ($produk->selesai())
<div class="py-2">
    <div class="alert alert-warning m-0">
        <div class="row align-items-center">
            <div class="col">!! AUCTION ENDED !!</div>
            <div class="col-auto py-2">
                @if ($produk->dimenangkan_oleh === null)
                <form class="m-0 d-inline" method="post" action="{{ route('auctioneer.produk.finalisasi', ['produk' => $produk->id]) }}" onsubmit="return confirm('Are you sure?')">
                    @csrf
                    <button type="submit" class="btn btn-success"><i class="bi bi-check-lg me-2"></i> Finalize</button>
                </form>
                @else
                    @if (!$produk->terkirim)
                    <a class="btn btn-success" target="_blank" href="{{ route('auctioneer.pengiriman.kirim', ['produk' => $produk->id]) }}"><i class="bi bi-truck me-2"></i> Dispatch</a>
                    @else
                    <span class="btn btn-success disabled"><i class="bi bi-check-lg"></i> Dispatched</span>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
@if ($produk->dimenangkan_oleh !== null)
<div class="py-2">
    <div class="alert alert-info m-0">
        <div class="py-2">Winner : <strong>{{ $produk->dataPemenang->nama }}</strong></div>
        <div class="py-2">Address : <strong>{{ $produk->dataPemenang->alamat }}</strong></div>
        <div class="py-2">Contact : <a href="https://wa.me/{{ $produk->dataPemenang->no_telepon }}">{{ $produk->dataPemenang->no_telepon }}</a></div>
    </div>
</div>
@endif
@endif
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
