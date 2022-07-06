@php
use App\Libraries\Auctionet;
@endphp

@component('mail::message')
# {{ $type }} Request Rejected

Dear, **{{ $request->dataSaldo->dataBidder->nama }}**

Your balance request with the following details:

- Timestamp : **{{ $request->waktu }}**
- Type : **{{ $type }}**
- Amount : **{{ $request->nominal }}**

has been **REJECTED** by administrator due to some reasons
@endcomponent
