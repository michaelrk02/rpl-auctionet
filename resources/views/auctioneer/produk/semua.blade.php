@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.auctioneer')

@section('title', 'Products List')

@section('content')
<h3 class="mb-4">Products List</h3>
<div class="py-2 table-responsive">
    <table class="table table-striped datatable">
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Open Bid</th>
            <th>Start Bid</th>
            <th>Sold</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($listProduk as $i => $produk)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $produk->nama }}</td>
                <td>{{ $produk->lelang_waktu_mulai }}</td>
                <td>{{ Auctionet::rupiah($produk->lelang_harga_buka) }}</td>
                <td>@if ($produk->dimenangkan_oleh !== null) <span class="bi bi-check-lg text-success"></span> @else <span class="bi bi-x-lg text-danger"></span> @endif</td>
                <td>
                    <a class="btn btn-primary" href="{{ route('auctioneer.produk.tawaran', ['produk' => $produk->id]) }}"><i class="bi bi-list-ol"></i></a>
                    <a class="btn btn-primary" href="{{ route('auctioneer.produk.edit', ['produk' => $produk->id]) }}"><i class="bi bi-pencil-square"></i></a>
                    <form class="m-0 d-inline" method="post" action="{{ route('auctioneer.produk.hapus', ['produk' => $produk->id]) }}" onsubmit="return confirm('Are you sure to delete this product?')">
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
