@component('mail::message')
# Product Has Been Shipped

Dear, **{{ $pengiriman->dataPenerima->nama }}**

The product {{ $pengiriman->dataProduk->nama }} has been shipped to your address with the following details:

- Timestamp : **{{ $pengiriman->waktu }}**
- Service : **{{ $pengiriman->layanan }}**
- Receipt : ```{{ $pengiriman->no_resi }}```
- Address : **{{ $pengiriman->alamat }}**
@endcomponent
