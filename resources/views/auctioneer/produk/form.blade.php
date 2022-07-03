@extends('layouts.auctioneer')

@if ($action === 'add')
@section('title', 'New Product')
@else
@section('title', 'Edit Product')
@endif

@section('content')
@if ($action === 'add')
<h3 class="mb-4">New Product</h3>
@else
<h3 class="mb-4">Edit Product</h3>
<div class="py-2 text-muted fw-bold">{{ $produk->id }}</div>
@endif
<form method="post" enctype="multipart/form-data" action="{{ $action === 'add' ? route('auctioneer.produk.tambah') : route('auctioneer.produk.edit', ['produk' => $produk->id]) }}" onsubmit="return confirm('Are you sure?')">
    @csrf
    <div class="py-2">
        <label class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" name="nama" placeholder="Enter product name" value="{{ $produk->nama }}">
    </div>
    <div class="py-2">
        <label class="form-label">Description <span class="text-danger">*</span></label>
        <textarea class="form-control" name="deskripsi" rows="5" placeholder="Enter product description (markdown formatted)">{{ $produk->deskripsi }}</textarea>
    </div>
    <div class="py-2">
        <label class="form-label">Extension Duration <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="lelang_waktu_perpanjangan" placeholder="Enter extension duration (in hours)" value="{{ $produk->lelang_waktu_perpanjangan }}">
    </div>
    <div class="py-2">
        <label class="form-label">Open Bid <span class="text-danger">*</span></label>
        <input type="datetime-local" class="form-control" name="lelang_waktu_mulai" placeholder="Enter open bid time" value="{{ $produk->lelang_waktu_mulai }}">
    </div>
    <div class="py-2">
        <label class="form-label">Start Bid <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="lelang_harga_buka" placeholder="Enter start bid (in IDR)" value="{{ $produk->lelang_harga_buka }}">
    </div>
    <div class="py-2">
        <label class="form-label">Buy Now <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="lelang_harga_tutup" placeholder="Enter buy now price (in IDR)" value="{{ $produk->lelang_harga_tutup }}">
    </div>
    <div class="py-2">
        <label class="form-label">Multiple Bid <span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="lelang_kelipatan" placeholder="Enter bid factor (in IDR)" value="{{ $produk->lelang_kelipatan }}">
    </div>
    <div class="py-2 border px-2">
        <label class="form-label fw-bold">Picture</label>
        @if (($action === 'edit') && ($produk->gambar !== null))
            <div class="py-1">Picture exists (<a target="_blank" href="{{ route('bidder.produk.lihat.gambar', ['produk' => $produk->id]) }}">view</a>)</div>
            <div class="py-1 form-check">
                <label for="remove-picture-checkbox" class="form-check-label">Remove picture</label>
                <input id="remove-picture-checkbox" type="checkbox" class="form-check-input" name="hapus_gambar" value="1">
            </div>
        @endif
        <input type="file" class="form-control" name="gambar">
    </div>
    <div class="py-2">
        <button type="submit" class="btn btn-success"><i class="bi bi-save me-2"></i> Save</button>
    </div>
</form>
@endsection
