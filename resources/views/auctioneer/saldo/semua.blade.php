@php
use App\Libraries\Auctionet;
@endphp

@extends('layouts.auctioneer')

@section('title', 'Balance Requests')

@section('content')
<h3 class="mb-4">Balance Requests</h3>
<div class="py-2 table-responsive">
    <table class="table table-striped datatable">
        <thead>
            <th>Timestamp</th>
            <th>Type</th>
            <th>Bidder</th>
            <th>Details</th>
            <th>Actions</th>
        </thead>
        <tbody>
            @foreach ($listPengajuan as $pengajuan)
            <tr>
                <td class="font-monospace">{{ $pengajuan->waktu }}</td>
                <td class="font-monospace">{{ $pengajuan->jenis }}</td>
                <td class="font-monospace">{{ $pengajuan->dataSaldo->dataBidder->nama }}</td>
                <td class="font-monospace">{{ $pengajuan->keterangan }}</td>
                <td>
                    <a class="btn btn-primary" href="https://wa.me/{{ $pengajuan->dataSaldo->dataBidder->no_telepon }}"><i class="bi bi-telephone"></i></a>
                    <form class="m-0 d-inline" method="post" action="{{ route('auctioneer.saldo.terima', ['pengajuan' => $pengajuan->id]) }}" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        <button type="submit" class="btn btn-success"><i class="bi bi-check-lg"></i></button>
                    </form>
                    <form class="m-0 d-inline" method="post" action="{{ route('auctioneer.saldo.tolak', ['pengajuan' => $pengajuan->id]) }}" onsubmit="return confirm('Are you sure?')">
                        @csrf
                        <button type="submit" class="btn btn-danger"><i class="bi bi-x-lg"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
