@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.auctioneer')

@section('title', 'Shipments List')

@section('content')
<h3 class="mb-4">Shipments List</h3>
<div class="py-2 table-responsive">
    <table class="table table-striped datatable">
        <thead>
            <th>Timestamp</th>
            <th>Product</th>
            <th>Recipient</th>
            <th>Service</th>
            <th>Tracking Number</th>
        </thead>
        <tbody>
            @foreach ($listPengiriman as $pengiriman)
            <tr>
                <td>{{ $pengiriman->waktu }}</td>
                <td>{{ $pengiriman->dataProduk->nama }}</td>
                <td>{{ $pengiriman->dataPenerima->nama }}</td>
                <td>{{ $pengiriman->layanan }}</td>
                <td class="font-monospace">{{ $pengiriman->no_resi }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
