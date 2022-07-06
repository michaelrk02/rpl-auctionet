@php
use App\Libraries\Auctionet;
@endphp

@component('mail::message')
# {{ $type }} Request Accepted

Dear, **{{ $request->dataSaldo->dataBidder->nama }}**

Your balance request with the following details:

- Timestamp : **{{ $request->waktu }}**
- Type : **{{ $type }}**
- Amount : **{{ $request->nominal }}**

has been **ACCEPTED** by administrator. Your balance is now at **{{ Auctionet::rupiah($request->dataSaldo->nominal) }}**
@endcomponent
